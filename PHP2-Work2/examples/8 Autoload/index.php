<?php
spl_autoload_register(function ($class_name) {
    include $class_name . '.class.php';
});

$obj  = new MyClass1();
$obj2 = new MyClass2(); 
?>