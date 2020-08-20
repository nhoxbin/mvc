<?php

namespace Core;

class App
{
	protected $request;
    protected $params = [];
    
	protected $controller = 'Home';
	protected $method = 'index';

    public function __construct() {
        $this->request = new Request;
        $this->initController($this->request->get('controller'));
        $this->initMethod($this->request->get('method'));
        call_user_func_array([$this->controller, $this->method], $this->params);
    }

    public function initController($controller) {
    	$controllerName = ucfirst(strtolower($controller ?? $this->controller));
    	$controllerName .= 'Controller';
        if (!file_exists(base_dir('controller') . "/$controllerName.php")) {
        	show404error('Controller');
        }
    	$controller = "App\\Http\\Controllers\\$controllerName";
        $this->controller = new $controller($this->request);
    }

    public function initMethod($method) {
    	$method = strtolower($method ?? $this->method);
        if (!method_exists($this->controller, $method)) {
        	show404error('Method');
        }
        $this->method = $method;
    }
}