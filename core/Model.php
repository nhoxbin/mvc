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

    public static function setDBDriver($driver) {
        self::$driver = $driver;
    }

    public static function setTable($table) {
        return self::$driver->setTable($table);
    }

    public static function all($columns = ['*']) {
        return self::setTable((new static)->table)->all($columns)->get();
    }

    public static function find($id) {
        return self::setTable((new static)->table)->find($id)->get();
    }

    public static function where(...$condition) {
        return self::setTable((new static)->table)->where($condition);
    }
}