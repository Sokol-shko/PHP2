<?php


namespace app\controllers;


use app\models\Product;
use app\models\User;

class ProductController extends Controller
{
    public static $currentUrl;

    public function actionCatalog() {
        $page = $_GET['page'] ?? 0;
        $catalog = Product::getLimit(($page + 1) * PRODUCT_RENDER_PAGE);
        static::$currentUrl = $_SERVER['REQUEST_URI'];

        echo $this->render('catalog', [
            'catalog'       => $catalog,
            'page'          => ++$page,
            'currentUrl'    => static::$currentUrl
        ]);
    }

    public function actionIndex()
    {
        echo $this->render('index');
    }

    public function actionCard() {
        $id = $_GET['id'];
        $product = Product::getOne($id);
        static::$currentUrl = $_SERVER['REQUEST_URI'];

        echo $this->render('card', [
            'product' => $product,
            'id' => $id,
            'currentUrl' => static::$currentUrl
        ]);
    }
}