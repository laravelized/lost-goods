<?php
/**
 * Created by PhpStorm.
 * User: rickyandhi
 * Date: 19/09/19
 * Time: 11:21
 */

namespace App\Modules\Category\Services\ParamsValidators;

use App\Modules\Category\Services\ParamsValidators\Exceptions\CategoryNameExceedLimitException;

class CreateCategoryParams
{
    /**
     * @var string
     */
    private $name;

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    public function validate()
    {
        if (strlen($this->name) > 191) {
            throw new CategoryNameExceedLimitException('category_name_exceed_limit_exception');
        }
    }
}