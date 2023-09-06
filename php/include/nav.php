<nav class="navbar navbar-expand-sm fixed-top navbar-light mt-0 mb-5 bg-primary">
    <div class="container">

        <a class="navbar-brand" href="/2020/2020g3/index.php">
            <img id="logo" src="/2020/2020g3/res/logo/AMS_logo.png" alt="AMS_logo" width="40" height="40"
                class="d-inline-block align-text-top">
            AMS
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav nav ml-auto nav-pills">
                <?php
                if ($_SESSION['user_role'] == 0) {
                    echo "
                <li class='nav-item'>
                    <a class='nav-link " . (($activeDash == 0) ? "active" : "") . "' href='2020/2020g3/php/admin_dashboard.php'>Admin</a>
                </li>";
                }

                if ($_SESSION['user_role'] < 2) {
                    echo "
                <li class='nav-item'>
                    <a class='nav-link " . (($activeDash == 1) ? "active" : "") . "' href='2020/2020g3/php/lecturer_dashboard.php'>Lecturer</a>
                </li>";
                }

                if ($_SESSION['user_role'] < 3) {
                    echo "
                <li class='nav-item'>
                    <a class='nav-link " . (($activeDash == 2) ? "active" : "") . "' href='2020/2020g3/php/Instructor_dashboard.php'>Instructor</a>
                </li>";
                }
                ?>
                <li class='nav-item'>
                    <a class='nav-link <?php echo ($activeDash == 3) ? "active" : ""; ?>'
                        href='/2020/2020g3/php/student_dashboard.php'>Student</a>
                </li>
            </ul>
            <hr>
            <div class="dropdown ms-auto">
                <a href="#" class="d-flex align-items-center link-body-emphasis text-decoration-none dropdown-toggle"
                    data-bs-toggle="dropdown" aria-expanded="false">
                    <img src="<?php echo $_SESSION['user_profile_pic'] ?>" alt="" width="64" height="64 "
                        class="rounded-circle me-2">
                    <strong>
                        <?php echo $_SESSION['user_name']; ?>
                    </strong>
                </a>
                <ul class="dropdown-menu text-small shadow">
                    <li><a class="dropdown-item" href="#">New project...</a></li>
                    <li><a class="dropdown-item" href="#">Settings</a></li>
                    <li><a class="dropdown-item" href="#">Profile</a></li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li><a class="dropdown-item" href="/2020/2020g3/php/logout.php">Sign out</a></li>
                </ul>
            </div>
        </div>
    </div>
</nav>

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
                dark: "2020/2020g3/res/logo/AMS_logo_w.png",
                light: "2020/2020g3/res/logo/AMS_logo.png",
            };
            // Set the image source based on the selected theme
            logo.src = logoImages[theme];
        }
    });
</script>