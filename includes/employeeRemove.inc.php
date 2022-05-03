<?php
//gets data from form, creates removeUser Object, passes to removeUser()
if(isset($_POST["submit"])) 
{
    // grab the data from form
    $product_ID = $_POST["PID"];

    // instantiate classes
    include "../classes/dbh.classes.php";
    include "../classes/employeeRemove.classes.php";
    include "../classes/employeeRemove-contr.classes.php";
        //create object
    $removeEmployee = new employeeRemoveContr($product_ID);
    // removing user
    $removeEmployee-> checkEmployee();
    // going back to front page
    header("location: ../employees.php?error=EMPLOYEE REMOVED");
}