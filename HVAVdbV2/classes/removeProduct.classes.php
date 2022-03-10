<!-- THIS PAGE RUNS ON  hv_audio_visual_v2.sql -->
<?php
session_start();
//functions to remove user
class removeProduct extends Dbh {
    //connects to db, prepares and executes $stmt, removes entry from db
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