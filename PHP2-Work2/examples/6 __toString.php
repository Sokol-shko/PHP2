<?php
// Объявление простого класса
class TestClass
{
    public $name;

    public function __construct($name)
    {
        $this->name = $name;
    }

    public function __toString()
    {
        return $this->name;
    }
}

$class = new TestClass('Привет');
echo $class;
?>