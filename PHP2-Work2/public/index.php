<?php

use app\engine\{Autoload, Db};
use app\models\{Product, User, Order, Cart};
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