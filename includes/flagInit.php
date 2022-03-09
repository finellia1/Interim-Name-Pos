<?php
    function resetFlags(){
<<<<<<< Updated upstream
        if (!isset($_SESSION["loginErrorFlag"])){
            $_SESSION["loginErrorFlag"] = 0;
        }
        if (!isset($_SESSION["addUserFlag"])){
            $_SESSION["addUserFlag"] = 0;
        }
=======
        //session_start();
>>>>>>> Stashed changes
        if (!isset($_SESSION["loginErrorMsg"])){
            $_SESSION["loginErrorMsg"] = "";
        }
        if (!isset($_SESSION["addUserErrorMsg"])){
            $_SESSION["addUserErrorMsg"] = "";
<<<<<<< Updated upstream
=======
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
>>>>>>> Stashed changes
        }
    }
?>