<?php

namespace Core;

use Core\Database;

class Model extends Database
{
    protected $table;
    protected $connection;

    public function __construct($database) 
    {
        $this->connection = $database->getConnection();
    }

    public static function get() {

    }

    public static function find($id) {

    }

    public static function all() {
        $sql = "SELECT * FROM {self::table}";
        $query = parent::query($sql);
        array_map(function($row) {
            echo '<pre>';
            echo print_r($row);
            echo '</pre>';
        }, $query);
    }

    public static function update() {

    }
    
    public function create() {

    }

    public function store() {

    }

    public function delete() {

    }
}