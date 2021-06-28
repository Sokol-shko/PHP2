<?php

namespace app\controllers;


use app\models\Cart;

class CartController extends MainController
{
    public function actionCart() {
        $cart = Cart::getCart();
        echo $this->render('cart', ['cart' => $cart]);
    }
}