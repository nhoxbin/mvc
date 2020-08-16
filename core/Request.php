<?php

namespace Core;

class Request
{
	public $controller = 'home';
	public $method = 'index';

    public function get($name) {
        return $_GET[$name] ?? null;
    }

    public function post($name) {
        return $_POST[$name] ?? null; 
    }

    public function initController($name) {
		global $gPath;
    	$controllerName = ucfirst(strtolower($name ?? $this->controller)) . 'Controller';
		if (!file_exists("{$gPath['controller']}/$controllerName.php")) {
			show404error('controller');
		}
		$controller = "App\\Http\\Controllers\\$controllerName";
		$this->controller = new $controller();

		return $this;
    }

    public function initMethod($name) {
    	// check method exists
		$method = strtolower($name ?? $this->method);
		if (!method_exists($this->controller, $method))
			show404error('method');
		// init method
		$this->controller->$method();

		return $this;
    }
}