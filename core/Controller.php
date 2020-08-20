<?php

namespace Core;

class Controller
{
    protected $request;
    protected $db_driver;

    public function __construct($request) {
        $this->setRequest($request);
        $this->initDBDriver();
    }

    public function setRequest($request) {
        $this->request = $request;
        return $this;
    }

    public function initDBDriver() {
        $db = config('database');
        $db_driver = "DB\\{$db['driver']}";
        if (!file_exists(base_dir('database') . "/{$db['driver']}.php")) {
            show404error('Database Driver');
        }
        $this->db_driver = new $db_driver($db);

        $model = new Model;
        $model::setDBDriver($this->db_driver);
        $model::setConnection($this->db_driver::$connection);
    }

    public function __destruct() {
        $this->db_driver->disconnect();
    }
}