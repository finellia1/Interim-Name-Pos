<?php
//functions to register user
class employeeAdd extends Dbh {
    //connects to db, prepares and executes $stmt, checks pwd against pwdHashed, adds entry to db
    protected function setUser($employee_ID, $security_type, $pwd, $job_title, $first_name, $last_name, $email, $hourly_salary, $yearly_salary) {
        include_once '../classes/session.classes.php';
            
        session::start();
        $stmt = $this->connect()->prepare('INSERT INTO employee (security_type, pwd, job_title, first_name, last_name, email, hourly_salary, yearly_salary) VALUES (?,?,?,?,?,?,?,?);');
        $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);
        //session::set("security_type3", $hashedPwd);
        
        //session::set("security_type4", $pwd);

        if(!$stmt->execute(array($security_type, $hashedPwd, $job_title, $first_name, $last_name, $email, $hourly_salary, $yearly_salary))) {   
            $stmt = null;
            require_once("session.classes.php");
            session::start();
            session::set("homepageErrorMessage", "ERROR: PLEASE CONTACT IT classes/employeeAdd.classes.php line 20");
            header('Location: ../homepage.php?failure');
            //Code taken from classes/login.classes.php
            exit();
        }
        $stmt = null;
    }

    // check if the username or email are already in use
    protected function checkUser($employee_ID, $email) {
        $stmt = $this->connect()->prepare('SELECT employee_ID FROM employee WHERE employee_ID = ? OR email = ?;');
        if(!$stmt->execute(array($employee_ID, $email))) {
            $stmt = null;
            require_once("session.classes.php");
            session::start();
            session::set("homepageErrorMessage", "ERROR: PLEASE CONTACT IT classes/employeeAdd.classes.php line 35");
            header('Location: ../login.php?failure');
            //Code taken from classes/login.classes.php
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