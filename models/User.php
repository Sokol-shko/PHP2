<?php

namespace app\models;


use app\engine\Session;

class User extends DbModel
{
    protected $id;
    protected $login;
    protected $pass;

    protected $props = [
        'login' => false,
        'pass' => false
    ];

    public function __construct($login = null, $pass = null)
    {
        $this->login = $login;
        $this->pass = $pass;
    }

    protected static function getTableName() {
        return 'users';
    }

    public static function auth($login, $pass){
        $user = User::getOneWhere('login', $login);

        if (password_verify($pass, $user->pass)) {
            (new Session())->setSessionParams('login', $login);
//            var_dump($_REQUEST['remember']);

//            if ( !empty($_REQUEST['remember']) and $_REQUEST['remember'] == 1 ) {
//                //Сформируем случайную строку для куки (используем функцию generateSalt):
//                $key = 111; //назовем ее $key
//
//                //Пишем куки (имя куки, значение, время жизни - сейчас+месяц)
//                setcookie('login', $user['login'], time() + 60 * 60 * 24 * 30); //логин
//                setcookie('key', $key, time() + 60 * 60 * 24 * 30); //случайная строка
//            }
            return true;
        } else {
            return false;
        }
    }

    public static function registration($login, $pass, $repass){
        $user = User::getOneWhere('login', $login);

        if ($user->login == $login) {
            return true;
        } else {
            if ($pass == $repass) {
                $pass = password_hash($pass, PASSWORD_DEFAULT);
                $user = new User($login, $pass);
                $user->save();
            } else {
                die('Пароли не совпадают');
            }
            return false;
        }
    }

    public static function isAuth() {
        $session_login = (new Session())->getSessionParams('login');
        return isset($session_login);
    }

    public static function getName() {
        return (new Session())->getSessionParams('login');
    }
}


/*
 * admin => 123
 * manager => 777
 * ivan => ivan123
 * alex => alex123
 * elena => elena123
 * */