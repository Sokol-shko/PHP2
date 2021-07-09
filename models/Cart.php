<?php

namespace app\models;

use app\engine\Db;

class Cart extends DbModel
{
    protected $id;
    protected $products_id;
    protected $session_id;
    protected $price;
    protected $count;

    public static $totalSum = 0;

    protected $props = [
        'products_id' => false,
        'session_id' => false,
        'price' => false,
        'count' => false
    ];

    public function __construct($products_id = null, $session_id = null, $price = null, $count = null)
    {
        $this->products_id = $products_id;
        $this->session_id = $session_id;
        $this->price = $price;
        $this->count = $count;
    }

    protected static function getTableName()
    {
        return 'cart';
    }

    public static function getCart($session_id) {
        $sql = "SELECT cart.id cart_id, products.id prod_id, products.name, products.price, cart.count
                FROM cart, products
                WHERE cart.products_id = products.id AND session_id = '{$session_id}'";

        return DB::getInstance()->queryAll($sql);
    }
}