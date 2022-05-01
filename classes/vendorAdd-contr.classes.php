<?php

class vendorAddContr extends vendorAdd {
    // create the properties inside the class
    private $product_ID;
    private $company_name;
    private $website;
    private $sales_representative;
    private $email;
    private $phone;
    private $vendor_notes;

    // pass through the variables from the form
    public function __construct($product_ID, $company_name, $website, $sales_representative, $email, $phone, $vendor_notes)
    {
        echo($product_ID);
        // reference this property in this class
        $this->product_ID = $product_ID;
        $this->company_name = $company_name;
        $this->website = $website;
        $this->sales_representative = $sales_representative;
        $this->email =$email;
        $this->phone = $phone;
        $this->vendor_notes = $vendor_notes;
    }

    public function addVendor() {
        if($this->emptyInput() == true) {
            header("location: ../vendor.php?error='emptyInput'");
            exit();
        }
        if($this->duplicateVendor() == true) {
            header("location: ../vendor.php?error='duplicateProduct");
            exit();
        }

        $this->setVendor($this->product_ID,$this->company_name,$this->website,$this->sales_representative,$this->email,$this->phone,$this->vendor_notes);
    }

    // error handling using methods

    // check if any of the fields are empty
    private function emptyInput() {
        $result;

        if(empty($this->product_ID) || empty($this->company_name) || empty($this->website) || empty($this->sales_representative) || empty($this->email) || empty($this->phone) || empty($this->vendor_notes)) {
            $result = true;
        } else {
            $result = false;
        }

        return $result;
    }


    private function duplicateVendor() {
        $result;
        if($this->checkVendor($this->product_ID, $this->company_name) == false) {
            $result = true;
        } else {
            $result = false;
        }
        return $result;
    }
}