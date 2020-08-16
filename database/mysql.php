<?php

namespace Database;

class Mysql
{
    protected $connection;

    public function connect() {
        $db = config('database');
        $this->connection = mysqli_connect($db['host'], $db['username'], $db['password'], $db['database']);
        if (mysqli_connect_errno() === 0) {
            mysqli_set_charset($this->connection, 'utf8');
            $this->setConnection($this->connection);
        }
        return false;
    }

    public function setConnection($name) {
        $this->connection = $name;

        return $this;
    }

    public function getConnection() {
        return $this->connection;
    }

    public function getTable() {
        return $this->table;
    }

    protected function query($sql) {
    	$q = mysqli_query($this->connection, $sql);
    	if (mysqli_num_rows($q) > 0) {
	    	return $q;
    	}
    	return false;
    }

    public function __destruct() {
        mysqli_close($this->connection);
    }
}