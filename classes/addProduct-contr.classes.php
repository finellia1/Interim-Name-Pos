<?php

class AddProductContr extends AddProduct {
    // create the properties inside the class
    private $product_ID;
    private $name;
    private $description;
    private $product_type;
    private $make;
    private $model_no;
    private $quantity_unit;
    private $quantity_in_stock;
    private $isPromotional;
    private $regular_price;
    private $discounted_price;
    private $num_rented;
    private $num_broken;

    // pass through the variables from the form
    public function __construct($product_ID, $name, $description, $product_type, $make, $model_no, $quantity_unit, $quantity_in_stock,$isPromotional,$regular_price,$discounted_price,$num_rented,$num_broken)
    {
        echo($product_ID);
        // reference this property in this class
        $this->product_ID = $product_ID;
        $this->name = $name;
        $this->description = $description;
        $this->product_type = $product_type;
        $this->make =$make;
        $this->model_no = $model_no;
        $this->quantity_unit = $quantity_unit;
        $this->quantity_in_stock = $quantity_in_stock;
        $this->isPromotional = $isPromotional;
        $this->regular_price = $regular_price;
        $this->discounted_price = $discounted_price;
        $this->num_rented =$num_rented;
        $this->num_broken =$num_broken;
    }

    public function addProduct() {
        if($this->emptyInput() == false) {
            header("location: ../includes/inventory.php");
            exit();
        }
        if($this->duplicateProduct() == false) {
            header("location: ../includes/inventory.php");
            exit();
        }

        $this->setProduct($this->product_ID,$this->name,$this->description,$this->product_type,$this->make,$this->model_no,$this->quantity_unit,$this->quantity_in_stock,$this->isPromotional,$this->regular_price,$this->discounted_price,$this->num_rented,$this->num_broken);
    }

    // error handling using methods

    // check if any of the fields are empty
    private function emptyInput() {
        $result;

        if(empty($this->product_ID) || empty($this->name) || empty($this->description) || empty($this->product_type) || empty($this->make) || empty($this->model_no) || empty($this->quantity_unit) || empty($this->quantity_in_stock) || empty($this->isPromotional) || empty($this->regular_price) || empty($this->discounted_price)|| empty($this->num_rented) || empty($this->num_broken) || empty($this->model_no)) {
            $result = false;
            
            if (empty($this->name)){$_SESSION["addProductErrorMsg"] = "Missing Name!";}
            else if (empty($this->product_type)) {$_SESSION["addProductErrorMsg"] = "Missing Product Type";}
            else if (empty($this->description)) {$_SESSION["addProductErrorMsg"] = "Missing Description";}
            else if (empty($this->make)) {$_SESSION["addProductErrorMsg"] = "Missing Make";}
            else if (empty($this->model_no)) {$_SESSION["addProductErrorMsg"] = "Missing Model Number";}
            else if (empty($this->quantity_units)) {$_SESSION["addProductErrorMsg"] = "Missing Quantity Units";}
            else if (empty($this->quantity_in_stock)) {$_SESSION["addProductErrorMsg"] = "Missing Quantity in Stock";}
            else if (empty($this->isPromotional)) {$_SESSION["addProductErrorMsg"] = "Missing Is Promotional";}
            else if (empty($this->regular_price)) {$_SESSION["addProductErrorMsg"] = "Missing Regular Price";}
            else if (empty($this->discounted_price)) {$_SESSION["addProductErrorMsg"] = "Missing Discounted Price";}
            else if (empty($this->num_rented)) {$_SESSION["addProductErrorMsg"] = "Missing Number Rented";}
            else if (empty($this->num_broken)) {$_SESSION["addProductErrorMsg"] = "Missing Number Broken";}
        else {
            $result = true;
        }

        return $result;
    }
}


    private function duplicateProduct() {
        $result;
        if(!$this->checkProduct($this->product_ID, $this->name)) {
            $result = false;
        } else {
            $result = true;
        }
        return $result;
    }
}