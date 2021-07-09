<?php

namespace app\models;


class Category extends DbModel
{
    protected $id;
    protected $name;

    protected $props = [
        'name' => false
    ];

    public function __construct($name = null)
    {
        $this->name = $name;
    }


    protected static function getTableName() {
        return 'categories';
    }
}