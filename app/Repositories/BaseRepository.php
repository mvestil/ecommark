<?php

namespace App\Repositories;


use App\Repositories\Conditions\ConditionInterface;
use Illuminate\Database\Eloquent\Model;

/**
 * Class BaseRepository
 *
 * This contains common functionality for all the repositories
 *
 */
abstract class BaseRepository
{
    /**
     * @var \Illuminate\Contracts\Foundation\Application|mixed
     */
    protected $model;

    /**
     * @var
     */
    protected $conditions;

    /**
     * BaseRepository constructor.
     *
     * @throws \Exception
     */
    public function __construct()
    {
        $this->model = $this->makeModel();
    }

    /**
     * Initialize a model instance
     *
     * @return \Illuminate\Contracts\Foundation\Application|mixed
     * @throws \Exception
     */
    protected function makeModel()
    {
        $model = app($this->modelClass());

        if (! $model instanceof Model) {
            throw new \Exception(
                "Class {$this->modelClass()} must be an instance of Eloquent Model"
            );
        }

        return $model;
    }

    /**
     * Set the conditions
     *
     * @param array $conditions
     * @return $this
     */
    public function conditions(array $conditions)
    {
        foreach ($conditions as $condition) {
            $this->condition($condition);
        }

        return $this;
    }

    /**
     * Set a condition
     *
     * @param ConditionInterface $condition
     * @return $this
     */
    public function condition(ConditionInterface $condition)
    {
        $this->conditions[] = $condition;

        return $this;
    }

    /**
     * Apply the conditions
     */
    protected function applyConditions()
    {
        if (! $this->conditions) {
            return;
        }

        foreach ($this->conditions as $condition) {
            $this->model = $condition->apply($this->model);
        }

        return $this;
    }

    /**
     * Return the model's absolute class name
     *
     * @return string
     */
    abstract public function modelClass(): string;
}