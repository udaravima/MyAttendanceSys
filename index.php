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

if ($user->isLoggedIn()) {
    if ($user->isAdmin()) {
        header("Location: admin_dashboard.php");
    } else if ($user->isLecturer()) {
        header("Location: lecturer_dashboard.php");
    } else if ($user->isInstructor()) {
        header("Location: instructor_dashboard.php");
    } else if ($user->isStudent()) {
        header("Location: student_dashboard.php");
    }
}
if(isset($_POST['register'])){
    
}
if (isset($_POST['sign_in'])) {

    $username = (isset($_POST['username'])) ? $_POST['username'] : null;
    $password = (isset($_POST['password'])) ? $_POST['password'] : null;
    $rememberMe = (isset($_POST['rem_me'])) ? $_POST['rem_me'] : null;

    if ($user->login($username, $password, $rememberMe)) {

        if ($user->isAdmin()) {
            header("Location: admin_dashboard.php");
        } else if ($user->isLecturer()) {
            header("Location: lecturer_dashboard.php");
        } else if ($user->isInstructor()) {
            header("Location: instructor_dashboard.php");
        } else if ($user->isStudent()) {
            header("Location: student_dashboard.php");
        }

    } else {
        // get the message and preview on modal
        $message = $user->getLoginMessage();
        $_POST = array();
        $logInfoModal = "
        <div class='modal fade' id='log_info' tabindex='-1' aria-labelledby='login-status' aria-hidden='true'>
            <div class='modal-dialog modal-dialog'>
                <div class='modal-content'>
                    <div class='modal-header'>
                        <h3>AMS Systems</h3>
                        <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                    </div>
                    <div class='modal-body'>
                        <div id='login-alert' class='alert alert-danger'>
                            <p class=''>$message</p>
                        </div> 
                    </div>
                    <div class='modal-footer'>
                        <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Close</button>
                        <!-- <button type='button' class='btn btn-primary'>Save changes</button> -->
                    </div>
                </div>
            </div>
        </div>";
        echo $logInfoModal;
        echo "
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    var loginModal = new bootstrap.Modal(document.getElementById('log_info'));
                    loginModal.show();
                });
            </script>";
        // echo '<meta http-equiv="refresh" content= "0">';
    }
}
?>

<!-- content begins  -->

<!-- main container -->
<div class="container-lg justify-content-center align-items-center mt-5">
    <div class="row align-items-center justify-content-center">

        <div
            class="col-8 col-md-4 col-lg-3 border rounded shadow form-signin align-items-center justify-content-center">
            <form action="" method="post" class="form">
                <img id="logo" class="img-fluid" src="res/logo/AMS_side_banner_w.png" alt="AMS_Banner" width=""
                    height="">
                <h1 class="h3 mb-3 fw-normal">Please sign in</h1>
                <!-- <div id="login-alert" class="alert">
                     <p class="">Hello</p> 
                </div> -->
                <div class="form-floating">
                    <input type="text" class="form-control" id="username" name="username" placeholder="2020csc000"
                        required>
                    <label for="username">Username</label>
                </div>

                <div class="form-floating">
                    <input type="password" class="form-control" id="password" name="username" placeholder="Password"
                        required>
                    <label for="password">Password</label>
                </div>

                <div class="form-check text-start my-3">
                    <input class="form-check-input" type="checkbox" value="rem_me" name="rem_me" id="rem_me">
                    <label class="form-check-label" for="rem_me">
                        Remember me
                    </label>
                </div>
                <button class="btn btn-primary w-100 py-2" type="submit" name="sign_in" id="sign_in">Sign in</button>
                <div class="mt-4">
                    <p class="align-items-center justify-content-center">
                        <a class="link-underline link-opacity-75-hover link-offset-2" href="#"> Forgot your password?
                        </a>
                    </p>
                    <p class="align-items-center justify-content-center">
                        <a class="link-underline link-offset-2 link-opacity-75-hover" data-bs-toggle="modal"
                            data-bs-target="#reg_user" href="#">Don't have an account?
                        </a>
                    </p>
                </div>
                <div class="mt-4">
                    <p class="align-items-center justify-content-center">&copy; 2023 Attendance Management System </p>
                </div>

                <!-- <p class="mt-5 mb-3 text-body-secondary align-items-center justify-content-center">Attendance Management System <br> Department of Computer Science<br> University of Jaffna</p> -->
            </form>
        </div>
    </div>
</div>

<!-- Reg User Module -->
<?php
include 'modal_register.php';
?>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        const logo = document.getElementById('logo');
        const themeLinks = document.querySelectorAll('[data-bs-theme]');

        themeLinks.forEach(link => {
            link.addEventListener("click", function (e) {
                // e.preventDefault(); // unable to click when its on
                const theme = this.getAttribute("data-bs-theme");
                updateImage(theme);
            });
        });

        function updateImage(theme) {
            // Define a mapping of themes to image URLs
            const logoImages = {
                dark: "/res/logo/AMS_side_banner_w.png",
                light: "/res/logo/AMS_side_banner.png",
            };

            // Set the image source based on the selected theme
            logo.src = logoImages[theme];
        }
    });
</script>

<!-- content ends  -->
<?php
include 'php/include/footer.php';
?>