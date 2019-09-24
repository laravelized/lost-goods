<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = \App\Modules\Category\Categories::LIST;
        foreach ($categories as $parentCategoryName => $childCategoriesName) {
            $parentCategory = \App\Modules\Category\Models\Category
                ::where('name', $parentCategoryName)
                ->first();
            if (is_null($parentCategory)) {
                $parentCategory = \App\Modules\Category\Models\Category::create([
                    'name' => $parentCategoryName
                ]);
            }

            foreach ($childCategoriesName  as $childCategoryName) {
                $childCategory = \App\Modules\Category\Models\Category
                    ::where('name', $childCategoryName)
                    ->first();
                if (!is_null($childCategory)) {
                    $childCategory->update([
                        'parent_category_id' => $parentCategory->id
                    ]);
                } else {
                    \App\Modules\Category\Models\Category::create([
                        'name' => $childCategoryName,
                        'parent_category_id' => $parentCategory->id
                    ]);
                }
            }
        }
    }
}
