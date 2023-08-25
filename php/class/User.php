<?php
class User
{
    private $userTable = 'uoj_user';
    private $lecrTable = 'uoj_lecturer';
    private $stdTable = 'uoj_student';
    private $conn;
    private $password;
    private $username;
    private $loginMessage;

    private $default_picture = ''; //Set the location of default profile


    public function __construct($db)
    {
        $this->conn = $db;
        $this->loginMessage = '';
    }

    public function setPassword($password) //$user->setPassword($_POST[""]);
    {
        $this->password = $password;
    }

    public function setUsername($username)
    {
        $this->username = $username;
    }

    public function getLoginMessage()
    {
        return $this->loginMessage;
    }

    public function setLoginMessage($Message)
    {
        $this->loginMessage = $Message;
    }

    public function processNameInitials($fullName)
    {
        // Processing Name with Initial
        $nameParts = explode(" ", $fullName);
        $processedName = '';
        foreach ($nameParts as $index => $namePart) {
            if ($index === count($nameParts) - 1) {
                $processedName .= $namePart . ".";
            } else {
                $processedName .= substr($namePart, 0, 1) . ". ";
            }
        }
        return $processedName;
    }

    public function login()
    {
        if ($this->username && $this->password) {
            //Retrieving User
            $getUserQuery = "SELECT * FROM " . $this->userTable . " WHERE username = ?";
            $stmt = $this->conn->prepare($getUserQuery);
            $stmt->bind_param('s', $this->username);
            $stmt->execute();
            $result = $stmt->get_result();
            if ($result->num_rows > 0) {
                $user = $result->fetch_assoc();
                // if (!($user['user_session'])) {
                    if (password_verify($this->password . $user['user_salt'], $user['user_password'])) {
                        if ($user['user_status'] == 1) {
                            $_SESSION["user_id"] = $user['user_id'];
                            $_SESSION["user_role"] = $user['user_role'];
                            // $this->setSessionStatus(true);
                            return true;
                        } else {
                            $this->loginMessage = "Account is not Active or Pending Review!";
                            return false; // Message if user has not active or pending
                        }
                    } else {
                        return false; // Password Incorrect!
                    }
                // } else {
                    // $this->loginMessage = "User is already logged in.";
                    // return false;
                // }
            } else {
                $this->loginMessage = "Username or Password Invalid!";
                return false; // Message if username is incorrect!
            }
        } else {
            return false; // Message if username or password is empty!
        }

    }
    public function setSessionStatus($status)
    {
        $query = "UPDATE $this->userTable SET user_session = " . (($status) ? 1 : 0) . " WHERE user_id= ?" . $_SESSION['user_id'];
        if ($this->conn->query($query) === TRUE) {
            return true;
        } else {
            return false;
        }
    }

    // public function getUserDetails()
    // {
    //     $user = array();
    //     if (!empty($_SESSION["user_role"]) && $_SESSION["user_role"] == 0 || $_SESSION["user_role"] == 1 || $_SESSION["user_role"] == 2) {
    //         $table = 'uoj_lecturer';
    //         $query = "SELECT $table.lecr_name, $table.lecr_profile_pic FROM $table, $this->userTable  -- We have a Better Way
    //         WHERE $this->userTable.user_id = $table.user_id AND $this->userTable.user_id = ?";
    //         $stmt = $this->conn->prepare($query);
    //         $stmt->bind_param("i", $_SESSION["user_id"]);
    //         $stmt->execute();
    //         $result = $stmt->get_result();
    //         if ($result->num_rows > 0) {
    //             $user = $result->fetch_assoc();
    //         } else {
    //             // if(admin || lecr || instructor has no data)
    //         }
    //     } else if (!empty($_SESSION["user_role"]) && $_SESSION["user_role"] == 3) {
    //         $table = 'uoj_student';
    //         $query = "SELECT $table.std_fullname, $table.std_profile_pic FROM $table, $this->userTable WHERE $table.user_id = $this->userTable.user_id AND $this->userTable.user_id= ?";
    //         $stmt = $this->conn->prepare($query);
    //         $stmt->bind_param("i", $_SESSION["user_id"]);
    //         $stmt->execute();
    //         $result = $stmt->get_result();
    //         if ($result->num_rows > 0) {
    //             $user = $result->fetch_assoc();
    //         } else {
    //             // if (student has no data)
    //         }
    //     }
    //     return $user;
    // }

    public function retrieveUserDetails($userId, $userRole)
    {
        $userTable = $this->userTable;
        $table = ($userRole >= 0 && $userRole < 3) ? $this->lecrTable : $this->stdTable;
        $query = "SELECT users.user_id, urd.* , users.user_role, users_user_status FROM $table as urd INNER JOIN $userTable as users ON urd.user_id = users.user_id WHERE users.user_id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param('i', $userId);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            return ($result->fetch_assoc());
        } else {
            return false;
        }
    }
    //$user = $result->fetch_assoc();
    //$user["user_id"]
    public function isLoggedIn()
    {
        if (empty($_SESSION["user_id"])) {
            return false;
        } else {
            return true;
        }
    }

    public function isAdmin()
    {
        if (!empty($_SESSION["user_role"]) && $_SESSION["user_role"] == 0) {
            return true;
        } else {
            return false;
        }
    }
    public function isLecturer()
    {
        if (!empty($_SESSION["user_role"]) && $_SESSION["user_role"] == 1) {
            return true;
        } else {
            return false;
        }
    }
    public function isInstructor()
    {
        if (!empty($_SESSION["user_role"]) && $_SESSION["user_role"] == 2) {
            return true;
        } else {
            return false;
        }
    }
    public function isStudent()
    {
        if (!empty($_SESSION["user_role"]) && $_SESSION["user_role"] == 3) {
            return true;
        } else {
            return false;
        }
    }
    public function listStaffUsers()
    {

    }

    public function getStudentDetails()
    {
        $query = "SELECT users.user_id, std.*, users.user_role, users.user_status FROM $this->stdTable as std INNER JOIN $this->userTable as users ON users.user_id = std.user_id ";
        //TODO: Add order by
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $results = $stmt->get_result();
        while ($user = $results->fetch_assoc()) {
            // TODO: Something with data!!
        }
    }
    public function getLecturerDetails()
    {
        $query = "SELECT users.user_id, lecr.*, users.user_role, users.user_status FROM $this->lecrTable as lecr INNER JOIN $this->userTable as users ON users.user_id = lecr.user_id ";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $results = $stmt->get_result();
        while ($user = $results->fetch_assoc()) {
            // TODO: Do Something with data!!
        }
    }
    public function insert()
    {
        // if($_POST["user_role"] == 1){
        //     $query = "INSERT INTO $this->userTable(username, user_password, user_salt, user_role) VALUES(?,?,?,?)";
        //     $stmt = $this->conn->prepare($query);
        //     $stmt
        // }
        // // $query = "INSERT INTO $this->userTable"
    }

    public function update()
    {

    }

    public function delete($user_id)
    {
        $userTable = $this->userTable;
        $query = "DELETE FROM $userTable WHERE user_id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("i", $user_id);
        $stmt->execute();
    }
}