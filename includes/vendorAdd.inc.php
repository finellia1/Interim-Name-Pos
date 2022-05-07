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

    //Clean company name
    $c_company_name = $company_name;
    if(str_contains($c_company_name, '"')){
        $c_company_name = str_replace('"', "“", $company_name);
    }
    if(str_contains($c_company_name, "'")){
        $c_company_name = str_replace("'", "’", $company_name);
    }


    //Clean website input
    $c_website = $website;
    if(str_contains($c_website, '"')){
        $c_website = str_replace('"', "“", $website);
    }
    if(str_contains($c_website, "'")){
        $c_website = str_replace("'", "’", $website);
    }

    //Clean sales representative name input
    $c_sales_representative = $sales_representative;
    if(str_contains($c_sales_representative, '"')){
        $c_sales_representative = str_replace('"', "“", $sales_representative);
    }
    if(str_contains($c_sales_representative, "'")){
        $c_sales_representative = str_replace("'", "’", $sales_representative);
    }

    //Clean email
    $c_email = $email;
    if(str_contains($c_email, '"')){
        $c_email = str_replace('"', "“", $email);
    }
    if(str_contains($c_email, "'")){
        $c_email = str_replace("'", "’", $email);
    }

    //Clean phone
    $c_phone = $phone;
    if(str_contains($c_phone, '"')){
        $c_phone = str_replace('"', "“", $phone);
    }
    if(str_contains($c_phone, "'")){
        $c_phone = str_replace("'", "’", $phone);
    }

    //Clean Vendor Notes
    $c_vendor_notes = $vendor_notes;
    if(str_contains($c_vendor_notes, '"')){
        $c_vendor_notes = str_replace('"', "“", $vendor_notes);
    }
    if(str_contains($c_vendor_notes, "'")){
        $c_vendor_notes = str_replace("'", "’", $vendor_notes);
    }


    // instantiate vendor add controller class
    include "../classes/dbh.classes.php";
    include "../classes/vendorAdd.classes.php";
    include "../classes/vendorAdd-contr.classes.php";
    $addVendor = new vendorAddContr($product_ID, $c_company_name, $c_website, $c_sales_representative, $c_email, $c_phone, $c_vendor_notes);
    // Call add vendor function
    $addVendor-> addVendor($product_ID, $c_company_name, $c_website, $c_sales_representative, $c_email, $c_phone, $c_vendor_notes);
    // going back to front page
    header("location: ../vendor.php?error=ran");
// }
?>