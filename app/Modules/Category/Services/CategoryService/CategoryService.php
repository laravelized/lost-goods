<?php
/**
 * Created by PhpStorm.
 * User: rickyandhi
 * Date: 19/09/19
 * Time: 11:16
 */

namespace App\Modules\Category\Services\CategoryService;


use App\Modules\Category\Models\Category;
use App\Modules\Category\Repositories\CategoryRepository\CategoryRepositoryInterface;
use Illuminate\Support\Collection;

class CategoryService implements CategoryServiceInterface
{
    private $categoryRepository;

    public function __construct(CategoryRepositoryInterface $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    public function create(array $params): Category
    {
        return $this->categoryRepository->create($params);
    }

    public function getAllCategories(): Collection
    {
        return $this->categoryRepository->getAllCategories();
    }

    public function getCategoryById(int $id): ?Category
    {
        return $this->categoryRepository->getCategoryById($id);
    }

    public function updateCategory(Category $category, array $params): void
    {
        $this->categoryRepository->updateCategory($category, $params);
    }

    public function deleteCategory(Category $category): void
    {
        $this->categoryRepository->deleteCategory($category);
    }

    public function getCategoryByName(string $name): ?Category
    {
        return $this->categoryRepository->getCategoryByName($name);
    }
}
