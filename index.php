<?php
include_once 'php/config/Database.php'; // Carefull with location!
include_once 'php/class/User.php';
include_once 'php/class/Lecturer.php';
// include '/php/include/navbar.php';

$database = new Database();
$db = $database->getConnection();
$user = new User($db);
$lecturer = new Lecturer($db);
include 'php/include/header.php';
?>

<title> AMS Login </title>

<?php
include 'php/include/content.php';
?>
<!-- content begins  -->

<div class="container-lg my-5">
    <h1>Hello</h1>
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Facere voluptatibus quae omnis illo deserunt, eveniet
        dolorem provident. Nesciunt illum, aperiam error ipsa veniam adipisci animi, aliquam, quasi provident esse nemo.
    </p>
</div>

<!-- content ends  -->
<?php
include 'php/include/footer.php';
?>