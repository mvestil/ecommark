<?php

namespace App\Repositories;

use App\Models\Category;
use App\Repositories\Contracts\CategoryRepositoryInterface;

/**
 * Class CategoryRepository
 *
 * Handles category related database interactions.
 */
class CategoryRepository extends BaseRepository implements CategoryRepositoryInterface
{
    /**
     * Return the model class name
     *
     * @return string
     */
    public function modelClass(): string
    {
        return Category::class;
    }

    /**
     * Get all the categories
     *
     * @return mixed
     */
    public function all()
    {
        return $this->model->all();
    }
}