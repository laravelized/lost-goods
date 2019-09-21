<?php
/**
 * Created by PhpStorm.
 * User: rickyandhi
 * Date: 19/09/19
 * Time: 11:13
 */

namespace App\Modules\Category\Repositories\CategoryRepository;

use App\Modules\Category\Models\Category;
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
}
