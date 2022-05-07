<?php

class employeeAddContr extends employeeAdd {
    // create the properties inside the class
    private $employee_ID;
    private $security_type;
    private $pwd;
    private $job_title;
    private $first_name;
    private $last_name;
    private $email;
    private $hourly_salary;
    private $yearly_salary;

    // pass through the variables from the form
    public function __construct($employee_ID, $security_type, $pwd, $job_title, $first_name, $last_name, $email, $hourly_salary, $yearly_salary)
    {
        // reference this property in this class
        $this->employee_ID = $employee_ID;
        $this->security_type = $security_type;
        $this->pwd = $pwd;
        $this->job_title = $job_title;
        $this->first_name = $first_name;
        $this->last_name = $last_name;
        $this->email = $email;
        $this->hourly_salary = $hourly_salary;
        $this->yearly_salary = $yearly_salary;
        //session::start();
        // $this->phone_number = $phone_number;
    }
    //error handling, sets user
    public function employeeAdd() {
        $this->security_ID_fk = $this->setSecurity();
        //sets user

        $this->setUser($this->employee_ID, $this->security_type, $this->pwd, $this->job_title, $this->first_name, $this->last_name, $this->email, $this->hourly_salary, $this->yearly_salary);
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