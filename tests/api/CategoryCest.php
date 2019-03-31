<?php

namespace Tests\Api;

use Tests\Api\Base\ApiTestAbstract;
use Tests\Api\Resources\CategoryResources;

class CategoryCest extends ApiTestAbstract
{
    use CategoryResources;

    public function testList()
    {
        $this->getCategories()
            ->responseCodeIs(200)
            ->listHasExpectedResponseTypes()
            ->listHasExpectedResponseValues();
    }
}
