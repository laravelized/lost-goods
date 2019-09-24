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
use Illuminate\Foundation\Application;

class CreateCategoryAction
{
    private $categoryService;
    private $application;

    public function __construct(
        CategoryServiceInterface $categoryService,
        Application $application
    )
    {
        $this->application = $application;
        $this->categoryService = $categoryService;
    }

    public function act(array $params)
    {
        $createCategoryParams = $this->application->make(CreateCategoryParams::class);
        $createCategoryParams->setName($params['name']);

        if (!is_null($params['parent_category_id'])) {
            $createCategoryParams->setParentCategoryId($params['parent_category_id']);
        }

        $createCategoryParams->validate();

        $this->categoryService->create([
            'name' => $createCategoryParams->getName(),
            'parent_category_id' => $createCategoryParams->getParentCategoryId()
        ]);
    }
}
