<?php
//functions for updating products
class vendorUpdate extends Dbh {

    //for each field passed, connects to db, prepares and executes $stmt, updates entry in db
    protected function setVendor($product_ID, $company_name, $website, $sales_representative, $email, $phone, $vendor_notes) {
        $p_id = "'".$product_ID."'";
        $p_company_name = "'".$company_name."'";
        $p_website = "'".$website."'";
        $p_salesrep = "'".$sales_representative."'";
        $p_email = "'".$email."'";
        $p_phone = "'".$phone."'";
        $p_vendor_notes = "'".$vendor_notes."'";

        echo($p_id);

       if(!empty($company_name)) {
        $stmt = $this->connect()->prepare("UPDATE vendor SET company_name = $p_company_name WHERE vendor_ID = $product_ID" );

            if(!$stmt->execute()) {
                $stmt = null;
                header('location: ../index.php?error=stmtfailedName');
                exit();
            }

        }
        if(!empty($website)) {
            $stmt = $this->connect()->prepare("UPDATE vendor SET website = $p_website WHERE vendor_ID = $product_ID" );


            if(!$stmt->execute()) {
                $stmt = null;
                header('location: ../index.php?error=stmtfailedDESCRIPTION');
                exit();
            }

       }

       if(!empty($sales_representative)) {
        $stmt = $this->connect()->prepare("UPDATE vendor SET salesrep = $p_salesrep WHERE vendor_ID = $product_ID" );


        if(!$stmt->execute()) {
            $stmt = null;
            header('location: ../index.php?error=stmtfailedDESCRIPTION');
            exit();
        }

   }

       if(!empty($email)) {
        $stmt = $this->connect()->prepare("UPDATE vendor SET email = $p_email WHERE vendor_ID = $product_ID" );


            if(!$stmt->execute()) {
                $stmt = null;
                header('location: ../index.php?error=stmtfailed1');
                exit();
            }

        }

        
       if(!empty($phone)) {
        $stmt = $this->connect()->prepare("UPDATE vendor SET phone = $p_phone WHERE vendor_ID = $product_ID" );


            if(!$stmt->execute()) {
                $stmt = null;
                header('location: ../index.php?error=stmtfailed1');
                exit();
            }

        }

        
        
       if(!empty($vendor_notes)) {
        $stmt = $this->connect()->prepare("UPDATE vendor SET vendor_notes = $p_vendor_notes WHERE vendor_ID = $product_ID" );


            if(!$stmt->execute()) {
                $stmt = null;
                header('location: ../index.php?error=stmtfailed1');
                exit();
            }

        }

        
        $stmt = null;
    }
}