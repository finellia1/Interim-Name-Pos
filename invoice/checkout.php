<?php 

    include('db_connect.php');   //connects to database.

    if($connected ==true){
        $stmt = $conn ->query('SELECT * FROM product');  //gets all items in the products table, and outputs them as an assoc array
        $products = $stmt -> fetchALL(PDO::FETCH_ASSOC);
        for($i =0 ; $i<6 ; $i++){
            
            $shoppingCart[$i] =$products[$i+random_int(1,18)]; //fills an array up with 6 random items from the products array
        }
        print_r($shoppingCart);         // checking products.

        session_start();                // puts shoppingcart array in a session, so that it can persist throughout the application.
        $_SESSION['cartArray'] = $shoppingCart;
        
    }

    

?>
<!-- <script type = "text/javascript">
    function pushCart(){
        alert(30);
        cartArray = <?php //echo $shoppingCart?>;
        sessionStorage.setItem('Array', JSON.stringify(cartArray));
        
        //window.location.href = 'invoicing.php';

    }
</script> -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
</head>
<body>
    <li><a href="invoicing.php">Send Cart</a></li>
</body>

</html>