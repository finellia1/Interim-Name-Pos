<?php
//starts session

session_start();
//functions for login
class Login extends Dbh {
    //connects to db, prepares and executes $stmt, compares pwd to pwdHashed, logs in
    protected function getUser($employee_ID, $pwd) {
        $stmt = $this->connect()->prepare('SELECT pwd FROM employee WHERE employee_ID = ? OR email=?;');

        if(!$stmt->execute(array($employee_ID, $pwd))) {
            $stmt = null;
            $_SESSION["loginErrorMsg"] = "Failed login;";
            header('location: ../index.php?error=stmtfailed');
            exit();
        }

        if(empty($employee_ID) || empty($pwd)){
            if(empty($employee_ID)){
                $_SESSION["loginErrorMsg"] = "Please enter username";
            }else{
                $_SESSION["loginErrorMsg"] = "Please enter password";
            }
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
        //checks if pwd and pwdHashed match
        if($checkPwd == false) {
            $stmt = null;
            $_SESSION["loginErrorMsg"] = "Wrong password; Please try again";
            header("location: ../index.php?error=wrongpassword");
            exit();
        } elseif($checkPwd == true) {
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

        if($stmt->rowCount() == 0) {
            $stmt = null;
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