<?php
session_start();

use app\models\{Product, User, Category, Order, Cart};
use app\engine\{Autoload, Render, TwigRender};

include "../config/config.php";
include "../engine/Autoload.php";
require_once '../vendor/autoload.php';

spl_autoload_register([new Autoload(), 'loadClass']);
/** @var  Product $product */

$url = explode('/', $_SERVER['REQUEST_URI']);

$controllerName = $url[1] ?: 'product';
$actionName = $url[2];

$controllerClass = CONTROLLER_NAMESPACE .ucfirst($controllerName). "Controller";

if (class_exists($controllerClass)) {
    // ********* Рендер через twig шаблонизатор - TwigRender(); Рендер через html - Render()*********
    //Render() - пока не изменял, корректно работать не будет!!!
    $controller = new $controllerClass(new TwigRender());
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