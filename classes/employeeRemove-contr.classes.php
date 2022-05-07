
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
        //Call remove user function
        $this->removeUser($this->product_ID);
    }
    

}