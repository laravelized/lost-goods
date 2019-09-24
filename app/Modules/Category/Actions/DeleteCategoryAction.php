<?php
/**
 * Created by PhpStorm.
 * User: rickyandhi
 * Date: 23/09/19
 * Time: 10:10
 */

namespace App\Modules\Category\Actions;


use App\Modules\Category\Exceptions\CategoryDoesNotExistException;
use App\Modules\Category\Services\CategoryService\CategoryServiceInterface;

class DeleteCategoryAction
{
    private $categoryService;

    public function __construct(
        CategoryServiceInterface $categoryService
    )
    {
        $this->categoryService = $categoryService;
    }

    public function act(array $params)
    {
        $category = $this->categoryService->getCategoryById($params['category_id']);
        if (is_null($category)) {
            throw new CategoryDoesNotExistException(CategoryDoesNotExistException::MESSAGE_KEY);
        }
        $this->categoryService->deleteCategory($category);
    }
}
