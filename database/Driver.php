<?php

namespace Database;

use Core\Model;

class Driver
{
	private static $db_driver;
	private static $connection;

    public function __construct($db_driver) {
		$db_driver = "Database\\Drivers\\{$db_driver}";
        self::$db_driver = new $db_driver;
        self::$connection = self::$db_driver->connect(config('database'));

        // load model
        $model = new Model;
        $model->setDriver(self::$db_driver);
    }
}