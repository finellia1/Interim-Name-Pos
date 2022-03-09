<?php

if(isset($_POST["submit"])) 
{
    // grab the data from updateProduct form
    $product_ID = $_POST["product_ID"];
    $product_type = $_POST["product_type"];
    $name = $_POST["name"];
    $description = $_POST["description"];
    $model_no = $_POST["model_no"];
    $regular_price = $_POST["regular_price"];
    $quantity_in_stock = $_POST["quantity_in_stock"];

    // instantiate updateProductContr class
    include "../classes/dbh.classes.php";
    include "../classes/updateProduct.classes.php";
    include "../classes/updateProduct-contr.classes.php";
    $updateProduct = new UpdateProductContr($product_ID, $product_type, $name, $description, $model_no, $regular_price,  $quantity_in_stock);
    // running error handlers and user updateProduct
    $updateProduct-> updateProduct();
    // going back to front page
    header("location: ../index.php?error=PRODUCT UPDATED");
}