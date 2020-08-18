<?php

namespace Core;

class App
{
	protected $request;
	protected $controller = 'Home';
	protected $method = 'index';
	protected $params = [];

    public function __construct() {
        $this->request = new Request;
        $this->initController();
        $this->initMethod();
        call_user_func_array([new $this->controller, $this->method], $this->params);
    }

    public function initController() {
    	$controllerName = ucfirst(strtolower($this->request->get('controller') ?? $this->controller)) . 'Controller';
        if (!file_exists(base_dir('controller') . "/$controllerName.php")) {
        	show404error('Controller');
        }
    	$this->controller = "App\\Http\\Controllers\\$controllerName";
    }

    public function initMethod() {
    	$method = strtolower($this->request->get('method') ?? $this->method);
        if (!method_exists($this->controller, $method)) {
        	show404error('Method');
        }
        $this->method = $method;
    }
}