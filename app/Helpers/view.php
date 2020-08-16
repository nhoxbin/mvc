<?php

function view($file, $data=[]) {
	extract($data);
	global $gPath;
	$view = $gPath['views'] . '/' . str_replace('.', '/', $file) . '.php';
	if (!file_exists($view)) {
		return false;
	}
	require $view;
}