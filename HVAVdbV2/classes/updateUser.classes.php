<?php
//functions for updating Users
class updateUser extends Dbh {

    protected function setUser($employee_ID, $pwd, $email, $first_name, $last_name, $phone_number, $employee_type) {
        if(!empty($pwd)) {
            $stmt = $this->connect()->prepare("UPDATE employee SET pwd = $pwd WHERE employee_ID = $employee_ID" );

            if(!$stmt->execute(array($employee_ID, $pwd))) {
                $stmt = null;
                header('location: ../index.php?error=stmtfailed');
                exit();
            }
       }
       if(!empty($email)) {
        $stmt = $this->connect()->prepare("UPDATE employee SET email = $name WHERE employee_ID = $employee_ID" );

            if(!$stmt->execute(array($employee_ID, $email))) {
                $stmt = null;
                header('location: ../index.php?error=stmtfailedemail');
                exit();
            }

        }
        if(!empty($first_name)) {
            $stmt = $this->connect()->prepare("UPDATE employee SET first_name = $first_name WHERE employee_ID = $employee_ID" );

            if(!$stmt->execute(array($employee_ID, $first_name))) {
                $stmt = null;
                header('location: ../index.php?error=stmtfailedfirst_name');
                exit();
            }

       }
       if(!empty($last_name)) {
        $stmt = $this->connect()->prepare("UPDATE employee SET last_name = $last_name WHERE employee_ID = $employee_ID" );

            if(!$stmt->execute(array($employee_ID, $last_name))) {
                $stmt = null;
                header('location: ../index.php?error=stmtfailed');
                exit();
            }

        }
        if(!empty($phone_number)) {
            $stmt = $this->connect()->prepare("UPDATE employee SET phone_number = $phone_number WHERE employee_ID = $employee_ID" );


            if(!$stmt->execute(array($employee_ID, $phone_number))) {
                $stmt = null;
                header('location: ../index.php?error=stmtfailed');
                exit();
            }

       }
       if(!empty($employee_type)) {
        $stmt = $this->connect()->prepare("UPDATE employee SET employee_type = $employee_type WHERE employee_ID = $employee_ID" );


            if(!$stmt->execute(array($employee_ID, $employee_type))) {
                $stmt = null;
                header('location: ../index.php?error=stmtfailed1');
                exit();
            }

       }
        $stmt = null;
    }
}