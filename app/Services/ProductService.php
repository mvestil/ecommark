<?php

namespace App\Services;

use App\Repositories\Conditions\Product\CategorizedAs;
use App\Repositories\Conditions\Product\PriceRangeBetween;
use App\Repositories\Conditions\Product\SoldOut;
use App\Repositories\Conditions\Product\SortBy;
use App\Repositories\Conditions\Product\StocksAvailable;
use App\Repositories\Contracts\ProductRepositoryInterface;
use Illuminate\Http\Request;

/**
 * Class ProductService
 *
 * This is where the business logic for products reside
 */
class ProductService
{
    /**
     * @var ProductRepositoryInterface
     */
    protected $product;

    /**
     * ProductService constructor.
     *
     * @param $productRepo
     */
    public function __construct(ProductRepositoryInterface $productRepo)
    {
        $this->product = $productRepo;
    }

    /**
     * Get paginated products
     *
     * @param Request $request
     * @return mixed
     */
    public function getProducts(Request $request)
    {
        return $this->product->conditions(
            $this->filters($request)
        )->paginate($request->input('limit'));
    }

    /**
     * Handles the filters and returns the conditions
     *
     * @param Request $request
     * @return array
     */
    protected function filters(Request $request): array
    {
        $conditions = [];

        if ($request->has('sold_out')) {
            $conditions[] = (bool) $request->input('sold_out') ? new SoldOut : new StocksAvailable;
        }

        if ($request->has('category_id')) {
            $conditions[] = new CategorizedAs($request->input('category_id'));
        }

        if ($request->has('price_from') && $request->has('price_to')) {
            $conditions[] = new PriceRangeBetween(
                $request->input('price_from'),
                $request->input('price_to')
            );
        }

        if ($request->has('sort_by')) {
            $conditions[] = new SortBy(
                $request->input('sort_by'),
                $request->input('sort_order')
            );
        }

        return $conditions;
    }

    /**
     * Find a product by ID
     *
     * @param int $id
     * @return mixed
     */
    public function findById(int $id)
    {
        return $this->product->findById($id);
    }
}

