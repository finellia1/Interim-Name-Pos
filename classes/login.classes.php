<?php
class Login extends Dbh {
    protected function getUser($employee_ID, $pwd) {
        $stmt = $this->connect()->prepare('SELECT pwd FROM employee WHERE employee_ID = ? OR email=?;');

        if(!$stmt->execute(array($employee_ID, $pwd))) {
            $stmt = null;
            header('location: ../index.php?error=stmtfailed');
            exit();
        }

        if($stmt->rowCount() == 0) {
            $stmt = null;
            header("location: ../index.php?error=usernotfound");
            exit();
        }

        $pwdHashed = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $checkPwd = password_verify($pwd, $pwdHashed[0]["pwd"]); // returns a true or false value

        if($checkPwd == false) {
            $stmt = null;
            header("location: ../index.php?error=wrongpassword");
            exit();
        } elseif($checkPwd == true) {
            $stmt = $this->connect()->prepare('SELECT * FROM employee WHERE employee_ID = ? OR email=? AND pwd = ?;');

            if(!$stmt->execute(array($employee_ID, $employee_ID, $pwd))) {
                $stmt = null;
                header("location: ../index.php?error=stmtfailed");
                exit();
            }

            if($stmt->rowCount() == 0) {
                $stmt = null;
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