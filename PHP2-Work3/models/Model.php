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

        return DB::getInstance()->queryOneObject($sql, ['id' => $id], static::class);
    }
    public static function getAll() {
        $tableName = static::getTableName();
        $sql = "SELECT * FROM {$tableName}";

        return DB::getInstance()->queryAll($sql);
    }

    public function insert() {
        $title = [];
        $params = [];

        foreach ($this as $key => $value) {
            if ($key == 'id') continue;
            $title[] = $key;
            $params[":{$key}"] = $value;
        }
        $title = implode(', ', $title);
        $values = implode(', ', array_keys($params));
        $tableName = static::getTableName();

        $sql = "INSERT INTO {$tableName} ({$title}) VALUES ($values)";

        DB::getInstance()->execute($sql, $params);
        $this->id = DB::getInstance()->lastInsertId();

        return $this;
    }

    public function delete() {
        $tableName = static::getTableName();
        $sql = "DELETE FROM {$tableName} WHERE id = :id";
        return Db::getInstance()->execute($sql, ['id' => $this->id]);
    }

    public function update() {

    }

}