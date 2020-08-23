<?php

namespace Core;

abstract class Database
{
	// abstract function connect($db);
	
    abstract function setTable($table);
    abstract function getTable();

    abstract function get();
    abstract function find($id);
    abstract function all($columns);
    abstract function update();
    
    abstract function create();
    abstract function store();
    abstract function delete($id);

    abstract function query($sql);
}