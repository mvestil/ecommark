<?php

namespace App\Repositories\Conditions;

/**
 * Interface ConditionInterface
 */
interface ConditionInterface
{
    /**
     * Apply the condition to the model
     *
     * @param $model
     * @return mixed
     */
    public function apply($model);
}