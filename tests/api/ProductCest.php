<?php

namespace Tests\Api;

use App\Models\Category;
use Tests\Api\Base\ApiTestAbstract;
use Tests\Api\Resources\ProductResources;

/**
 * Class ProductCest
 *
 * Test case for product related API endpoints
 */
class ProductCest extends ApiTestAbstract
{
    use ProductResources;

    /**
     *
     */
    public function testList()
    {
        $this->tester->wantToTest('Listing of products');

        $this->getProducts()
            ->responseCodeIs(200)
            ->listHasExpectedResponseTypes()
            ->listHasExpectedResponseValues();
    }

    /**
     * @throws \Throwable
     */
    public function testSoldOutList()
    {
        $this->tester->wantToTest('Listing of sold out products');

        $this->getProducts(['sold_out' => 1])
            ->responseCodeIs(200)
            ->listHasExpectedResponseTypes()
            ->responseOnlyContainsSoldOut();
    }

    /**
     * @throws \Throwable
     */
    public function testCategoredAsList()
    {
        $this->tester->wantToTest('Listing of products that belongs to a specific category');

        // get the first category
        $category = Category::find(1);

        $this->getProducts(['category_id' => $category->id])
            ->responseCodeIs(200)
            ->listHasExpectedResponseTypes()
            ->responseOnlyContainsCategory($category->id);
    }

    /**
     * @throws \Throwable
     */
    public function testPriceRangeList()
    {
        $this->tester->wantToTest('Listing of products from a given price range');

        $priceFrom = 0.00;
        $priceTo   = 100.00;

        $this->getProducts(['price_from' => $priceFrom, 'price_to' => $priceTo])
            ->responseCodeIs(200)
            ->listHasExpectedResponseTypes()
            ->responseOnlyContainsPriceRange($priceFrom, $priceTo);
    }

    /**
     * @throws \Throwable
     */
    public function testSortByPriceList()
    {
        $this->tester->wantToTest('Listing of products sorted by price asc / desc');

        // sort by asc
        $this->getProducts(['sort_by' => 'price', 'sort_order' => 'asc'])
            ->responseCodeIs(200)
            ->listHasExpectedResponseTypes()
            ->responseSortedAscendingByPrice();

        // sort by desc
        $this->getProducts(['sort_by' => 'price', 'sort_order' => 'desc'])
            ->responseCodeIs(200)
            ->listHasExpectedResponseTypes()
            ->responseSortedDescendingByPrice();
    }

    /**
     * @throws \Throwable
     */
    public function testSortByNameList()
    {
        $this->tester->wantToTest('Listing of products sorted by name asc / desc');

        // sort by asc
        $this->getProducts(['sort_by' => 'name', 'sort_order' => 'asc'])
            ->responseCodeIs(200)
            ->listHasExpectedResponseTypes()
            ->responseSortedAscendingByName()
            ->getProducts(['sort_by' => 'name', 'sort_order' => 'desc'])
            ->listHasExpectedResponseTypes()
            ->responseSortedDescendingByName();
    }

    /**
     * @throws \Throwable
     */
    public function testLimitResult()
    {
        $this->tester->wantToTest('Listing of products with specified limit');

        $this->getProducts(['limit' => 10,])
            ->responseCodeIs(200)
            ->listHasExpectedResponseTypes()
            ->responseHasResultCount(10)
            ->getProducts(['limit' => 20,])
            ->responseCodeIs(200)
            ->responseHasResultCount(20);
    }

    /**
     * Get a single product
     */
    public function testGetSingleProduct()
    {
        $this->tester->wantToTest('Getting a single product');

        $this->findProduct(1)
            ->responseCodeIs(200)
            ->hasExpectedResponseTypes()
            ->hasExpectedResponseValues();
    }
}
