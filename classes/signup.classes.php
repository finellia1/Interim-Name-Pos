<?php
//functions to register user
class Signup extends Dbh {
    //connects to db, prepares and executes $stmt, checks pwd against pwdHashed, adds entry to db
<<<<<<<< HEAD:classes/signup.classes.php
    protected function setUser($employee_ID, $pwd, $confirmpwd, $email, $first_name, $last_name, $phone_number, $employee_type) {
        $stmt = $this->connect()->prepare('INSERT INTO employee (employee_ID, pwd, email, first_name, last_name, phone_number, employee_type) VALUES (?,?,?,?,?,?,?);');
        
========
    protected function setUser($security_type, $pwd, $confirmpwd, $job_title, $first_name, $last_name, $email) {
        include_once '../classes/session.classes.php';
            
        session::start();
        $stmt = $this->connect()->prepare('INSERT INTO employee (security_type, pwd, job_title, first_name, last_name, email, is_inactive) VALUES (?,?,?,?,?,?,?);');
>>>>>>>> 0092fa73903870bf672aeb2bb53b762717526e32:classes/employeeAdd.classes.php
        $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);
        session::set("security_type3", $hashedPwd);
        
        session::set("security_type4", $pwd);

<<<<<<<< HEAD:classes/signup.classes.php
        if(!$stmt->execute(array($employee_ID, $hashedPwd, $email, $first_name, $last_name, $phone_number, $employee_type))) {
========
        if(!$stmt->execute(array($security_type, $hashedPwd, $job_title, $first_name, $last_name, $email, 0))) {   
>>>>>>>> 0092fa73903870bf672aeb2bb53b762717526e32:classes/employeeAdd.classes.php
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