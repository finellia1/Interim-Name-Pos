<?php

class updateUserContr extends updateUser {
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
    }
    //updates user
    public function updateUsers() {
        if(empty($this->employee_ID)) {
            header("location: ../index.php?error=emptyUSER");
            exit();
        }
        //sets user
        $this->updateUser($this->employee_ID, $this->security_type, $this->pwd, $this->job_title, $this->first_name, $this->last_name, $this->email, $this->hourly_salary, $this->yearly_salary);
    }   
}