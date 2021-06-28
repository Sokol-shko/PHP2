<?php
/**
 * Created by PhpStorm.
 * User: KIM
 * Date: 25.06.2021
 * Time: 15:54
 */

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

    /*   Пока не придумал, как сделать запрос универсальным, и нужно ли?   */
    public static function getCart() {

        $sql = "SELECT (products.name) AS goodsName , clients.name, cart.count, products.price
                FROM products
                INNER JOIN cart ON products.id = cart.products_id
                INNER JOIN clients ON clients.id = cart.clients_id";
        return DB::getInstance()->queryAll($sql);
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

    protected function update() {
        $params = [];
        $str = '';

        foreach ($this as $key => $value) {
            if ($key == 'id') continue;
            $params[":{$key}"] = $value;
            $str .= "{$key} = :{$key}, ";
        }

        $set = substr($str, 0, -2);
        $tableName = static::getTableName();

        $sql = "UPDATE {$tableName} SET {$set} WHERE id = {$this->id}";

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