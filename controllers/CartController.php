<?php

namespace app\controllers;


use app\models\Cart;
use app\models\Product;

class CartController extends Controller
{
    public function actionCart() {
        $cart = Cart::getCart(session_id());
        echo $this->render('cart', [
            'cart' => $cart
        ]);
    }

    public function actionAdd() {
        $data = json_decode(file_get_contents('php://input'));
        $id = $data->id;
        $count_goods = $data->data_count;
        $session_id = session_id();
        $elementCart = Product::getOne($id);
        (new Cart($id, $session_id, $elementCart->price, $count_goods))->save();

        $response = [
            'success' => 'ok',
            'count'   => Cart::getCountWhere('session_id', session_id())
        ];

        echo json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    }

    public function actionRemove() {
        $data = json_decode(file_get_contents('php://input'));
        $id = $data->id;

        Cart::getOne($id)->delete();

        $response = [
            'success' => 'Запись удалена',
            'id'   => $id
        ];

        echo json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    }
}