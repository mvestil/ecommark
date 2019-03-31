<?php

namespace App\Repositories\Contracts;

/**
 * Interface CategoryRepositoryInterface
 */
interface CategoryRepositoryInterface
{
    /**
     * Get all the categories
     *
     * @return mixed
     */
    public function all();
}