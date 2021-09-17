<?php

require_once 'config/Database.php';

class Model extends Database
{
    public function ex_query($query)
    {
        return mysqli_query($this->conn, $query);
    }
}