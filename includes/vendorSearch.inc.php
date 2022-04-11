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
    include "classes/vendorSearch.classes.php";
    include "classes/vendorSearch-contr.classes.php";

    $searchProduct = new vendorSearchContr($searchType, $searchContent);
    // running error handlers and user signup
    $searchProduct-> searchProducts($searchType, $searchContent);
    // going back to front page
    //session::display();
