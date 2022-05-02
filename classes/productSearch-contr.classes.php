<?php

class productSearchContr extends productSearch {
    // create the properties inside the class
    private $searchType;
    private $searchContent;

    // pass through the variables from the form
    public function __construct($searchType, $searchContent)
    {
        //Compare actual search type to row name
        if($searchType == "Product ID"){
            $searchType = "product_ID";
        } else if($searchType == "Product Type"){
            $searchType = "product_type";
        } else if($searchType == "Product Name"){
            $searchType = "product_name";
        } else if($searchType == "Description"){
            $searchType = "product_description";
        } else if($searchType == "Make"){
            $searchType = "make";
        } else if($searchType == "Model Number"){
            $searchType = "model";
        } else if($searchType == "Quantity Unit"){
            $searchType = "qty_unit";
        } else if($searchType == "Quantity In Stock"){
            $searchType = "qty_in_stock";
        } else if($searchType == "Regular Price"){
            $searchType = "reg_price";
        } else if($searchType == "Discounted Price"){
            $searchType = "discounted_price";
        } else if($searchType == "Number Rented"){
            $searchType = "num_rented";
        } else if($searchType == "Number Broken") {
                $searchType = "num_broken";
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

    public function getVendors(){
        $this->fillVendorForm();
    }
}