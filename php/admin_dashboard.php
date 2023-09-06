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

if (!($user->isLoggedIn()) || !($user->isAdmin())) {
    header("Location: 2020/2020g3/index.php");
}
?>

<?php
include 'include/header.php';
echo "<title>AMS Admin</title>";
include 'include/content.php';
$activeDash = 0;
include 'include/nav.php';
?>

<!-- Lecture Table  -->
<div class="container-sm mt-5" id="lecr_data">
    <h1>Lecture Records</h1>
    <button type="button" class="btn btn-success my-3 float-end ms-auto" data-bs-toggle="modal" data-bs-target="#reg_user">+Add User</button> <?php
    $order = array();
    $itemsPerPage = 10;
    $currentPage = isset($_GET['page']) ? $_GET['page'] : 1;
    $order['offset'] = ($currentPage - 1) * $itemsPerPage;
    $order['limit'] = $itemsPerPage;
    $totalCount = $user->countRecords('uoj_lecturer');
    $totalPages = ceil($totalCount / $itemsPerPage);
    ?> <table
        class="table table-striped table-hover border shadow" id="lecture_data">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Mobile</th>
                <th>Email</th>
                <th>Role</th>
                <th>Status</th>
                <th>Photo</th>
                <th class="visually-hidden">userID</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $lecturers = $user->getLecturerTable($order);
            $i = 1;
            while ($lecturer = $lecturers->fetch_assoc()) {
                $status = $user->getStatusStr(intval($lecturer['user_status']));
                $role = $user->getRoleStr(intval($lecturer['user_role']));
                $photo = (($lecturer['lecr_profile_pic'] == null) ? $user->getDefaultProfilePic() : $lecturer['lecr_profile_pic']);
                echo "<tr>";
                echo "<td>" . $i++ . "</td>";
                echo "<td>" . $lecturer['lecr_name'] . "</td>";
                echo "<td>" . $lecturer['lecr_mobile'] . "</td>";
                echo "<td>" . $lecturer['lecr_email'] . "</td>";
                echo "<td>" . $role . "</td>";
                echo "<td>" . $status . "</td>";
                echo "<td><img class='rounded-circle' src='" . $photo . "' width='50px' height='50px'></td>";
                echo "</tr>";
            }
            ?>
        </tbody>
        </table>
        <nav aria-label="Page navigation">
            <ul class="pagination justify-content-center">
                <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                    <li class="page-item <?php echo ($i == $currentPage) ? 'active' : ''; ?>">
                        <a class="page-link" href="admin_dashboard.php?page=<?php echo $i; ?>"><?php echo $i; ?></a>
                    </li>
                <?php endfor; ?>
            </ul>
        </nav>
</div>

<!-- Student Table -->
<div class="container-sm mt-5" id="std_data">
    <?php
    $order = array();
    $itemsPerPage = 10;
    $currentPage = isset($_GET['pageS']) ? $_GET['pageS'] : 1;
    $order['offset'] = ($currentPage - 1) * $itemsPerPage;
    $order['limit'] = $itemsPerPage;
    $totalCount = $user->countRecords('uoj_student');
    $totalPages = ceil($totalCount / $itemsPerPage);
    ?>
    <table class="table table-striped table-hover border shadow" id="student_data">
        <h1>Student Records</h1>
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Mobile</th>
                <th>Email</th>
                <th>Status</th>
                <th>Photo</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $students = $user->getStudentTable($order);
            $i = 1;
            while ($student = $students->fetch_assoc()) {
                $status = $user->getStatusStr(intval($student['user_status']));
                $photo = (($student['std_profile_pic'] == null) ? $user->getDefaultProfilePic() : $student['std_profile_pic']);
                echo "<tr>";
                echo "<td>" . $i++ . "</td>";
                echo "<td>" . $student['std_fullname'] . "</td>";
                echo "<td>" . $student['mobile_tp_no'] . "</td>";
                echo "<td>" . $student['std_email'] . "</td>";
                echo "<td>" . $status . "</td>";
                echo "<td><img class='rounded-circle' src='" . $photo . "' width='50px' height='50px'></td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
    <nav aria-label="Page navigation">
        <ul class="pagination justify-content-center">
            <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                <li class="page-item <?php echo ($i == $currentPage) ? 'active' : ''; ?>">
                    <a class="page-link" href="admin_dashboard.php?pageS=<?php echo $i; ?>"><?php echo $i; ?></a>
                </li>
            <?php endfor; ?>
        </ul>
    </nav>
</div>

<!-- Get Courses -->
<div class="container-sm mt-5" id="course_data">
    <?php
    $order = array();
    $itemsPerPage = 10;
    $currentPage = isset($_GET['pageC']) ? $_GET['pageC'] : 1;
    $order['offset'] = ($currentPage - 1) * $itemsPerPage;
    $order['limit'] = $itemsPerPage;
    $totalCount = $user->countRecords('uoj_course');
    $totalPages = ceil($totalCount / $itemsPerPage);
    ?>
    <table class="table table-striped table-hover border shadow" id="courses_data">
        <h1>Student Records</h1>
        <thead>
            <tr>
                <th>#</th>
                <th>Course Code</th>
                <th>Course Name</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $courses = $lecr->getCourseList($order);
            $i = 1;
            while ($course = $courses->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $i++ . "</td>";
                echo "<td>" . $course['course_code'] . "</td>";
                echo "<td>" . $course['course_name'] . "</td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
    <nav aria-label="Page navigation">
        <ul class="pagination justify-content-center">
            <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                <li class="page-item <?php echo ($i == $currentPage) ? 'active' : ''; ?>">
                    <a class="page-link" href="admin_dashboard.php?pageC=<?php echo $i; ?>"><?php echo $i; ?></a>
                </li>
            <?php endfor; ?>
        </ul>
    </nav>
</div>

<?php
include 'modal_register.php';
include 'include/footer.php';
?>