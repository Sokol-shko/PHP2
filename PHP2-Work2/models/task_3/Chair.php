<?php

namespace app\models\task_3;
use app\models\task_3\Product as TaskProduct;

class Chair extends TaskProduct
{
    public function getTotalPrice($name = '', $price = 0, $count = 0)
    {
        $this->name = $name;
        $this->price = $price;
        $this->count = $count;

        $price = $count * $price;
        static::$income += $price;

        echo "Полная стоимость товара:{$name} составляет: {$price} руб. <br>";
    }
}