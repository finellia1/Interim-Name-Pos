<?php

    
    include('db_connect.php');
    session_start();       //session is used to get cart from previous page.
    $cart = $_SESSION['cart'];
    $product_IDs = array_keys($cart);
    //print_r($product_IDs);
    //print_r($cart);

    $stmt = $conn ->query('SELECT * FROM product');  //gets all items in the products table, and outputs them as an assoc array
    $products = $stmt -> fetchALL(PDO::FETCH_ASSOC);
    $items_in_cart;
    $itemnumber=0;
    $totalcost =0.00;
    $sales_tax =0.00;
    $subtotal = 0.00;
    $payment_type = "credit card";


    for($i = 0; $i<count($products); $i++){

        $id= $product_IDs[$itemnumber];

        if($product_IDs[$itemnumber] == $products[$i]['product_ID']){

            $items_in_cart[$itemnumber] = $products[$i];
            $totalcost = $totalcost + $products[$i]['reg_price'] * $cart[$id];
            $itemnumber++;
            if($itemnumber> count($product_IDs)-1){
                break;
            }

        }

    }
    
    //echo $totalcost;
    //print_r($items_in_cart);

    $tax = 1.089;


    $stmt = $conn ->query('SELECT invoice_ID FROM invoice');  //gets all invoice_ID numbers to figure out current invoiceID
    $ids = $stmt -> fetchALL(PDO::FETCH_COLUMN);
    $newID =array_pop($ids);                                  //gets most recent id and increments it.

    $_SESSION['invoice_ID'] = $newID; 

    // for testing
    $stmt2 = $conn ->query('SELECT * FROM client');            //gets all client info, that will be used display info on invoice, see if tax exempt,
    $clients = $stmt2 -> fetchALL(PDO::FETCH_ASSOC);
    $currentClient= $clients[2];                                // index 0-4 to check each client in the current database.

    //once sessions is implemented

    // $currentClient = $_SESSION['client'];
    
    if ($currentClient['is_tax_exempt'] == 0){
        
        $subtotal = $totalcost;
        $totalcost = $totalcost * $tax;
        $sales_tax = $totalcost - $subtotal;

    }
    
    
    // the index can be changed to change the invoice based on the client.(for testing purposes)
    // print_r($currentClient);
    
    //// Adding new invoice info into database. It works, but its currently commented out to make testing easier. 

    $stmt = $conn ->query('SELECT * FROM `event_order` ORDER BY `event_order`.`event_order_ID` ASC');  //gets corresponding event_order_ID for foreign key
    $ids = $stmt -> fetchALL(PDO::FETCH_COLUMN);
    $eo_ID =array_pop($ids);  

    $dateNow=date("Y-m-d");
    $timeNow= date("Y-m-d  H:i:s");

    $query= 'INSERT INTO invoice( event_product_list_ID_fk, event_order_ID_fk, client_ID_fk, venue_ID_fk, refund_ID_fk, time_of_sale, is_tax_exempt, subtotal, sales_tax, total_due, payment_type, date_due) VALUES (?,?,?,?,?,?,?,?,?,?,?,?)';
    $statement = $conn->prepare($query)->execute([9, $eo_ID, $currentClient['client_ID'], 2, 0, $timeNow, 0, $subtotal,$sales_tax, $totalcost,$payment_type, $dateNow]);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice</title>

    <style>

                 /*Fonts*/


        @font-face{
            font-family: roboto-black;
            src: url(../fonts/roboto/roboto-black.ttf);
        }
        @font-face{
            font-family: roboto-blackitalic;
            src: url(../fonts/roboto/roboto-blackitalic.ttf);
        }
        @font-face{
            font-family: roboto-bold;
            src: url(../fonts/roboto/roboto-bold.ttf);
        }
        @font-face{
            font-family: roboto-bolditalic;
            src: url(../fonts/roboto/roboto-bolditalic.ttf);
        }
        @font-face{
            font-family: roboto-italic;
            src: url(../fonts/roboto/roboto-italic.ttf);
        }
        @font-face{
            font-family: roboto-light;
            src: url(../fonts/roboto/roboto-light.ttf);
        }
        @font-face{
            font-family: roboto-lightitalic;
            src: url(../fonts/roboto/roboto-lightitalic.ttf);
        }
        @font-face{
            font-family: roboto-medium;
            src: url(../fonts/roboto/roboto-medium.ttf);
        }
        @font-face{
            font-family: roboto-mediumitalic;
            src: url(../fonts/roboto/roboto-mediumitalic.ttf);
        }
        @font-face{
            font-family: roboto-regular;
            src: url(../fonts/roboto/roboto-regular.ttf);
        }
        @font-face{
            font-family: roboto-thin;
            src: url(../fonts/roboto/roboto-thin.ttf);
        }
        @font-face{
            font-family: roboto-thinitalic;
            src: url(../fonts/roboto/roboto-thinitalicegular.ttf);
        }
        h1{
            font-family:roboto-black ;
            padding-left: 10px;
        }

        .card {
        /* Add shadows to create the "card" effect */
        box-shadow: 0px 0px 20px 10px rgba(0, 0, 0, 0.06);
        transition: 0.3s;
        border-radius: 25px;
        font-family: roboto-black;
        margin-left: auto;
        margin-right: auto;
        display: block;

        }
        #colorbox{

            background-image: linear-gradient(135.76deg, #452ADD 7.5%, #602add 88.59%);
            border-radius:10px;
            min-height: 8px;


        }

        table {
        /* background-image: linear-gradient(135.76deg, #FF0F7B 7.5%, #F89B29 88.59%); */
        font-family: roboto-black;
        margin-left: auto;
        margin-right: auto;
        width: 40%;
        border-radius:10px;
        box-shadow: 0px 0px 20px 10px rgba(0, 0, 0, 0.06);
        transition: 0.3s;
        }

        td, th {
        text-align: center;
        padding: 8px;
        }
        
        th{
            border-bottom: 1px;
        }

        .dot {
            height: 70px;
            width: 70px;
            background-image:linear-gradient(135.76deg, #452ADD 7.5%, #602add 88.59%);
            border-radius: 50%;
            display: inline-block;
        }

        .container{
            display: flex;
        }


         #title{

                font-family:roboto-black ;
                font-size:calc(30px + 1.5vw);
                min-width: 200%;
                /* line-height: 39px; */

                background-image:linear-gradient(135.76deg, #452ADD 7.5%, #602add 88.59%);
                -webkit-background-clip: text;
                -webkit-text-fill-color: transparent; 
                
                }

        .topright {
            position: absolute;
            left: 80%;
            
        }
        button{
            background-image:linear-gradient(135.76deg, #452ADD 7.5%, #602add 88.59%) ;
            border: none;
            color: white;
            border-radius: 100px;
            padding: 20px;
            text-align: center;
            text-decoration: none;
            font-size: 16px;
            margin: 4px 2px;
            float:right;
            margin-right:5px;
            right: 50px;


        }

        button:hover {
        background: #45a049;
        }


        .parent {
            margin: 1rem;
            padding-top: 1rem 1rem;
            text-align: center;
        }
        .child {
            display: inline-block;
            padding-top: 1rem 1rem;
            vertical-align: middle;
            text-align: left;
        }
        html, body {
            min-height: 100%;
        }


    </style>

</head>
<body>
<main title="Invoicing">

    <div class="container">
       <div class="container" style="padding-top:10px"> 
           <span class="dot"></span>
        <h1>Invoice #<?php echo $newID ?></h1>     
        </div>
       <div class="topright">
            <h1 id="title">RENT-EZ</h1>
       </div>
    </div>
    
        
    <div class="parent">

        <div class="child">
        <!--Displays all shop information in a card -->
          <div class="card" style="width: 90%;">
              <h2 style="padding: 10px;">Rent-EZ</h2>
              <h3 style="padding-left: 10px; padding-right: 10px;">845-797-7000</h3>
              <h3 style="padding: 10px;">1914 US-44, Modena, NY, 12548</h3>
          </div>
        </div>
        <div class="child"> 

            <div class="card" style="width: 90%;">        <!--Displays all client information in a card -->

                <h2 style="padding: 10px;"><?php echo $currentClient['company'];?></h2>
                <h3 style="padding-left: 10px; padding-right: 10px;"><?php echo $currentClient['phone']; ?></h3>
                <h3 style="padding: 10px;">
                <?php

                    echo $currentClient['address_line1']. ", " . $currentClient['city']. ", " . $currentClient['state_abbr']. ", " . $currentClient['zip_code'];

                ?>
                </h3>

            </div>

        </div>

    </div>
       

        <table>
            <tr>
                <th>Item ID</th>
                <th>Description</th>
                <th>Quantity</th>
                <th>Unit Cost</th>
                <th>Total Cost</th>
            </tr>

           <tr>
               <td colspan="5"><div id="colorbox">  </div></td>
           </tr>
            
                

            <?php
                for($i =0; $i<count($items_in_cart); $i++){          //displays all items to be purchased in the invoice.

                    echo '<tr><td>'. $items_in_cart[$i]['product_ID'].'</td>';
                    echo '<td>'. $items_in_cart[$i]['product_description'].'</td>';
                    echo '<td>'. $cart[$product_IDs[$i]].'</td>';
                    echo '<td>'. "$". $items_in_cart[$i]['reg_price'].'</td>';
                    echo '<td>'. "$". sprintf("%.2f",$items_in_cart[$i]['reg_price'] *$cart[$product_IDs[$i]]).'</td>';


                }
            
            ?>

        </table>
        
        
            <div class="card" style="max-width: 300px">
                    
                <h2 style="padding: 10px;">SubTotal : <?php echo "$".sprintf("%.2f", ($totalcost)); ?></h1>
                <h3 style="padding: 10px;"> 
                <?php
                if($currentClient['is_tax_exempt'] == 1){ //checks if client is tax exempt or not, and changes the invoice accordingly
                    echo "Text Exempt";
                }
                else{
                    echo "Tax: 8%";
                }
                ?>
                </h3>
                           
            </div>  
            
            
            <button onClick="window.print()">Print this page</button>
            <a href="../payment/index.php"><button>Continue</button></a>
            
            </main>
</body>
</html>