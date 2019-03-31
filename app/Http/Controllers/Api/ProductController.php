<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProductResource;
use App\Http\Resources\ProductsCollection;
use App\Services\ProductService;
use Illuminate\Http\Request;

/**
 * Class ProductController
 */
class ProductController extends ApiController
{
    /**
     * @var ProductService
     */
    protected $product;

    /**
     * ProductController constructor.
     *
     * @param $product
     */
    public function __construct(ProductService $product)
    {
        $this->product = $product;
    }

    /**
     * Fetch the products paginated.
     *
     * @param Request $request
     * @return ProductsCollection
     */
    public function index(Request $request)
    {
        $list = $this->product->getProducts($request);

        return new ProductsCollection($list);
    }

    /**
     * Fetch a single product
     *
     * @param  int $id
     * @return ProductResource
     */
    public function show($id)
    {
        $product = $this->product->findById($id);

        return new ProductResource($product);
    }
}
