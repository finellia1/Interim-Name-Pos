<?php

class employeeAddContr extends employeeAdd {
    // create the properties inside the class
    private $employee_ID;
    private $security_ID_fk;
    private $pwd;
    private $confirmpwd;
    private $email;
    private $first_name;
    private $last_name;
    // private $phone_number;
    private $job_title;

    // pass through the variables from the form
    public function __construct($employee_ID, $pwd, $confirmpwd, $email, $first_name, $last_name, $job_title)
    {
        // reference this property in this class
        $this->employee_ID = $employee_ID;
        $this->security_ID_fk = 1;
        $this->pwd = $pwd;
        $this->confirmpwd = $confirmpwd;
        $this->email = $email;
        $this->first_name = $first_name;
        $this->last_name =$last_name;
        // $this->phone_number = $phone_number;
        $this->job_title = $job_title;
    }
    //error handling, sets user
    public function employeeAdd() {
        if($this->emptyInput() == false) {
            header("location: ../index.php?error=emptyinput");
            exit();
        }
        if($this->invalidemployee_ID() == false) {
            header("location: ../index.php?error=username");
            exit();
        }
        if($this->invalidEmail() == false) {
            header("location: ../index.php?error=email");
            exit();
        }
        if($this->pwdMatch() == false) {
            header("location: ../index.php?error=passwordmatch");
            exit();
        }
        if($this->duplicateUser() == false) {
            header("location: ../index.php?error=useroremailtaken");
            exit();
        }
        $this->security_ID_fk = $this->setSecurity();
        //sets user
        $this->setUser($this->employee_ID, $this->security_ID_fk, $this->pwd, $this->confirmpwd, $this->email, $this->first_name, $this->last_name, $this->job_title);
    }

    // error handling using methods

    // bool
    private function emptyInput() {
        $result;

        if(empty($this->employee_ID) || empty($this->pwd) || empty($this->confirmpwd) || empty($this->email) || empty($this->first_name) || empty($this->last_name) || empty($this->job_title)) {
            $result = false;
        } else {
            $result = true;
        }

        return $result;
    }

    // bool
    private function invalidemployee_ID() {
        $result;
        if(!preg_match("/^[a-zA-Z0-9]*$/", $this->employee_ID)){
            $result = false;
        } else {
            $result = true;
        }

        return $result;
    }

    // bool
    private function invalidEmail() {
        $result;
        if(!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
            $result = false;
        } else {
            $result = true;
        }

        return $result;
    }

    // checks that the pwd and confirmpwd match, bool
    private function pwdMatch() {
        $result;
        if ($this->pwd !== $this->confirmpwd) {
            $result = false;
        } else {
            $result = true;
        }

        return $result;
    }

        //bool
    private function duplicateUser() {
        $result;
        if(!$this->checkUser($this->employee_ID, $this->email)) {
            $result = false;
        } else {
            $result = true;
        }
        return $result;
    }

            //returns security code
    private function setSecurity() { 
        $result;
        if($this->job_title == "Admin") { 
            $result = 0;                    // Temporary!!!
        } else if($this->job_title == "Manager") { 
            $result = 1;                    // Temporary!!!
        } else if($this->job_title == "Tech") { 
            $result = 2;                    // Temporary!!!
        } else {
            $result = 0; 
        }
        return $result;
    }
}