<?php
interface setter
{
    public function setVariable($name, $var);
}

interface renderer
{
    public function render($template);
}

interface iTemplate extends setter, renderer
{
    public function info();
}

class template implements iTemplate
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

    public function info()
    {
		print_r($this->vars);
    }
}
$obj = new Template;
$obj->setVariable("a",1);
$obj->setVariable("b",2);
$obj->info();
echo $obj->render("Переменные: а={{a}} b={{b}}");
?>