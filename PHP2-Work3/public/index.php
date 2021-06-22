<?php

use app\models\{Product, Client, Category, Order};
use app\engine\Db;
use app\engine\Autoload;

include "../config/config.php";
include "../engine/Autoload.php";

spl_autoload_register([new Autoload(), 'loadClass']);

//$product = Product::getOne(2);
//var_dump($product);

/** @var  Product $product */
//$product = new Product("Шкаф купе",  15400);
//$product->insert();

/* Вашим методом - не работает */
$product = Product::getOne(4);
var_dump($product);
$product->delete();

/* Моим методом - не работает*/
$product = Product::getOne(4);
var_dump($product);
$product->deleteMy($product->id);



























die();
/*
//INSERT
$product = new Product('Чай', 25);

$product->insert();

//READ
$product = new Product();
$product->getOne(5);

$product->getAll();

//UPDATE
$product = new Product();
$product->getOne(5);
$product->price = 25;
$product->update();

//DELETE
$product = new Product();
$product->getOne(5);
$product->delete();
*/