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

    //Clean company name
    $c_company_name = $company_name;
    if(str_contains($c_company_name, '"')){
        $c_company_name = str_replace('"', "“", $company_name);
    }
    if(str_contains($c_company_name, "'")){
        $c_company_name = str_replace("'", "’", $company_name);
    }

    //Clean client type
    $c_client_type = $client_type;
    if(str_contains($c_client_type, '"')){
        $c_client_type = str_replace('"', "“", $client_type);
    }
    if(str_contains($c_client_type, "'")){
        $c_client_type = str_replace("'", "’", $client_type);
    }

    //Clean first name
    $c_first_name = $first_name;
    if(str_contains($c_first_name, '"')){
        $c_first_name = str_replace('"', "“", $first_name);
    }
    if(str_contains($c_first_name, "'")){
        $c_first_name = str_replace("'", "’", $first_name);
    }

    //Clean last name
    $c_last_name = $last_name;
    if(str_contains($c_last_name, '"')){
        $c_last_name = str_replace('"', "“", $last_name);
    }
    if(str_contains($c_last_name, "'")){
        $c_last_name = str_replace("'", "’", $last_name);
    }

    //Clean email
    $c_email = $email;
    if(str_contains($c_email, '"')){
        $c_email = str_replace('"', "“", $email);
    }
    if(str_contains($c_email, "'")){
        $c_email = str_replace("'", "’", $email);
    }

    //Clean address line 1
    $c_address_line1 = $address_line1;
    if(str_contains($c_address_line1, '"')){
        $c_address_line1 = str_replace('"', "“", $address_line1);
    }
    if(str_contains($c_address_line1, "'")){
        $c_address_line1 = str_replace("'", "’", $address_line1);
    }

    //Clean address line 2
    $c_address_line2 = $address_line2;
    if(str_contains($c_address_line2, '"')){
        $c_address_line2 = str_replace('"', "“", $address_line2);
    }
    if(str_contains($c_address_line2, "'")){
        $c_address_line2 = str_replace("'", "’", $address_line2);
    }

    //Clean city
    $c_city = $city;
    if(str_contains($c_city, '"')){
        $c_city = str_replace('"', "“", $city);
    }
    if(str_contains($c_city, "'")){
        $c_city = str_replace("'", "’", $city);
    }

    //Clean state abbreviation
    $c_state_abbr = $state_abbr;
    if(str_contains($c_state_abbr, '"')){
        $c_state_abbr = str_replace('"', "“", $state_abbr);
    }
    if(str_contains($c_state_abbr, "'")){
        $c_state_abbr = str_replace("'", "’", $state_abbr);
    }

    //Clean zip code
    $c_zip_code = $zip_code;
    if(str_contains($c_zip_code, '"')){
        $c_zip_code = str_replace('"', "“", $zip_code);
    }
    if(str_contains($c_zip_code, "'")){
        $c_zip_code = str_replace("'", "’", $zip_code);
    }

    //Clean phone
    $c_phone = $phone;
    if(str_contains($c_phone, '"')){
        $c_phone = str_replace('"', "“", $phone);
    }
    if(str_contains($c_phone, "'")){
        $c_phone = str_replace("'", "’", $phone);
    }

    //Clean client notes
    $c_client_notes = $client_notes;
    if(str_contains($c_client_notes, '"')){
        $c_client_notes = str_replace('"', "“", $client_notes);
    }
    if(str_contains($c_client_notes, "'")){
        $c_client_notes = str_replace("'", "’", $client_notes);
    }

    // instantiate classes
    include "../classes/dbh.classes.php";
    include "../classes/clientUpdate.classes.php";
    include "../classes/clientUpdate-contr.classes.php";
    //create object
    $updateClient = new clientUpdateContr($product_ID,$c_company_name,$c_client_type,$c_first_name,$c_last_name,$c_email,$c_address_line1,$c_address_line2,$c_city,$c_state_abbr,$c_zip_code,$c_phone,$c_client_notes);
    //  updateClient
    $updateClient-> updateClient($product_ID,$c_company_name,$c_client_type,$c_first_name,$c_last_name,$c_email,$c_address_line1,$c_address_line2,$c_city,$c_state_abbr,$c_zip_code,$c_phone,$c_client_notes);
    // going back to front page
    header("location: ../clients.php?error=PRODUCT UPDATED");
