<?php

namespace Core;

use Core\Model;
use Core\Request;

class Controller
{
	public $request;
    public $connection;
    protected $model;
    private static $driver;

    public function __construct() {
        // load DB driver
        /*$db = config('database');

        $driver = '\\Database\\' . config('database.driver') . 'Driver';
        self::$driver = new $driver;
        $this->connection = self::$driver->connect($db);*/
    }

    public function initRequest() {
    	$this->request = new Request;
    	$this->request->initController($this->request->get('controller'))
    		          ->initMethod($this->request->get('method'));
        return $this;
    }
}