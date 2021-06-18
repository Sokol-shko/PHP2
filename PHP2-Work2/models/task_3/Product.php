<?php

namespace app\models\task_3;

abstract class Product
{
    protected $name;
    protected $price;
    protected $count;
    static $income = 0;

   abstract function getTotalPrice ($name = '', $price = 0, $count = 0);
}