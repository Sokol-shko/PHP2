<?php

namespace app\controllers;

use app\engine\Render;
use app\engine\Session;
use app\interfaces\IRender;
use app\models\Cart;
use app\models\User;

class Controller
{
    protected $action;
    protected $defaultAction = 'index';
    protected $layout = 'main';
    protected $useLayout = true;

    private $render;

    public function __construct(IRender $render)
    {
        $this->render = $render;
    }


    public function runAction($action) {
        $this->action = $action ?? $this->defaultAction;
        $method = 'action' . ucfirst($this->action);
        if (method_exists($this, $method)) {
            $this->$method();
        } else {
            die('Метода не существует!');
        }
    }

    protected function render($template, $params = [])
    {
        if ($this->useLayout) {
            return $this->renderTemplate("layouts/{$this->layout}", $params = [
                'menu'      => $this->renderTemplate('menu', [
                    'isauth'    => User::isAuth(),
                    'username'  => User::getName(),
                    'count'     => Cart::getCountWhere('session_id', (new Session())->getSessionId()) ?? 0
                ]),
                'content'   => $this->renderTemplate($template, $params)
            ]);
        } else {
            return $this->renderTemplate($template, $params);
        }
    }

    protected function renderTemplate($template, $params = []) {
        return $this->render->renderTemplate($template, $params);
    }


}
