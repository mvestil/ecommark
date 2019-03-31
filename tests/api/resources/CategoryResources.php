<?php

namespace Tests\Api\Resources;

/**
 * Trait ProductResources
 *
 * @package Tests\Api\Resources
 */
trait CategoryResources
{
    use HandlesResponse;

    /**
     * @var
     */
    protected $categoryResponse;

    /**
     * @param array $filters
     * @return $this
     */
    protected function getCategories(array $filters = [])
    {
        $this->tester->sendGET('/categories', $filters);
        $this->categoryResponse = $this->getApiResponse();

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
                        'description'      => 'string',
                    ],
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
                    'type'          => 'categories',
                    'id'            => '1',
                    'attributes'    => [
                        'name'             => 'Clothing & Books',
                        'description'      => 'Velit adipisci.',
                    ],
                ],
                [
                    'type'          => 'categories',
                    'id'            => '2',
                    'attributes'    => [
                        'name'             => 'Beauty',
                        'description'      => 'Et ut et ut quos et.',
                    ],
                ],
                // ... add some more of your expected values here
            ]
        ];

        $this->tester->seeResponseContainsJson($values);

        return $this;
    }
}