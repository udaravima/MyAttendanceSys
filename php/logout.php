<?php
include_once 'php/config/Database.php';
include_once 'class/User.php';

$db = new Database();
$conn = $db->getConnection();
$user = new User($conn);

session_start();
$user->setSessionStatus(false);
header("Location: index.php");
$_SESSION['user_id'] = '';
session_destroy();
header("Location:/index.php");
?>