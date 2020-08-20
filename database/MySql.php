<?php

namespace DB;

use Core\Database;

class MySql extends Database
{
    private $result;
    protected static $table;
    public static $connection;

    public function __construct($db) {
        $connection = mysqli_connect($db['host'], $db['username'], $db['password'], $db['database']);
        if (mysqli_connect_errno() === 0) {
            mysqli_set_charset($connection, 'utf8');

            self::$connection = $connection;
        }
    }

    public function setTable($table) {
        self::$table = $table;
        return $this;
    }

    public static function getTable() {
        return self::$table;
    }

    public function all($columns = ['*']) {
        $table = self::getTable();
        $sql = "SELECT * FROM {$table}";
        $q = self::query($sql);
        $data = [];
        while ($row = mysqli_fetch_assoc($q)) {
            $data[] = $row;
        }
        mysqli_free_result($q);
        $this->result = $data;
        return $this;
    }

    public function where($condition) {
        if (count($condition) === 3) {
            $cond = $condition[1];
            $value = $condition[2];
        } else {
            $cond = '=';
            $value = $condition[1];
        }

        $sql = "SELECT * FROM {$this->getTable()} WHERE {$condition[0]} $cond {$value}";
        $q = self::query($sql);
        $data = [];
        while ($row = mysqli_fetch_assoc($q)) {
            $data[] = $row;
        }
        mysqli_free_result($q);
        $this->result = $data;
        return $this;
    }

    public function find($id) {
        $sql = "SELECT * FROM {$this->getTable()} WHERE id={$id}";
        $q = self::query($sql);
        $data = mysqli_fetch_assoc($q);
        mysqli_free_result($q);
        $this->result = $data;
        return $this;
    }

    public function update() {

    }
    
    public function create() {

    }

    public function store() {

    }

    public function delete() {

    }

    public static function query($sql) {
    	if ($q = mysqli_query(self::$connection, $sql)) {
            if (mysqli_num_rows($q) > 0) {
                // mysqli_free_result($q);
                return $q;
            }
    	}
    	return false;
    }

    public function get() {
        return $this->result;
    }

    public function disconnect() {
        mysqli_close(self::$connection);
    }
}