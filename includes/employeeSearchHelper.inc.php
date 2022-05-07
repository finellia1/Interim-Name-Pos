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
        $searchType = " ";
    
        $searchContent = " ";

}

    include "classes/dbh.classes.php";
    include "classes/employeeSearch.classes.php";
    include "classes/employeeSearch-contr.classes.php";

    // instantiate employee search controller class
    $searchEmployees = new employeeSearchContr($searchType, $searchContent);
    $searchEmployees-> fillSecurityForm();
    // going back to front page
