<?php

namespace app\models;


class Category extends Model
{
    public $id;
    public $name;


    public function __construct($name = null)
    {
        $this->name = $name;
    }


    protected static function getTableName() {
        return 'categories';
    }
}