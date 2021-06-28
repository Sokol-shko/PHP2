<?php

namespace app\models;


class Order extends DbModel
{
    public $id;
    public $products_id;
    public $count;
    public $category_id;
    public $client_id;
    public $date_order;

    public function __construct($products_id = null, $count = null, $category_id = null,
                                $client_id = null, $date_order = null)
    {
        $this->products_id = $products_id;
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