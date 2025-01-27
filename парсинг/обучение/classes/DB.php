<?php

namespace classes;

class DB {
    protected $connection;

    public function __construct ($host, $user, $pass, $db) {
        $this->connection = mysqli_connect($host, $user, $pass, $db);
        $this->connection->set_charset("utf8");
        if ($this->connection->connect_error) {
            throw new \Exception("Connection failed: " . $this->connection->connect_error);
        }
    }

    public function query ($query) {

        if(!$this->connection) {
            return false;
        }
        $result = mysqli_query($this->connection, $query);

        if(mysqli_error($this->connection)) {
            throw new \Exception("Query failed: " . $this->connection->error);
        }

        if($result) {
            return $result;
        }

    }

    public function escape ($str) {
        return mysqli_real_escape_string($this->connection, $str);
    }

    public function lastInsertId () {
        return mysqli_insert_id($this->connection);
    }
}