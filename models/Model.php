<?php

namespace app\models;

use app\interfaces\IModel;

abstract class Model implements IModel
{
    protected $props = [];

    public function __get($name)
    {
        if (array_key_exists($name, $this->props)) {
            return $this->$name;
        } else {
            echo "Элемент массива не найден!";
        }
    }

    public function __set($name, $value)
    {
        if (array_key_exists($name, $this->props)) {
            $this->props[$name] = true;
            $this->$name = $value;
        } else {
            echo "Элемент массива не найден!";
        }
    }

    public function __isset($name)
    {
        if (isset($this->$name)) return isset($this->$name);
    }
}
