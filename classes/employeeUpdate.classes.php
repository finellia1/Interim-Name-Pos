<?php
//functions for updating Users
class updateUser extends Dbh {
    protected function updateUser($employee_ID, $security_type, $pwd, $job_title, $first_name, $last_name, $email, $hourly_salary, $yearly_salary) {
        $p_employee_ID = "'".$employee_ID."'";
        $p_security_type = "'".$security_type."'";
        $hashPass = password_hash($p_pwd, PASSWORD_DEFAULT);
        $p_pwd = "'".$hashPass."'";
        $p_job_title = "'".$job_title."'";
        $p_first_name = "'".$first_name."'";
        $p_last_name = "'".$last_name."'";
        $p_email = "'".$email."'";
        $p_hourly_salary = "'".$hourly_salary."'";
        $p_yearly_salary = "'".$yearly_salary."'";

        if(!empty($employee_ID)) {
            $stmt = $this->connect()->prepare("UPDATE employee SET employee_ID =$p_employee_ID  WHERE employee_ID = $employee_ID" );

            if(!$stmt->execute()) {
                $stmt = null;
                require_once("session.classes.php");
                session::start();
                session::set("homepageErrorMessage", "ERROR: PLEASE CONTACT IT classes/employeeUpdate.classes.php line 24");
                header('Location: ../homepage.php?failure');
                //Code taken from classes/login.classes.php
                exit();
            }
       }
       if(!empty($security_type)) {
        $stmt = $this->connect()->prepare("UPDATE employee SET security_type = $p_security_type WHERE employee_ID = $employee_ID" );

            if(!$stmt->execute()) {
                $stmt = null;
                require_once("session.classes.php");
                session::start();
                session::set("homepageErrorMessage", "ERROR: PLEASE CONTACT IT classes/employeeUpdate.classes.php line 36");
                header('Location: ../homepage.php?failure');
                //Code taken from classes/login.classes.php
                exit();
            }

        }
        if(!empty($pwd)) {
            $stmt = $this->connect()->prepare("UPDATE employee SET pwd = $p_pwd WHERE employee_ID = $employee_ID" );

            if(!$stmt->execute()) {
                $stmt = null;
                require_once("session.classes.php");
                session::start();
                session::set("homepageErrorMessage", "ERROR: PLEASE CONTACT IT classes/employeeUpdate.classes.php line 50");
                header('Location: ../homepage.php?failure');
                //Code taken from classes/login.classes.php                
                exit();
            }

       }
       if(!empty($job_title)) {
        $stmt = $this->connect()->prepare("UPDATE employee SET job_title = $p_job_title WHERE employee_ID = $employee_ID" );

            if(!$stmt->execute()) {
                $stmt = null;
                require_once("session.classes.php");
                session::start();
                session::set("homepageErrorMessage", "ERROR: PLEASE CONTACT IT classes/employeeUpdate.classes.php line 64");
                header('Location: ../homepage.php?failure');
                //Code taken from classes/login.classes.php
                exit();
            }

        }
        if(!empty($first_name)) {
            $stmt = $this->connect()->prepare("UPDATE employee SET first_name = $p_first_name WHERE employee_ID = $employee_ID" );


            if(!$stmt->execute()) {
                $stmt = null;
                require_once("session.classes.php");
                session::start();
                session::set("homepageErrorMessage", "ERROR: PLEASE CONTACT IT classes/employeeUpdate.classes.php line 79");
                header('Location: ../homepage.php?failure');
                //Code taken from classes/login.classes.php                
                exit();
            }

       }
       if(!empty($email)) {
        $stmt = $this->connect()->prepare("UPDATE employee SET email = $p_email WHERE employee_ID = $employee_ID" );


            if(!$stmt->execute()) {
                $stmt = null;
                require_once("session.classes.php");
                session::start();
                session::set("homepageErrorMessage", "ERROR: PLEASE CONTACT IT classes/employeeUpdate.classes.php line 94");
                header('Location: ../homepage.php?failure');
                //Code taken from classes/login.classes.php                
                exit();
            }

       }
       if(!empty($email)) {
        $stmt = $this->connect()->prepare("UPDATE employee SET hourly_salary = $p_hourly_salary WHERE employee_ID = $employee_ID" );


            if(!$stmt->execute()) {
                $stmt = null;
                require_once("session.classes.php");
                session::start();
                session::set("homepageErrorMessage", "ERROR: PLEASE CONTACT IT classes/employeeUpdate.classes.php line 109");
                header('Location: ../homepage.php?failure');
                //Code taken from classes/login.classes.php                
                exit();
            }

       }
       if(!empty($yearly_salary)) {
        $stmt = $this->connect()->prepare("UPDATE employee SET yearly_salary = $p_yearly_salary WHERE employee_ID = $employee_ID" );


            if(!$stmt->execute()) {
                $stmt = null;
                require_once("session.classes.php");
                session::start();
                session::set("homepageErrorMessage", "ERROR: PLEASE CONTACT IT classes/employeeUpdate.classes.php line 124");
                header('Location: ../homepage.php?failure');
                //Code taken from classes/login.classes.php                
                exit();
            }

       }
        $stmt = null;
    }
}