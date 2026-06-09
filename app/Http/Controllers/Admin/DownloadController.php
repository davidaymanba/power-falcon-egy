<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreDownloadItemRequest;
use App\Http\Requests\Admin\UpdateDownloadItemRequest;
use App\Models\DownloadItem;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class DownloadController extends Controller
{
    public function index(Request $request): View
    {
        $downloads = DownloadItem::query()
            ->when($request->filled('search'), function ($query) use ($request) {
                $search = $request->string('search')->toString();

                $query->where(function ($query) use ($search) {
                    $query->where('title_en', 'like', "%{$search}%")
                        ->orWhere('title_ar', 'like', "%{$search}%")
                        ->orWhere('url', 'like', "%{$search}%");
                });
            })
            ->when($request->filled('type'), function ($query) use ($request) {
                $query->where('type', $request->string('type')->toString());
            })
            ->orderBy('sort_order')
            ->latest()
            ->paginate(12)
            ->withQueryString();

        return view('admin.downloads.index', [
            'downloads' => $downloads,
            'types' => DownloadItem::types(),
        ]);
    }

    public function create(): View
    {
        return view('admin.downloads.create', [
            'download' => new DownloadItem([
                'is_active' => true,
            ]),
            'types' => DownloadItem::types(),
        ]);
    }

    public function store(StoreDownloadItemRequest $request): RedirectResponse
    {
        $data = $this->validatedData($request);

        if ($request->hasFile('file')) {
            $data['file_path'] = $this->storeDownloadFile($request->file('file'), $data['type'], $data['title_en']);
            $data['url'] = null;
        }

        DownloadItem::query()->create($data);

        return redirect()->route('admin.downloads.index')->with('success', __('admin.downloads.created'));
    }

    public function show(DownloadItem $download): RedirectResponse
    {
        return redirect()->route('admin.downloads.edit', $download);
    }

    public function edit(DownloadItem $download): View
    {
        return view('admin.downloads.edit', [
            'download' => $download,
            'types' => DownloadItem::types(),
        ]);
    }

    public function update(UpdateDownloadItemRequest $request, DownloadItem $download): RedirectResponse
    {
        $data = $this->validatedData($request);

        if ($request->hasFile('file')) {
            $this->deleteDownloadFile($download->file_path);

            $data['file_path'] = $this->storeDownloadFile($request->file('file'), $data['type'], $data['title_en']);
            $data['url'] = null;
        } elseif ($request->filled('url')) {
            $this->deleteDownloadFile($download->file_path);

            $data['file_path'] = null;
        } elseif (in_array($data['type'], [DownloadItem::TYPE_YOUTUBE, DownloadItem::TYPE_LINK], true)) {
            $this->deleteDownloadFile($download->file_path);

            $data['file_path'] = null;
        }

        $download->update($data);

        return redirect()->route('admin.downloads.index')->with('success', __('admin.downloads.updated'));
    }

    public function destroy(DownloadItem $download): RedirectResponse
    {
        $this->deleteDownloadFile($download->file_path);

        $download->delete();

        return redirect()->route('admin.downloads.index')->with('success', __('admin.downloads.deleted'));
    }

    private function validatedData(StoreDownloadItemRequest|UpdateDownloadItemRequest $request): array
    {
        $data = $request->validated();
        unset($data['file']);

        $data['is_active'] = $request->boolean('is_active');
        $data['sort_order'] = $request->integer('sort_order');
        $data['url'] = $data['url'] ?? null;

        return $data;
    }

    private function storeDownloadFile(UploadedFile $file, string $type, string $title): string
    {
        $directory = 'download-files/'.$type;
        $targetDirectory = public_path($directory);
        $baseName = Str::slug($title) ?: 'download';
        $fileName = $baseName.'-'.now()->format('YmdHis').'.'.$file->getClientOriginalExtension();

        File::ensureDirectoryExists($targetDirectory);
        $file->move($targetDirectory, $fileName);

        return $directory.'/'.$fileName;
    }

    private function deleteDownloadFile(?string $filePath): void
    {
        if (! $filePath || ! str_starts_with($filePath, ['download-files/', 'downloads/'])) {
            return;
        }

        File::delete(public_path($filePath));
    }
}
