<?php

class clientAddContr extends clientAdd {
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
        echo($product_ID);
        // reference this property in this class
        $this->product_ID = $product_ID;
        $this->company_name = $company_name;
        $this->client_type = $client_type;
        $this->first_name = $first_name;
        $this->last_name =$last_name;
        $this->email = $email;
        $this->address_line1 = $address_line1;
        $this->address_line2 = $address_line2;
        $this->city = $city;
        $this->state_abbr = $state_abbr;
        $this->zip_code = $zip_code;
        $this->phone =$phone;
        $this->client_notes =$client_notes;
    }

    public function addClient() {
        if($this->emptyInput() == true) {
            header("location: ../clients.php?error='emptyInput'");
            exit();
        }
        if($this->duplicateClient() == true) {
            header("location: ../clients.php?error='duplicateClient");
            exit();
        }

        $this->setClient($this->product_ID,$this->company_name,$this->client_type,$this->first_name,$this->last_name,$this->email,$this->address_line1,$this->address_line2,$this->city,$this->state_abbr,$this->zip_code,$this->phone,$this->client_notes);
    }

    // error handling using methods

    // check if any of the fields are empty
    private function emptyInput() {
        $result;

        if(empty($this->product_ID) || empty($this->company_name) || empty($this->client_type) || empty($this->first_name) || empty($this->last_name) || empty($this->email) || empty($this->address_line1) || empty($this->address_line2) || empty($this->city) || empty($this->state_abbr) || empty($this->zip_code)|| empty($this->phone) || empty($this->client_notes)) {
            $result = true;
        } else {
            $result = false;
        }

        return $result;
    }


    private function duplicateClient() {
        $result;
        if($this->checkClient($this->product_ID, $this->first_name, $this->last_name) == false) {
            $result = true;
        } else {
            $result = false;
        }
        return $result;
    }

}