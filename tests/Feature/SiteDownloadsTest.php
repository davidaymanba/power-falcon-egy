<?php

namespace Tests\Feature;

use App\Models\DownloadItem;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class SiteDownloadsTest extends TestCase
{
    use RefreshDatabase;

    public function test_downloads_page_lists_active_resources(): void
    {
        DownloadItem::query()->create([
            'title_en' => 'Power Falcon Catalog',
            'title_ar' => 'كتالوج باور فالكون',
            'type' => DownloadItem::TYPE_PDF,
            'url' => 'https://example.com/catalog.pdf',
            'is_active' => true,
        ]);

        DownloadItem::query()->create([
            'title_en' => 'Hidden Catalog',
            'title_ar' => 'كتالوج مخفي',
            'type' => DownloadItem::TYPE_PDF,
            'url' => 'https://example.com/hidden.pdf',
            'is_active' => false,
        ]);

        $this->get(route('downloads'))
            ->assertOk()
            ->assertSee('Power Falcon Catalog')
            ->assertSee('https://example.com/catalog.pdf')
            ->assertDontSee('Hidden Catalog');
    }

    public function test_downloads_page_can_search_arabic_and_filter_by_type(): void
    {
        DownloadItem::query()->create([
            'title_en' => 'Generator Video',
            'title_ar' => 'فيديو المولد',
            'type' => DownloadItem::TYPE_YOUTUBE,
            'url' => 'https://www.youtube.com/watch?v=abc123',
            'is_active' => true,
        ]);

        DownloadItem::query()->create([
            'title_en' => 'Project Archive',
            'title_ar' => 'ملف مشروع',
            'type' => DownloadItem::TYPE_ARCHIVE,
            'url' => 'https://example.com/project.zip',
            'is_active' => true,
        ]);

        $this->get(route('downloads', [
            'search' => 'فيديو',
            'type' => DownloadItem::TYPE_YOUTUBE,
        ]))
            ->assertOk()
            ->assertSee('Generator Video')
            ->assertDontSee('Project Archive');
    }
}
