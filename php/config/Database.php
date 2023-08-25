<?php
ini_set('session.gc_maxlifetime', 1800); //Expire session after 1800s -> 30mins
session_start();
class Database
{
    private $host = '';
    private $username = '';
    private $password = '';
    private $database = '';

    public function getConnection()
    {
        $conn = new mysqli($this->host, $this->username, $this->password, $this->database);
        if ($conn->connect_error) {
            die("MySQL Connection error occurd!: " . $conn->connect_error);
        } else {
            return $conn;
        }
    }
}