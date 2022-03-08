<?php
//functions for updating products
class UpdateProduct extends Dbh {
    //for each field passed, connects to db, prepares and executes $stmt, updates entry in db
    protected function setProduct($product_ID, $name, $description, $product_type, $make, $model_no, $quantity_unit, $quantity_in_stock,$isPromotional,$regular_price,$discounted_price,$num_rented,$num_broken) {
        if(!empty($product_type)) {
            $stmt = $this->connect()->prepare("UPDATE product SET product_type = $product_type WHERE product_ID = $product_ID" );

            if(!$stmt->execute(array($product_ID, $product_type))) {
                $stmt = null;
                header('location: ../index.php?error=stmtfailedProductType');
                exit();
            }

       }
       if(!empty($name)) {
        $stmt = $this->connect()->prepare("UPDATE product SET name_ = $name WHERE product_ID = $product_ID" );

            if(!$stmt->execute(array($product_ID, $name))) {
                $stmt = null;
                header('location: ../index.php?error=stmtfailedName');
                exit();
            }

        }
        if(!empty($description)) {
            $stmt = $this->connect()->prepare("UPDATE product SET description_ = $description WHERE product_ID = $product_ID" );


            if(!$stmt->execute(array($product_ID, $description))) {
                $stmt = null;
                header('location: ../index.php?error=stmtfailedDESCRIPTION');
                exit();
            }

       }
       if(!empty($model_no)) {
        $stmt = $this->connect()->prepare("UPDATE product SET model_no = $model_no WHERE product_ID = $product_ID" );


            if(!$stmt->execute(array($product_ID, $model_no))) {
                $stmt = null;
                header('location: ../index.php?error=stmtfailedMODELNO');
                exit();
            }

        }
        if(!empty($regular_price)) {
            $stmt = $this->connect()->prepare("UPDATE product SET regular_price = $regular_price WHERE product_ID = $product_ID" );


            if(!$stmt->execute(array($product_ID, $regular_price))) {
                $stmt = null;
                header('location: ../index.php?error=stmtfailed1REGPRICE');
                exit();
            }

       }
       if(!empty($quantity_in_stock)) {
        $stmt = $this->connect()->prepare("UPDATE product SET quantity_in_stock = $quantity_in_stock WHERE product_ID = $product_ID" );


            if(!$stmt->execute(array($product_ID, $quantity_in_stock))) {
                $stmt = null;
                header('location: ../index.php?error=stmtfailed1');
                exit();
            }

        }

        $stmt = null;
    }
}