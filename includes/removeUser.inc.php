<?php

if(isset($_POST["submit"])) 
{
    // grab the data from signup form
    $employee_ID = $_POST["employee_ID"];

    // instantiate signupContr class
    include "../classes/dbh.classes.php";
    include "../classes/removeUser.classes.php";
    include "../classes/removeUser-contr.classes.php";
    $removeUser = new removeUserContr($employee_ID);
    // running error handlers and user signup
    $removeUser-> checkUser();
    // going back to front page
    header("location: ../index.php?error=EMPLOYEE REMOVED");
}