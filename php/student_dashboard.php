<?php
include_once 'config/Database.php';
include_once 'class/User.php';
include_once 'class/Utils.php';
$utils = new Utils();
$db = new Database();
$conn = $db->getConnection();
$user = new User($conn);

if (!($user->isLoggedIn()) || $_SESSION['user_role'] > 3) {
    header("Location: /index.php");
}

?>
<?php
include 'include/header.php';
echo "<title>AMS Student</title>";
include 'include/content.php';
$activeDash = 3;
include 'include/navigation.php';

include 'include/footer.php';
?>