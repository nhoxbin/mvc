<?php

namespace Core;

class View
{
    public function __construct($file, $data=[]) {
        extract($data);
		$app = handle_file($file);
		$section = [];
		function section($title, $s) {
			$section[$title] = $s;
		}
		function show($s) {
			return $s ?? null;
		}
		$page = include handle_file($page);
		require $app;
    }

    public function handle_file($file='') {
		$file = base_dir('views') . '/' . str_replace('.', '/', $file) . '.php';
		if (!file_exists($file)) {
			show404error('View'.$file);
		}
		return $file;
	}
}