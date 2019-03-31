<?php

namespace App\Repositories\Conditions\Product;

use App\Repositories\Conditions\ConditionInterface;

/**
 * Class CategorizedAs
 */
class CategorizedAs implements ConditionInterface
{
    /**
     * @var int
     */
    protected $categoryId;

    /**
     * CategorizedAs constructor.
     *
     * @param $categoryId
     */
    public function __construct(int $categoryId)
    {
        $this->categoryId = $categoryId;
    }

    /**
     * Apply the condition given category id
     *
     * @param $model
     * @return mixed
     */
    public function apply($model)
    {
        return $model->whereHas('categories', function($query) {
            $query->where('id', $this->categoryId);
        });
    }

}