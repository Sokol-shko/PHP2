<?php

namespace app\engine;


use app\interfaces\IRender;

class TwigRender implements IRender
{
    protected $twig;



    public function __construct()
    {
        $loader = new \Twig\Loader\FilesystemLoader(TWIG_TEMPLATES_DIR);
        $twig = new \Twig\Environment($loader);

        $this->twig = $twig;
    }

    public function renderTemplate($template, $params = [])
    {
        return $this->twig->render($template .'.twig', $params);
    }
}