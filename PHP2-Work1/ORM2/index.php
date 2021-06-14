<?php

class Db {
    protected $tableName;
    protected $wheres = [];
    protected $orderBy = [];


    public function table($tableName) {
        $this->tableName = $tableName;
        return $this;
    }

    public function getAll() {
        $sql = "SELECT * FROM {$this->tableName}";
        if (!empty($this->wheres)) {
            $sql .= " WHERE ";
            foreach ($this->wheres as $value) {
                $sql .= $value['field'] . " = " . $value['value'];
                if ($value != end($this->wheres)) $sql .= " AND ";
            }
            $this->wheres = [];
        }
        if (!empty($this->orderBy)) {
            $sql .= " ORDER BY ";
            $sql .= $this->orderBy['field'];
            $isDesc = strtolower($this->orderBy['isDesc']);

            if ($isDesc === 'desc') {
                $sql .= " DESC";
            }

            $this->orderBy = [];
        }

        return $sql . PHP_EOL;
    }

    public function getOne($id) {
        return "SELECT * FROM {$this->tableName} WHERE id = {$id}" . PHP_EOL;
    }

    public function where($field, $value) {
        $this->wheres[] = [
            'field' => $field,
            'value' => $value
        ];
        return $this;
    }

    public function andWhere($field, $value){
        return $this->where($field, $value);
    }

    public function orderBy($field = '', $isDesc = "") {
        $this->orderBy = [
            'field' => $field,
            'isDesc' => $isDesc
        ];
        return $this;
    }
}

$db = new Db();

echo $db->
    table('goods')->
    getAll();

echo $db->
    table('goods')->
    getOne(1);

echo $db->
    table('user')->
    where('name', '\'admin\'')->
    getAll();

echo $db->
    table('users')->
    where('login', '\'admin\'')->
    andWhere('pass', 123)->
    getAll();

echo $db->
    table('goods')->
    where('name', '\'чай\'')->
    andWhere('price', 12)->
    andWhere('collection', '\'lux\'')->
    getAll();

echo $db->
    table('order')->
    where('nameGoods', '\'кофе\'')->
    andWhere('dateOrder', '12.03.2021')->
    orderBy('dateOrder','deSC')->
    getAll();

echo $db->
table('order')->
where('nameGoods', '\'молоко\'')->
andWhere('dateOrder', '15.03.2021')->
orderBy('nameGoods','что-то, но не desc')->
getAll();

echo $db->
table('order')->
where('nameGoods', '\'сахар\'')->
andWhere('dateOrder', '25.04.2021')->
orderBy('nameGoods')->
getAll();