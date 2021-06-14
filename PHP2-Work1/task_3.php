<?php

class A {
    public function foo() {
        static $x = 0;
        echo ++$x;
    }
}

$a1 = new A(); // создаём экземпляр класса А -> a1
$a2 = new A(); // создаём экземпляр класса А -> a2

$a1->foo();
echo '<br>';
// вызываем метод foo() из объекта a1; Результат = 1;
// выполнится строка: echo ++$x, и т.к. изначально в классе было объявлено, что статическая $x = 0,
// $x увеличится на 1, и выдаст результат (т.е. если бы мы задали static $x = 58, echo ++$x вернула бы: 59).

$a2->foo();
echo '<br>';
// вызываем метод foo() из объекта a2; Результат = 2;
// т.к. $x - статическая переменная, мы её не можем изменить из объекта, т.е. строка: static $x = 0; - не отработает,
// но т.к. метод публичный, строка: echo ++$x; - выполнится, и получается, что не важно с какого экземпляра будет
// вызываться метод foo(), $x продолжит инкрементироваться

$a1->foo();
echo '<br>';
// аналогично предыдущим шагам, не имееет значения с какого экземпляра класса вызовится метод foo(); Результат = 3;

$a2->foo();
// Результат = 4;