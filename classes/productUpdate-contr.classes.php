<?php

class productUpdateContr extends productUpdate {
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
        // reference this property in this class
        $this->product_ID = $product_ID;
        $this->name = $name;
        $this->description = $description;
        $this->product_type = $product_type;
        $this->make =$make;
        $this->model_no = $model_no;
        $this->quantity_unit = $quantity_unit;
        $this->quantity_in_stock = $quantity_in_stock;
        $this->isPromotional = 1; //needs to be fixed
        $this->regular_price = $regular_price;
        $this->discounted_price = $discounted_price;
        $this->num_rented =$num_rented;
        $this->num_broken =$num_broken;
    }

    //updates product
    public function updateProduct() {
        if(empty($this->product_ID)) {
            header("location: ../inventory.php?error=emptyPRODUCT ID");
            exit();
        }
        //sets product
        $this->setProduct($this->product_ID,$this->name,$this->description,$this->product_type,$this->make,$this->model_no,$this->quantity_unit,$this->quantity_in_stock,$this->isPromotional,$this->regular_price,$this->discounted_price,$this->num_rented,$this->num_broken);
    }
}