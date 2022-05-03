
<?php
session_start();
class employeeRemoveContr extends employeeRemove {
    // create the properties inside the class
    private $product_ID;

    // pass through the variables from the form
    public function __construct($product_ID)
    {
        // reference this property in this class
        $this->product_ID = $product_ID;
    }
    public function checkEmployee() {
        /*if($this->emptyInput() == false) {
            $_SESSION["removeUserErrorMsg"] = "Please enter an Email!";
            header("location: ../employees.php?error=emptyinput");
            exit();
        }
        */
        $this->removeUser($this->product_ID);
    }
    /*


    // error handling using methods

    // check if any of the fields are empty
    private function emptyInput() {
        $result;

        if(empty($this->email)) {
            $result = false;
        } else {
            $result = true;
        }

        return $result;
    }

    // check that the username is valid
    private function invalidEmail() {
        $result;
        if(!preg_match("/^[a-zA-Z0-9]*$/", $this->email)){
            $_SESSION["removeUserErrorMsg"] = "Please enter an Email!";
            $result = false;
        } else {
            $result = true;
        }

        return $result;
    }
    */

}