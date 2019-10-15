<?php
/**
 * Created by PhpStorm.
 * User: rickyandhi
 * Date: 23/09/19
 * Time: 10:19
 */

namespace App\Modules\Category\Services\ParamsValidators;

use App\Modules\Category\Exceptions\CategoryDoesNotExistException;
use App\Modules\Category\Exceptions\CategoryIconClassNameExceedsLimitException;
use App\Modules\Category\Exceptions\CategoryNameExceedsLimitException;
use App\Modules\Category\Services\CategoryService\CategoryServiceInterface;

class UpdateCategoryParams
{
    private $categoryService;

    /**
     * @var string
     */
    private $name;

    /**
     * @var integer
     */
    private $categoryId;

    /**
     * @var string
     */
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
     * @param string $categoryFontAwesomeIconClass
     */
    public function setCategoryFontAwesomeIconClass(string $categoryFontAwesomeIconClass): void
    {
        $this->categoryFontAwesomeIconClass = $categoryFontAwesomeIconClass;
    }

    /**
     * @return string
     */
    public function getCategoryFontAwesomeIconClass(): string
    {
        return $this->categoryFontAwesomeIconClass;
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
     * @return int
     */
    public function getCategoryId(): int
    {
        return $this->categoryId;
    }

    /**
     * @param int $categoryId
     */
    public function setCategoryId(int $categoryId): void
    {
        $this->categoryId = $categoryId;
    }

    public function validate()
    {
        if (strlen($this->name) > 191) {
            throw new CategoryNameExceedsLimitException('category_name_exceed_limit_exception');
        }

        if (strlen($this->getCategoryFontAwesomeIconClass()) > 191) {
            throw new CategoryIconClassNameExceedsLimitException(CategoryIconClassNameExceedsLimitException::MESSAGE_KEY);
        }

        $category = $this->categoryService->getCategoryById($this->getCategoryId());
        if (is_null($category)) {
            throw new CategoryDoesNotExistException('category_does_not_exist_exception');
        }

        if (!is_null($this->getParentCategoryId())) {
            $parentCategory = $this->categoryService->getCategoryById($this->getParentCategoryId());
            if (is_null($parentCategory)) {
                throw new CategoryDoesNotExistException('parent_category_does_not_exist_exception');
            }
        }
    }
}
