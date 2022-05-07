<?php
require '../classes/session.classes.php';

session::start();
    //Search type is populated by form
    $searchType = $_POST["searchTypeInput"];
    //Search content is populated by form
    $searchContent = $_POST["searchContent"];
    
    //Compare actual search type to row name
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

    //https://stackoverflow.com/questions/28717868/sql-server-select-where-any-column-contains-x

    //If the search type is not blank, set the search type input.
    //This search type session variable is used to run the search query to generate the divs in the homepage 
    if($searchType!=""){
        $_SESSION["searchTypeInput_client"] = "select * from client where {$searchType} like '%{$searchContent}%'";
    }else if($searchType=="" && $searchContent!=""){  // If the search type is empty and the search content isn't, search all rows
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
        //In any other case, search all. This loads all DB info to page
        $_SESSION["searchTypeInput_client"] = "select * from client";
    }
    
    header("location: ../clients.php");


?>


