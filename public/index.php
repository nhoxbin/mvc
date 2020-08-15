<?php

$controllerPath = '../app/Http/Controllers';

require $controllerPath . '/Controller.php';

$controllerName = ucfirst(strtolower($_GET['controller'] ?? 'Home')) . 'Controller';
if (!file_exists("${controllerPath}/${controllerName}.php"))
	die('controller not found!!!');

// require controller
require "${controllerPath}/${controllerName}.php";
// init controller
$controller = new $controllerName;

// check method exists
$method = strtolower($_GET['method'] ?? 'index');
if (!method_exists($controller, $method))
	die('Method not found!!!');

// init method
$controller->$method();