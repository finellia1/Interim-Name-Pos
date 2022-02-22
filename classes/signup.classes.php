<?php

class Signup extends Dbh {

    protected function setUser($employee_ID, $pwd, $confirmpwd, $email, $first_name, $last_name, $phone_number, $employee_type) {
        $stmt = $this->connect()->prepare('INSERT INTO employee (employee_ID, pwd, email, first_name, last_name, phone_number, employee_type) VALUES (?,?,?,?,?,?,?);');

        $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);

        if(!$stmt->execute(array($employee_ID, $hashedPwd, $email, $first_name, $last_name, $phone_number, $employee_type))) {
            $stmt = null;
            header('location: ../index.php?error=stmtfailed');
            exit();
        }
        $stmt = null;
    }

    // check if the username or email are already in use
    protected function checkUser($employee_ID, $email) {
        $stmt = $this->connect()->prepare('SELECT employee_ID FROM employee WHERE employee_ID = ? OR email = ?;');
        if(!$stmt->execute(array($employee_ID, $email))) {
            $stmt = null;
            header("location: ../index.php?error=stmtfailed");
            exit();
        }

        $resultcheck;
        if($stmt->rowCount() > 0) {
            $resultcheck = false;
        } else {
            $resultcheck = true;
        }
        return $resultcheck;
    }
}