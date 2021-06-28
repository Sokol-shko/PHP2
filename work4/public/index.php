<?php

use app\models\{Product, Client, Category, Order, Cart};
use app\engine\Autoload;

include "../config/config.php";
include "../engine/Autoload.php";

spl_autoload_register([new Autoload(), 'loadClass']);
/** @var  Product $product */


$controllerName = $_GET['c'] ?: 'product';
$actionName = $_GET['a'];

$controllerClass = CONTROLLER_NAMESPACE .ucfirst($controllerName). "Controller";

if (class_exists($controllerClass)) {
    $controller = new $controllerClass();
    $controller->runAction($actionName);
} else {
    echo "Ошибка 404. Not found!";
}





die();

/*
 *  Добавление записи
 */

$product = new Product("Стол",  5300, 'Прямоугольный', 'img.jpg');
$product->save();
echo "Запись с данными: {$product->name},  {$product->price}, 
        {$product->description}, {$product->image}- добавлена";

/*----------------------------------------------------------*/

/*
 *  Удаление записи
 */

$product = Product::getOne(5);
$product->delete();
echo "Запись по id = {$product->id} удалена!";

/*----------------------------------------------------------*/

/*
 *  Изменение записи
 */

$product = Product::getOne(3);
$product->price = 10500;
$product->save();
echo "Запись по id = {$product->id} изменена!";



























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