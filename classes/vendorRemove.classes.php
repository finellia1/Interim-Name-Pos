<?php

class productRemove extends Dbh {

    protected function removeProduct($product_ID) {
        session_start();
        $stmt = $this->connect()->prepare('DELETE FROM vendor WHERE vendor_ID = ?;');
        $found = false;
        $stmtEO = $this->connect();
        
        //CHECK EVENT PRODUCT LIST

        
        if(!$stmt->execute(array($product_ID))) {
            $stmt = null;
            header('location: ../vendor.php?error=stmtfailed');
            exit();
        }
      


        if($stmt->rowCount() == 0) {
            $stmt = null;
            header("location: ../vendor.php?error=Productnotfound");
            exit();
        }
        $stmt = null;
    }

    


}