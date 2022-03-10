<?php
    session_start();       //session is used to get cart from previous page.
    $cart = $_SESSION['cartArray'];
    // print_r($cart);

    include('db_connect.php');

    $totalcost= 0;
    

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

        .card {
        /* Add shadows to create the "card" effect */
        box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
        transition: 0.3s;
        border-radius: 5px;
        width: 40%;
        margin-left: auto;
        margin-right: auto;

        }

        table {
        background-image: linear-gradient(135.76deg, #FF0F7B 7.5%, #F89B29 88.59%);
        font-family: arial, sans-serif;
        margin-left: auto;
        margin-right: auto;
        width: 40%;
        border:solid black 1px;
        border-radius:10px;
        box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
        transition: 0.3s;
        }

        td, th {
        text-align: center;
        padding: 8px;
        }
        
        th{
            border-bottom: 1px;
        }

    </style>

</head>
<body>

        <div class="container">

        <table>
            <tr>
                <th>Item ID</th>
                <th>Description</th>
                <th>Quantity</th>
                <th>Unit Cost</th>
                <th>Total Cost</th>
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

        <div class="card">
                <div class="column">
                    <h2 style="padding-left: 4px;">SubTotal : <?php echo "$".sprintf("%.2f", $totalcost); ?></h1>
                    <h4 style="padding-left: 4px;"> Tax: 8.0% </h4>
                </div>

                <div class="column">
                        <h1>Balance(USD)=</h1>
                    </div>

        </div>

        </div>
</body>
</html>