<?php
//gets data from form, creates signup Object, passes to signupUser()
if(isset($_POST["submit"])) 
{
    // grab the data from form
    $employee_ID = "add";
    $security_type = $_POST["security_type"];
    $pwd = $_POST["password"];
    $job_title = $_POST["job_title"];
    $first_name = $_POST["first_name"];
    $last_name = $_POST["last_name"];
    $email = $_POST["email"];
    $hourly_salary = $_POST["hourly_salary"];
    $yearly_salary = $_POST["yearly_salary"];
    //$phone_number = $_POST["phone_number"];

    // instantiate classes
    include "../classes/dbh.classes.php";
    include "../classes/employeeAdd.classes.php";
    include "../classes/employeeAdd-contr.classes.php";
    //create object

    $newEmployee = new employeeAddContr($employee_ID, $security_type, $pwd, $job_title, $first_name, $last_name, $email, $hourly_salary, $yearly_salary);
    // signing up user
    $newEmployee-> employeeAdd();
    // going back to front page
    header("location: ../employees.php?error=EMPLOYEE ADDED");
}