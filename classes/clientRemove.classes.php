<?php

class clientRemove extends Dbh {

    protected function removeClient($product_ID) {
        session_start();
        $stmt = $this->connect()->prepare('DELETE FROM client WHERE client_ID = ?;');
        $found = false;
        $stmtEO = $this->connect();

        //CHECK INVOICE LIST
        $getData = $stmtEO->query("select * from invoice");
        foreach($getData as $row){
            if($product_ID == "{$row['client_ID_fk']}"){
                $found = true;
            }else{
                $_SESSION["debug"] = "GOOD!";
            }
        }       
        //If item is not found, delete from database.
        if($found == false){
            if(!$stmt->execute(array($product_ID))) {
                $stmt = null;
                header('location: ../clients.php?error=stmtfailed');
                exit();
            }
        } else{
            //If client is found, set it as inactive so it will not be generated in the UI
            $stmt = $this->connect()->prepare('update client set is_inactive=1 where client_ID =?;');
            if(!$stmt->execute(array($product_ID))) {
                $stmt = null;
                header('location: ../clients.php?error=stmtfailed');
                exit();
            }
            $_SESSION["debug"] = "Located in event product list!";
        }


        if($stmt->rowCount() == 0) {
            $stmt = null;
            header("location: ../clients.php?error=Productnotfound");
            exit();
        }
        $stmt = null;
    }

    


}