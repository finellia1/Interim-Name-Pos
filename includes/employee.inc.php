<?php
require '../classes/session.classes.php';

session::start();
    //Search type is populated by form
    $searchType = $_POST["searchTypeInput"];
    //Search content is populated by form
    $searchContent = $_POST["searchContent"];

    if($searchType == "Employee ID"){
        $searchType = "employee_ID";
    }else if($searchType == "Security Type"){
        $searchType = "security_type";
    } else if($searchType == "Password"){
        $searchType = "pwd";
    } else if($searchType == "Job Title"){
        $searchType = "job_title";
    } else if($searchType == "First Name"){
        $searchType = "first_name";
    } else if($searchType == "Last Name"){
        $searchType = "last_name";
    } else if($searchType == "Email"){
        $searchType = "email";
    } else if($searchType == "Hourly Salary"){
        $searchType = "hourly_salary";
    } else if($searchType == "Yearly Salary"){
        $searchType = "yearly_salary";
    }
    //If the search type is not blank, set the search type input.
    //This search type session variable is used to run the search query to generate the divs in the homepage 


    if($searchType!=""){
        $_SESSION["searchTypeInput_employee"] = "select * from employee where {$searchType} like '%{$searchContent}%'";
    }else if($searchType=="" && $searchContent!=""){
        $_SESSION["searchTypeInput_employee"] = "SELECT * FROM `employee` where employee_ID LIKE '%{$searchContent}%'
        OR employee_ID LIKE '%{$searchContent}%'
        OR security_type LIKE '%{$searchContent}%'
        OR pwd LIKE '%{$searchContent}%'
        OR job_title LIKE '%{$searchContent}%'
        OR first_name LIKE '%{$searchContent}%'
        OR last_name LIKE '%{$searchContent}%'
        OR email LIKE '%{$searchContent}%'
        OR hourly_salary LIKE '%{$searchContent}%'
        OR yearly_salary LIKE '%{$searchContent}%';";
    }
    else{
        $_SESSION["searchTypeInput_employee"] = "select * from employee";
    }
    
    header("location: ../employees.php");


?>