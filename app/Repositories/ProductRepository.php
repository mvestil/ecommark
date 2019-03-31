<?php
namespace App\Repositories;

use App\Models\Product;
use App\Repositories\Contracts\ProductRepositoryInterface;

/**
 * Class ProductRepository
 *
 * Handles product related database interactions
 */
class ProductRepository extends BaseRepository implements ProductRepositoryInterface
{
    /**
     * Get the model class name
     *
     * @return string
     */
    public function modelClass(): string
    {
        return Product::class;
    }

    /**
     * Get all the products
     *
     * @return mixed
     */
    public function all()
    {
        $this->applyConditions();

        return $this->model->all();
    }

    /**
     * Paginate the products
     *
     * @param int|null $limit
     * @return mixed
     */
    public function paginate(int $limit = null)
    {
        $this->applyConditions();

        return $this->model->paginate($limit ?: 20);
    }

    /**
     * Find a product by ID
     * @param int $id
     * @return mixed
     */
    public function findById(int $id)
    {
        return $this->model->find($id);
    }
}