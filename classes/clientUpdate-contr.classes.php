<?php

class clientUpdateContr extends clientUpdate {
    // create the properties inside the class
    private $product_ID;
    private $company_name;
    private $client_type;
    private $first_name;
    private $last_name;
    private $email;
    private $address_line1;
    private $address_line2;
    private $city;
    private $state_abbr;
    private $zip_code;
    private $phone;
    private $client_notes;

    // pass through the variables from the form
    public function __construct($product_ID,$company_name,$client_type,$first_name,$last_name,$email,$address_line1,$address_line2,$city,$state_abbr,$zip_code,$phone,$client_notes)
    {
        $this-> product_ID = $product_ID;
        $this-> company_name = $company_name;
        $this-> client_type = $client_type;
        $this-> first_name = $first_name;
        $this-> last_name = $last_name;
        $this-> email = $email;
        $this-> address_line1 = $address_line1;
        $this-> address_line2 = $address_line2;
        $this-> city = $city;
        $this-> state_abbr = $state_abbr;
        $this-> zip_code = $zip_code;
        $this-> phone = $phone;
        $this-> client_notes = $client_notes;
    }

    //updates product
    public function updateClient() {
        if(empty($this->product_ID)) {
            header("location: ../clients.php?error=emptyPRODUCT ID");
            exit();
        }
        //sets product
        $this->setClient($this-> product_ID,$this-> company_name,$this-> client_type,$this-> first_name,$this-> last_name,$this-> email,$this-> address_line1,$this-> address_line2,$this-> city,$this-> state_abbr,$this-> zip_code,$this-> phone,$this-> client_notes);
    }
}

