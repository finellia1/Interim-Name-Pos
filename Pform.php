<?php
$m = $_GET['m'];

?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="css/Pstyle.css">
</head>
<body>

  <?php
  session_start();

  if (isset($m)) {
  
    if ($m==1) {
      echo '<div class="message">Payment Accepted Successfully!</div>
      <div class="error-link"><a href="./">Test Again</a></div>
      ';
    } elseif ($m==2) {
      echo '<div class="message" id="error">There Was A Problem With Your CC</div>
      <div class="error-link"><a href="./">Click Here To Try Again</a></div>
      ';
    }
  
  }  else {
  ?>
  
 
  
  
  <div class="content-wrapper">
    <h1>Billing Information</h1>
    <form action="payment.php" method="POST" autocomplete="off">
      <div class="form-content">
      
      
        <label>Amount</label>
        <input type="text" name="amount"  readonly="readonly" value= '<?php  echo $_SESSION["Total"] ?>' />
  
        <label>Your Full Name</label>
        <input type="text" name="name" value="John Smith"/>
  
        <label>Your Email Address</label>
        <input type="text" name="email" value="johns99@email.com"/>
  
        <label>Street Address</label>
        <input type="text" name="street" value="1841 Wilbor Avenue"/>
  
        <label>City</label>
        <input type="text" name="city" value="North Port"/>
  
        <label>State</label>
        <select class="select" name="state">
          <option value="AL">Alabama</option>
          <option value="AK">Alaska</option>
          <option value="AZ">Arizona</option>
          <option value="AR">Arkansas</option>
          <option value="CA">California</option>
          <option value="CO">Colorado</option>
          <option value="CT">Connecticut</option>
          <option value="DE">Delaware</option>
          <option value="DC">District Of Columbia</option>
          <option value="FL">Florida</option>
          <option value="GA">Georgia</option>
          <option value="HI">Hawaii</option>
          <option value="ID">Idaho</option>
          <option value="IL">Illinois</option>
          <option value="IN">Indiana</option>
          <option value="IA">Iowa</option>
          <option value="KS">Kansas</option>
          <option value="KY">Kentucky</option>
          <option value="LA">Louisiana</option>
          <option value="ME">Maine</option>
          <option value="MD">Maryland</option>
          <option value="MA">Massachusetts</option>
          <option value="MI">Michigan</option>
          <option value="MN">Minnesota</option>
          <option value="MS">Mississippi</option>
          <option value="MO">Missouri</option>
          <option value="MT">Montana</option>
          <option value="NE">Nebraska</option>
          <option value="NV">Nevada</option>
          <option value="NH">New Hampshire</option>
          <option value="NJ">New Jersey</option>
          <option value="NM">New Mexico</option>
          <option value="NY">New York</option>
          <option value="NC">North Carolina</option>
          <option value="ND">North Dakota</option>
          <option value="OH">Ohio</option>
          <option value="OK">Oklahoma</option>
          <option value="OR">Oregon</option>
          <option value="PA">Pennsylvania</option>
          <option value="RI">Rhode Island</option>
          <option value="SC">South Carolina</option>
          <option value="SD">South Dakota</option>
          <option value="TN">Tennessee</option>
          <option value="TX" selected>Texas</option>
          <option value="UT">Utah</option>
          <option value="VT">Vermont</option>
          <option value="VA">Virginia</option>
          <option value="WA">Washington</option>
          <option value="WV">West Virginia</option>
          <option value="WI">Wisconsin</option>
          <option value="WY">Wyoming</option>
        </select>
  
  
        <label>Zip Code</label>
        <input type="text" name="zip" value="75001"/>
  
        <h1>Credit Card Info</h1>
  
        <label>Card Number</label>
        <input type="text" name="card" value="4111111111111111"/>
  
        <label>Expiration Month</label>
        <select name="card_exp_month"class="select">
          <option value="01">01 Jan</option>
          <option value="02">02 Feb</option>
          <option value="03">03 Mar</option>
          <option value="04">04 Apr</option>
          <option value="05">05 May</option>
          <option value="06">06 Jun</option>
          <option value="07">07 Jul</option>
          <option value="08">08 Aug</option>
          <option value="09">09 Sep</option>
          <option value="10">10 Oct</option>
          <option value="11">11 Nov</option>
          <option value="12" selected>12 Dec</option>
        </select>
  
        <label>Expiration Year</label>
        <select name="card_exp_year" class="select">
        <?php
        echo $firstYear = (int)date('Y');
        $lastYear = $firstYear + 10;
        for($i=$firstYear;$i<=$lastYear;$i++)
        {
            echo '<option value='.$i.'>'.$i.'</option>';
        }
        ?>
      </select>
  
      <label>CVV</label>
      <input type="text" name="cvv" value="186"/>
  
      <input type="submit" name="submit" class="submit" value="PAY NOW">
  
      </div>
    </form>
  </div>
  <?php }?>
  
    </body>
</html>
