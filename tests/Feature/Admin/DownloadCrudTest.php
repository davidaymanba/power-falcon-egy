<?php

namespace Tests\Feature\Admin;

use App\Models\DownloadItem;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\File;
use Tests\TestCase;

class DownloadCrudTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @var array<int, string>
     */
    private array $uploadedFiles = [];

    protected function tearDown(): void
    {
        foreach ($this->uploadedFiles as $filePath) {
            File::delete(public_path($filePath));
        }

        parent::tearDown();
    }

    public function test_admin_can_create_update_and_delete_youtube_resource(): void
    {
        $admin = User::factory()->create();

        $this->actingAs($admin)
            ->post(route('admin.downloads.store'), [
                'title_en' => 'Generator Overview',
                'title_ar' => 'شرح المولد',
                'type' => DownloadItem::TYPE_YOUTUBE,
                'url' => 'https://www.youtube.com/watch?v=abc123',
                'description_en' => 'Video overview',
                'description_ar' => 'شرح بالفيديو',
                'is_active' => '1',
                'sort_order' => '5',
            ])
            ->assertRedirect(route('admin.downloads.index'));

        $download = DownloadItem::query()->where('title_en', 'Generator Overview')->firstOrFail();

        $this->assertTrue($download->is_active);
        $this->assertSame(5, $download->sort_order);

        $this->actingAs($admin)
            ->put(route('admin.downloads.update', $download), [
                'title_en' => 'Generator Video',
                'title_ar' => 'فيديو المولد',
                'type' => DownloadItem::TYPE_YOUTUBE,
                'url' => 'https://www.youtube.com/watch?v=xyz789',
                'description_en' => 'Updated video overview',
                'description_ar' => 'شرح محدث',
                'is_active' => '1',
                'sort_order' => '1',
            ])
            ->assertRedirect(route('admin.downloads.index'));

        $this->assertDatabaseHas('download_items', [
            'id' => $download->id,
            'title_en' => 'Generator Video',
            'url' => 'https://www.youtube.com/watch?v=xyz789',
            'sort_order' => 1,
        ]);

        $this->actingAs($admin)
            ->delete(route('admin.downloads.destroy', $download->fresh()))
            ->assertRedirect(route('admin.downloads.index'));

        $this->assertDatabaseMissing('download_items', [
            'id' => $download->id,
        ]);
    }

    public function test_admin_can_upload_pdf_resource(): void
    {
        $admin = User::factory()->create();
        $file = UploadedFile::fake()->create('catalog.pdf', 24, 'application/pdf');

        $this->actingAs($admin)
            ->post(route('admin.downloads.store'), [
                'title_en' => 'Power Falcon Catalog',
                'title_ar' => 'كتالوج باور فالكون',
                'type' => DownloadItem::TYPE_PDF,
                'file' => $file,
                'is_active' => '1',
                'sort_order' => '0',
            ])
            ->assertRedirect(route('admin.downloads.index'));

        $download = DownloadItem::query()->where('title_en', 'Power Falcon Catalog')->firstOrFail();

        $this->assertNotNull($download->file_path);
        $this->assertStringStartsWith('download-files/pdf/', $download->file_path);
        $this->assertFileExists(public_path($download->file_path));

        $this->uploadedFiles[] = $download->file_path;
    }
}
