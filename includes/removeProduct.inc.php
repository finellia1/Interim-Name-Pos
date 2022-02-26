<?php
//gets data from form, creates removeProduct Object, passes to removeProduct()
if(isset($_POST["submit"])) 
{
    // grab the data from form
    $product_ID = $_POST["product_ID"];

    // instantiate classes
    include "../classes/dbh.classes.php";
    include "../classes/removeProduct.classes.php";
    include "../classes/removeProduct-contr.classes.php";
        //create object
    $removeProduct = new removeProductContr($product_ID);
    // removing product
    $removeProduct-> checkProduct();
    // going back to front page
    header("location: ../index.php?error=PRODUCT REMOVED");
}