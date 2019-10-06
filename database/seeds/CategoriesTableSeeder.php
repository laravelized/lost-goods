<?php

use Illuminate\Database\Seeder;
use \App\Modules\Category\Categories;
use \App\Modules\Category\Models\Category;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categoryData = [
            Categories::OTHERS => 'fa-bars',
            Categories::DOCUMENT => 'fa-book',
            Categories::ACCESORIES => 'fa-clock',
            Categories::ELECTRONIC => 'fa-mobile-alt',
            Categories::VEHICLE => 'fa-car'
        ];

        foreach ($categoryData as $categoryName => $categoryIcon) {
            if (!Category::where('name', $categoryName)->exists()) {
                Category::create([
                    'name' => $categoryName,
                    'font_awesome_icon_class_name' => $categoryIcon
                ]);
            }
        }
    }
}
