<?php

class removeProductContr extends removeProduct {
    // create the properties inside the class
    private $product_ID;

    // pass through the variables from the form
    public function __construct($product_ID)
    {
        // reference this property in this class
        $this->product_ID = $product_ID;
    }
    //checks if empty, emoves product
    public function checkProduct() {
        if($this->emptyInput() == false) {
            header("location: ../index.php?error=emptyinput");
            exit();
        }
        //removes product
        $this->removeProduct($this->product_ID);
    }

    // error handling using methods

    // bool
    private function emptyInput() {
        $result;

        if(empty($this->product_ID)) {
            $result = false;
        } else {
            $result = true;
        }

        return $result;
    }
}