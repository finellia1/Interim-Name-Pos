<?php
    
    // grab the data from form
    $product_ID = $_POST["PID"];
    // instantiate signupContr class
    include "../classes/dbh.classes.php";
    include "../classes/clientRemove.classes.php";
    include "../classes/clientRemove-contr.classes.php";
    $removeProduct = new clientRemoveContr($product_ID);
    // running error handlers and Product signup
    $removeProduct-> checkClient();
    // going back to front page
    header("location: ../clients.php");