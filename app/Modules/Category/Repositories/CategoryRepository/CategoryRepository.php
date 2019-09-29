<?php
/**
 * Created by PhpStorm.
 * User: rickyandhi
 * Date: 19/09/19
 * Time: 11:13
 */

namespace App\Modules\Category\Repositories\CategoryRepository;

use App\Modules\Category\Models\Category;
use App\Modules\LostGoods\Models\LostGood;
use Illuminate\Support\Collection;

class CategoryRepository implements CategoryRepositoryInterface
{
    private $model;

    public function __construct(Category $category)
    {
        $this->model = $category;
    }

    public function create(array $params): Category
    {
        return $this->model->create([
            'name' => $params['name']
        ]);
    }

    public function getAllCategories(): Collection
    {
        return $this->model->all();
    }

    public function getCategoryById(int $id): ?Category
    {
        return $this->model->where('id', $id)->first();
    }

    public function updateCategory(Category $category, array $params): void
    {
        $category->update([
            'name' => $params['name'],
            'parent_category_id' => $params['parent_category_id'] ?? null
        ]);
    }

    public function deleteCategory(Category $category): void
    {
        $category->delete();
    }

    public function getCategoryByName(string $name): ?Category
    {
        $this->model->where('name', $name)->first();
    }

    public function attachCategoryToLostGood(Category $category, LostGood $lostGood): void
    {
        $category->lostGoods()->attach($lostGood->id);
    }
}
