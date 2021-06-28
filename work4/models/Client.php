<?php

namespace app\models;


class Client extends DbModel
{
    public $id;
    public $name;


    public function __construct($name = null)
    {
        $this->name = $name;
    }


    protected static function getTableName() {
        return 'clients';
    }
}
