<?php

namespace app\controllers;


use app\models\User;

class AuthController extends Controller
{
    public function actionLoginForm() {
        echo $this->render('loginform');
    }

    public function actionLogin() {
        $login = $_POST['login'];
        $pass = $_POST['pass'];

        if (User::auth($login, $pass)) {
            header('Location: /');
        } else {
            die('Не верный логин или пароль');
        }
    }

    public function actionLogout() {
        session_regenerate_id();
        session_destroy();
        header('Location: /');
    }
}
