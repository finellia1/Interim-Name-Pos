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
        if($found == false){
            if(!$stmt->execute(array($product_ID))) {
                $stmt = null;
                header('location: ../homepage.php?error=stmtfailed');
                exit();
            }
        } else{
            $stmt = $this->connect()->prepare('update product set is_discontinued=1 where product_ID =?;');
            if(!$stmt->execute(array($product_ID))) {
                $stmt = null;
                header('location: ../homepage.php?error=stmtfailed');
                exit();
            }
            $_SESSION["debug"] = "Located in event product list!";
        }


        if($stmt->rowCount() == 0) {
            $stmt = null;
            header("location: ../homepage.php?error=Productnotfound");
            exit();
        }
        $stmt = null;
    }

    


}