<?php
include_once 'config/Database.php';
include_once 'class/User.php';
include_once 'class/Utils.php';
$utils = new Utils();
$db = new Database();
$conn = $db->getConnection();
$user = new User($conn);

if (!($user->isLoggedIn()) || !($user->isAdmin())) {
    header("Location: /index.php");
}

?>
<?php
include 'include/header.php';
echo "<title>AMS Admin</title>";
include 'include/content.php';
$activeDash = 0;
include 'include/navigation.php';

include 'include/footer.php';
?>