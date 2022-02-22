<?php

class AddProductContr extends AddProduct {
    // create the properties inside the class
    private $product_ID;
    private $product_type;
    private $name;
    private $description;
    private $model_no;
    private $regular_price;
    private $quantity_in_stock;

    // pass through the variables from the form
    public function __construct($product_ID, $product_type, $name, $description, $model_no, $regular_price,  $quantity_in_stock)
    {
        // reference this property in this class
        $this->product_ID = $product_ID;
        $this->product_type = $product_type;
        $this->name = $name;
        $this->description = $description;
        $this->model_no =$model_no;
        $this->regular_price = $regular_price;
        $this->quantity_in_stock = $quantity_in_stock;
    }

    public function addProduct() {
        if($this->emptyInput() == false) {
            header("location: ../index.php?error=emptyinput");
            exit();
        }
        if($this->duplicateProduct() == false) {
            header("location: ../index.php?error=userornametaken");
            exit();
        }

        $this->setProduct($this->product_ID, $this->product_type, $this->name, $this->description, $this->model_no, $this->regular_price, $this->quantity_in_stock);
    }

    // error handling using methods

    // check if any of the fields are empty
    private function emptyInput() {
        $result;

        if(empty($this->product_ID) || empty($this->product_type) || empty($this->name) || empty($this->description) || empty($this->model_no) || empty($this->regular_price) || empty($this->quantity_in_stock)) {
            $result = false;
        } else {
            $result = true;
        }

        return $result;
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