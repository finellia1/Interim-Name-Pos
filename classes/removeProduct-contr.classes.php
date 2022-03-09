<?php
session_start();
class removeProductContr extends removeProduct {
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
<<<<<<< Updated upstream
            header("location: ../includes/inventory.php?error=emptyinput");
=======
            $_SESSION["removeProductErrorMsg"] = "Empty Input!";
            header("location: ../homepage.php?error=emptyinput");
>>>>>>> Stashed changes
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