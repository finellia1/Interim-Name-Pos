<?php

if(isset($_POST["submit"])) 
{
    // grab the data from signup form
    $employee_ID = $_POST["employee_ID"];
    $pwd = $_POST["pwd"];
    $confirmpwd = $_POST["confirmpwd"];
    $email = $_POST["email"];
    $first_name = $_POST["first_name"];
    $last_name = $_POST["last_name"];
    $phone_number = $_POST["phone_number"];
    $employee_type = $_POST["employee_type"];

    // instantiate signupContr class
    include "../classes/dbh.classes.php";
    include "../classes/signup.classes.php";
    include "../classes/signup-contr.classes.php";
    $signup = new SignupContr($employee_ID, $pwd, $confirmpwd, $email, $first_name, $last_name, $phone_number, $employee_type);
    // running error handlers and user signup
    $signup-> signupUser();
    // going back to front page
    header("location: ../index.php?error=EMPLOYEE ADDED");
}

