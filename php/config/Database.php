<?php
ini_set('session.gc_maxlifetime', 1800); //Expire session after 1800s -> 30mins
session_start();
class Database
{
    private $host = 'localhost';
    private $username = 'dbadmin';
    private $password = 'Admin123@';
    private $database = 'uoj';

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