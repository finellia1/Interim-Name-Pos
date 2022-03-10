<?php
//functions to remove product
class removeProduct extends Dbh {

    //connects to db, prepares and executes $stmt, removes entry from db
    protected function removeProduct($product_ID) {
        $stmt = $this->connect()->prepare('DELETE FROM product WHERE product_ID = ?;');

        if(!$stmt->execute(array($product_ID))) {
            $stmt = null;
            header('location: ../index.php?error=stmtfailed');
            exit();
        }

        if($stmt->rowCount() == 0) {
            $stmt = null;
            header("location: ../index.php?error=Productnotfound");
            exit();
        }

        $stmt = null;
    }
}