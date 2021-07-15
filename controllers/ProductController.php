<?php


namespace app\controllers;


use app\engine\Request;
use app\models\Product;
use app\models\User;

class ProductController extends Controller
{
    public static $currentUrl;

    public function actionCatalog() {
        $page = (new Request())->getParams()['page'] ?? 0;
        $catalog = Product::getLimit(($page + 1) * PRODUCT_RENDER_PAGE);
        static::$currentUrl = (new Request())->getRequestString();

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
        $id = (new Request())->getParams()['id'];
        $product = Product::getOne($id);
        static::$currentUrl = (new Request())->getRequestString();

        echo $this->render('card', [
            'product' => $product,
            'id' => $id,
            'currentUrl' => static::$currentUrl
        ]);
    }
}