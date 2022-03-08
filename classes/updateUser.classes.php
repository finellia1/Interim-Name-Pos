<?php
session_start();
if (isset($_SESSION["updateUserErrorFlag"])){
    $_SESSION["updateUserErrorFlag"] = 0;
}
if (isset($_SESSION["updateUserErrorMsg"])){
    $_SESSION["updateUserErrorMsg"] = "";
}

//functions for updating Users
class updateUser extends Dbh {

    protected function setUser($employee_ID, $pwd, $email, $first_name, $last_name, $phone_number, $employee_type) {
        if(!empty($pwd)) {
            $stmt = $this->connect()->prepare("UPDATE employee SET pwd = $pwd WHERE employee_ID = $employee_ID" );

            if(!$stmt->execute(array($employee_ID, $pwd))) {
                $stmt = null;
                $_SESSION["updateUserErrorFlag"] = 1;
                $_SESSION["updateUserErrorMsg"] = "Statement failed!";
                header('location: ../index.php?error=stmtfailed');
                exit();
            }
       }
       if(!empty($email)) {
        $stmt = $this->connect()->prepare("UPDATE employee SET email = $name WHERE employee_ID = $employee_ID" );

            if(!$stmt->execute(array($employee_ID, $email))) {
                $stmt = null;
                $_SESSION["updateUserErrorFlag"] = 1;
                $_SESSION["updateUserErrorMsg"] = "Statement failed on email!";
                header('location: ../index.php?error=stmtfailedemail');
                exit();
            }

        }
        if(!empty($first_name)) {
            $stmt = $this->connect()->prepare("UPDATE employee SET first_name = $first_name WHERE employee_ID = $employee_ID" );

            if(!$stmt->execute(array($employee_ID, $first_name))) {
                $stmt = null;
                $_SESSION["updateUserErrorFlag"] = 1;
                $_SESSION["updateUserErrorMsg"] = "Statement failed on first name!";
                header('location: ../index.php?error=stmtfailedfirst_name');
                exit();
            }

       }
       if(!empty($last_name)) {
        $stmt = $this->connect()->prepare("UPDATE employee SET last_name = $last_name WHERE employee_ID = $employee_ID" );

            if(!$stmt->execute(array($employee_ID, $last_name))) {
                $stmt = null;
                $_SESSION["updateUserErrorFlag"] = 1;
                $_SESSION["updateUserErrorMsg"] = "Statement failed on last name!";
                header('location: ../index.php?error=stmtfailedlast_name');
                exit();
            }

        }
        if(!empty($phone_number)) {
            $stmt = $this->connect()->prepare("UPDATE employee SET phone_number = $phone_number WHERE employee_ID = $employee_ID" );


            if(!$stmt->execute(array($employee_ID, $phone_number))) {
                $stmt = null;
                $_SESSION["updateUserErrorFlag"] = 1;
                $_SESSION["updateUserErrorMsg"] = "Statement failed on phone number!";
                header('location: ../index.php?error=phone_number');
                exit();
            }

       }
       if(!empty($employee_type)) {
        $stmt = $this->connect()->prepare("UPDATE employee SET employee_type = $employee_type WHERE employee_ID = $employee_ID" );

            if(!$stmt->execute(array($employee_ID, $employee_type))) {
                $stmt = null;
                $_SESSION["updateUserErrorFlag"] = 1;
                $_SESSION["updateUserErrorMsg"] = "Statement failed on employee type!";
                header('location: ../index.php?error=employee_type');
                exit();
            }

       }
        $stmt = null;
    }
}