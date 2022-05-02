<?php
//functions for updating products
class clientUpdate extends Dbh {

    //for each field passed, connects to db, prepares and executes $stmt, updates entry in db
    protected function setClient($product_ID,$company_name,$client_type,$first_name,$last_name,$email,$address_line1,$address_line2,$city,$state_abbr,$zip_code,$phone,$client_notes) {
        $p_product_ID = "'".$product_ID."'";
        $p_company_name = "'".$company_name."'";
        $p_client_type = "'".$client_type."'";
        $p_first_name = "'".$first_name."'";
        $p_last_name = "'".$last_name."'";
        $p_email = "'".$email."'";
        $p_address_line1 = "'".$address_line1."'";
        $p_address_line2 = "'".$address_line2."'";
        $p_city = "'".$city."'";
        $p_state_abbr = "'".$state_abbr."'";
        $p_zip_code = "'".$zip_code."'";
        $p_phone = "'".$phone."'";
        $p_client_notes = "'".$client_notes."'";



        echo($p_id);

        if(!empty($company_name)) {
            $stmt = $this->connect()->prepare("UPDATE client SET company = $p_company_name WHERE client_ID = $product_ID" );

            if(!$stmt->execute()) {
                $stmt = null;
                header('location: ../index.php?error=stmtfailedProductType');
                exit();
            }

       }
       if(!empty($client_type)) {
        $stmt = $this->connect()->prepare("UPDATE client SET client_type = $p_client_type WHERE client_ID = $product_ID" );

            if(!$stmt->execute()) {
                $stmt = null;
                header('location: ../index.php?error=stmtfailedName');
                exit();
            }

        }
        if(!empty($first_name)) {
            $stmt = $this->connect()->prepare("UPDATE client SET first_name = $p_first_name WHERE client_ID = $product_ID" );


            if(!$stmt->execute()) {
                $stmt = null;
                header('location: ../index.php?error=stmtfailedDESCRIPTION');
                exit();
            }

       }

       if(!empty($last_name)) {
        $stmt = $this->connect()->prepare("UPDATE client SET last_name = $p_last_name WHERE client_ID = $product_ID" );


        if(!$stmt->execute()) {
            $stmt = null;
            header('location: ../index.php?error=stmtfailedDESCRIPTION');
            exit();
        }

   }

       if(!empty($email)) {
        $stmt = $this->connect()->prepare("UPDATE client SET email = $p_email WHERE client_ID = $product_ID" );


            if(!$stmt->execute()) {
                $stmt = null;
                header('location: ../index.php?error=stmtfailed1');
                exit();
            }

        }

        
       if(!empty($address_line1)) {
        $stmt = $this->connect()->prepare("UPDATE client SET address_line1 = $p_address_line1 WHERE client_ID = $product_ID" );


            if(!$stmt->execute()) {
                $stmt = null;
                header('location: ../index.php?error=stmtfailed1');
                exit();
            }

        }

        
        
       if(!empty($address_line2)) {
        $stmt = $this->connect()->prepare("UPDATE client SET address_line2 = $p_address_line2 WHERE client_ID = $product_ID" );


            if(!$stmt->execute()) {
                $stmt = null;
                header('location: ../index.php?error=stmtfailed1');
                exit();
            }

        }


        if(!empty($city)) {
            $stmt = $this->connect()->prepare("UPDATE client SET city = $p_city  WHERE client_ID = $product_ID" );
    
    
                if(!$stmt->execute()) {
                    $stmt = null;
                    header('location: ../index.php?error=stmtfailed1');
                    exit();
                }
    
            }
    

        if(!empty($state_abbr)) {
            $stmt = $this->connect()->prepare("UPDATE client SET state_abbr = $p_state_abbr WHERE client_ID = $product_ID" );
    
    
                if(!$stmt->execute()) {
                    $stmt = null;
                    header('location: ../index.php?error=stmtfailed1');
                    exit();
                }
    
            }
        

        if(!empty($zip_code)) {
            $stmt = $this->connect()->prepare("UPDATE client SET zip_code = $p_zip_code WHERE client_ID = $product_ID" );
    
    
                if(!$stmt->execute()) {
                    $stmt = null;
                    header('location: ../index.php?error=stmtfailed1');
                    exit();
                }
    
            }

        if(!empty($phone)) {
            $stmt = $this->connect()->prepare("UPDATE client SET phone = $p_phone WHERE client_ID = $product_ID" );
    
    
                if(!$stmt->execute()) {
                    $stmt = null;
                    header('location: ../index.php?error=stmtfailed1');
                    exit();
                }
    
            }

       if(!empty($client_notes)) {
        $stmt = $this->connect()->prepare("UPDATE client SET client_notes = $p_client_notes WHERE client_ID = $product_ID" );


            if(!$stmt->execute()) {
                $stmt = null;
                header('location: ../index.php?error=stmtfailed1');
                exit();
            }

        }


        $stmt = null;
    }
}