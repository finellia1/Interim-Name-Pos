<?php
require '../classes/session.classes.php';

session::start();
    //Search type is populated by form
    $searchType = $_POST["searchTypeInput"];
    //Search content is populated by form

    //Search content is set to whatever is in search content 
    $searchContent = $_POST["searchContent"];
    //Compare actual search type to row name
        if($searchType == "Vendor ID"){
            $searchType = "vendor_ID";
        } else if($searchType == "Company Name"){
            $searchType = "company_name";
        } else if($searchType == "Website"){
            $searchType = "website";
        } else if($searchType == "Sales Representative"){
            $searchType = "salesrep";
        } else if($searchType == "Email"){
            $searchType = "email";
        } else if($searchType == "Phone}"){
            $searchType = "phone";
        } else if($searchType == "Vendor Notes"){
            $searchType = "vendor_notes";
        } else {
            $searchType = "";
        }
        if($searchContent=="" ){
            $searchContent= " ";
        }

    //If the search type is not blank, set the search type input.
    //This search type session variable is used to run the search query to generate the divs in the homepage 
    if($searchType!=""){
        $_SESSION["searchTypeInput_vendor"] = "select * from vendor where {$searchType} like '%{$searchContent}%'";
    }else if($searchType=="" && $searchContent!=""){ // If the search type is empty and the search content isn't, search all rows 
        $_SESSION["searchTypeInput_vendor"] = "SELECT * FROM `vendor` where vendor_ID LIKE '%{$searchContent}%'
        OR company_name LIKE '%{$searchContent}%'
        OR website LIKE '%{$searchContent}%'
        OR salesrep LIKE '%{$searchContent}%'
        OR email LIKE '%{$searchContent}%'
        OR phone LIKE '%{$searchContent}%'
        OR vendor_notes LIKE '%{$searchContent}%';";
    }
    else{
        //In any other case, search all. This loads all DB info to page
        $_SESSION["searchTypeInput_vendor"] = "select * from vendor";
    }
    
    header("location: ../vendor.php");


?>