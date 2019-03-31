<?php

namespace App\Repositories\Conditions\Product;

use App\Repositories\Conditions\ConditionInterface;

/**
 * Class SoldOut
 */
class SortBy implements ConditionInterface
{
    /**
     * @var string
     */
    protected $sortBy;

    /**
     * @var string
     */
    protected $order;

    /**
     * SortBy constructor.
     *
     * @param string $sortBy
     * @param string $order
     */
    public function __construct(string $sortBy, string $order)
    {
        $this->sortBy = $sortBy;
        $this->order  = $order;
    }

    /**
     * Apply the sorting condition
     *
     * @param $model
     */
    public function apply($model)
    {
        if (! $this->canSort($this->sortBy)) {
            return;
        }

        return $model->orderBy(
            $this->sortBy,
            in_array($this->order, ['asc', 'desc']) ? $this->order : 'asc'
        );
    }

    /**
     * Check if the we can sort the field
     *
     * @param string $sortBy
     * @return bool
     */
    protected function canSort(string $sortBy): bool
    {
        $canOnlySort = ['price', 'name'];

        return in_array($sortBy, $canOnlySort);
    }
}