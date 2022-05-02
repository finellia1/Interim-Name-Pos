<?php

class vendorAdd extends Dbh {

    protected function setVendor($product_ID,$company_name,$website,$sales_representative,$email,$phone,$vendor_notes) {
        $stmt = $this->connect()->prepare('INSERT INTO vendor (vendor_ID, company_name, website, salesrep, email, phone, vendor_notes) VALUES (?,?,?,?,?,?,?);');


        if(!$stmt->execute(array($product_ID,$company_name,$website,$sales_representative,$email,$phone,$vendor_notes))) {
            $stmt = null;
            header('location: ../vendor.php');
            exit();
        }
        $stmt = null;
    }

    // check if the product or name are already in use
    protected function checkVendor($product_ID, $company_name) {
        
        $stmt = $this->connect()->prepare('SELECT vendor_ID FROM vendor WHERE vendor_ID = ? OR company_name = ?;');
        if(!$stmt->execute(array($product_ID, $company_name))) {
            $stmt = null;
            header("location: ../vendor.php");
            exit();
        }

        $resultcheck;
        if($stmt->rowCount() > 0) {
            $resultcheck = false;
        } else {
            $resultcheck = true;
        }
        return $resultcheck;
    }
}