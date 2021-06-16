<?php

// Объявим интерфейс 'iTemplate'
interface iTemplate
{
    public function setVariable($name, $var);
    public function render($template);
}

// Реализация интерфейса
// Это будет работать
class Template implements iTemplate
{
    public $vars = [];
  
    public function setVariable($name, $var)
    {
        $this->vars[$name] = $var;
    }
  
    public function render($template)
    {
        foreach($this->vars as $name => $value) {
            $template = str_replace('{{' . $name . '}}', $value, $template);
        }
 
        return $template;
    }
}

$obj = new Template;
$obj->setVariable("a",1);
$obj->setVariable("b",2);
print_r($obj->vars);
echo $obj->render("Переменные: а={{a}} b={{b}}");

// Это не будет работать
// Fatal error: Class BadTemplate contains 1 abstract methods
// and must therefore be declared abstract (iTemplate::getHtml)
// (Фатальная ошибка: Класс BadTemplate содержит 1 абстрактный метод
// и поэтому должен быть объявлен абстрактным (iTemplate::getHtml))
/*
class BadTemplate implements iTemplate
{
    private $vars = [];
  
    public function setVariable($name, $var)
    {
        $this->vars[$name] = $var;
    }
}
*/
?>