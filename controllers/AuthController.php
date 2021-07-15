<?php

namespace app\controllers;


use app\engine\Request;
use app\engine\Session;
use app\models\User;

class AuthController extends Controller
{
    public function actionLoginForm() {
        echo $this->render('loginform');
    }

    public function actionLogin() {
        $request = new Request();
        $login = $request->getParams()['login'];
        $pass = $request->getParams()['pass'];

        if (User::auth($login, $pass)) {
            header('Location: /');
        } else {
            die('Не верный логин или пароль');
        }
    }

    public function actionLogout() {
        $ds = new Session();
        $ds->regenerateSession();
        $ds->destroySession();

        header('Location: /');
    }
}
