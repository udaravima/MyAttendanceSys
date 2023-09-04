<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="/js/color-modes.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <style>
        .global-box-override {
            box-sizing: border-box;
        }
    </style>
    <title>Document</title>
</head>

<body class="align-content-center py-4 bg-body-tertiary">
    <!-- Theme Setup -->
    <svg xmlns="http://www.w3.org/2000/svg" class="d-none">
        <symbol id="check2" viewBox="0 0 16 16">
            <path
                d="M13.854 3.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L6.5 10.293l6.646-6.647a.5.5 0 0 1 .708 0z" />
        </symbol>
        <symbol id="circle-half" viewBox="0 0 16 16">
            <path d="M8 15A7 7 0 1 0 8 1v14zm0 1A8 8 0 1 1 8 0a8 8 0 0 1 0 16z" />
        </symbol>
        <symbol id="moon-stars-fill" viewBox="0 0 16 16">
            <path
                d="M6 .278a.768.768 0 0 1 .08.858 7.208 7.208 0 0 0-.878 3.46c0 4.021 3.278 7.277 7.318 7.277.527 0 1.04-.055 1.533-.16a.787.787 0 0 1 .81.316.733.733 0 0 1-.031.893A8.349 8.349 0 0 1 8.344 16C3.734 16 0 12.286 0 7.71 0 4.266 2.114 1.312 5.124.06A.752.752 0 0 1 6 .278z" />
            <path
                d="M10.794 3.148a.217.217 0 0 1 .412 0l.387 1.162c.173.518.579.924 1.097 1.097l1.162.387a.217.217 0 0 1 0 .412l-1.162.387a1.734 1.734 0 0 0-1.097 1.097l-.387 1.162a.217.217 0 0 1-.412 0l-.387-1.162A1.734 1.734 0 0 0 9.31 6.593l-1.162-.387a.217.217 0 0 1 0-.412l1.162-.387a1.734 1.734 0 0 0 1.097-1.097l.387-1.162zM13.863.099a.145.145 0 0 1 .274 0l.258.774c.115.346.386.617.732.732l.774.258a.145.145 0 0 1 0 .274l-.774.258a1.156 1.156 0 0 0-.732.732l-.258.774a.145.145 0 0 1-.274 0l-.258-.774a1.156 1.156 0 0 0-.732-.732l-.774-.258a.145.145 0 0 1 0-.274l.774-.258c.346-.115.617-.386.732-.732L13.863.1z" />
        </symbol>
        <symbol id="sun-fill" viewBox="0 0 16 16">
            <path
                d="M8 12a4 4 0 1 0 0-8 4 4 0 0 0 0 8zM8 0a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 0zm0 13a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 13zm8-5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2a.5.5 0 0 1 .5.5zM3 8a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2A.5.5 0 0 1 3 8zm10.657-5.657a.5.5 0 0 1 0 .707l-1.414 1.415a.5.5 0 1 1-.707-.708l1.414-1.414a.5.5 0 0 1 .707 0zm-9.193 9.193a.5.5 0 0 1 0 .707L3.05 13.657a.5.5 0 0 1-.707-.707l1.414-1.414a.5.5 0 0 1 .707 0zm9.193 2.121a.5.5 0 0 1-.707 0l-1.414-1.414a.5.5 0 0 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .707zM4.464 4.465a.5.5 0 0 1-.707 0L2.343 3.05a.5.5 0 1 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .708z" />
        </symbol>
    </svg>

    <div class="dropdown position-fixed bottom-0 end-0 mb-3 me-3 bd-mode-toggle">
        <button class="btn btn-bd-primary py-2 dropdown-toggle d-flex align-items-center" id="bd-theme" type="button"
            aria-expanded="false" data-bs-toggle="dropdown" aria-label="Toggle theme (auto)">
            <svg class="bi my-1 theme-icon-active" width="1em" height="1em">
                <use href="#circle-half"></use>
            </svg>
            <span class="visually-hidden" id="bd-theme-text">Toggle theme</span>
        </button>
        <ul class="dropdown-menu dropdown-menu-end shadow" aria-labelledby="bd-theme-text">
            <li>
                <button type="button" class="dropdown-item d-flex align-items-center" data-bs-theme-value="light"
                    aria-pressed="false">
                    <svg class="bi me-2 opacity-50 theme-icon" width="1em" height="1em">
                        <use href="#sun-fill"></use>
                    </svg>
                    Light
                    <svg class="bi ms-auto d-none" width="1em" height="1em">
                        <use href="#check2"></use>
                    </svg>
                </button>
            </li>
            <li>
                <button type="button" class="dropdown-item d-flex align-items-center" data-bs-theme-value="dark"
                    aria-pressed="false">
                    <svg class="bi me-2 opacity-50 theme-icon" width="1em" height="1em">
                        <use href="#moon-stars-fill"></use>
                    </svg>
                    Dark
                    <svg class="bi ms-auto d-none" width="1em" height="1em">
                        <use href="#check2"></use>
                    </svg>
                </button>
            </li>
            <li>
                <button type="button" class="dropdown-item d-flex align-items-center active" data-bs-theme-value="auto"
                    aria-pressed="true">
                    <svg class="bi me-2 opacity-50 theme-icon" width="1em" height="1em">
                        <use href="#circle-half"></use>
                    </svg>
                    Auto
                    <svg class="bi ms-auto d-none" width="1em" height="1em">
                        <use href="#check2"></use>
                    </svg>
                </button>
            </li>
        </ul>
    </div>

    <script>
        function toggleFields() {
            var userType = document.getElementById("user_role").value;
            var studentFields = document.getElementById("std_fields");
            var lecturerFields = document.getElementById("lecr_fields");

            studentFields.classList.add("d-none");
            lecturerFields.classList.add("d-none");

            if (userType == 3) {
                studentFields.classList.remove("d-none");
            } else if (userType == 2 || userType == 1) {
                lecturerFields.classList.remove("d-none");
            }

        }
    </script>
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#reg_user">
        Launch demo modal
    </button>
    <!-- Reg User Modal -->
    <div class="modal fade" tabindex="-1" id="reg_user">
        <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content rounded shadow">
                <div class="modal-header">
                    <h5 class="modal-title">User Registration</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="" method="post">
                        <div class="form-group mt-3">
                            <label for="username">Username:</label>
                            <input type="text" class="form-control" id="username" name="username"
                                placeholder="2020csc000" required>
                        </div>
                        <div class="form-group mt-3">
                            <label for="password">Password:</label>
                            <input type="password" class="form-control" id="password" name="username"
                                placeholder="Password" required>
                        </div>
                        <div class="form-group mt-3">
                            <label for="password">Confirm Password:</label>
                            <input type="password" class="form-control" id="password" name="username"
                                placeholder="Confirm Password" required>
                        </div>
                        <div class="form-group mt-3">
                            <label for="user_role">User Role:</label>
                            <select name="user_role" id="user_role" class="form-control" onchange="toggleFields()">
                                <option value='3' selected>Student</option>
                                <option value='2'>Lecturer</option>
                                <option value='1'>Instructor</option>
                            </select>
                        </div>
                        <!-- std fields -->
                        <div class="d-none" id="std_fields">
                            <!-- <div class="form-floating">
                            <input type="text" class="form-control" id="std_regNo" name="std_regNo"
                                placeholder="2020csc000" required>
                            <label for="std_regNo">Student Reg No</label>
                        </div> -->

                            <!-- std_index -->
                            <div class="form-group mt-3">
                                <label for="std_index">Student Index:</label>
                                <input type="text" class="form-control" id="std_index" name="std_index" required>
                            </div>
                            <!-- std_regno -->
                            <div class="form-group mt-3">
                                <label for="std_regno">Student Registration Number:</label>
                                <input type="text" class="form-control" id="std_regno" name="std_regno" required>
                            </div>
                            <!-- std_fullname -->
                            <div class="form-group mt-3">
                                <label for="std_fullname">Full Name:</label>
                                <input type="text" class="form-control" id="std_fullname" name="std_fullname">
                            </div>
                            <!-- std_gender -->
                            <div class="form-group mt-3">
                                <label for="std_gender">Gender:</label>
                                <select class="form-control" id="std_gender" name="std_gender">
                                    <option value="1">Male</option>
                                    <option value="0">Female</option>
                                </select>
                            </div>
                            <!-- std_batchno -->
                            <div class="form-group mt-3">
                                <label for="std_batchno">Batch Number:</label>
                                <input type="text" class="form-control" id="std_batchno" name="std_batchno">
                            </div>
                            <!-- dgree_program -->
                            <div class="form-group mt-3">
                                <label for="dgree_program">Degree Program:</label>
                                <input type="text" class="form-control" id="dgree_program" name="dgree_program">
                            </div>
                            <!-- std_subjectcomb -->
                            <div class="form-group mt-3">
                                <label for="std_subjectcomb">Subject Combination:</label>
                                <input type="text" class="form-control" id="std_subjectcomb" name="std_subjectcomb">
                            </div>
                            <!-- std_nic -->
                            <div class="form-group mt-3">
                                <label for="std_nic">NIC:</label>
                                <input type="text" class="form-control" id="std_nic" name="std_nic">
                            </div>
                            <!-- std_dob -->
                            <div class="form-group mt-3">
                                <label for="std_dob">Date of Birth:</label>
                                <input type="date" class="form-control" id="std_dob" name="std_dob">
                            </div>
                            <!-- date_admission -->
                            <div class="form-group mt-3">
                                <label for="date_admission">Date of Admission:</label>
                                <input type="date" class="form-control" id="date_admission" name="date_admission">
                            </div>
                            <!-- current_address -->
                            <div class="form-group mt-3">
                                <label for="current_address">Current Address:</label>
                                <input type="text" class="form-control" id="current_address" name="current_address">
                            </div>
                            <!-- permanent_address -->
                            <div class="form-group mt-3">
                                <label for="permanent_address">Permanent Address:</label>
                                <input type="text" class="form-control" id="permanent_address" name="permanent_address">
                            </div>
                            <!-- mobile_tp_no -->
                            <div class="form-group mt-3">
                                <label for="mobile_tp_no">Mobile Phone Number:</label>
                                <input type="tel" class="form-control" id="mobile_tp_no" name="mobile_tp_no">
                            </div>
                            <!-- home_tp_no -->
                            <div class="form-group mt-3">
                                <label for="home_tp_no">Home Phone Number:</label>
                                <input type="tel" class="form-control" id="home_tp_no" name="home_tp_no">
                            </div>
                            <!-- std_email -->
                            <div class="form-group mt-3">
                                <label for="std_email">Email:</label>
                                <input type="email" class="form-control" id="std_email" name="std_email">
                            </div>
                            <!-- std_profile_pic -->
                            <div class="form-group mt-3">
                                <label for="std_profile_pic">Profile Picture:</label>
                                <input type="file" class="form-control-file" id="std_profile_pic"
                                    name="std_profile_pic">
                            </div>
                            <!-- current_level -->
                            <div class="form-group mt-3">
                                <label for="current_level">Current Level:</label>
                                <input type="text" class="form-control" id="current_level" name="current_level">
                            </div>
                        </div>

                        <!-- lecr Fields -->
                        <div id="lecr_fields" class="d-none">
                            <!-- lecr_nic -->
                            <div class="form-group mt-3">
                                <label for="lecr_nic">NIC:</label>
                                <input type="text" class="form-control" id="lecr_nic" name="lecr_nic" required>
                            </div>
                            <!-- lecr_name -->
                            <div class="form-group mt-3">
                                <label for="lecr_name">Full Name:</label>
                                <input type="text" class="form-control" id="lecr_name" name="lecr_name">
                            </div>
                            <!-- lecr_mobile -->
                            <div class="form-group mt-3">
                                <label for="lecr_mobile">Mobile Phone Number:</label>
                                <input type="tel" class="form-control" id="lecr_mobile" name="lecr_mobile" required>
                            </div>
                            <!-- lecr_email -->
                            <div class="form-group mt-3">
                                <label for="lecr_email">Email:</label>
                                <input type="email" class="form-control" id="lecr_email" name="lecr_email" required>
                            </div>
                            <!-- lecr_gender -->
                            <div class="form-group mt-3">
                                <label for="lecr_gender">Gender:</label>
                                <select class="form-control" id="lecr_gender" name="lecr_gender">
                                    <option value="1">Male</option>
                                    <option value="0">Female</option>
                                </select>
                            </div>
                            <!-- lecr_address -->
                            <div class="form-group mt-3">
                                <label for="lecr_address">Address:</label>
                                <input type="text" class="form-control" id="lecr_address" name="lecr_address">
                            </div>
                            <!-- lecr_profile_pic -->
                            <div class="form-group mt-3">
                                <label for="lecr_profile_pic">Profile Picture:</label>
                                <input type="file" class="form-control-file" id="lecr_profile_pic"
                                    name="lecr_profile_pic">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"
                                id="close">Close</button>
                            <button type="submit" class="btn btn-primary" name="register"
                                id="register">Register</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous">
        </script>
</body>

</html>