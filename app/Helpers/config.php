<?php

function config($name) {
	$name = explode('.', $name);
	$file = base_dir('config') . '/' . $name[0] . '.php';

	if (file_exists($file)) {
		$config = include $file;
		if (count($name) == 1)
			return $config;
		else
			return $config[$name[1]];
	}
	return [];
}