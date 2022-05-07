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
    include "classes/vendorSearch.classes.php";
    include "classes/vendorSearch-contr.classes.php";
    
    // instantiate vendor search controller class
    $searchProduct = new vendorSearchContr($searchType, $searchContent);
    $searchProduct-> searchProducts($searchType, $searchContent);
    // going back to front page
    //session::display();
