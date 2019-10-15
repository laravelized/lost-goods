<?php
/**
 * Created by PhpStorm.
 * User: rickyandhi
 * Date: 23/09/19
 * Time: 10:10
 */

namespace App\Modules\Category\Actions;

use App\Modules\Category\Services\CategoryService\CategoryServiceInterface;
use App\Modules\Category\Services\ParamsValidators\UpdateCategoryParams;
use Illuminate\Foundation\Application;

class UpdateCategoryAction
{
    private $app;
    private $categoryService;

    public function __construct(
        CategoryServiceInterface $categoryService,
        Application $application
    )
    {
        $this->categoryService = $categoryService;
        $this->app = $application;
    }

    public function act(array $params)
    {
        $updateCategoryParams = $this->app->make(UpdateCategoryParams::class);
        $updateCategoryParams->setCategoryId($params['category_id']);
        $updateCategoryParams->setCategoryFontAwesomeIconClass($params['font_awesome_icon_class_name']);
        $updateCategoryParams->setName($params['category_name']);

        $updateCategoryParams->validate();

        $category = $this->categoryService->getCategoryById($updateCategoryParams->getCategoryId());

        $this->categoryService->updateCategory($category, [
            'name' => $updateCategoryParams->getName(),
            'font_awesome_icon_class_name' => $updateCategoryParams->getCategoryFontAwesomeIconClass()
        ]);
    }
}
