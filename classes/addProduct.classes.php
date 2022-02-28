<?php

class AddProduct extends Dbh {

    protected function setProduct($product_ID, $name, $description, $product_type, $make, $model_no, $quantity_unit, $quantity_in_stock,$isPromotional,$regular_price,$discounted_price,$num_rented,$num_broken) {
        $stmt = $this->connect()->prepare('INSERT INTO product (product_ID, product_name, product_description, product_type, make, model, qty_unit,qty_in_stock,is_promotional,reg_price,discounted_price,num_rented,num_broken) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?);');


        if(!$stmt->execute(array($product_ID, $name, $description, $product_type, $make, $model_no, $quantity_unit, $quantity_in_stock,$isPromotional,$regular_price,$discounted_price,$num_rented,$num_broken))) {
            $stmt = null;
            header('location: ../homepage.php');
            exit();
        }
        $stmt = null;
    }

    // check if the product or name are already in use
    protected function checkProduct($product_ID, $name) {
        
        $stmt = $this->connect()->prepare('SELECT product_ID FROM product WHERE product_ID = ? OR product_name = ?;');
        if(!$stmt->execute(array($product_ID, $name))) {
            $stmt = null;
            header("location: ../homepage.php");
            exit();
        }

        $resultcheck;
        if($stmt->rowCount() > 0) {
            $resultcheck = false;
        } else {
            $resultcheck = true;
        }
        return $resultcheck;
    }
}