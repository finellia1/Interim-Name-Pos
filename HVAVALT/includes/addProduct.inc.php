<?php
require "../classes/session.classes.php";
session::start();
if(session::isSet("loggedInID")) {
    //gets data from form, creates addProduct Object, passes to addProduct()
    if(isset($_POST["submit"])) 
    {
        // grab the data from form
        $product_ID = $_POST["product_ID"];
        $product_type = $_POST["product_type"];
        $name = $_POST["name"];
        $description = $_POST["description"];
        $model_no = $_POST["model_no"];
        $regular_price = $_POST["regular_price"];
        $quantity_in_stock = $_POST["quantity_in_stock"];

        // instantiate classes
        include "../classes/dbh.classes.php";
        include "../classes/addProduct.classes.php";
        include "../classes/addProduct-contr.classes.php";
            //create object
        $addProduct = new addProductContr($product_ID, $product_type, $name, $description, $model_no, $regular_price, $quantity_in_stock);
        // add product
        $addProduct-> addProduct();
        // going back to front page
        header("location: ../index.php?error=PRODUCT ADDED");
    }
} else {
    session::destroy();
    header("location: ../index.php?error=Not Logged In");
}