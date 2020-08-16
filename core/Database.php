<?php

namespace Core;

abstract class Database
{
    abstract static function get();
    abstract static function find($id);
    abstract static function all();
    abstract static function update();
    
    abstract function create();
    abstract function store();
    abstract function delete();
}