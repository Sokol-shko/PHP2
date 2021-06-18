<?php

use app\engine\{Autoload, Db};
use app\models\{Product, User, Order, Cart};
use app\models\task_3\{Chair, License, Sugar};
use app\models\task_3\Product as TaskProduct;
use app\Interfaces\IModel;

include "../engine/Autoload.php";

spl_autoload_register([new Autoload(), 'loadClass']);

/*   Товары   */
$product = new Product(new Db());
$product->getOne(15);
echo "<br>";

/*   Заказы   */
$order = new Order(new Db());
$order->getOne(4);
echo "<br>";

/*   Корзина   */
$cart = new Cart(new Db());
$cart->getOne(10);
echo "<br>";

/*   Пользователи   */
$user = new User(new Db());
$user->getOne(2);
echo "<br>";

/*   Получить данные всей таблицы   */
function foo(IModel $model) {
    $model->getAll();
    echo "<br>";
}

foo($product);
foo($user);
foo($order);
foo($cart);

/*  Задание 3   */

$license = new License();
$license->getTotalPrice('Лицензия "Касперский антивирус"', 850, 2);
$license->getTotalPrice('Лицензия "Windows"', 5300, 15);

$chair = new Chair();
$chair->getTotalPrice('Стул "Модерн"', 1500, 3);

$sugar = new Sugar();
$sugar->getTotalPrice('Сахар "Русский"', 55, 800);
$sugar->getTotalPrice('Сахар "Селянка"', 80, 1700);

echo "<br>";
echo "Текущая прибыль составляет: " . TaskProduct::$income . " руб.";
























die();
/*
//CREATE
$product = new Product();
$product->name = 'Чай';
$product->price = 23;
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