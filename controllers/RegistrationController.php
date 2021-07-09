<?php

namespace app\controllers;

use app\models\User;

class RegistrationController extends Controller
{
    public function actionRegistrationForm() {
        echo $this->render('regform');
    }

    public function actionRegistration() {
        $login = $_POST['login'];
        $pass = $_POST['pass'];
        $repass = $_POST['repass'];

        if (User::registration($login, $pass, $repass)) {
            die('Пользователь занят');
        } else {
            header('Location: /');
        }
    }
}