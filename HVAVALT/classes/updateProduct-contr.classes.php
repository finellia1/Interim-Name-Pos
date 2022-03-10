<?php

class UpdateProductContr extends UpdateProduct {
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
    //updates product
    public function updateProduct() {
        if(empty($this->product_ID)) {
            header("location: ../index.php?error=emptyPRODUCT ID");
            exit();
        }
        //sets product
        $this->setProduct($this->product_ID, $this->product_type, $this->name, $this->description, $this->model_no, $this->regular_price, $this->quantity_in_stock);
    }
}