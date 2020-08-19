<?php

namespace Core;

class Controller
{
    protected $db_driver;
    protected $connection;


    public function __construct() {
        $this->initDBDriver();
    }

    public function initDBDriver() {
        $db = config('database');
        $db_driver = "DB\\{$db['driver']}";
        if (!file_exists(base_dir('database') . "/{$db['driver']}.php")) {
            show404error('Database Driver');
        }
        $this->db_driver = new $db_driver;
        $connection = $this->db_driver->connect($db);
        
        $model = new Model;
        $model::setDBDriver($this->db_driver);
        $model::setConnection($connection);
    }
}