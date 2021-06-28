<?php


namespace app\controllers;


use app\models\Product;

class ProductController extends MainController
{
    public function actionCatalog() {
        $page = $_GET['page'] ?? 0;
        $catalog = Product::getLimit(($page + 1) * 2);

        echo $this->render('catalog', [
            'catalog' => $catalog,
            'page' => ++$page
        ]);
    }

    public function actionIndex()
    {
        echo $this->render('index');
    }

    public function actionCard() {
        $id = $_GET['id'];
        $product = Product::getOne($id);
        echo $this->render('card', [
            'product' => $product
        ]);
    }
}