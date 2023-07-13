<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    
    public function run()
    {
        // Kategorileri ve alt kategorileri oluştur
        $categories = [
            [
                'name' => 'Kategori 1',
                'subCategories' => [
                    ['name' => 'Alt Kategori 1-1'],
                    ['name' => 'Alt Kategori 1-2'],
                ]
            ],
            [
                'name' => 'Kategori 2',
                'subCategories' => [
                    ['name' => 'Alt Kategori 2-1'],
                    ['name' => 'Alt Kategori 2-2'],
                    ['name' => 'Alt Kategori 2-3'],
                ]
            ],
        ];

        foreach ($categories as $categoryData) {
            $category = Category::create(['name' => $categoryData['name']]);

            foreach ($categoryData['subCategories'] as $subCategoryData) {
                $category->subCategories()->create(['name' => $subCategoryData['name']]);
            }
        }

    }
}
