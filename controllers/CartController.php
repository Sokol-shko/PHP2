<?php

namespace app\controllers;


use app\engine\{Request, Session};
use app\models\{Cart, Product};

class CartController extends Controller
{
    public function actionCart() {
        $cart = Cart::getCart((new Session())->getSessionId());
        echo $this->render('cart', [
            'cart'      => $cart,
            'count'     => Cart::getCountWhere('session_id', (new Session())->getSessionId()) ?? 0,
            'total_sum' => Cart::getCartSum()
        ]);
    }

    public function actionAdd() {
        $request = new Request();
//        $data = json_decode(file_get_contents('php://input'));
        $id = $request->getParams()['id'];
//        $id = $data->id;
//        $count_goods = $data->data_count;
        $count_goods = $request->getParams()['data_count'];
        $session_id = (new Session())->getSessionId();
        $elementCart = Product::getOne($id);
        (new Cart($id, $session_id, $elementCart->price, $count_goods))->save();

        $response = [
            'success' => 'ok',
            'count'   => Cart::getCountWhere('session_id', $session_id),
            'total_sum' => Cart::getCartSum()
        ];

        echo json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    }

    public function actionRemove() {
//        $request = new Request();
//        $id = $request->getParams()['id'];
        $data = json_decode(file_get_contents('php://input'));
        $id = $data->id;

        Cart::getOne($id)->delete();

        $response = [
            'success'   => 'Запись удалена',
            'id'        => $id,
            'count'     => Cart::getCountWhere('session_id', (new Session())->getSessionId())  ?? 0,
            'total_sum' => Cart::getCartSum()
        ];

        echo json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    }
}