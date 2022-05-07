<?php

class productRemove extends Dbh {

    protected function removeProduct($product_ID) {
        session_start();
        $stmt = $this->connect()->prepare('DELETE FROM product WHERE product_ID = ?;');
        $found = false;
        $stmtEO = $this->connect();
        
        //CHECK EVENT PRODUCT LIST
        $getData = $stmtEO->query("select * from event_product_list");
        foreach($getData as $row){
            if($product_ID == "{$row['product_ID_fk']}"){
                $found = true;
            }else{
                $_SESSION["debug"] = "GOOD!";
            }
        }       
        //If item not found, delete from database
        if($found == false){
            if(!$stmt->execute(array($product_ID))) {
                $stmt = null;
                header('location: ../inventory.php?error=stmtfailed');
                exit();
            }
        } else{
            //If item found, set it as discontinued so it will not be generated on UI
            $stmt = $this->connect()->prepare('update product set is_discontinued=1 where product_ID =?;');
            if(!$stmt->execute(array($product_ID))) {
                $stmt = null;
                header('location: ../inventory.php?error=stmtfailed');
                exit();
            }
        }

        if($stmt->rowCount() == 0) {
            $stmt = null;
            header("location: ../inventory.php?error=Productnotfound");
            exit();
        }
        $stmt = null;
    }

    


}