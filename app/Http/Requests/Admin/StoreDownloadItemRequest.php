<?php

namespace App\Http\Requests\Admin;

use App\Models\DownloadItem;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Validator;

class StoreDownloadItemRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    /**
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title_ar' => ['required', 'string', 'max:255'],
            'title_en' => ['required', 'string', 'max:255'],
            'type' => ['required', Rule::in(DownloadItem::types())],
            'url' => ['nullable', 'url', 'max:2048'],
            'file' => ['nullable', 'file', 'max:102400'],
            'description_ar' => ['nullable', 'string'],
            'description_en' => ['nullable', 'string'],
            'is_active' => ['nullable', 'boolean'],
            'sort_order' => ['nullable', 'integer', 'min:0', 'max:999999'],
        ];
    }

    public function withValidator(Validator $validator): void
    {
        $validator->after(function (Validator $validator) {
            $this->validateDownloadSource($validator);
        });
    }

    private function validateDownloadSource(Validator $validator): void
    {
        $type = $this->string('type')->toString();
        $hasUrl = $this->filled('url');
        $hasFile = $this->hasFile('file');

        if (in_array($type, [DownloadItem::TYPE_YOUTUBE, DownloadItem::TYPE_LINK], true) && ! $hasUrl) {
            $validator->errors()->add('url', __('admin.downloads.validation.url_required'));
        }

        if (in_array($type, [DownloadItem::TYPE_PDF, DownloadItem::TYPE_ARCHIVE, DownloadItem::TYPE_FILE], true) && ! $hasUrl && ! $hasFile) {
            $validator->errors()->add('file', __('admin.downloads.validation.file_or_url_required'));
        }

        if (! $hasFile) {
            return;
        }

        $extension = strtolower($this->file('file')->getClientOriginalExtension());

        if ($type === DownloadItem::TYPE_PDF && $extension !== 'pdf') {
            $validator->errors()->add('file', __('admin.downloads.validation.pdf_file'));
        }

        if ($type === DownloadItem::TYPE_ARCHIVE && ! in_array($extension, ['zip', 'rar', '7z', 'gz', 'tar'], true)) {
            $validator->errors()->add('file', __('admin.downloads.validation.archive_file'));
        }
    }
}
