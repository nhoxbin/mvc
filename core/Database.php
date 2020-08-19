<?php

namespace Core;

abstract class Database
{
	// abstract function connect($db);
	
    abstract function get();
    abstract static function find($id);
    abstract static function all($columns);
    abstract static function update();
    
    abstract function create();
    abstract function store();
    abstract function delete();

    abstract static function query($sql);
}