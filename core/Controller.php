<?php

namespace Core;

class Controller
{
    protected $view;
    protected $request;
    protected $db_driver;

    public function __construct($view, $request) {
        $this->setView($view);
        $this->setRequest($request);
        $this->initDBDriver();
    }

    public function setView($view) {
        $this->view = $view;
        return $this;
    }

    public function view($file, $data=[]) {
        $this->view->load($file, $data);
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
        $model::setConnection($this->db_driver->connection);
    }

    public function __destruct() {
        $this->db_driver->disconnect();
    }
}