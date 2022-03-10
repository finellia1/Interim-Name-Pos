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
        $this->getUser($this->employee_ID, $this->pwd);
    }

}

