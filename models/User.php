<?php

namespace app\models;


use app\engine\Session;

class User extends DbModel
{
    protected $id;
    protected $login;
    protected $pass;
    protected $cookie;

    protected $props = [
        'login'     => false,
        'pass'      => false,
        'cookie'    => false
    ];

    public function __construct($login = null, $pass = null)
    {
        $this->login = $login;
        $this->pass = $pass;
    }

    protected static function getTableName() {
        return 'users';
    }

    protected static function generateKeyCookie (){
        $salt = 'qdfgEdfgDFdXhfwwSSxorobkIdflaspE';

        //Сформируем случайную строку для куки:
        $key = substr_replace($salt, rand(1000, 9999), rand(0, 8), 0);
        $key = substr_replace($key, rand(1000, 9999), rand(8, 16), 0);
        $key = substr_replace($key, rand(1000, 9999), rand(16, 24), 0);
        return $resultKey = substr_replace($key, rand(1000, 9999), rand(24, 32), 0);
    }

    public static function auth($login, $pass){
        $user = User::getOneWhere('login', $login);

        if (password_verify($pass, $user->pass)) {
            (new Session())->setSessionParams('login', $login);
            if ($_REQUEST['remember'] == 'on' ) {
                //Пишем куки (имя куки, значение, время жизни - сейчас+месяц)
                setcookie('login', $login, time() + 3600, '/'); //логин
                setcookie('key', static::generateKeyCookie(), time() + 3600, '/'); //случайная строка

                $user = User::getOneWhere('login', $login);
                $user = User::getOne(6);
                $user->cookie = 'qwerty';

                $user->save();
            }
            return true;
        } else {
            return false;
        }
    }

    public static function registration($login, $pass, $repass, $cookie){
        $user = User::getOneWhere('login', $login);

        if ($user->login == $login) {
            return true;
        } else {
            if ($pass == $repass) {
                $pass = password_hash($pass, PASSWORD_DEFAULT);
                $user = new User($login, $pass, $cookie);
                $user->save();
            } else {
                die('Пароли не совпадают');
            }
            return false;
        }
    }

    public static function isAuth() {
        $session_login = (new Session())->getSessionParams('login');
        $cookie_login = $_COOKIE['login'];
        if (isset($session_login)) {
            return true;
        } else {
            if (isset ($cookie_login)) {
                $login = $_COOKIE['login'];
                $cookieKey = $_COOKIE['key'];
                $user = User::getOneWhere('login', $login);

                return ($user->cookie == $cookieKey);
            }
           return false;
        }
    }

    public static function getName() {
        $login = (new Session())->getSessionParams('login');
        if (!is_null($login)) {
            return $login;
        } else {
            $login = $_COOKIE['login'];
            if (!is_null($login)) {
                return $login;
            } else
                return 'Гость';
        }
    }
}


/*
 * admin => 123
 * manager => 777
 * ivan => ivan123
 * alex => alex123
 * elena => elena123
 * */