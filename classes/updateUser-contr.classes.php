<?php

class UpdateUserContr extends UpdateUser {
    // create the properties inside the class
    private $employee_ID;
    private $pwd;
    private $email;
    private $first_name;
    private $last_name;
    private $phone_number;
    private $employee_type;
    
    // pass through the variables from the form
    public function __construct($employee_ID, $pwd, $email, $first_name, $last_name, $phone_number, $employee_type)
    {
        // reference this property in this class
        $this->employee_ID = $employee_ID;
        $this->pwd = $pwd;
        $this->email = $email;
        $this->first_name = $first_name;
        $this->last_name = $last_name;
        $this->phone_number = $phone_number;
        $this->employee_type = $employee_type;
    }
    //updates user
    public function updateUser() {
        if(empty($this->employee_ID)) {
            header("location: ../index.php?error=emptyUSER");
            exit();
        }
        //sets user
        $this->setUser($this->employee_ID, $this->pwd, $this->email, $this->first_name, $this->last_name, $this->phone_number, $this->employee_type);
    }   
}