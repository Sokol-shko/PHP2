<?php

namespace app\models;

class Product extends DbModel
{
    public $id;
    public $name;
    public $price;
    public $description;
    public $image;


    public function __construct($name = null, $price = null, $description = null, $image = null)
    {
        $this->name = $name;
        $this->price = $price;
        $this->description = $description;
        $this->image = $image;
    }


    protected static function getTableName()
    {
        return 'products';
    }

}

