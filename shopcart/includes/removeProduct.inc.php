<?php
    
    // grab the data from signup form
    $product_ID = $_POST["deleteID"];
    // instantiate signupContr class
    include "../classes/dbh.classes.php";
    include "../classes/removeProduct.classes.php";
    include "../classes/removeProduct-contr.classes.php";
    $removeProduct = new removeProductContr($product_ID);
    // running error handlers and Product signup
    $removeProduct-> checkProduct();
    // going back to front page
    header("location: ../homepage.php");