<?php
//functions to register user
class employeeAdd extends Dbh {
    protected function setUser($employee_ID, $security_type, $pwd, $job_title, $first_name, $last_name, $email, $hourly_salary, $yearly_salary) {
        include_once '../classes/session.classes.php';
            
        session::start();
    
        $stmt = $this->connect()->prepare('INSERT INTO employee (security_type, pwd, job_title, first_name, last_name, email, hourly_salary, yearly_salary) VALUES (?,?,?,?,?,?,?,?);');
        //Use password_hash to has the users password
        $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);

        //Execute the query
        if(!$stmt->execute(array($security_type, $hashedPwd, $job_title, $first_name, $last_name, $email, $hourly_salary, $yearly_salary))) {   
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