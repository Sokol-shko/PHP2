<?php

namespace app\engine;


use app\interfaces\IRender;

class Render implements IRender
{
    public function renderTemplate($template, $params = [])
    {
        ob_start();
        extract($params);
        $templatePath = VIEWS_DIR . $template . ".php";
        if (file_exists($templatePath)) {
            include $templatePath;
            return ob_get_clean();
        } else {
            die("Шаблона не существует!");
        }
    }
}