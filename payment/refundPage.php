<?php

include('../invoice/db_connect.php');

$stmt = $conn ->query('SELECT * FROM payment');  //gets all invoice_ID numbers to figure out current invoiceID
$payments = $stmt -> fetchALL(PDO::FETCH_ASSOC);




?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="../css/refundPage.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Refund Page</title>
</head>
<body>
    <table>
            <tr>
                <th>Payment ID</th>
                <th>Payment Date</th>
                <th>Payment Time</th>
                <th>Amount Paid</th>
                <th> </th>
            </tr>

           <tr>
               <td colspan="5"><div id="colorbox">  </div></td>
           </tr>
            
                

            <?php
                for($i =0; $i<count($payments); $i++){          //displays all items to be purchased in the invoice.
                    //only shows payments that have not been refunded
                   if($payments[$i]['is_refunded'] == 0){  


                    echo '<tr><td>'. $payments[$i]['payment_ID'].'</td>';
                    echo '<td>'. $payments[$i]['payment_date'].'</td>';
                    echo '<td>'. $payments[$i]['payment_time'] .'</td>';
                    echo '<td>'. "$". $payments[$i]['amount_paid'].'</td>';
                    echo '<td>'.'<form method="POST" action="refundForm.php" >
                                 <input type="hidden" name="id" value='.$payments[$i]['payment_ID'].'>
                                 <input type="hidden" name="amount" value='.$payments[$i]['amount_paid'].'>
                                 <input type="submit" name="submit" class="submit" value="Refund">
                                 </form>'.'</td>';

                   }


                }
            
            ?>

        </table>
</body>
</html>