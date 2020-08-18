<?php

// load helper and mvc
$files = array_merge(glob('../app/Helpers/*'), glob('../core/*'));
foreach ($files as $file) {
	require $file;
}

$app = config('app');
if ($app['env'] === 'local' && $app['debug'] === true) {
	error_reporting(E_ALL);
	ini_set('display_errors', 1);
	set_error_handler('showError');
}

require __DIR__ . '/../vendor/autoload.php';

// init controller
$controller = new Core\Controller;
$controller->initRequest();

$db_driver = config('database.driver');
$driver = "DB\\{$db_driver}Driver";
$driver = new $driver;

$model = new Core\Model;
$model->setConnection($controller->connection);
echo '<pre>';
echo print_r($model);
echo '</pre>';