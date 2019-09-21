<?php
/**
 * Created by PhpStorm.
 * User: rickyandhi
 * Date: 19/09/19
 * Time: 11:19
 */

namespace App\Modules\Category\Actions;

use App\Modules\Category\Services\CategoryService\CategoryServiceInterface;
use App\Modules\Category\Services\ParamsValidators\CreateCategoryParams;

class CreateCategoryAction
{
    private $categoryService;

    public function __construct(CategoryServiceInterface $categoryService)
    {
        $this->categoryService = $categoryService;
    }

    public function act(array $params)
    {
        $createCategoryParams = new CreateCategoryParams();
        $createCategoryParams->setName($params['name']);
        $createCategoryParams->validate();

        $this->categoryService->create([
            'name' => $createCategoryParams->getName()
        ]);
    }
}
