<?php 
    include 'classes/session.classes.php';
    include 'includes/flagInit.php';
    session::start();
    resetFlags();
?>

<!DOCTYPE html>    
<html>    
  <head>    
      <title>Login Form</title>    
      <link rel="stylesheet" type="text/css" href="css/loginStyle.css">   
      <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
  </head>
  <body class="dropShadow"> 
    <div class="leftSideLogin">                        <!--  left half of page--> 
      <p></p><br>    
      <div class="center">    
        <form id="login" method="POST" action="includes/login.inc.php">    
         <?php
              if ($_SESSION["loginErrorFlag"] = 1){
                  echo "<h4 style = 'color: red; 
                  '>{$_SESSION["loginErrorMsg"]}</h4>
                  ";
              }
            ?>
          <h1 class="loginWord "><b>Login:</h1>   
          <input type="text" name="employee_ID" id="ip1" placeholder="Employee ID">    
          <br><br>    
          <input type="Password" name="pwd" id="ip2" placeholder="Password">    
          <br><br>    
          <button type="submit" name="submit" id="ip3">Submit</button>       
          <br><br>     
          <h3>Need an Account?    
          <br>
          Click <a href="#">here</a> to register</h3>
        </form>   
      </div>
    </div>                             <!--Right Side of Page-->
    <div class="rightSideLogin brandGradient">
      <div class="center">
        <h1 class="posText"> Internim POS </h1> 
        <h1 class="companyText">HVAV</h1>
        <br><br><br>
      </div>
    </div>  
  </body>    
</html>