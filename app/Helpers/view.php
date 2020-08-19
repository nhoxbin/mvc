<?php

function view($file, $data=[]) {
	extract($data);
	$view = base_dir('views') . '/' . str_replace('.', '/', $file) . '.php';
	if (!file_exists($view)) {
		return false;
	}
	require $view;
}