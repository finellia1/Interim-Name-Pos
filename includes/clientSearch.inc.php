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
    include "classes/clientSearch.classes.php";
    include "classes/clientSearch-contr.classes.php";

    // instantiate client search controller
    $searchProduct = new clientSearchContr($searchType, $searchContent);
    // running error handlers and user signup
    $searchProduct-> searchClients($searchType, $searchContent);
    // going back to front page
    //session::display();
