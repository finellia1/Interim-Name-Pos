<?php
    
    // grab the data from form
    $product_ID = $_POST["PID"];
    // instantiate signupContr class
    include "../classes/dbh.classes.php";
    include "../classes/vendorRemove.classes.php";
    include "../classes/vendorRemove-contr.classes.php";
    $removeProduct = new productRemoveContr($product_ID);
    // running error handlers and Product signup
    $removeProduct-> checkProduct();
    // going back to front page
    header("location: ../vendor.php");