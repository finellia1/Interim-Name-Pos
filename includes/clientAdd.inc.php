<?php
// if(isset($_POST["submit"])) 
// {
    $product_ID = "add";
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

    $c_company_name = $company_name;
    if(str_contains($c_company_name, '"')){
        $c_company_name = str_replace('"', "“", $company_name);
    }
    if(str_contains($c_company_name, "'")){
        $c_company_name = str_replace("'", "’", $company_name);
    }

    $c_client_type = $client_type;
    if(str_contains($client_type, '"')){
        $c_client_type = str_replace('"', "“", $client_type);
    }
    if(str_contains($client_type, "'")){
        $c_client_type = str_replace("'", "’", $client_type);
    }

    $c_first_name = $first_name;
    if(str_contains($c_first_name, '"')){
        $c_first_name = str_replace('"', "“", $first_name);
    }
    if(str_contains($c_first_name, "'")){
        $c_first_name = str_replace("'", "’", $first_name);
    }

    $c_last_name = $last_name;
    if(str_contains($c_last_name, '"')){
        $c_last_name = str_replace('"', "“", $last_name);
    }
    if(str_contains($c_last_name, "'")){
        $c_last_name = str_replace("'", "’", $last_name);
    }

    $c_email = $email;
    if(str_contains($c_email, '"')){
        $c_email = str_replace('"', "“", $email);
    }
    if(str_contains($c_email, "'")){
        $c_email = str_replace("'", "’", $email);
    }

    $c_address_line1 = $address_line1;
    if(str_contains($c_address_line1, '"')){
        $c_address_line1 = str_replace('"', "“", $address_line1);
    }
    if(str_contains($c_address_line1, "'")){
        $c_address_line1 = str_replace("'", "’", $address_line1);
    }

    $c_address_line2 = $address_line2;
    if(str_contains($c_address_line2, '"')){
        $c_address_line2 = str_replace('"', "“", $address_line2);
    }
    if(str_contains($c_address_line2, "'")){
        $c_address_line2 = str_replace("'", "’", $address_line2);
    }

    $c_city = $city;
    if(str_contains($c_city, '"')){
        $c_city = str_replace('"', "“", $city);
    }
    if(str_contains($c_city, "'")){
        $c_city = str_replace("'", "’", $city);
    }

    $c_state_abbr = $state_abbr;
    if(str_contains($c_state_abbr, '"')){
        $c_state_abbr = str_replace('"', "“", $state_abbr);
    }
    if(str_contains($c_state_abbr, "'")){
        $c_state_abbr = str_replace("'", "’", $state_abbr);
    }

    $c_zip_code = $zip_code;
    if(str_contains($c_zip_code, '"')){
        $c_zip_code = str_replace('"', "“", $zip_code);
    }
    if(str_contains($c_zip_code, "'")){
        $c_zip_code = str_replace("'", "’", $zip_code);
    }

    $c_phone = $phone;
    if(str_contains($c_phone, '"')){
        $c_phone = str_replace('"', "“", $phone);
    }
    if(str_contains($c_phone, "'")){
        $c_phone = str_replace("'", "’", $phone);
    }

    $c_client_notes = $client_notes;
    if(str_contains($c_client_notes, '"')){
        $c_client_notes = str_replace('"', "“", $client_notes);
    }
    if(str_contains($c_client_notes, "'")){
        $c_client_notes = str_replace("'", "’", $client_notes);
    }



    
    // instantiate signupContr class
    include "../classes/dbh.classes.php";
    include "../classes/clientAdd.classes.php";
    include "../classes/clientAdd-contr.classes.php";
    $addProduct = new clientAddContr($product_ID,$c_company_name,$c_client_type,$c_first_name,$c_last_name,$c_email,$c_address_line1,$c_address_line2,$c_city,$c_state_abbr,$c_zip_code,$c_phone,$c_client_notes);
    // running error handlers and user signup
    $addProduct-> addClient($product_ID,$c_company_name,$c_client_type,$c_first_name,$c_last_name,$c_email,$c_address_line1,$c_address_line2,$c_city,$c_state_abbr,$c_zip_code,$c_phone,$c_client_notes);
    // going back to front page
    header("location: ../clients.php?error=ran");
// }
?>

