<?php
session_start();

class UpdateProductContr extends UpdateProduct {
    // create the properties inside the class
    private $product_ID;
    private $product_type;
    private $name;
    private $description;
    private $model_no;
    private $regular_price;
    private $quantity_in_stock;

    // pass through the variables from the form
    public function __construct($product_ID, $product_type, $name, $description, $model_no, $regular_price,  $quantity_in_stock)
    {
        // reference this property in this class
        $this->product_ID = $product_ID;
        $this->product_type = $product_type;
        $this->name = $name;
        $this->description = $description;
        $this->model_no =$model_no;
        $this->regular_price = $regular_price;
        $this->quantity_in_stock = $quantity_in_stock;
    }

    public function updateProduct() {
        if(empty($this->product_ID)) {
            $_SESSION["updateProductErrorMsg"] = "Empty Product ID!";
            header("location: ../index.php?error=emptyProductID");
            exit();
        }
        else if(empty($this->product_type)) {
            $_SESSION["updateProductErrorMsg"] = "Empty Product Type!";
            header("location: ../index.php?error=emptyProductType");
            exit();
        }
        else if(empty($this->name)) {
            $_SESSION["updateProductErrorMsg"] = "Empty Name!";
            header("location: ../index.php?error=emptyName");
            exit();
        }
        else if(empty($this->description)) {
            $_SESSION["updateProductErrorMsg"] = "Empty Description!";
            header("location: ../index.php?error=emptyDescription");
            exit();
        }
        else if(empty($this->model_no)) {
            $_SESSION["updateProductErrorMsg"] = "Empty Model No!";
            header("location: ../index.php?error=emptyModelNo");
            exit();
        }
        else if(empty($this->regular_price)) {
            $_SESSION["updateProductErrorMsg"] = "Empty Regular Price!";
            header("location: ../index.php?error=emptyRegularPrice");
            exit();
        }
        else if(empty($this->quantity_in_stock)) {
            $_SESSION["updateProductErrorMsg"] = "Empty Quantity in Stock";
            header("location: ../index.php?error=emptyQuantityInStock");
            exit();
        }
        $this->setProduct($this->product_ID, $this->product_type, $this->name, $this->description, $this->model_no, $this->regular_price, $this->quantity_in_stock);
    }

}