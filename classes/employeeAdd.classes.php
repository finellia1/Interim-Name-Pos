<?php
//functions to register user
class employeeAdd extends Dbh {
    //connects to db, prepares and executes $stmt, checks pwd against pwdHashed, adds entry to db
    protected function setUser($employee_ID, $security_ID_fk, $pwd, $confirmpwd, $email, $first_name, $last_name, $job_title) {
        $stmt = $this->connect()->prepare('INSERT INTO employee (employee_ID, security_ID_fk, pwd, email, first_name, last_name, job_title) VALUES (?,?,?,?,?,?,?);');
        
        $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);

        if(!$stmt->execute(array($employee_ID, $security_ID_fk, $hashedPwd, $email, $first_name, $last_name, $job_title))) {
            $stmt = null;
            header('location: ../index.php?error=stmtfailedemployeeAdd.classes ln 11');
            exit();
        }
        $stmt = null;
    }

    // check if the username or email are already in use
    protected function checkUser($employee_ID, $email) {
        $stmt = $this->connect()->prepare('SELECT employee_ID FROM employee WHERE employee_ID = ? OR email = ?;');
        if(!$stmt->execute(array($employee_ID, $email))) {
            $stmt = null;
            header("location: ../index.php?error=stmtfailedemployeeAdd.classes line 23");
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