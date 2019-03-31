<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\CategoriesCollection;
use App\Services\CategoryService;

/**
 * Class CategoryController
 */
class CategoryController extends ApiController
{
    /**
     * @var CategoryService
     */
    protected $category;

    /**
     * CategoryController constructor.
     *
     * @param $category
     */
    public function __construct(CategoryService $category)
    {
        $this->category = $category;
    }

    /**
     * Fetch all the categories
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $list = $this->category->getCategories();

        return $this->respond(new CategoriesCollection($list));
    }
}
