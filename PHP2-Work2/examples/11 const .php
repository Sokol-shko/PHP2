<?php
class MyClass
{
    const CONSTANT = 'значение константы';

    function showConstant() {
        echo  self::CONSTANT . "<br>";
    }
}

echo MyClass::CONSTANT . "<br>";
MyClass::showConstant();