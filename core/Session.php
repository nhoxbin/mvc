<?php

namespace Core;

class Session
{
    public function __construct() {
        session_start();
    }

    public function get($name) {
    	return $_SESSION[$name];
    }

    public function set($k, $v) {
    	$_SESSION[$k] = $v;
    }
}