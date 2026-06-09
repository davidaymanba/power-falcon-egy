<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

#[Fillable([
    'title_ar',
    'title_en',
    'type',
    'url',
    'file_path',
    'description_ar',
    'description_en',
    'is_active',
    'sort_order',
])]
class DownloadItem extends Model
{
    public const TYPE_PDF = 'pdf';

    public const TYPE_YOUTUBE = 'youtube';

    public const TYPE_ARCHIVE = 'archive';

    public const TYPE_FILE = 'file';

    public const TYPE_LINK = 'link';

    public static function types(): array
    {
        return [
            self::TYPE_PDF,
            self::TYPE_YOUTUBE,
            self::TYPE_ARCHIVE,
            self::TYPE_FILE,
            self::TYPE_LINK,
        ];
    }

    protected function casts(): array
    {
        return [
            'is_active' => 'boolean',
            'sort_order' => 'integer',
        ];
    }

    public function getTitleAttribute(): string
    {
        return $this->{'title_'.app()->getLocale()} ?: $this->title_en;
    }

    public function getDescriptionAttribute(): ?string
    {
        return $this->{'description_'.app()->getLocale()} ?: $this->description_en;
    }

    public function getResourceUrlAttribute(): ?string
    {
        if ($this->url) {
            return $this->url;
        }

        if (! $this->file_path) {
            return null;
        }

        if (Str::startsWith($this->file_path, ['http://', 'https://', '/'])) {
            return $this->file_path;
        }

        if (Str::startsWith($this->file_path, ['download-files/', 'downloads/'])) {
            return asset($this->file_path);
        }

        return Storage::disk('public')->url($this->file_path);
    }

    public function getIsExternalAttribute(): bool
    {
        return (bool) $this->url || Str::startsWith($this->file_path ?? '', ['http://', 'https://']);
    }
}
