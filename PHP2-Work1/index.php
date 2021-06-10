<?php

// Класс Мебель
class Furniture {
    protected $name;
    protected $width;
    protected $height;
    protected $depth;
    protected $price;

    protected function __construct ($name = '', $width = 0, $height = 0, $depth = 0, $price = 0) {
        $this->width = $width;
        $this->height = $height;
        $this->depth = $depth;
        $this->price = $price;
    }
}

// Класс Мягкая Мебель
class UpholsteredFurniture extends Furniture {
    public $material = '';
    public $type;

    public function __construct($name, $width, $height, $depth, $price, $material = 'велюр', $type = ''){
        parent::__construct();
        $this->name = $name;
        $this->material = $material;
        $this->type = $type;
    }

    public function getData() {
        echo "У товара: $this->type, который называется: '$this->name', материал => $this->material";
    }
}

// Класс Корпусная Мебель
class СabinetFurniture extends Furniture {
    public $material = '';
    public $type;

    public function __construct($name, $width, $height, $depth, $price, $material = 'ЛДСП', $type = ''){
        parent::__construct();
        $this->name = $name;
        $this->material = $material;
        $this->type = $type;
    }

    public function getData() {
        echo "У товара: $this->type, который называется: '$this->name', материал => $this->material";
    }
}

$sofa1 = new UpholsteredFurniture('Венеция',2000,1000,500,13500,'эко-кожа', 'диван');
$sofa1->getData();
echo '<br>';

$sofa2 = new UpholsteredFurniture('Лондон',2400,1110,550,25500,'кожа', 'диван');
$sofa2->getData();
echo '<br>';

$sofa1 = new UpholsteredFurniture('Венеция',2000,1000,500,13500,'эко-кожа', 'диван');
$sofa1->getData();
echo '<br>';

$sofa2 = new UpholsteredFurniture('Лондон',2400,1110,550,25500,'кожа', 'диван');
$sofa2->getData();
echo '<br>';