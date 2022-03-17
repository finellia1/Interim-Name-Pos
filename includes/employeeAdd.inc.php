<?php
//gets data from form, creates signup Object, passes to signupUser()
if(isset($_POST["submit"])) 
{
    // grab the data from form
    $employee_ID = $_POST["employee_ID"];
    $pwd = $_POST["pwd"];
    $confirmpwd = $_POST["confirmpwd"];
    $email = $_POST["email"];
    $first_name = $_POST["first_name"];
    $last_name = $_POST["last_name"];
    //$phone_number = $_POST["phone_number"];
    $job_title = $_POST["job_title"];

    // instantiate classes
    include "../classes/dbh.classes.php";
    include "../classes/employeeAdd.classes.php";
    include "../classes/employeeAdd-contr.classes.php";
        //create object
    $newEmployee = new employeeAddContr($employee_ID, $pwd, $confirmpwd, $email, $first_name, $last_name, $job_title);
    // signing up user
    $newEmployee-> employeeAdd();
    // going back to front page
    header("location: ../index.php?error=EMPLOYEE ADDED");
}