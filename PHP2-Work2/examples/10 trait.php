<?php
class Base {
    public function sayHello() {
        echo 'Hello<br>';
    }
}

trait SayWorld {
    public function sayWorld() {
        echo 'World<br>';
    }
}

class MyHelloWorld extends Base {
    use SayWorld;
}

$obj = new MyHelloWorld();
$obj->sayHello();
$obj->sayWorld();
?>