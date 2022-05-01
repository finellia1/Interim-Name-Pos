<?php
//functions to register user
class employeeAdd extends Dbh {
    //connects to db, prepares and executes $stmt, checks pwd against pwdHashed, adds entry to db
    protected function setUser($security_type, $pwd, $confirmpwd, $job_title, $first_name, $last_name, $email) {
        include_once '../classes/session.classes.php';
            
        session::start();
        $stmt = $this->connect()->prepare('INSERT INTO employee (security_type, pwd, job_title, first_name, last_name, email, is_inactive) VALUES (?,?,?,?,?,?,?);');
        $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);
        session::set("security_type3", $hashedPwd);
        
        session::set("security_type4", $pwd);

        if(!$stmt->execute(array($security_type, $hashedPwd, $job_title, $first_name, $last_name, $email, 0))) {   
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