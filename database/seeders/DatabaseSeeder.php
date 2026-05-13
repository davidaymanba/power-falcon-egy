<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::updateOrCreate([
            'email' => 'admin@powerfalcon.com',
        ], [
            'name' => 'Power Falcon Admin',
            'password' => 'password',
        ]);

        $categoryTranslations = [
            'AVRs' => 'منظمات الجهد',
            'ATS Panels' => 'لوحات التحويل الآلي',
            'Battery chargers' => 'شواحن البطاريات',
            'CAT & PERKINS' => 'كاتربيلر وبيركنز',
            'CUMMINS' => 'كمينز',
            'Solenoid' => 'سولينويد',
            'gauges and sensors' => 'عدادات وحساسات',
            'speed control and loadsharing' => 'تحكم السرعة وتوزيع الأحمال',
        ];

        $basePath = public_path('catalog/products');

        if (! File::isDirectory($basePath)) {
            return;
        }

        foreach (File::directories($basePath) as $directory) {
            $categoryName = basename($directory);
            $category = Category::updateOrCreate([
                'slug' => Str::slug($categoryName),
            ], [
                'name_en' => Str::headline($categoryName),
                'name_ar' => $categoryTranslations[$categoryName] ?? Str::headline($categoryName),
            ]);

            foreach (File::files($directory) as $file) {
                if (! in_array(Str::lower($file->getExtension()), ['jpg', 'jpeg', 'png', 'webp', 'avif'], true)) {
                    continue;
                }

                $productName = pathinfo($file->getFilename(), PATHINFO_FILENAME);

                Product::updateOrCreate([
                    'image' => 'catalog/products/'.$categoryName.'/'.$file->getFilename(),
                ], [
                    'name_en' => $productName,
                    'name_ar' => $productName,
                    'category_id' => $category->id,
                ]);
            }
        }
    }
}
