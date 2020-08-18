<?php

namespace Core;

use \DB\MySqlDriver;

class Model extends MySqlDriver
{
    // protected $result;
    protected static $connection;

    public static function setConnection($connection) {
        self::$connection = $connection;
    }

    public static function setTable($table) {
        return self::$driver->setTable($table);
    }

    /*public function get() {
        echo '<pre>';
        echo print_r($this->result);
        echo '</pre>';die;
    }*/
}