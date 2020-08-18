<?php

namespace Core;

class Model
{
    // protected $result;
    protected $table;
    protected static $connection;
    protected static $driver;

    public static function setConnection($connection) {
        self::$connection = $connection;
    }

    public static function setTable($table) {
        return self::$driver->setTable($table);
    }

    public static function all() {
        return self::setTable((new static)->table)->all();
    }

    /*public function get() {
        echo '<pre>';
        echo print_r($this->result);
        echo '</pre>';die;
    }*/
}