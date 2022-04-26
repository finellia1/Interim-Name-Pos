<?php

class vendorUpdateContr extends vendorUpdate {
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

    //updates vendor
    public function updateVendor() {
        if(empty($this->product_ID)) {
            header("location: ../vendor.php?error=emptyPRODUCT ID");
            exit();
        }
        //sets product
        $this->setVendor($this->product_ID,$this->company_name,$this->website,$this->sales_representative,$this->email,$this->phone,$this->vendor_notes);
    }
}