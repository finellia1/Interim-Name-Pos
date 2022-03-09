<?php
session_start();
class removeProduct extends Dbh {

    protected function removeProduct($product_ID) {
        $stmt = $this->connect()->prepare('DELETE FROM product WHERE product_ID = ?;');

        if(!$stmt->execute(array($product_ID))) {
            $stmt = null;
            $_SESSION["removeProductErrorMsg"] = "Statement failed!";
            header('location: ../index.php?error=stmtfailed');
            exit();
        }

        if($stmt->rowCount() == 0) {
            $stmt = null;
            $_SESSION["removeProductErrorMsg"] = "Product not found!";
            header("location: ../index.php?error=Productnotfound");
            exit();
        }

        $stmt = null;
    }
}