<?php

function handle_file($file='') {
	$file = base_dir('views') . '/' . str_replace('.', '/', $file) . '.php';
	return $file;
}

function view($file, $data=[]) {
	extract($data);
	$view = handle_file($file);
	$page = handle_file($page);
	require $view;
}