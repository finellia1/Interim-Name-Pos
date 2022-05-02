<?php
require '../classes/session.classes.php';

session::start();
    //Search type is populated by form
    $searchType = $_POST["searchTypeInput"];
    //Search content is populated by form
    $searchContent = $_POST["searchContent"];

    if($searchType == "Company"){
        $searchType = "company";
    } else if($searchType == "Client Type"){
        $searchType = "client_type";
    } else if($searchType == "First Name"){
        $searchType = "first_name";
    } else if($searchType == "Last Name"){
        $searchType = "last_name";
    } else if($searchType == "Email"){
        $searchType = "email";
    } else if($searchType == "Address Line 1"){
        $searchType = "address_line1";
    } else if($searchType == "Address Line 2"){
        $searchType = "address_line2";
    } else if($searchType == "City"){
        $searchType = "city";
    } else if($searchType == "State Abbreviation"){
        $searchType = "state_abbr";
    } else if($searchType == "Zip Code"){
        $searchType = "zip_code";
    } else if($searchType == "Phone Number"){
        $searchType = "phone";
    } else if($searchType == "Client Notes") {
            $searchType = "client_notes";
    } 

    //If the search type is not blank, set the search type input.
    //This search type session variable is used to run the search query to generate the divs in the homepage 


    if($searchType!=""){
        $_SESSION["searchTypeInput_client"] = "select * from client where {$searchType} like '%{$searchContent}%'";
    }else if($searchType=="" && $searchContent!=""){
        $_SESSION["searchTypeInput_client"] = "SELECT * FROM `client` where client_ID LIKE '%{$searchContent}%'
        OR company LIKE '%{$searchContent}%'
        OR client_type LIKE '%{$searchContent}%'
        OR first_name LIKE '%{$searchContent}%'
        OR last_name LIKE '%{$searchContent}%'
        OR email LIKE '%{$searchContent}%'
        OR address_line1 LIKE '%{$searchContent}%'
        OR address_line2 LIKE '%{$searchContent}%'
        OR city LIKE '%{$searchContent}%'
        OR state_abbr LIKE '%{$searchContent}%'
        OR zip_code LIKE '%{$searchContent}%'
        OR phone LIKE '%{$searchContent}%'
        OR client_notes LIKE '%{$searchContent}%';";
    }
    else{
        $_SESSION["searchTypeInput_client"] = "select * from client";
    }
    
    header("location: ../clients.php");


?>


$p_client_ID,$p_company,$p_client_type,$p_first_name,$p_last_name,$p_email,$p_address_line1,$p_address_line2,$p_city,$p_state_abbr,$p_zip_code,$p_phone,$p_client_notes,
