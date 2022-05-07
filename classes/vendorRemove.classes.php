<?php

class productRemove extends Dbh {

    protected function removeProduct($product_ID) {
        session_start();
        $stmt = $this->connect()->prepare('DELETE FROM vendor WHERE vendor_ID = ?;');
        $found = false;
        $stmtEO = $this->connect();
        
        //CHECK EVENT PRODUCT LIST
        $getData = $stmtEO->query("select * from product");
        foreach($getData as $row){
            if($product_ID == "{$row['vendor_ID_fk']}"){
                $found = true;
            }else{
                $_SESSION["debug"] = "GOOD!";
            }
        }       
        //If item not found, delete from database.
        if($found == false){
            if(!$stmt->execute(array($product_ID))) {
                $stmt = null;
                header('location: ../vendor.php?error=stmtfailed');
                exit();
            }
        } else{
            //If vendor found, set it as inactive  so it will not be generated on UI
            $stmt = $this->connect()->prepare('update vendor set is_inactive=1 where vendor_ID =?;');
            if(!$stmt->execute(array($product_ID))) {
                $stmt = null;
                header('location: ../vendor.php?error=stmtfailed');
                exit();
            }
        }


        if($stmt->rowCount() == 0) {
            $stmt = null;
            header("location: ../vendor.php?error=Productnotfound");
            exit();
        }
        $stmt = null;
    }

    


}