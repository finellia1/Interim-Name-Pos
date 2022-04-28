<?php

include('../invoice/db_connect.php');
// id= 7Ucr2AUj5k
// key = 69Qcf7E4Q4PQc76m 
 session_start();
 if($_SESSION != NULL){
    $error = $_SESSION['error'];
    session_unset();
 }else{
     $error = '';
 }
 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="../css/editCredPage.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit Credentials</title>
</head>
<body>

<div class="content-wrapper">

    <h1>Edit Authorize.net Credentials</h1>

        <form method="POST" action="editData.php" > 

            <div class="form-content">
                <h2> <?php echo $error; ?></h2>
                <label>New Transaction Key:</label> 
                <input name="key" type="text"/>
                <label>Re-Enter New Key: </label> 
                <input name="keyconfirm" type="text"/>
                <label>New Transaction ID:</label> 
                <input name="id" type="text"/>
                <label>Re-Enter New ID: </label>
                <input name="idconfirm" type="text"/>
                <input type="submit" name="submit" class="submit" value="Insert" />
                

            </div>
            
        </form> 

</div>

</body>
</html>