<?php

class productRemoveContr extends productRemove {
    // create the properties inside the class
    private $product_ID;

    // pass through the variables from the form
    public function __construct($product_ID)
    {
        // reference this property in this class
        $this->product_ID = $product_ID;
    }

    public function checkProduct() {
        if($this->emptyInput() == false) {
            header("location: ../homepage.php?error=emptyinput");
            exit();
        }
        $this->removeProduct($this->product_ID);
    }

    // error handling using methods

    // check if any of the fields are empty
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