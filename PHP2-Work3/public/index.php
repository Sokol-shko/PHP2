<?php

use app\models\{Product, Client, Category, Order};
use app\engine\Db;
use app\engine\Autoload;

include "../config/config.php";
include "../engine/Autoload.php";

spl_autoload_register([new Autoload(), 'loadClass']);
/** @var  Product $product */


die();

/*
 *  Добавление записи
 */

$product = new Product("Стол компьютерный",  12890);
$product->insert();
echo "Запись с данными: {$product->name}, {$product->price} - добавлена";

/*----------------------------------------------------------*/

/*
 *  Удаление записи
 */

$product = Product::getOne(6);
$product->delete();
echo "Запись по id = {$product->id} удалена!";




























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