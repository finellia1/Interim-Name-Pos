<?php
///gets data from form, creates login Object, passes to loginUser(), sets session
if(isset($_POST["submit"])) 
{
    // grab the data from login form
    $employee_ID = $_POST["employee_ID"];
    $pwd = $_POST["pwd"];

    // instantiate loginContr class
    require "../classes/dbh.classes.php";
    require "../classes/login.classes.php";
    require "../classes/login-contr.classes.php";
    require "../classes/session.classes.php";
        //create object
    $login = new LoginContr($employee_ID, $pwd);
    // logging in
    $login-> loginUser();
    //set session
    session::set("loggedInID", $employee_ID);

    header("location: ../index.php?error=LOGGED IN");
    // going back to front page
}
             