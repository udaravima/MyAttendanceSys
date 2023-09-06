<?php
$password = "user123@";
$salt = bin2hex(random_bytes(16));
$hash = password_hash($password . $salt, PASSWORD_BCRYPT);
echo $hash . "<br>";
echo $salt . "<br>";
if (password_verify($password . $salt, $hash)) {
    echo "<br>true";
} else {
    echo "<br>false";
}
echo "<br>" . __DIR__;
?>