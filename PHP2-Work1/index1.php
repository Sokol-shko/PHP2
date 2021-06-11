<?php

// Класс Мебель
class Furniture {
    protected $name;
    protected $width;
    protected $height;
    protected $depth;
    protected $price;
    protected $material;
    protected $type;

    protected function __construct ($name = '', $width = 0, $height = 0, $depth = 0, $price = 0,
                                    $material = '', $type = '') {
        $this->name = $name;
        $this->width = $width;
        $this->height = $height;
        $this->depth = $depth;
        $this->price = $price;
        $this->material = $material;
        $this->type = $type;
    }
}

//********************************************************************************************************************

// Класс Мягкая мебель
class UpholsteredFurniture extends Furniture {
    protected $addMaterial;

    protected function __construct($name, $width, $height, $depth, $price, $material = 'велюр', $type = '',
                                $addMaterial = ''){
        parent::__construct($name = '', $width = 0, $height = 0, $depth = 0, $price = 0,
            $material = '', $type = '');
        $this->addMaterial = $addMaterial;
    }

    protected function getData() {
        echo "У товара '$this->name': <br>";
    }
}

// Класс Диван
class Sofa extends UpholsteredFurniture {
    protected $pillows;

    public function __construct($name, $width, $height, $depth, $price, $material = 'велюр', $type = '',
                                $addMaterial = '', $pillows='') {
        parent::__construct($name, $width, $height, $depth, $price, $material, $type, $addMaterial);
        $this->pillows = $pillows;
    }

    public function getData() {
        parent::getData();
        echo "ширина => $this->width <br>";
        echo "высота (max) => $this->height <br>";
        echo "глубина => $this->depth <br>";
        echo "материал (основной) => $this->material <br>";
        echo "материал (дополнительный) => $this->addMaterial <br>";
        echo "наличие подушек => $this->pillows <br>";
        echo "тип дивана => $this->type <br>";
        echo "цена => $this->price <br>";
        var_dump($this->name);
    }
}

// Класс Кресло
class Armchair extends UpholsteredFurniture {}

//********************************************************************************************************************

// Класс Корпусная мебель
class СabinetFurniture extends Furniture {}

// Класс Шкаф-купе
class Wardrobe extends СabinetFurniture {}

// Класс Распашной шкаф
class SwingCabinet extends СabinetFurniture {}

// Класс Компьютерный стол
class ComputerDesk extends СabinetFurniture {}

//********************************************************************************************************************

// Класс Корзина
class Basket extends Product {
    private $products = [];
    private $count;

    public function addProduct(){}

    public function changeProduct(){}

    public function removeProduct(){}

    public function calculatePrice(){}

}

// Класс Товар
class Product {
    private $product;

    public  function __construct($product){
        $this->product = $product;
    }
}

$sofa1 = new Sofa('Венеция', 2400, 1000, 550,22500, 'эко-кожа',
                    'диван-книжка', 'нет', 'есть, 2 шт.');
$sofa1->getData();