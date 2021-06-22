<?php

namespace app\models;

use app\interfaces\IModel;
use app\engine\Db;

abstract class Model implements IModel
{

    abstract protected static function getTableName();

    public static function getOne($id) {
        $tableName = static::getTableName();
        $sql = "SELECT * FROM {$tableName} WHERE id = :id";

        return DB::getInstance()->queryOne($sql, ['id' => $id]);
        //return DB::getInstance()->queryOneObject($sql, ['id' => $id], get_called_class());
    }
    public static function getAll() {
        $tableName = static::getTableName();
        $sql = "SELECT * FROM {$tableName}";

        return DB::getInstance()->queryAll($sql);
    }

    // INSERT INTO `products`(`id`, `name`, `price`) VALUES (`:id`, `:name`, `:price`)
    public function insert() {
        $title = [];
        $params = [];

        foreach ($this as $key => $value) {
            if ($key == 'id') continue;
            $title[] = $key;
            $params[":{$key}"] = $value;
        }
        $title = implode(', ', $title);
        var_dump($title);
        echo "<br>";
        $values = implode(', ', array_keys($params));
        var_dump($values);
        echo "<br>";
        $tableName = static::getTableName();

        $sql = "INSERT INTO {$tableName} ({$title}) VALUES ($values)";
        echo $sql;

        DB::getInstance()->execute($sql, $params);
        $this->id = DB::getInstance()->lastInsertId();

        return $this;
    }

    //DELETE FROM `products` WHERE 0
    public function delete() {
        $tableName = static::getTableName();
        $sql = "DELETE FROM {$tableName} WHERE id = :id";
//        var_dump($sql);
        return Db::getInstance()->execute($sql, ['id' => $this->id]);
    }

    // Моим методом тоже не работает
    //DELETE FROM `products` WHERE 0
    public function deleteMy($id = null) {
        $tableName = static::getTableName();
        $sql = "DELETE FROM {$tableName} WHERE id = :id";
//        var_dump($sql);
        if (!is_null($id)) return Db::getInstance()->execute($sql, ['id' => $id]);
        else return null;

    }

    public function update() {

    }

}