<?php

namespace app\controllers;

use app\engine\Request;
use app\models\User;

class RegistrationController extends Controller
{
    public function actionRegistrationForm() {
        echo $this->render('regform');
    }

    public function actionRegistration() {
        $login = (new Request())->getParams()['login'];
        $pass = (new Request())->getParams()['pass'];
        $repass = (new Request())->getParams()['repass'];

        if (User::registration($login, $pass, $repass)) {
            die('Пользователь занят');
        } else {
            User::auth($login, $pass);
            header('Location: /');
        }
    }
}