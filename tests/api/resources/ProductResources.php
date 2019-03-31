<?php

namespace Tests\Api\Resources;

use Illuminate\Support\Arr;

/**
 * Trait ProductResources
 *
 * @package Tests\Api\Resources
 */
trait ProductResources
{
    use HandlesResponse;

    /**
     * @var
     */
    protected $productResponse;

    /**
     * @param array $filters
     * @return $this
     */
    protected function getProducts(array $filters = [])
    {
        $this->tester->sendGET('/products', $filters);
        $this->productResponse = $this->getApiResponse();

        return $this;
    }

    /**
     * @param int $id
     * @return $this
     */
    protected function findProduct(int $id)
    {
        $this->tester->sendGET('/products/' . $id);
        $this->productResponse = $this->getApiResponse();

        return $this;
    }

    /**
     * @param int $code
     * @return $this
     */
    protected function responseCodeIs(int $code)
    {
        $this->tester->seeResponseCodeIs($code);

        return $this;
    }

    /**
     * @return $this
     */
    protected function listHasExpectedResponseTypes()
    {
        $dataType = [
            'data' => [
                [
                    'type'          => 'string',
                    'id'            => 'integer',
                    'attributes'    => [
                        'name'             => 'string',
                        'sku'              => 'string',
                        'description'      => 'string',
                        'stocks_available' => 'integer',
                        'price'            => 'float|integer',
                        'main_pic_url'     => 'string|null'
                    ],
                    'relationships' => [
                        'photos'     => 'array',
                        'categories' => [
                            [
                                'type' => 'string',
                                'id'   => 'integer'
                            ]
                        ]
                    ],
                    'links'         => [
                        'self' => 'string'
                    ]
                ]
            ]
        ];

        $this->tester->seeResponseMatchesJsonType($dataType);

        return $this;
    }

    /**
     * @return $this
     */
    protected function listHasExpectedResponseValues()
    {
        $values = [
            'data' => [
                [
                    'type'          => 'products',
                    'id'            => 1,
                    'attributes'    => [
                        'name'             => 'Mark Product',
                        'sku'              => 'markproduct',
                        'description'      => 'This is product from Mark',
                        'stocks_available' => 10000,
                        'price'            => 100,
                    ],
                ]
            ]
        ];

        $this->tester->seeResponseContainsJson($values);

        return $this;
    }

    /**
     * @return $this
     * @throws \Throwable
     */
    protected function responseOnlyContainsSoldOut()
    {
        $this->validateResponse();

        foreach ($this->productResponse['data'] as $product) {
            $this->tester->assertTrue(Arr::get($product, 'attributes.stocks_available') == 0);
        }

        return $this;
    }

    /**
     * @param int $categoryId
     * @return $this
     * @throws \Throwable
     */
    protected function responseOnlyContainsCategory(int $categoryId)
    {
        $this->validateResponse();

        foreach ($this->productResponse['data'] as $product) {
            $this->tester->assertTrue(
                collect(
                    Arr::get($product, 'relationships.categories')
                )->contains('id', $categoryId)
            );
        }

        return $this;
    }

    /**
     * @param float $priceFrom
     * @param float $priceTo
     * @return $this
     * @throws \Throwable
     */
    protected function responseOnlyContainsPriceRange(float $priceFrom, float $priceTo)
    {
        $this->validateResponse();

        foreach ($this->productResponse['data'] as $product) {
            $price = Arr::get($product, 'attributes.stocks_available');
            $this->tester->assertTrue($price >= $priceFrom && $price <= $priceTo);
        }

        return $this;
    }

    /**
     * @return $this
     * @throws \Throwable
     */
    protected function responseSortedAscendingByPrice()
    {
        $this->validateResponse();

        $expectedOrder = $originalOrder = Arr::pluck(
            $this->productResponse['data'],
            'attributes.price'
        );

        sort($expectedOrder);

        $this->tester->assertTrue($originalOrder === $expectedOrder);

        return $this;
    }

    /**
     * @return $this
     * @throws \Throwable
     */
    protected function responseSortedDescendingByPrice()
    {
        $this->validateResponse();

        $expectedOrder = $originalOrder = Arr::pluck(
            $this->productResponse['data'],
            'attributes.price'
        );

        rsort($expectedOrder);

        $this->tester->assertTrue($originalOrder === $expectedOrder);

        return $this;
    }

    /**
     * @return $this
     * @throws \Throwable
     */
    protected function responseSortedAscendingByName()
    {
        $this->validateResponse();

        $expectedOrder = $originalOrder = Arr::pluck(
            $this->productResponse['data'],
            'attributes.name'
        );

        sort($expectedOrder);

        $this->tester->assertTrue($originalOrder === $expectedOrder);

        return $this;
    }

    /**
     * @return $this
     * @throws \Throwable
     */
    protected function responseSortedDescendingByName()
    {
        $this->validateResponse();

        $expectedOrder = $originalOrder = Arr::pluck(
            $this->productResponse['data'],
            'attributes.name'
        );

        rsort($expectedOrder);

        $this->tester->assertTrue($originalOrder === $expectedOrder);

        return $this;
    }

    /**
     * @param int $expectedCount
     * @return $this
     * @throws \Throwable
     */
    protected function responseHasResultCount(int $expectedCount)
    {
        $this->validateResponse();

        $this->tester->assertEquals($expectedCount, collect($this->productResponse['data'])->count());

        return $this;
    }

    /**
     * @return $this
     */
    protected function hasExpectedResponseTypes()
    {
        $dataType = [
            'data' => [
                    'type'          => 'string',
                    'id'            => 'integer',
                    'attributes'    => [
                        'name'             => 'string',
                        'sku'              => 'string',
                        'description'      => 'string',
                        'stocks_available' => 'integer',
                        'price'            => 'float|integer',
                        'main_pic_url'     => 'string|null'
                    ],
                    'relationships' => [
                        'photos'     => 'array',
                        'categories' => [
                            [
                                'type' => 'string',
                                'id'   => 'integer'
                            ]
                        ]
                    ],
                    'links'         => [
                        'self' => 'string'
                    ]
            ]
        ];

        $this->tester->seeResponseMatchesJsonType($dataType);

        return $this;
    }

    /**
     * @return $this
     */
    protected function hasExpectedResponseValues()
    {
        $values = [
            'data' => [
                    'type'          => 'products',
                    'id'            => 1,
                    'attributes'    => [
                        'name'             => 'Mark Product',
                        'sku'              => 'markproduct',
                        'description'      => 'This is product from Mark',
                        'stocks_available' => 10000,
                        'price'            => 100,
                    ],
            ]
        ];

        $this->tester->seeResponseContainsJson($values);

        return $this;
    }

    /**
     * @throws \Throwable
     */
    protected function validateResponse()
    {
        throw_if(!isset($this->productResponse['data']), new \Exception('No response to assert'));
    }
}