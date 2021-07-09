<?php

namespace app\models;


class Order extends DbModel
{
    protected $id;
    protected $products_id;
    protected $count;
    protected $category_id;
    protected $users_id;
    protected $date_order;

    protected $props = [
         'products_id' => false,
         'count' => false,
         'category_id' => false,
         'users_id' => false,
         'date_order' => false
    ];

    public function __construct($products_id = null, $count = null, $category_id = null,
                                $users_id = null, $date_order = null)
    {
        $this->products_id = $products_id;
        $this->count = $count;
        $this->category_id = $category_id;
        $this->users_id = $users_id;
        $this->date_order = $date_order;
    }

    protected static function getTableName()
    {
        return 'orders';
    }


}