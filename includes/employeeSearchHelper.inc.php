<?php
require_once 'classes/session.classes.php';
if(isset($_POST["submit"])) 
{
    //Search type is populated by form
    $searchType = $_POST["searchTypeInput"];
    //Search content is populated by form

    //Search content is set to whatever is in search content 
    $searchContent = $_POST["searchContent"];
} else {
        //Search type is populated by form
        $searchType = " ";
        //Search content is populated by form
    
        //Search content is set to whatever is in search content 
        $searchContent = " ";

}

    // instantiate signupContr class
    include "classes/dbh.classes.php";
    include "classes/employeeSearch.classes.php";
    include "classes/employeeSearch-contr.classes.php";

    $searchEmployees = new employeeSearchContr($searchType, $searchContent);
    // running error handlers and user signup
    $searchEmployees-> fillSecurityForm();
    // going back to front page
    //session::display();
