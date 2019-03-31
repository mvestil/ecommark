<?php

namespace App\Services;

use App\Repositories\Contracts\CategoryRepositoryInterface;

/**
 * Class CategoryService
 *
 * This is where the business logic for Categories resides
 */
class CategoryService
{
    /**
     * @var CategoryRepositoryInterface
     */
    protected $category;

    /**
     * CategoryService constructor.
     *
     * @param $category
     */
    public function __construct(CategoryRepositoryInterface $category)
    {
        $this->category = $category;
    }

    /**
     * Get all categories
     *
     * @return mixed
     */
    public function getCategories()
    {
        return $this->category->all();
    }
}