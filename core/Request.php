<?php

namespace Core;

class Request
{
    public function get($name) {
        return $_GET[$name] ?? null;
    }

    public function post($name) {
        return $_POST[$name] ?? null; 
    }
}