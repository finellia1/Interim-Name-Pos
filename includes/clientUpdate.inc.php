<?php
//gets data from form, creates updateProduct Object, passes to updateProduct()

    // grab the data from form
    $product_ID = $_POST["deleteID_edit"];
    $company_name = $_POST["company_name"];
    $client_type = $_POST["client_type"];
    $first_name = $_POST["first_name"];
    $last_name= $_POST["last_name"];
    $email = $_POST["email"];
    $address_line1 = $_POST["address_line1"];
    $address_line2 = $_POST["address_line2"];
    $city = $_POST["city"];
    $state_abbr= $_POST["state_abbr"];
    $zip_code = $_POST["zip_code"];
    $phone = $_POST["phone"];
    $client_notes = $_POST["client_notes"];

    
    // instantiate classes
    include "../classes/dbh.classes.php";
    include "../classes/clientUpdate.classes.php";
    include "../classes/clientUpdate-contr.classes.php";
    //create object
    $updateClient = new clientUpdateContr($product_ID,$company_name,$client_type,$first_name,$last_name,$email,$address_line1,$address_line2,$city,$state_abbr,$zip_code,$phone,$client_notes);
    //  updateClient
    $updateClient-> updateClient($product_ID,$company_name,$client_type,$first_name,$last_name,$email,$address_line1,$address_line2,$city,$state_abbr,$zip_code,$phone,$client_notes);
    // going back to front page
    header("location: ../clients.php?error=PRODUCT UPDATED");
