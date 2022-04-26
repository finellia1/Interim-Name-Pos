<?php

    
    //database_v2
    session_start();       //session is used to get cart from previous page.
    $cart = $_SESSION['cartArray'];
    // print_r($cart);

    include('db_connect.php');

    $totalcost= 0;
    $tax = 1.08;

    for($i = 0; $i<6 ; $i++){                   //for testing
        $quant[$i]=random_int(1,3);
    }

    for($i =0; $i<count($cart); $i++){
        
        $totalcost = $totalcost + $cart[$i]['reg_price'] *$quant[$i];

    }
  

    $stmt = $conn ->query('SELECT invoice_ID FROM invoice ORDER BY invoice_ID ASC');  //gets all invoice_ID numbers to figure out current invoiceID
    $ids = $stmt -> fetchALL(PDO::FETCH_COLUMN);
    $newID =array_pop($ids);                                  //gets most recent id and increments it.
    $newID++;

    $stmt2 = $conn ->query('SELECT * FROM client');            //gets all client info, that will be used display info on invoice, see if tax exempt,
    $clients = $stmt2 -> fetchALL(PDO::FETCH_ASSOC);
    $currentClient= $clients[2];                                // index 0-4 to check each client in the current database.
    
    if ($currentClient['tax_exempt'] == 0){
        
        $totalcost = $totalcost * $tax;

    }
    
    
    // the index can be changed to change the invoice based on the client.(for testing purposes)
    // print_r($currentClient);
    
    //// Adding new invoice info into database. It works, but its currently commented out to make testing easier. 

    // $timeNow=date("Y-m-d");
    // $query= 'INSERT INTO invoice(invoice_ID, event_order_ID_fk, client_ID_fk, invoice_date, total_due) VALUES (?,?,?,?,?)';
    // $statement = $conn->prepare($query)->execute([$newID, 1, $currentClient['client_ID'],$timeNow,$totalcost]);

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

        }
        #colorbox{

            background-image: linear-gradient(135.76deg, #FF0F7B 7.5%, #F89B29 88.59%);
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
            background-image:linear-gradient(135.76deg, #FF0F7B 7.5%, #F89B29 88.59%);
            border-radius: 50%;
            display: inline-block;
        }

        .container{
            display: flex;
        }


        @media screen and (max-width:360px){

            #title{

                font-family:roboto-black ;
                padding-left: 20px;
                font-size: 300%;
                line-height: 39px;

                background-image:linear-gradient(135.76deg, #FF0F7B 7.5%, #F89B29 88.59%);
                -webkit-background-clip: text;
                -webkit-text-fill-color: transparent; 
                
                }

        }
        

        .topright {
            position: absolute;
            right: 5px;
        }
        button{
            background-image:linear-gradient(135.76deg, #FF0F7B 7.5%, #F89B29 88.59%) ;
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

    <div class="container">
       <div class="container" style="padding-top:10px"> 
           <span class="dot"></span>
        <h1>Invoice #<?php echo $newID ?></h1>     
        </div>
       <div class="topright">
            <h1 id="title">RENTAL</h1>
       </div>
    </div>
    
        
    <div class="parent">

        <div class="child">
        <!--Displays all shop information in a card -->
          <div class="card" style="width: 100%;">
              <h2 style="padding: 10px;">HVAV</h2>
              <h3 style="padding-left: 10px; padding-right: 10px;">845-797-7000</h3>
              <h3 style="padding: 10px;">1914 US-44, Modena, NY, 12548</h3>
          </div>
        </div>
        <div class="child"> 

            <div class="card" style="width: 100%;">        <!--Displays all client information in a card -->

                <h2 style="padding: 10px;"><?php echo $currentClient['company'];?></h2>
                <h3 style="padding-left: 10px; padding-right: 10px;"><?php echo $currentClient['phone']; ?></h3>
                <h3 style="padding: 10px;">
                <?php

                    echo $currentClient['address_line1']. ", " . $currentClient['city']. ", " . $currentClient['state']. ", " . $currentClient['zip_code'];

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
                for($i =0; $i<count($cart); $i++){          //displays all items to be purchased in the invoice.

                    echo '<tr><td>'. $cart[$i]['product_ID'].'</td>';
                    echo '<td>'. $cart[$i]['product_description'].'</td>';
                    echo '<td>'. $quant[$i].'</td>';
                    echo '<td>'. "$". $cart[$i]['reg_price'].'</td>';
                    echo '<td>'. "$". sprintf("%.2f",$cart[$i]['reg_price'] *$quant[$i]).'</td>';


                }
            
            ?>

        </table>
        
        
            <div class="card" style="min-width: 40%; max-width:50px;">
                    
                <h2 style="padding: 10px;">SubTotal : <?php echo "$".sprintf("%.2f", ($totalcost)); ?></h1>
                <h4 style="padding: 10px;"> 
                <?php
                if($currentClient['tax_exempt'] == 1){ //checks if client is tax exempt or not, and changes the invoice accordingly
                    echo "Tax Exempt";
                }
                else{
                    echo "Tax: 8%";
                }
                ?>
                </h4>
                           
            </div>  
            
            
            <button onClick="window.print()">Print this page</button>
            <button style="">Continue</button>
            
        
</body>
</html>