<?php
//functions for adding products
class AddProduct extends Dbh {

    //connects to db, prepares and executes $stmt, inserts updated fields into db
    protected function setProduct($product_ID, $product_type, $name, $description, $model_no, $regular_price, $quantity_in_stock) {
        $stmt = $this->connect()->prepare('INSERT INTO product (product_ID, product_type, name_, description_, model_no, regular_price, quantity_in_stock) VALUES (?,?,?,?,?,?,?);');

        if(!$stmt->execute(array($product_ID, $product_type, $name, $description, $model_no, $regular_price, $quantity_in_stock))) {
            $stmt = null;
            header('location: ../index.php?error=stmtfailed1');
            exit();
        }
        $stmt = null;
    }

    // check if the product or name are already in use
    protected function checkProduct($product_ID, $name) {
        $stmt = $this->connect()->prepare('SELECT product_ID FROM product WHERE product_ID = ? OR name_ = ?;');
        if(!$stmt->execute(array($product_ID, $name))) {
            $stmt = null;
            header("location: ../index.php?error=stmtfailed2");
            exit();
        }
        //checks if there is a result
        $resultcheck;
        if($stmt->rowCount() > 0) {
            $resultcheck = false;
        } else {
            $resultcheck = true;
        }
        return $resultcheck;
    }
}