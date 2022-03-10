<?php
require "../classes/session.classes.php";
session::start();
if(session::isSet("loggedInID")) {
    //gets data from form, creates updateUser Object, passes to updateUser()
    if(isset($_POST["submit"])) 
    {
        $employee_ID = $_POST["employee_ID"];
        $pwd = $_POST["pwd"];
        $email = $_POST["email"];
        $first_name = $_POST["first_name"];
        $last_name = $_POST["last_name"];
        $phone_number = $_POST["phone_number"];
        $employee_type = $_POST["employee_type"];

        // instantiate classes
        include "../classes/dbh.classes.php";
        include "../classes/updateUser.classes.php";
        include "../classes/updateUser-contr.classes.php";
            //create object
        $updateUser = new UpdateUserContr($employee_ID, $pwd, $email, $first_name, $last_name, $phone_number, $employee_type);
        //update User
        $updateUser-> updateUser();
        // going back to front page
        header("location: ../index.php?error=User UPDATED");
    }
} else {
    session::destroy();
    header("location: ../index.php?error=Not Logged In");
}