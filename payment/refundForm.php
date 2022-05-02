<?php
 $amount_paid;
if(isset($_POST['submit'])){ //submits id and key to the database if button is pressed.

    $amount_paid = $_POST['amount'];
    $id = $_POST['id'];

    echo $amount_paid ;

}

if(isset($_POST['submitR'])){
  
    $amount_refunded = $_POST['refunded'];
    $payment_type = $_POST['ptype'];
    $reason = $_POST['reason'];
    $dateNow= date("Y-m-d");

    if($payment_type == 'cash'){

        $cash = $amount_refunded;
        $check = 0.00;
        $credit = 0.00;

    }
    elseif($payment_type == 'credit'){

        $cash = 0.00;
        $check = 0.00;
        $credit = $amount_refunded;

    }elseif($payment_type == 'check'){

        $cash = 0.00;
        $check = $amount_refunded;
        $credit = 0.00;

    }

    include('../invoice/db_connect.php');

    $query= 'INSERT INTO refund (amt_refunded_cash, amt_refunded_check, amt_refunded_credit, date_refunded, refund_reason) VALUES (?,?,?,?,?)';
    $statement = $conn->prepare($query)->execute([$cash, $check, $credit, $dateNow, $reason]);

  }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form method="POST" action="refundForm.php" >
    <label for="quantity">Amount to Be Refunded:</label><br>
    <input type="number" id="refund" name="refunded" min="0" max="<?php echo $amount_paid; ?>" step=".01"> <br>
    <input type="radio" id="cash" name="ptype" value="cash">
    <label for="html">Cash</label><br>
    <input type="radio" id="credit" name="ptype" value="credit">
    <label for="css">Credit</label><br>
    <input type="radio" id="Check" name="ptype" value="check">
    <label for="javascript">Check</label><br>
    <label for="fname">Reason for refund:</label><br>
    <input type="text" id="reason" name="reason" style= "height: 100px !important; width: 400px;"><br>
    <input type="submit" name="submitR" class="submit" value="Refund">
    </form>
</body>
</html>