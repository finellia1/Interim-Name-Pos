<?php

class removeProduct extends Dbh {

    protected function removeProduct($product_ID) {
        $stmt = $this->connect()->prepare('DELETE FROM product WHERE product_ID = ?;');

        if(!$stmt->execute(array($product_ID))) {
            $stmt = null;
            header('location: ../homepage.php?error=stmtfailed');
            exit();
        }

        if($stmt->rowCount() == 0) {
            $stmt = null;
            header("location: ../homepage.php?error=Productnotfound");
            exit();
        }

        $stmt = null;
    }
}