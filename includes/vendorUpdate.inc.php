<?php
//gets data from form, creates updateProduct Object, passes to updateProduct()

    // grab the data from form
    $product_ID = $_POST["deleteID_edit"];
    $company_name = $_POST["company_name"];
    $website = $_POST["website"];
    $sales_representative = $_POST["salesrep"];
    $email= $_POST["email"];
    $phone = $_POST["phone"];
    $vendor_notes = $_POST["vendor_notes"];


    // instantiate classes
    include "../classes/dbh.classes.php";
    include "../classes/vendorUpdate.classes.php";
    include "../classes/vendorUpdate-contr.classes.php";
    //create object
    $updateProduct = new vendorUpdateContr($product_ID, $company_name, $website, $sales_representative, $email, $phone, $vendor_notes);
    //  updateProduct
    $updateProduct-> updateVendor($product_ID, $company_name, $website, $sales_representative, $email, $phone, $vendor_notes);
    // going back to front page
    header("location: ../vendor.php?error=VENDOR UPDATED");
