<?php
//functions for updating products
class productUpdate extends Dbh {

    //for each field passed, connects to db, prepares and executes $stmt, updates entry in db
    protected function setProduct($product_ID, $name, $description, $product_type, $make, $model_no, $quantity_unit, $quantity_in_stock,$isPromotional,$regular_price,$discounted_price,$num_rented,$num_broken) {
        $p_id = "'".$product_ID."'";
        $p_type = "'".$type."'";
        $p_name = "'".$name."'";
        $p_description = "'".$description."'";
        $p_product_type = "'".$product_type."'";
        $p_make = "'".$make."'";
        $p_model_no = "'".$model_no."'";
        $p_quantity_unit = "'".$quantity_unit."'";
        $p_quantity_in_stock = "'".$quantity_in_stock."'";
        $p_isPromotional = "'".$isPromotional."'";
        $p_regular_price = "'".$regular_price."'";
        $p_discounted_price = "'".$discounted_price."'";
        $p_num_rented = "'".$num_rented."'";
        $p_num_broken = "'".$num_broken."'";


        echo($p_id);

        if(!empty($product_type)) {
            $stmt = $this->connect()->prepare("UPDATE product SET product_type = $p_product_type WHERE product_ID = $product_ID" );

            if(!$stmt->execute()) {
                $stmt = null;
                header('location: ../index.php?error=stmtfailedProductType');
                exit();
            }

       }
       if(!empty($name)) {
        $stmt = $this->connect()->prepare("UPDATE product SET product_name = $p_name WHERE product_ID = $product_ID" );

            if(!$stmt->execute()) {
                $stmt = null;
                header('location: ../index.php?error=stmtfailedName');
                exit();
            }

        }
        if(!empty($description)) {
            $stmt = $this->connect()->prepare("UPDATE product SET product_description = $p_description WHERE product_ID = $product_ID" );


            if(!$stmt->execute()) {
                $stmt = null;
                header('location: ../index.php?error=stmtfailedDESCRIPTION');
                exit();
            }

       }

       if(!empty($regular_price)) {
        $stmt = $this->connect()->prepare("UPDATE product SET reg_price = $p_regular_price WHERE product_ID = $product_ID" );


        if(!$stmt->execute()) {
            $stmt = null;
            header('location: ../index.php?error=stmtfailedDESCRIPTION');
            exit();
        }

   }

       if(!empty($isPromotional)) {
        $stmt = $this->connect()->prepare("UPDATE product SET is_promotional = $p_isPromotional WHERE product_ID = $product_ID" );


            if(!$stmt->execute()) {
                $stmt = null;
                header('location: ../index.php?error=stmtfailed1');
                exit();
            }

        }

        
       if(!empty($discounted_price)) {
        $stmt = $this->connect()->prepare("UPDATE product SET discounted_price = $p_discounted_price WHERE product_ID = $product_ID" );


            if(!$stmt->execute()) {
                $stmt = null;
                header('location: ../index.php?error=stmtfailed1');
                exit();
            }

        }

        
        
       if(!empty($make)) {
        $stmt = $this->connect()->prepare("UPDATE product SET make = $p_make WHERE product_ID = $product_ID" );


            if(!$stmt->execute()) {
                $stmt = null;
                header('location: ../index.php?error=stmtfailed1');
                exit();
            }

        }


        if(!empty($num_rented)) {
            $stmt = $this->connect()->prepare("UPDATE product SET num_rented = $p_num_rented WHERE product_ID = $product_ID" );
    
    
                if(!$stmt->execute()) {
                    $stmt = null;
                    header('location: ../index.php?error=stmtfailed1');
                    exit();
                }
    
            }
    

        if(!empty($num_broken)) {
            $stmt = $this->connect()->prepare("UPDATE product SET num_broken = $p_num_broken WHERE product_ID = $product_ID" );
    
    
                if(!$stmt->execute()) {
                    $stmt = null;
                    header('location: ../index.php?error=stmtfailed1');
                    exit();
                }
    
            }
        

        if(!empty($quantity_unit)) {
            $stmt = $this->connect()->prepare("UPDATE product SET qty_unit = $p_quantity_unit WHERE product_ID = $product_ID" );
    
    
                if(!$stmt->execute()) {
                    $stmt = null;
                    header('location: ../index.php?error=stmtfailed1');
                    exit();
                }
    
            }

        if(!empty($model_no)) {
            $stmt = $this->connect()->prepare("UPDATE product SET model = $p_model_no WHERE product_ID = $product_ID" );
    
    
                if(!$stmt->execute()) {
                    $stmt = null;
                    header('location: ../index.php?error=stmtfailed1');
                    exit();
                }
    
            }

       if(!empty($quantity_in_stock)) {
        $stmt = $this->connect()->prepare("UPDATE product SET qty_in_stock = $p_quantity_in_stock WHERE product_ID = $product_ID" );


            if(!$stmt->execute()) {
                $stmt = null;
                header('location: ../index.php?error=stmtfailed1');
                exit();
            }

        }


        $stmt = null;
    }
}