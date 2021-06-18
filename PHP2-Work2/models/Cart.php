<?php

namespace app\models;


class Cart extends Model
{
    public $id;
    public $order_id;
    public $count;
    public $total_price;

    public function getTableName() {
        return 'cart';
    }
}