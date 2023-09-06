<?php
include_once 'config/Database.php';
include_once 'class/User.php';
include_once 'class/Utils.php';
$utils = new Utils();
$db = new Database();
$conn = $db->getConnection();
$user = new User($conn);

if (!($user->isLoggedIn()) || $_SESSION['user_role'] > 2) {
    header("Location: /2020/2020g3/index.php");
}

?>
<?php
include 'include/header.php';
echo "<title>AMS Instructor</title>";
include 'include/content.php';

$activeDash = 2;
include 'include/nav.php';

include 'include/footer.php';
?>