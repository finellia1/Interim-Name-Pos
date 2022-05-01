<?php

class productAdd extends Dbh {

    protected function setProduct($product_ID,$vendor, $product_name, $product_description, $product_type, $make, $model, $qty_unit, $qty_in_stock,$is_promotional,$reg_price,$discounted_price,$num_rented,$num_broken) {
        $stmt = $this->connect()->prepare('INSERT INTO product (product_ID, vendor_ID_fk, product_name, product_description, product_type, make, model, qty_unit,qty_in_stock,is_promotional,reg_price,discounted_price,num_rented,num_broken) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?);');


        if(!$stmt->execute(array($product_ID, $vendor, $product_name, $product_description, $product_type, $make, $model, $qty_unit, $qty_in_stock,$is_promotional,$reg_price,$discounted_price,$num_rented,$num_broken))) {
            $stmt = null;
            header('location: ../inventory.php');
            exit();
        }
        $stmt = null;
    }

    // check if the product or name are already in use
    protected function checkProduct($product_ID, $product_name) {
        
        $stmt = $this->connect()->prepare('SELECT product_ID FROM product WHERE product_ID = ? OR product_name = ?;');
        if(!$stmt->execute(array($product_ID, $product_name))) {
            $stmt = null;
            header("location: ../inventory.php");
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