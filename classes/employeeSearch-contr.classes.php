<?php

class employeeSearchContr extends employeeSearch {
    // create the properties inside the class
    private $searchType;
    private $searchContent;

    // pass through the variables from the form
    public function __construct($searchType, $searchContent)
    {
        //Compare actual search type to row name
        if($searchType == "Employee ID"){
            $searchType = "employee_ID";
        }else if($searchType == "Security Type"){
            $searchType = "security_type";
        } else if($searchType == "Password"){
            $searchType = "pwd";
        } else if($searchType == "Job Title"){
            $searchType = "job_title";
        } else if($searchType == "First Name"){
            $searchType = "first_name";
        } else if($searchType == "Last Name"){
            $searchType = "last_name";
        } else if($searchType == "Email"){
            $searchType = "email";
        } else if($searchType == "Hourly Salary"){
            $searchType = "hourly_salary";
        } else if($searchType == "Yearly Salary"){
            $searchType = "yearly_salary";
        }else {
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

    public function searchEmployees() {
        $this->getEmployees($this->searchType, $this->searchContent);
    }
}