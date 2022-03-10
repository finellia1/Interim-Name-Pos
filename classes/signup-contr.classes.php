<?php

class SignupContr extends Signup {
    // create the properties inside the class
    private $employee_ID;
    private $pwd;
    private $confirmpwd;
    private $email;
    private $first_name;
    private $last_name;
    private $phone_number;
    private $employee_type;

    // pass through the variables from the form
    public function __construct($employee_ID, $pwd, $confirmpwd, $email, $first_name, $last_name, $phone_number, $employee_type)
    {
        // reference this property in this class
        $this->employee_ID = $employee_ID;
        $this->pwd = $pwd;
        $this->confirmpwd = $confirmpwd;
        $this->email = $email;
        $this->first_name = $first_name;
        $this->last_name =$last_name;
        $this->phone_number = $phone_number;
        $this->employee_type = $employee_type;
    }
    //error handling, sets user
    public function signupUser() {
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
        //sets user
        $this->setUser($this->employee_ID, $this->pwd, $this->confirmpwd, $this->email, $this->first_name, $this->last_name, $this->phone_number, $this->employee_type);
    }

    // error handling using methods

    // bool
    private function emptyInput() {
        $result;

        if(empty($this->employee_ID) || empty($this->pwd) || empty($this->confirmpwd) || empty($this->email) || empty($this->first_name) || empty($this->last_name) || empty($this->phone_number) || empty($this->employee_type)) {
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
}