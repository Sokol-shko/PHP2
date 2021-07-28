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

    public function __construct($login = null, $pass = null, $cookie = null)
    {
        $this->login = $login;
        $this->pass = $pass;
        $this->cookie = $cookie;
    }

    protected static function getTableName() {
        return 'users';
    }

    public static function auth($login, $pass){
        $user = User::getOneWhere('login', $login);
        if (password_verify($pass, $user->pass)) {
            (new Session())->setSessionParams('login', $login);
            if ($_REQUEST['remember'] == 'on' ) {
                //Пишем куки (имя куки, значение, время жизни - сейчас+месяц)
                $hash = uniqid(rand(), true);
                setcookie('login', $login, time() + 3600, '/'); //логин
                setcookie('key', $hash, time() + 3600, '/'); //случайная строка
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
                return true;
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