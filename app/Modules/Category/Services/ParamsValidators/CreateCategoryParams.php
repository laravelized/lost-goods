<?php
/**
 * Created by PhpStorm.
 * User: rickyandhi
 * Date: 19/09/19
 * Time: 11:21
 */

namespace App\Modules\Category\Services\ParamsValidators;

use App\Modules\Category\Exceptions\CategoryIconClassNameExceedsLimitException;
use App\Modules\Category\Exceptions\CategoryIdDoesNotExistException;
use App\Modules\Category\Exceptions\CategoryNameExceedsLimitException;
use App\Modules\Category\Services\CategoryService\CategoryServiceInterface;

class CreateCategoryParams
{
    private $categoryService;

    /**
     * @var string
     */
    private $name;

    private $categoryFontAwesomeIconClass;

    /**
     * @var integer
     */
    private $parentCategoryId = null;

    public function __construct(
        CategoryServiceInterface $categoryService
    )
    {
        $this->categoryService = $categoryService;
    }

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

    /**
     * @param int $parentCategoryId
     */
    public function setParentCategoryId(int $parentCategoryId): void
    {
        $this->parentCategoryId = $parentCategoryId;
    }

    /**
     * @return int
     */
    public function getParentCategoryId(): ?int
    {
        return $this->parentCategoryId;
    }

    /**
     * @return string
     */
    public function getCategoryFontAwesomeIconClass(): string
    {
        return $this->categoryFontAwesomeIconClass;
    }

    /**
     * @param mixed $categoryFontAwesomeIconClass
     */
    public function setCategoryFontAwesomeIconClass($categoryFontAwesomeIconClass): void
    {
        $this->categoryFontAwesomeIconClass = $categoryFontAwesomeIconClass;
    }

    public function validate()
    {
        if (strlen($this->name) > 191) {
            throw new CategoryNameExceedsLimitException('category_name_exceed_limit_exception');
        }

        if (strlen($this->getCategoryFontAwesomeIconClass()) > 191) {
            throw new CategoryIconClassNameExceedsLimitException(CategoryIconClassNameExceedsLimitException::MESSAGE_KEY);
        }

        if (!is_null($this->getParentCategoryId())) {
            $parentCategory = $this->categoryService->getCategoryById($this->getParentCategoryId());
            if (is_null($parentCategory)) {
                throw new CategoryIdDoesNotExistException('category_does_not_exist_exception');
            }
        }
    }
}
