<?php
include_once 'config/Database.php';
include_once 'class/User.php';
include_once 'class/Lecturer.php';
include_once 'class/Utils.php';
$utils = new Utils();
$db = new Database();
$conn = $db->getConnection();
$user = new User($conn);
$lecr = new Lecturer($conn);

if (!($user->isLoggedIn()) || $_SESSION['user_role'] > 1) {
    header("Location: 2020/2020g3/index.php");
}

?>
<?php
include 'include/header.php';
echo "<title>AMS Lecturer</title>";
include 'include/content.php';
$activeDash = 1;
include 'include/nav.php';
?>



<?php
include 'include/footer.php';
?>