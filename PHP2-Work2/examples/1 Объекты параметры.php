<?php
//1. Придумать класс, который описывает любую сущность из предметной области интернет-магазинов: продукт, ценник, посылка и т.п.
//2. Описать свойства класса из п.1 (состояние).
//3. Описать поведение класса из п.1 (методы).
//4. Придумать наследников класса из п.1. Чем они будут отличаться?
class Product {
	public $brand;
	public $name;
	public $price;
	function __construct($brand, $name, $price) {
		$this->brand = $brand;
		$this->name = $name;
		$this->price = $price;
	}
	
	function view() {
		echo "$this->name бренда $this->brand стоят $this->price рублей";
	}
	function bye() {
		echo "Товар добавлен в корзину покупок";
	}
}

class Package extends Product {
	public $sender;
	public $recipient;
	public $weigth;
	function __construct(Product $item, $sender, $recipient, $weigth) {
		$this->brand = $item->brand; 
		$this->name = $item->name;
		$this->sender = $sender;
		$this->recipient = $recipient;
		$this->weigth = $weigth;
	}
	function view() {
		echo "Товар $this->name для $this->recipient отправит $this->sender";
	}
	function send() {
		echo "Товар отправлен";
	}
}
	
$item = new Product ('Nike', 'Кроссовки', 2000);
$item_b = new Package ($item, 'Продавец', 'Покупатель', 0.5);

$item->view();
echo '<br>';
$item_b->view();

