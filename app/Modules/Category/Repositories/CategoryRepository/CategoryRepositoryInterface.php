<?php
/**
 * Created by PhpStorm.
 * User: rickyandhi
 * Date: 19/09/19
 * Time: 11:12
 */

namespace App\Modules\Category\Repositories\CategoryRepository;

use App\Modules\Category\Models\Category;
use Illuminate\Support\Collection;

interface CategoryRepositoryInterface
{
    public function create(array $params): Category;

    public function getAllCategories(): Collection;
}
