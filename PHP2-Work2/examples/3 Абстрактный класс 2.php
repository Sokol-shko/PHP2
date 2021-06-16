<?php
abstract class AbstractClass
{
    // Наш абстрактный метод требует только определить необходимые аргументы
    abstract protected function upreg($str);
}

class MyClass extends AbstractClass
{

    // Наш дочерний класс может определить необязательные аргументы, не указанные в объявлении родительского метода
    public function upreg($str, $end = ".") {
        
        return mb_strtoupper($str).$end;
    }
}

$class = new MyClass;
echo $class->upreg("Мужчина","!"), "\n";
echo $class->upreg("Женщина"), "\n";
?>