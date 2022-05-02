<?php

class vendorSearchContr extends vendorSearch {
    // create the properties inside the class
    private $searchType;
    private $searchContent;

    // pass through the variables from the form
    public function __construct($searchType, $searchContent)
    {
        //Compare actual search type to row name
        if($searchType == "Vendor ID"){
            $searchType = "vendor_ID";
        } else if($searchType == "Company Name"){
            $searchType = "company_name";
        } else if($searchType == "Website"){
            $searchType = "website";
        } else if($searchType == "Sales Representative"){
            $searchType = "salesrep";
        } else if($searchType == "Email"){
            $searchType = "email";
        } else if($searchType == "Phone}"){
            $searchType = "phone";
        } else if($searchType == "Vendor Notes"){
            $searchType = "vendor_notes";
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

    public function searchProducts() {
        $this->getProducts($this->searchType, $this->searchContent);
    }
}