<?php
    function resetFlags(){
        session_start();
        if (!isset($_SESSION["loginErrorFlag"])){
            $_SESSION["loginErrorFlag"] = 0;
        }
        if (!isset($_SESSION["addUserFlag"])){
            $_SESSION["addUserFlag"] = 0;
        }
        if (isset($_SESSION["updateUserErrorFlag"])){
            $_SESSION["updateUserErrorFlag"] = 0;
        }
        if (!isset($_SESSION["loginErrorMsg"])){
            $_SESSION["loginErrorMsg"] = "";
        }
        if (!isset($_SESSION["addUserErrorMsg"])){
            $_SESSION["addUserErrorMsg"] = "";
        }
        if (!isset($_SESSION["updateUserErrorMsg"])){
            $_SESSION["updateUserErrorMsg"] = "";
        }
}
?>