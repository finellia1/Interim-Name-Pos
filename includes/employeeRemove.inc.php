<?php
//gets data from form, creates removeUser Object, passes to removeUser()
if(isset($_POST["submit"])) 
{
    // grab the data from form
    $email = $_POST["email"];

    // instantiate classes
    include "../classes/dbh.classes.php";
    include "../classes/employeeRemove.classes.php";
    include "../classes/employeeRemove-contr.classes.php";
        //create object
    $removeEmployee = new employeeRemoveContr($email);
    // removing user
    $removeEmployee-> checkEmployee();
    // going back to front page
    header("location: ../index.php?error=EMPLOYEE REMOVED");
}