<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

#[Fillable(['name_ar', 'name_en', 'image', 'category_id', 'description_ar', 'description_en'])]
class Product extends Model
{
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function getNameAttribute(): string
    {
        return $this->{'name_'.app()->getLocale()} ?: $this->name_en;
    }

    public function getDescriptionAttribute(): ?string
    {
        return $this->{'description_'.app()->getLocale()} ?: $this->description_en;
    }

    public function getImageUrlAttribute(): string
    {
        if (Str::startsWith($this->image, ['http://', 'https://', '/'])) {
            return $this->image;
        }

        if (Str::startsWith($this->image, 'catalog/')) {
            return asset($this->image);
        }

        return Storage::disk('public')->url($this->image);
    }
}
