<?php

namespace Database\Drivers;

use Core\Model;
use Core\Database;

class Mysql extends Database
{
    protected $table;
    private $result;
    protected static $connection;

    public function connect($db) {
        $connection = mysqli_connect($db['host'], $db['username'], $db['password'], $db['database']);
        if (mysqli_connect_errno() === 0) {
            mysqli_set_charset($connection, 'utf8');

            self::$connection = $connection;
            return $connection;
        }
        return false;
    }

    public function setTable($table) {
        $this->table = $table;
        return $this;
    }

    public function getTable() {
        return $this->table;
    }

    public static function get() {

    }

    public function all($columns) {
        $sql = "SELECT * FROM {$this->getTable()}";
        $q = self::query($sql);
        $data = [];
        while ($row = mysqli_fetch_assoc($q)) {
            $data[] = $row;
        }
        mysqli_free_result($q);
        return $data;
    }

    public function where($id, $value, $cond='=') {
        $sql = "SELECT * FROM {$this->getTable()} WHERE {$id}$cond{$value}";
        $q = self::query($sql);
        $data = [];
        while ($row = mysqli_fetch_assoc($q)) {
            $data[] = $row;
        }
        mysqli_free_result($q);
        return $data;
    }

    public function find($id) {
        $sql = "SELECT * FROM {$this->getTable()} WHERE id={$id}";
        $q = self::query($sql);
        $data = mysqli_fetch_assoc($q);
        mysqli_free_result($q);
        return $data;
    }

    public static function update() {

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

    public function __destruct() {
        mysqli_close(self::$connection);
    }
}