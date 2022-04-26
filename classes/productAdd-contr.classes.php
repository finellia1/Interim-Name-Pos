<?php

class productAddContr extends productAdd {
    // create the properties inside the class
    private $product_ID;
    private $product_name;
    private $product_description;
    private $product_type;
    private $make;
    private $model;
    private $qty_unit;
    private $qty_in_stock;
    private $is_promotional;
    private $reg_price;
    private $discounted_price;
    private $num_rented;
    private $num_broken;

    // pass through the variables from the form
    public function __construct($product_ID, $product_name, $product_description, $product_type, $make, $model, $qty_unit, $qty_in_stock, $is_promotional, $reg_price, $discounted_price, $num_rented, $num_broken)
    {
        echo($product_ID);
        // reference this property in this class
        $this->product_ID = $product_ID;
        $this->product_name = $product_name;
        $this->product_description = $product_description;
        $this->product_type = $product_type;
        $this->make =$make;
        $this->model = $model;
        $this->qty_unit = $qty_unit;
        $this->qty_in_stock = $qty_in_stock;
        $this->is_promotional = $is_promotional;
        $this->reg_price = $reg_price;
        $this->discounted_price = $discounted_price;
        $this->num_rented =$num_rented;
        $this->num_broken =$num_broken;
    }

    public function addProduct() {
        if($this->emptyInput() == true) {
            header("location: ../homepage.php?error='emptyInput'");
            exit();
        }
        if($this->duplicateProduct() == true) {
            header("location: ../homepage.php?error='duplicateProduct");
            exit();
        }

        $this->setProduct($this->product_ID,$this->product_name,$this->product_description,$this->product_type,$this->make,$this->model,$this->qty_unit,$this->qty_in_stock,$this->is_promotional,$this->reg_price,$this->discounted_price,$this->num_rented,$this->num_broken);
    }

    // error handling using methods

    // check if any of the fields are empty
    private function emptyInput() {
        $result;

        if(empty($this->product_ID) || empty($this->product_name) || empty($this->product_description) || empty($this->product_type) || empty($this->make) || empty($this->model) || empty($this->qty_unit) || empty($this->qty_in_stock) || empty($this->is_promotional) || empty($this->reg_price) || empty($this->discounted_price)|| empty($this->num_rented) || empty($this->num_broken)) {
            $result = true;
        } else {
            $result = false;
        }

        return $result;
    }


    private function duplicateProduct() {
        $result;
        if($this->checkProduct($this->product_ID, $this->product_name) == false) {
            $result = true;
        } else {
            $result = false;
        }
        return $result;
    }
}