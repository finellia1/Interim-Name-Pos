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

    //Clean job title
    $c_job_title = $job_title;
    if(str_contains($client_type, '"')){
        $c_job_title = str_replace('"', "“", $job_title);
    }
    if(str_contains($client_type, "'")){
        $c_job_title = str_replace("'", "’", $job_title);
    }

    //Clean first name
    $c_first_name = $first_name;
    if(str_contains($c_first_name, '"')){
        $c_first_name = str_replace('"', "“", $first_name);
    }
    if(str_contains($c_first_name, "'")){
        $c_first_name = str_replace("'", "’", $first_name);
    }

    //Clean last name
    $c_last_name = $last_name;
    if(str_contains($c_last_name, '"')){
        $c_last_name = str_replace('"', "“", $last_name);
    }
    if(str_contains($c_last_name, "'")){
        $c_last_name = str_replace("'", "’", $last_name);
    }

    //Clean email
    $c_email = $email;
    if(str_contains($c_email, '"')){
        $c_email = str_replace('"', "“", $email);
    }
    if(str_contains($c_email, "'")){
        $c_email = str_replace("'", "’", $email);
    }

    // instantiate classes
    include "../classes/dbh.classes.php";
    include "../classes/employeeUpdate.classes.php";
    include "../classes/employeeUpdate-contr.classes.php";
        //create object
    $updateUser = new updateUserContr($employee_ID, $security_type, $pwd, $c_job_title, $c_first_name, $c_last_name, $c_email, $hourly_salary, $yearly_salary);
    //update User
    $updateUser-> updateUsers($employee_ID, $security_type, $pwd, $c_job_title, $c_first_name, $c_last_name, $c_email, $hourly_salary, $yearly_salary);
    // going back to front page
    header("location: ../employees.php?error=User UPDATED");
