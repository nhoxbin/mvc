<?php

namespace Core;

use Core\Model;
use Core\Request;
use Database\Driver;

class Controller
{
	public $model;
	public $request;
	private $database;

    public function __construct() {
        // load DB driver
        $driver = new Driver(config('database.driver'));
    }

    public function initRequest() {
    	$this->request = new Request;
    	$this->request->initController($this->request->get('controller'))
    		          ->initMethod($this->request->get('method'));
    	
    	return $this->request;
    }
}