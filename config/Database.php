<?php

require 'Config.php';

class Database
{
    public $conn;

    public function __construct()
    {
        $this->conn = mysqli_connect(HOSTNAME, USERNAME, PASSWORD, DATABASE);
        mysqli_set_charset($this->conn, 'UTF8');
        if (!$this->conn) {
            die(mysqli_connect_error());
        }
    }
}