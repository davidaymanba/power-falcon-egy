<?php

namespace Tests\Feature\Admin;

use App\Models\Category;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CategoryCrudTest extends TestCase
{
    use RefreshDatabase;

    public function test_admin_can_create_update_and_delete_category(): void
    {
        $admin = User::factory()->create();

        $this->actingAs($admin)
            ->post(route('admin.categories.store'), [
                'name_en' => 'Control Modules',
                'name_ar' => 'Control Modules AR',
                'slug' => '',
            ])
            ->assertRedirect(route('admin.categories.index'));

        $category = Category::query()->where('slug', 'control-modules')->firstOrFail();

        $this->actingAs($admin)
            ->put(route('admin.categories.update', $category), [
                'name_en' => 'Control Boards',
                'name_ar' => 'Control Boards AR',
                'slug' => 'control-boards',
            ])
            ->assertRedirect(route('admin.categories.index'));

        $this->assertDatabaseHas('categories', [
            'id' => $category->id,
            'name_en' => 'Control Boards',
            'slug' => 'control-boards',
        ]);

        $this->actingAs($admin)
            ->delete(route('admin.categories.destroy', $category->fresh()))
            ->assertRedirect(route('admin.categories.index'));

        $this->assertDatabaseMissing('categories', [
            'id' => $category->id,
        ]);
    }

    public function test_product_create_form_lists_categories(): void
    {
        $admin = User::factory()->create();

        Category::query()->create([
            'name_en' => 'Control Modules',
            'name_ar' => 'Control Modules AR',
            'slug' => 'control-modules',
        ]);

        $this->actingAs($admin)
            ->get(route('admin.products.create'))
            ->assertOk()
            ->assertSee('Control Modules');
    }
}
