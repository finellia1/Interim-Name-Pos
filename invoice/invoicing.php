<?php
    session_start();       //session is used to get cart from previous page.
    $cart = $_SESSION['cartArray'];
    // print_r($cart);

    include('db_connect.php');

    $totalcost= 0;
    $tax = 1.08;
    

    $stmt = $conn ->query('SELECT invoice_ID FROM invoice');
    $ids = $stmt -> fetchALL(PDO::FETCH_COLUMN);
    $newID =array_pop($ids);
    $newID++;

    // $sql = "INSERT INTO INVOICE(invoice_ID, event_order_ID_fk, client_ID_fk, invoice_date, total_due) VALUES(?,?,?,?,?)" ;  //adding new invoice to database.
    // $pdo->prepare($sql)->execute([$newID,otherstuff]);

    for($i = 0; $i<6 ; $i++){
        $quant[$i]=random_int(1,3);
    }
    
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
        border-radius: 10px;
        font-family: roboto-black;
        width: 40%;
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
            height: 100px;
            width: 100px;
            background-image:linear-gradient(135.76deg, #FF0F7B 7.5%, #F89B29 88.59%);
            border-radius: 50%;
            display: inline-block;
        }

        .container{
            display: flex;
        }

        #title{

            font-family:roboto-black ;
            padding-left: 10px;
            font-size: 70px;

            background-image:linear-gradient(135.76deg, #FF0F7B 7.5%, #F89B29 88.59%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent; 
             
        }

        .topright {
            position: absolute;
            right: 50px;
        }
        button{
            background-image:linear-gradient(135.76deg, #FF0F7B 7.5%, #F89B29 88.59%) ;
            border: none;
            color: white;
            border-radius: 10px;
            padding: 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 4px 2px;
            position: absolute;
            right: 50px;
        }

    </style>

</head>
<body>

    <div class="container">
       <div class="container" style="padding-top:50px"> 
           <span class="dot"></span>
        <h1>Invoice #<?php echo $newID ?></h1>
    </div>
       <div class="topright"><h1 id="title"> HVAV</h1></div>
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
                for($i =0; $i<count($cart); $i++){

                    echo '<tr><td>'. $cart[$i]['product_ID'].'</td>';
                    echo '<td>'. $cart[$i]['product_description'].'</td>';
                    echo '<td>'. $quant[$i].'</td>';
                    echo '<td>'. "$". $cart[$i]['reg_price'].'</td>';
                    echo '<td>'. "$". sprintf("%.2f",$cart[$i]['reg_price'] *$quant[$i]).'</td>';

                    $totalcost = $totalcost + $cart[$i]['reg_price'] *$quant[$i];

                }
            
            ?>

        </table>
        
        
            <div class="card" style="width: 40%;">
                    
                <h2 style="padding-left: 4px;">SubTotal : <?php echo "$".sprintf("%.2f", ($totalcost * $tax)); ?></h1>
                <h4 style="padding-left: 4px;"> Tax: 8.0% </h4>
                <h1 style="position: relative;">Balance(USD):</h1>
                           
            </div>  

            <button onClick="window.print()">Print this page</button>
        
</body>
</html>