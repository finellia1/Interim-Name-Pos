<?php
// if(isset($_POST["submit"])) 
// {
    $product_ID = "add";
    $company_name = $_POST["company_name"];
    $website = $_POST["website"];
    $sales_representative = $_POST["salesrep"];
    $email= $_POST["email"];
    $phone = $_POST["phone"];
    $vendor_notes = $_POST["vendor_notes"];

    
    // instantiate signupContr class
    include "../classes/dbh.classes.php";
    include "../classes/vendorAdd.classes.php";
    include "../classes/vendorAdd-contr.classes.php";
    $addProduct = new vendorAddContr($product_ID, $company_name, $website, $sales_representative, $email, $phone, $vendor_notes);
    // running error handlers and user signup
    $addProduct-> addVendor($product_ID, $company_name, $website, $sales_representative, $email, $phone, $vendor_notes);
    // going back to front page
    header("location: ../vendor.php?error=ran");
// }
?>