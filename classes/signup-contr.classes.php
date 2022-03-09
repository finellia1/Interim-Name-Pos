<?php
session_start();
if (isset($_SESSION["addUserFlag"])){
    $_SESSION["addUserFlag"] = 0;
}
if (isset($_SESSION["addUserErrorMsg"])){
    $_SESSION["addUserErrorMsg"] = "";
}
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

    public function signupUser() {
        if($this->emptyInput() == false) {
            //$_SESSION["addUserErrorMsg"] = "Empty Input";
            header("location: ../index.php?error=emptyinput");
            exit();
        }
        if($this->invalidemployee_ID() == false) {
            $_SESSION["addUserErrorMsg"] = "Invalid employee ID";
            header("location: ../index.php?error=username");
            exit();
        }
        if($this->invalidEmail() == false) {
            $_SESSION["addUserErrorMsg"] = "Invalid Email";
            header("location: ../index.php?error=email");
            exit();
        }
        if($this->pwdMatch() == false) {
            $_SESSION["addUserErrorMsg"] = "Invalid Password";
            header("location: ../index.php?error=passwordmatch");
            exit();
        }
        if($this->duplicateUser() == false) {
            $_SESSION["addUserErrorMsg"] = "Duplicate username or email";
            header("location: ../index.php?error=useroremailtaken");
            exit();
            //Should this be separate?
        }

        $this->setUser($this->employee_ID, $this->pwd, $this->confirmpwd, $this->email, $this->first_name, $this->last_name, $this->phone_number, $this->employee_type);
    }

    // error handling using methods

    // check if any of the fields are empty
    private function emptyInput() {
        $result;

        if(empty($this->employee_ID) || empty($this->pwd) || empty($this->confirmpwd) || empty($this->email) || empty($this->first_name) || empty($this->last_name) || empty($this->phone_number) || empty($this->employee_type)) {
            if(empty($this->employee_ID)) {$_SESSION["addUserErrorMsg"] = "Empty Employee ID";}
            else if(empty($this->pwd)) {$_SESSION["addUserErrorMsg"] = "Empty Password";}
            else if(empty($this->confirmpwd)) {$_SESSION["addUserErrorMsg"] = "Empty Confirm Password";}
            else if(empty($this->email)) {$_SESSION["addUserErrorMsg"] = "Empty Email";}
            else if(empty($this->first_name)) {$_SESSION["addUserErrorMsg"] = "Empty First Name";}
            else if(empty($this->last_name)) {$_SESSION["addUserErrorMsg"] = "Empty Last Name";}
            else if(empty($this->phone_number)) {$_SESSION["addUserErrorMsg"] = "Empty Phone Number";}
            else if(empty($this->employee)) {$_SESSION["addUserErrorMsg"] = "Empty Employee";}
            $result = false;
        } else {
            $result = true;
        }

        return $result;
    }

    // check that the username is valid
    private function invalidemployee_ID() {
        $result;
        if(!preg_match("/^[a-zA-Z0-9]*$/", $this->employee_ID)){
            $result = false;
        } else {
            $result = true;
        }

        return $result;
    }

    // checks for valid email
    private function invalidEmail() {
        $result;
        if(!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
            $result = false;
        } else {
            $result = true;
        }

        return $result;
    }

    // checks that the pwd and confirmpwd match
    private function pwdMatch() {
        $result;
        if ($this->pwd !== $this->confirmpwd) {
            $result = false;
        } else {
            $result = true;
        }

        return $result;
    }

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