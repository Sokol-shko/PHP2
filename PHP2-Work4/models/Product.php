<?php

namespace app\models;

class Product extends Model
{
    public $id;
    public $name;
    public $price;


    public function __construct($name = null, $price = null)
    {
        $this->name = $name;
        $this->price = $price;
    }


    protected static function getTableName()
    {
        return 'products';
    }

}

