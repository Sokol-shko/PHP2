<?php

class Transport {
    protected $model;
    protected $enginePower; // мощность двигателя
    protected $tankCapacity; // объём бака
    protected $fuelConsumption; // средний расход топлива л/100км - авто, кг/1ч - самолёты
    protected $avgSpeed; // км/ч
    protected $price; //в $

    protected function __construct($model, $enginePower, $tankCapacity, $fuelConsumption, $avgSpeed, $price){
        $this->model = $model;
        $this->enginePower = $enginePower;
        $this->tankCapacity = $tankCapacity;
        $this->fuelConsumption = $fuelConsumption;
        $this->avgSpeed = $avgSpeed;
        $this->price = $price;
    }

    protected function getData () {
        echo " со средней скоростью: $this->avgSpeed км/ч, ";
    }
}

class Auto extends Transport {
    private $bodyType;
    private $overclocking;

    public function __construct($model = '', $enginePower = '', $tankCapacity = 0, $fuelConsumption = 0,
                                $avgSpeed = 0, $price = 0, $bodyType = '', $overclocking = 0){
        parent::__construct($model, $enginePower, $tankCapacity, $fuelConsumption, $avgSpeed, $price);
        $this->bodyType = $bodyType;
        $this->overclocking = $overclocking;
    }

    public function getData() {
        echo "Автомобиль $this->model имеет тип кузова $this->bodyType, едет ";
        parent::getData();
        echo "и расходует в среднем $this->fuelConsumption л топлива на 100 км. ";
        echo "<br>";
        echo "Цена продажи автомобиля: $this->price $. ";
        echo "<br>";
        echo "Так же автомобиль разгоняется до 100 км за $this->overclocking секунд.";
    }
}

class Plane extends Transport {
    private $countEngines;

    public function __construct($model = '', $enginePower = '', $tankCapacity = 0, $fuelConsumption = 0,
                                $avgSpeed = 0, $price = 0, $countEngines = 0)
    {
        parent::__construct($model, $enginePower, $tankCapacity, $fuelConsumption, $avgSpeed, $price);
        $this->countEngines = $countEngines;
    }

    public function getData() {
        echo "Самолёт $this->model летит ";
        parent::getData();
        echo "и расходует в среднем $this->fuelConsumption кг топлива в час. ";
        echo "<br>";
        echo "Цена продажи самолёта: $this->price $. ";
        echo "<br>";
        echo "Так же самолёт имеет $this->countEngines двигателя мощностью $this->enginePower л.с. каждый";
    }
}

class Trip extends Transport {
    public static function moveAuto(Auto $transport, $distance) {
        $needFuel = ($transport->fuelConsumption * $distance)/ 100;
        echo "<br>";
        echo "<br>";
        echo "Автомобиль $transport->model проехал $distance км, и потратил на это $needFuel л топлива";
    }

    public static function movePlane(Plane $transport, $elapsedTime) {
        echo "<br>";
        $needFuel = $transport->fuelConsumption * $elapsedTime;
        echo "<br>";
        echo "<br>";
        echo "Самолёт $transport->model летел $elapsedTime ч, и потратил на это $needFuel кг топлива";
    }

}


$plane1 = new Plane('ТУ-114', 15000, 82000, 35000, 760,
                    15000000, 4);
$plane1->getData();

echo "<br><br>";

$plane2 = new Plane('ТУ-116', 18000, 80000, 29000, 790,
                    20000000, 4);
$plane2->getData();

echo "<br><br>";

$auto1 = new Auto('Kia Cerato', 150, 55, 10, 130,
                    19000, 'седан', 9.8);
$auto1->getData();

echo "<br><br>";

$auto2 = new Auto('Kia Ceed', 140, 50, 9, 140,
    20000, 'хэтчбэк', 9.2);
$auto2->getData();


Trip::moveAuto($auto1, 300);
Trip::moveAuto($auto2, 470);
Trip::movePlane($plane1, 5);
Trip::movePlane($plane2, 2.5);