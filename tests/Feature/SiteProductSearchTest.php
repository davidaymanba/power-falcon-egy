<?php

namespace Tests\Feature;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class SiteProductSearchTest extends TestCase
{
    use RefreshDatabase;

    public function test_product_search_matches_arabic_and_english_content(): void
    {
        $controlCategory = Category::query()->create([
            'name_en' => 'Control Modules',
            'name_ar' => 'وحدات التحكم',
            'slug' => 'control-modules',
        ]);

        $filterCategory = Category::query()->create([
            'name_en' => 'Filters',
            'name_ar' => 'فلاتر',
            'slug' => 'filters',
        ]);

        Product::query()->create([
            'name_en' => 'DSE Controller',
            'name_ar' => 'كونترول دي اس اي',
            'description_en' => 'Automatic generator controller',
            'description_ar' => 'وحدة تشغيل المولد',
            'image' => 'catalog/products/dse-controller.jpg',
            'category_id' => $controlCategory->id,
        ]);

        Product::query()->create([
            'name_en' => 'Oil Filter',
            'name_ar' => 'فلتر زيت',
            'description_en' => 'Engine filtration part',
            'description_ar' => 'قطعة فلترة للمحرك',
            'image' => 'catalog/products/oil-filter.jpg',
            'category_id' => $filterCategory->id,
        ]);

        $this->get(route('products', ['search' => 'كونترول']))
            ->assertOk()
            ->assertSee('DSE Controller')
            ->assertDontSee('Oil Filter');

        $this->get(route('products', ['search' => 'generator']))
            ->assertOk()
            ->assertSee('DSE Controller')
            ->assertDontSee('Oil Filter');

        $this->get(route('products', ['search' => 'وحدات التحكم']))
            ->assertOk()
            ->assertSee('DSE Controller')
            ->assertDontSee('Oil Filter');
    }
}
