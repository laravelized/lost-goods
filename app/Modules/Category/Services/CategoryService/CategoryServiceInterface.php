<?php
/**
 * Created by PhpStorm.
 * User: rickyandhi
 * Date: 19/09/19
 * Time: 11:16
 */

namespace App\Modules\Category\Services\CategoryService;

use App\Modules\Category\Models\Category;
use Illuminate\Support\Collection;

interface CategoryServiceInterface
{
    public function create(array $params): Category;

    public function getAllCategories(): Collection;

    public function getCategoryById(int $id): ?Category;

    public function updateCategory(Category $category, array $params): void;

    public function deleteCategory(Category $category): void;

    public function getCategoryByName(string $name): ?Category;
}
