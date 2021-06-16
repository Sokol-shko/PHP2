<?php
class PropertyTest 
{
    /**  Место хранения перегружаемых данных.  */
    private $data = [];


    public function __set($name, $value) 
    {
        echo "Установка '$name' в '$value'<br>";
        $this->data[$name] = $value;
    }

    public function __get($name) 
    {
        echo "Получение '$name'<br>";
            return $this->data[$name];
        
	}
	
	public function __call($name,array $params) {
		echo "Вызов не определенного метода $name с параметрами: ".implode(', ', $params);
	}

}

$obj = new PropertyTest;

$obj->a = 1;
echo $obj->a . "<br>";
$obj->go(1,2,3);

?>