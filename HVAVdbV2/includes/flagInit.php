<?php
    function resetFlags(){

        if (!isset($_SESSION["loginErrorMsg"])){
            $_SESSION["loginErrorMsg"] = "";
        }
        if (!isset($_SESSION["addUserErrorMsg"])){
            $_SESSION["addUserErrorMsg"] = "";
        }   //Implemented
        if (!isset($_SESSION["updateUserErrorMsg"])){
            $_SESSION["updateUserErrorMsg"] = "";
        }   //Implemented
        if (!isset($_SESSION["removeUserErrorMsg"])){
            $_SESSION["removeUserErrorMsg"] = "";
        }   //Implemented
        if (!isset($_SESSION["addProductErrorMsg"])){
            $_SESSION["addProductErrorMsg"] = "";
        }   //Implemented possible session not started
        if (!isset($_SESSION["removeProductErrorMsg"])){
            $_SESSION["removeProductErrorMsg"] = "";
        }   //Implemented
        if (!isset($_SESSION["updateProductErrorMsg"])){
            $_SESSION["updateProductErrorMsg"] = "";
        }
        print_r($_SESSION);
    }
?>