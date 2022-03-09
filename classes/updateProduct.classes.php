<?php
<<<<<<< Updated upstream

=======
session_start();
//functions for updating products
>>>>>>> Stashed changes
class UpdateProduct extends Dbh {

    protected function setProduct($product_ID, $product_type, $name, $description, $model_no, $regular_price, $quantity_in_stock) {
        if(!empty($product_type)) {
            $stmt = $this->connect()->prepare("UPDATE product SET product_type = $product_type WHERE product_ID = $product_ID" );

            if(!$stmt->execute(array($$product_ID, $product_type))) {
                $stmt = null;
                $_SESSION["updateProductErrorMsg"] = "Product type failed!";
                header('location: ../index.php?error=stmtfailedProductType');
                exit();
            }

       }
       if(!empty($name)) {
        $stmt = $this->connect()->prepare("UPDATE product SET name_ = $name WHERE product_ID = $product_ID" );

            if(!$stmt->execute(array($$product_ID, $name))) {
                $stmt = null;
                $_SESSION["updateProductErrorMsg"] = "Name failed!";
                header('location: ../index.php?error=stmtfailedName');
                exit();
            }

        }
        if(!empty($description)) {
            $stmt = $this->connect()->prepare("UPDATE product SET description_ = $description WHERE product_ID = $product_ID" );


            if(!$stmt->execute(array($$product_ID, $description))) {
                $stmt = null;
                $_SESSION["updateProductErrorMsg"] = "Description failed!";
                header('location: ../index.php?error=stmtfailedDESCRIPTION');
                exit();
            }

       }
       if(!empty($model_no)) {
        $stmt = $this->connect()->prepare("UPDATE product SET model_no = $model_no WHERE product_ID = $product_ID" );


            if(!$stmt->execute(array($$product_ID, $model_no))) {
                $stmt = null;
                $_SESSION["updateProductErrorMsg"] = "Model number failed!";
                header('location: ../index.php?error=stmtfailedMODELNO');
                exit();
            }

        }
        if(!empty($regular_price)) {
            $stmt = $this->connect()->prepare("UPDATE product SET regular_price = $regular_price WHERE product_ID = $product_ID" );


            if(!$stmt->execute(array($$product_ID, $regular_price))) {
                $stmt = null;
                $_SESSION["updateProductErrorMsg"] = "Regular price failed!";
                header('location: ../index.php?error=stmtfailed1REGPRICE');
                exit();
            }

       }
       if(!empty($quantity_in_stock)) {
        $stmt = $this->connect()->prepare("UPDATE product SET quantity_in_stock = $quantity_in_stock WHERE product_ID = $product_ID" );


            if(!$stmt->execute(array($$product_ID, $quantity_in_stock))) {
                $stmt = null;
                $_SESSION["updateProductErrorMsg"] = "Quantity in stock failed!";
                header('location: ../index.php?error=stmtfailed1');
                exit();
            }

        }

        $stmt = null;
    }
}