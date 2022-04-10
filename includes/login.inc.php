<?php
///gets data from form, creates login Object, passes to loginUser(), sets session
if(isset($_POST["submit"])) 
{
    // grab the data from login form
    $email = $_POST["email"];
    $pwd = $_POST["pwd"];

    // instantiate loginContr class
    require "../classes/dbh.classes.php";
    require "../classes/login.classes.php";
    require "../classes/login-contr.classes.php";
    require "../classes/session.classes.php";
        //create object
    $login = new LoginContr($email, $pwd);
    // logging in
    $login-> loginUser();
    //set session
    session::set("loggedInID", $email);

    header("location: ../homepage.php?error=LOGGED IN");
    //Resets error message
    require_once("../classes/session.classes.php");
    session::start();
    session::set("errorMessage", "");
    // going back to front page
}
