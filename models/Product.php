<?php

namespace app\models;

class Product extends DbModel
{
    protected $id;
    protected $name;
    protected $price;
    protected $description;
    protected $image;

    protected $props = [
         'name' => false,
         'price' => false,
         'description' => false,
         'image' => false
    ];

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

