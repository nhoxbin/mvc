<?php

namespace Core;

abstract class Database
{
    abstract static function get();
    abstract function find($id);
    abstract function all($columns);
    abstract static function update();
    
    abstract function create();
    abstract function store();
    abstract function delete();

    abstract static function query($sql);
}