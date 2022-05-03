<?php
//gets data from form, creates updateUser Object, passes to updateUser()

    
    $employee_ID = $_POST["deleteID_edit"];
    $security_type = $_POST["security_type"];
    $pwd = $_POST["password"];
    $job_title = $_POST["job_title"];
    $first_name = $_POST["first_name"];
    $last_name = $_POST["last_name"];
    $email = $_POST["email"];
    $hourly_salary = $_POST["hourly_salary"];
    $yearly_salary = $_POST["yearly_salary"];

    // instantiate classes
    include "../classes/dbh.classes.php";
    include "../classes/employeeUpdate.classes.php";
    include "../classes/employeeUpdate-contr.classes.php";
        //create object
    $updateUser = new updateUserContr($employee_ID, $security_type, $pwd, $job_title, $first_name, $last_name, $email, $hourly_salary, $yearly_salary);
    //update User
    $updateUser-> updateUsers($employee_ID, $security_type, $pwd, $job_title, $first_name, $last_name, $email, $hourly_salary, $yearly_salary);
    // going back to front page
    header("location: ../employees.php?error=User UPDATED");
