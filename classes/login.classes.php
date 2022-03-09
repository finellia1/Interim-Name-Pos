<?php
session_start();
<<<<<<< Updated upstream
if (isset($_SESSION["loginErrorFlag"])){
    $_SESSION["loginErrorFlag"] = 0;
}
if (isset($_SESSION["loginErrorMsg"])){
    $_SESSION["loginErrorMsg"] = "";
}
=======
//functions for login
class Login extends Dbh {
>>>>>>> Stashed changes

class Login extends Dbh {
    protected function getUser($employee_ID, $pwd) {
        $stmt = $this->connect()->prepare('SELECT pwd FROM employee WHERE employee_ID = ? OR email=?;');

        if(!$stmt->execute(array($employee_ID, $pwd))) {
            $stmt = null;
            $_SESSION["loginErrorMsg"] = "Failed login;";
            header('location: ../index.php?error=stmtfailed');
            exit();
        }

        if(empty($employee_ID) || empty($pwd)){
            $_SESSION["loginErrorFlag"] = 1;
            $_SESSION["loginErrorMsg"] = "Please enter username and password";
            header("location: ../index.php?error=emptyInput");
            exit();
        }

        if($stmt->rowCount() == 0) {
            $stmt = null;
            $_SESSION["loginErrorMsg"] = "Username not found; Please try again";
            header("location: ../index.php?error=usernotfound");
            exit();
        }

        $pwdHashed = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $checkPwd = password_verify($pwd, $pwdHashed[0]["pwd"]); // returns a true or false value

        if($checkPwd == false) {
            $stmt = null;
            $_SESSION["loginErrorMsg"] = "Wrong password; Please try again";
            header("location: ../index.php?error=wrongpassword");
            exit();
        } elseif($checkPwd == true) {
<<<<<<< Updated upstream
            $stmt = $this->connect()->prepare('SELECT * FROM employee WHERE employee_ID = ? OR email=? AND pwd = ?;');

        if(!$stmt->execute(array($employee_ID, $employee_ID, $pwd))) {
            $stmt = null;
            $_SESSION["loginErrorFlag"] = 1;
            $_SESSION["loginErrorMsg"] = "Failed login;";
            header("location: ../index.php?error=stmtfailed");
            exit();
        }
=======
            $stmt = $this->connect()->prepare('SELECT * FROM employee WHERE employee_ID = ? and pwd = ?;');
            //checks db for matching login info
            if(!$stmt->execute(array($employee_ID, $pwdHashed[0]["pwd"]))) {
                $stmt = null;
                $_SESSION["loginErrorMsg"] = "Something went wrong, please try again";
                //Come back, this might be wrong
                header("location: ../login.php?error=stmtfailed4");
                exit();
            }

            if($stmt->rowCount() == 0) {
                $stmt = null;
                $_SESSION["loginErrorMsg"] = "Username not found; Please try again";
                header("location: ../login.php?error=usernotfound2");
                exit();
            }
>>>>>>> Stashed changes

        if($stmt->rowCount() == 0) {
            $stmt = null;
            $_SESSION["loginErrorFlag"] = 1;
            $_SESSION["loginErrorMsg"] = "Username not found; Please try again";
            header("location: ../index.php?error=usernotfound");
            exit();
        }

        $employee = $stmt->fetchAll(PDO::FETCH_ASSOC);
        session_start();
        $_SESSION["first_name"] = $employee[0]["first_name"];
        $_SESSION["employee_ID"] = $employee[0]["employee_ID"];
    }

        $stmt = null;
    }
}