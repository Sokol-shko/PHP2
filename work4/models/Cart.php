<?php

namespace app\models;


class Cart extends DbModel
{
    public $id;
    public $products_id;
    public $clients_id;
    public $count;
    public static $totalSum = 0;

    public function __construct($products_id = null, $clients_id = null, $count = null)
    {
        $this->products_id = $products_id;
        $this->clients_id = $clients_id;
        $this->count = $count;
    }

    protected static function getTableName()
    {
        $tablesName = ['cart' => 'cart', 'products' => 'products', 'clients' => 'clients'];
        return $tablesName;
    }
}