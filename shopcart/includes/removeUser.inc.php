<?php
//gets data from form, creates removeUser Object, passes to removeUser()
if(isset($_POST["submit"])) 
{
    // grab the data from form
    $employee_ID = $_POST["employee_ID"];

    // instantiate classes
    include "../classes/dbh.classes.php";
    include "../classes/removeUser.classes.php";
    include "../classes/removeUser-contr.classes.php";
        //create object
    $removeUser = new removeUserContr($employee_ID);
    // removing user
    $removeUser-> checkUser();
    // going back to front page
    header("location: ../index.php?error=EMPLOYEE REMOVED");
}