<?php

if(isset($_POST["submit"])) 
{
    // grab the data from login form
    $employee_ID = $_POST["employee_ID"];
    $pwd = $_POST["pwd"];

    // instantiate loginContr class
    include "../classes/dbh.classes.php";
    include "../classes/login.classes.php";
    include "../classes/login-contr.classes.php";
    $login = new LoginContr($employee_ID, $pwd);
    // running error handlers and user login
    $login-> loginUser();
    // going back to front page
    header("location: ../index.php?error=LOGGED IN");
}