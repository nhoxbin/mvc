<?php

namespace Core;

use Core\Model;
use Core\Request;

class Controller
{
	public $model;
	public $request;
	private $database;

    public function __construct() {
    	global $gPath;
    	$db_driver = ucfirst(strtolower(config('database.driver')));
		if (file_exists("{$gPath['database']}/$db_driver.php")) {
			$driver = "Database\\{$db_driver}";
			$this->database = new $driver;
            $this->database->connect();
		}
    }

    public function initModel() {
    	$this->model = new Model($this->database);
    	
    	return $this;
    }

    public function initRequest() {
    	$this->request = new Request;
    	$this->request->initController($this->request->get('controller'))
    		          ->initMethod($this->request->get('method'));
    	
    	return $this;
    }
}