<?php

include('../invoice/db_connect.php');
// id= 7Ucr2AUj5k
// key = 69Qcf7E4Q4PQc76m 
// for testing purposes.

$stmt = $conn ->query('SELECT * FROM authorize_credentials');
$creds = $stmt -> fetchALL(PDO::FETCH_COLUMN);

if($creds != null){
    header("Location: index.php");
}

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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enter Credentials</title>
</head>
<body>
<div class="content-wrapper">
    <h1>Enter Authorize.net Credentials</h1>
    <form method="POST" action="subEncData.php" > 
        <h2> <?php echo $error; ?></h2>
        <label>Transaction Key:</label> 
        <input name="key" type="text"/>
        <label>Re-Enter Key: </label> 
        <input name="keyconfirm" type="text"/>
        <label>Transaction ID:</label> 
        <input name="id" type="text"/>
        <label>Re-Enter ID: </label>
        <input name="idconfirm" type="text"/>
        <input type="submit" name="submit" class="submit" value="Insert" />
    </form> 

</div>
</body>
</html>