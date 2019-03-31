<?php

namespace App\Repositories\Contracts;

/**
 * Interface ProductRepositoryInterface
 *
 * Contract for Product Repository
 */

interface ProductRepositoryInterface
{
    /**
     * Get all the products
     *
     * @return mixed
     */
    public function all();

    /**
     * Paginate the products
     *
     * @param int|null $limit
     * @return mixed
     */
    public function paginate(int $limit = null);

    /**
     * Get a single product by ID
     *
     * @param int $id
     * @return mixed
     */
    public function findById(int $id);
}