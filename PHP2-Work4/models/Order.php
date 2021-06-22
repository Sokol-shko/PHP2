<?php

namespace app\models;


class Order
{
    public $id;
    public $product_id;
    public $count;
    public $category_id;
    public $client_id;
    public $date_order;

    public function __construct($product_id = null, $count = null, $category_id = null, $client_id = null, $date_order = null)
    {
        $this->product_id = $product_id;
        $this->count = $count;
        $this->category_id = $category_id;
        $this->client_id = $client_id;
        $this->date_order = $date_order;
    }

    protected static function getTableName()
    {
        return 'orders';
    }


}