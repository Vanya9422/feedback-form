<?php

namespace Domain\Common;

use Illuminate\Database\Eloquent\Model;

abstract class BaseRepository
{
    /**
     * @var Model
     */
    protected $model;

    public function __construct()
    {
        $this->model = $this->getModelClass();
    }

    /**
     * Получение имени класса модели
     */
    abstract protected function getModelClass(): string;

    /**
     * @return Model|string
     */
    protected function getModel(): Model|string
    {
        return clone new $this->model;
    }
}
