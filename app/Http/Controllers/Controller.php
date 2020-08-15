<?php

class Controller
{
	const VIEW_FOLDER = 'resources/views';

    public function __construct()
    {
        
    }

    protected function view($path) {
    	$path = self::VIEW_FOLDER . '/' . str_replace('.', '/', $path) . '.php';
    	require $path;
    }
}