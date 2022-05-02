<?php

class clientAdd extends Dbh {

    protected function setClient($product_ID,$company_name,$client_type,$first_name,$last_name,$email,$address_line1,$address_line2,$city,$state_abbr,$zip_code,$phone,$client_notes) {
        $stmt = $this->connect()->prepare('INSERT INTO client (client_ID, company, client_type, first_name, last_name, email, address_line1,address_line2,city,state_abbr,zip_code,phone,client_notes) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?);');


        if(!$stmt->execute(array($product_ID,$company_name,$client_type,$first_name,$last_name,$email,$address_line1,$address_line2,$city,$state_abbr,$zip_code,$phone,$client_notes))) {
            $stmt = null;
            header('location: ../clients.php');
            exit();
        }
        $stmt = null;
    }

    // check if the product or name are already in use
    protected function checkClient($product_ID, $first_name, $last_name) {
        
        $stmt = $this->connect()->prepare('SELECT client_ID FROM client WHERE client_ID = ? OR first_name = ? AND last_name = ?;');
        if(!$stmt->execute(array($product_ID, $first_name, $last_name))) {
            $stmt = null;
            header("location: ../clients.php");
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