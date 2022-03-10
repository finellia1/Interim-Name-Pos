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
        $this->getUser($this->employee_ID, $this->pwd);
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