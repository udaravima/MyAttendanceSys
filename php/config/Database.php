<?php
ini_set('session.gc_maxlifetime', 1800); //Expire session after 1800s -> 30mins
session_start();
class Database
{
    private $host = 'localhost';
    private $username = '2020g3';
    private $password = '!2qwasZX';
    private $database = '2020g3';

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