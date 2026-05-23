<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreProductRequest;
use App\Http\Requests\Admin\UpdateProductRequest;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index(Request $request): View
    {
        $products = Product::query()
            ->with('category')
            ->when($request->filled('search'), function ($query) use ($request) {
                $search = $request->string('search')->toString();

                $query->where(function ($query) use ($search) {
                    $query->where('name_en', 'like', "%{$search}%")
                        ->orWhere('name_ar', 'like', "%{$search}%");
                });
            })
            ->latest()
            ->paginate(12)
            ->withQueryString();

        return view('admin.products.index', compact('products'));
    }

    public function create(): View
    {
        return view('admin.products.create', [
            'categories' => Category::query()->orderBy('name_en')->get(),
        ]);
    }

    public function store(StoreProductRequest $request): RedirectResponse
    {
        $data = $request->validated();
        $data['image'] = $this->storeProductImage($request->file('image'), $data['category_id'] ?? null);

        Product::create($data);

        return redirect()->route('admin.products.index')->with('success', __('admin.products.created'));
    }

    public function show(Product $product): RedirectResponse
    {
        return redirect()->route('admin.products.edit', $product);
    }

    public function edit(Product $product): View
    {
        return view('admin.products.edit', [
            'product' => $product,
            'categories' => Category::query()->orderBy('name_en')->get(),
        ]);
    }

    public function update(UpdateProductRequest $request, Product $product): RedirectResponse
    {
        $data = $request->validated();

        if ($request->hasFile('image')) {
            $this->deleteProductImage($product->image);

            $data['image'] = $this->storeProductImage($request->file('image'), $data['category_id'] ?? $product->category_id);
        }

        $product->update($data);

        return redirect()->route('admin.products.index')->with('success', __('admin.products.updated'));
    }

    public function destroy(Product $product): RedirectResponse
    {
        $this->deleteProductImage($product->image);

        $product->delete();

        return redirect()->route('admin.products.index')->with('success', __('admin.products.deleted'));
    }

    private function storeProductImage(UploadedFile $file, ?int $categoryId): string
    {
        $directory = $this->productImageDirectory($categoryId);
        $fileName = $file->getClientOriginalName();
        $targetDirectory = public_path($directory);

        File::ensureDirectoryExists($targetDirectory);
        $file->move($targetDirectory, $fileName);

        return $directory.'/'.$fileName;
    }

    private function deleteProductImage(?string $imagePath): void
    {
        if (! $imagePath) {
            return;
        }

        if (str_starts_with($imagePath, 'catalog/')) {
            File::delete(public_path($imagePath));

            return;
        }

        Storage::disk('public')->delete($imagePath);
    }

    private function productImageDirectory(?int $categoryId): string
    {
        $category = $categoryId ? Category::query()->find($categoryId) : null;

        return match ($category?->slug) {
            'ats-panels' => 'catalog/products/ATS Panels',
            'avrs' => 'catalog/products/AVRs',
            'battery-chargers' => 'catalog/products/Battery chargers',
            'cat-perkins' => 'catalog/products/CAT & PERKINS',
            'cummins' => 'catalog/products/CUMMINS',
            'solenoid' => 'catalog/products/Solenoid',
            'gauges-and-sensors' => 'catalog/products/gauges and sensors',
            'speed-control-and-loadsharing' => 'catalog/products/speed control and loadsharing',
            default => 'catalog/products',
        };
    }
}
