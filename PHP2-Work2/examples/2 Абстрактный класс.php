<?php
abstract class AbstractClass
{
   /* Данный метод должен быть определён в дочернем классе */
    abstract protected function getValue();

   /* Общий метод */
    public function printOut() {
        echo $this->getValue() . "\n";
    }
}

class Class1 extends AbstractClass
{
    protected function getValue() {
        return "Функция класса 1<br>";
    }

}

class Class2 extends AbstractClass
{
    public function getValue() {
        return "Функция класса 1<br>";
    }

}

$class1 = new Class1;
$class1->printOut();

$class2 = new Class2;
$class2->printOut();

?>