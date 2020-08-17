<?php

namespace Core;

use Database\Driver;

class Model
{
    protected $result;
    protected static $driver;
    protected static $connection;

    public static function setDriver($driver) {
        self::$driver = $driver;
    }

    public static function setTable($table) {
        return self::$driver->setTable($table);
    }

    public static function all($columns = ['*']) {
        $driver = self::setTable((new static)->table);
        $result = $driver->all($columns);
        return $result;

        /*return static::query()->get(
            is_array($columns) ? $columns : func_get_args()
        );*/
    }

    public static function where($id, $value, $cond='=') {
        $driver = self::setTable((new static)->table);
        $result = $driver->where($id, $value, $cond);
        return $result;
    }

    public static function find($id) {
        $driver = self::setTable((new static)->table);
        $result = $driver->find($id);
        return $result;
    }
}