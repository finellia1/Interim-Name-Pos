<?php

class clientSearchContr extends clientSearch {
    // create the properties inside the class
    private $searchType;
    private $searchContent;

    // pass through the variables from the form
    public function __construct($searchType, $searchContent)
    {
        //Compare actual search type to row name
        if($searchType == "Company"){
            $searchType = "company_name";
        } else if($searchType == "Client Type"){
            $searchType = "client_type";
        } else if($searchType == "First Name"){
            $searchType = "first_name";
        } else if($searchType == "Last Name"){
            $searchType = "last_name";
        } else if($searchType == "Email"){
            $searchType = "email";
        } else if($searchType == "Address Line 1"){
            $searchType = "address_line1";
        } else if($searchType == "Address Line 2"){
            $searchType = "address_line2";
        } else if($searchType == "City"){
            $searchType = "city";
        } else if($searchType == "State Abbreviation"){
            $searchType = "state_abbr";
        } else if($searchType == "Zip Code"){
            $searchType = "zip_code";
        } else if($searchType == "Phone Number"){
            $searchType = "phone";
        } else if($searchType == "Client Notes") {
                $searchType = "client_notes";
        } else {
            $searchType = " ";
        }
        if($searchContent=="" ){
            $searchContent= " ";
        } else {
            //echo($searchContent);
        }
        // reference this property in this class
        $this->searchType = $searchType;
        $this->searchContent = $searchContent;
    }

    public function searchClients() {
        $this->getClients($this->searchType, $this->searchContent);
    }
}