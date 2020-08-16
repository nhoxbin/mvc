<?php

function config($name) {
	global $gPath;
	$name = explode('.', $name);
	$file = $gPath['config'].'/'.$name[0].'.php';

	if (file_exists($file)) {
		$config = include $file;
		if (count($name) == 1)
			return $config;
		else
			return $config[$name[1]];
	}
	return [];
}