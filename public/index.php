<?php
session_start();

use app\models\{Product, User, Category, Order, Cart};
use app\engine\{Autoload, Render, TwigRender, Request};

include "../config/config.php";
include "../engine/Autoload.php";
require_once '../vendor/autoload.php';

spl_autoload_register([new Autoload(), 'loadClass']);
/** @var  Product $product */
$request = new Request();

$controllerName = $request->getControllerName() ?: 'product';
$actionName = $request->getActionName();

$controllerClass = CONTROLLER_NAMESPACE .ucfirst($controllerName). "Controller";

if (class_exists($controllerClass)) {
    // ********* Рендер через twig шаблонизатор - TwigRender(); Рендер через html - Render()*********
    //Render() - пока не изменял, корректно работать не будет!!!
    $controller = new $controllerClass(new TwigRender());
    $controller->runAction($actionName);
} else {
    echo "Ошибка 404. Not found!";
}

//$usser = User::getOne(6);
//$usser->cookie = 'asdfghj';
//$usser->save();

die();


/*
 *  Добавление записи
 */

$product = new Product("Стол",  5300, 'Прямоугольный', 'img.jpg');
$product->save();


$cart = new Cart(1,session_id(),3400,2);
$cart->save();

/*----------------------------------------------------------*/

/*
 *  Удаление записи
 */

$product = Product::getOne(5);
$product->delete();

/*----------------------------------------------------------*/

/*
 *  Изменение записи
 */

$product = Product::getOne(3);
$product->price = 10500;
$product->save();



























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