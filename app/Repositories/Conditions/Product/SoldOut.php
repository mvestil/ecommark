<?php
namespace App\Repositories\Conditions\Product;

use App\Repositories\Conditions\ConditionInterface;

/**
 * Class SoldOut
 */
class SoldOut implements ConditionInterface
{
    /**
     * Apply the condition to get sold out products
     *
     * @param $model
     * @return mixed
     */
    public function apply($model)
    {
        return $model->where('stocks_available', 0);
    }
}