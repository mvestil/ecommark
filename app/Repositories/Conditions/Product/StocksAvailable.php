<?php
namespace App\Repositories\Conditions\Product;

use App\Repositories\Conditions\ConditionInterface;

/**
 * Class StocksAvailable
 */
class StocksAvailable implements ConditionInterface
{
    /**
     * Apply the conditions to get available stocks
     *
     * @param $model
     * @return mixed
     */
    public function apply($model)
    {
        return $model->where('stocks_available', '>', 0);
    }
}