<?php

class LoginContr extends Login {
    // create the properties inside the class
    private $employee_ID;
    private $pwd;

    // pass through the variables from the form
    public function __construct($employee_ID, $pwd)
    {
        // reference this property in this class
        $this->employee_ID = $employee_ID;
        $this->pwd = $pwd;
    }
    //logs in
    public function loginUser() {
        if($this->emptyInput() == false) {
            header("location: ../index.php?error=emptyinput");
            exit();
        }
        //gets user
<<<<<<< HEAD
        $this->getUser($this->employee_ID, $this->pwd);
=======

        $this->getUser($this->email, $this->pwd);
>>>>>>> 0092fa73903870bf672aeb2bb53b762717526e32
    }
    //bool
    private function emptyInput() {
        $result;
        if(empty($this->employee_ID) || empty($this->pwd)) {
            $result = false;
        } else {
            $result = true;
        }
        return $result;
    }
}