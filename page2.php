<?php
if(isset($_POST['test'])){
    if(in_array('value1', $_POST['test'])){
        echo "Option1 was checked!";
    }
    else{echo "option 2";}
}
?>