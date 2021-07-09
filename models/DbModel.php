<?php

namespace app\models;


use app\engine\Db;

abstract class DbModel extends Model
{
    abstract protected static function getTableName();

    public static function getLimit($limit) {
        $tableName = static::getTableName();
        $sql = "SELECT * FROM {$tableName} LIMIT 0, ?";

        return DB::getInstance()->queryLimit($sql, $limit);
    }

    public static function getCountWhere($title, $value) {
        $tableName = static::getTableName();
        $sql = "SELECT COUNT(id) AS count FROM {$tableName} WHERE {$title} = :value";

        return DB::getInstance()->queryOne($sql,['value' => $value])['count'];
    }

    protected static function getOneWhere($title, $value){
        $tableName = static::getTableName();
        $sql = "SELECT * FROM {$tableName} WHERE {$title} = :value";

        return DB::getInstance()->queryOneObject($sql, ['value' => $value], static::class);
    }

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

    protected function insert() {
        $title = [];
        $params = [];

        foreach ($this->props as $key => $value) {
            $title[] = $key;
            $params[":{$key}"] = $this->$key;
            $this->props[$key] = false;
        }
        $title = implode(', ', $title);
        $values = implode(', ', array_keys($params));
        $tableName = static::getTableName();

        $sql = "INSERT INTO {$tableName} ({$title}) VALUES ($values)";

        DB::getInstance()->execute($sql, $params);
        $this->id = DB::getInstance()->lastInsertId();

        return $this;
    }

    protected function update() {
        $params = [];
        $str = '';

        foreach ($this->props as $key => $value) {
            if (!$value) continue;
            $params["{$key}"] = $this->$key;
            $str .= "{$key} = :{$key}, ";
            $this->props[$key] = false;
        }

        $set = substr($str, 0, -2);
        $tableName = static::getTableName();
        $sql = "UPDATE {$tableName} SET {$set} WHERE id = :id";
        $params['id'] = $this->id;

        DB::getInstance()->execute($sql, $params);

        return $this;
    }

    public function delete() {
        $tableName = static::getTableName();
        $sql = "DELETE FROM {$tableName} WHERE id = :id";
        return Db::getInstance()->execute($sql, ['id' => $this->id]);
    }



    public function save() {
        if (is_null($this->id)) {
            $this->insert();
        } else {
            $this->update();
        }

    }
}