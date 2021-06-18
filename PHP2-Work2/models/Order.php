<?php

namespace app\models;


class Order extends Model
{
    public $id;
    public $product_id;
    public $user_id;
    public $date_order;

    public function getTableName() {
        return 'order';
    }
}