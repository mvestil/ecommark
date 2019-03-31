<?php
namespace App\Repositories\Conditions\Product;

use App\Repositories\Conditions\ConditionInterface;

/**
 * Class PriceRangeBetween
 */
class PriceRangeBetween implements ConditionInterface
{
    /**
     * @var float
     */
    protected $from;

    /**
     * @var  $float
     */
    protected $to;

    /**
     * PriceRangeBetween constructor.
     *
     * @param $from
     * @param $to
     */
    public function __construct(float $from, float $to)
    {
        $this->from = $from;
        $this->to   = $to;
    }

    /**
     * Apply the condition given price range
     *
     * @param $model
     * @return mixed
     */
    public function apply($model)
    {
        return $model->whereBetween('price', [$this->from, $this->to]);
    }
}