<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="css/moneyPage.css">
    <script>
        let img = document.querySelector('img');
        let start = img.src;
        let hover = img.getAttribute('data-hover');
        console.log(start);

        img.onmouseover = () => {
            img.src = hover;
        }
        //Return to start
        img.onmouseout = () => {
            img.src = start;
        }
    </script>
</head>

<body>
    <div class="wrap">
        <main>
            <div class="left-panel">
                <div class="nav-bar">
                    <ul>
                        <li>
                            <a class="logo" href="moneyPage.php">
                                <img src=".\Assets\logo-placeholder-image.png" height=60px width=60px alt="logo">
                            </a>
                        </li>
                        <li>
                            <a class="home" href="homePage.php">
                                <img src=".\Assets\home.png" onmouseover="this.src='./Assets/homewhite.png'" onmouseout="this.src='./Assets/home.png'" height=30px width=30px alt="home-icon">
                            </a>
                        </li>
                        <li>
                            <a class="calendar" href="calendarPage.php">
                                <img src=".\Assets\calendar.png" onmouseover="this.src='./Assets/whitecalendar.png'" onmouseout="this.src='./Assets/calendar.png'" height=30px width=30px alt="calendar-icon">
                            </a>
                        </li>
                        <li>
                            <a class="money" href="moneyPage.php">
                                <img src=".\Assets\wallet.png" onmouseover="this.src='./Assets/whitewallet.png'" onmouseout="this.src='./Assets/wallet.png'" height=30px width=30px alt="wallet-icon">
                            </a>
                        </li>
                        <li>
                            <a class="history" href="historyPage.php">
                                <img src=".\Assets\history.png" onmouseover="this.src='./Assets/historywhite.png'" onmouseout="this.src='./Assets/history.png'" height=30px width=30px alt="history-icon">
                            </a>
                        </li>
                        <li>
                            <a class="settings" href="settingsPage.php">
                                <img src=".\Assets\setting.png" onmouseover="this.src='./Assets/settingswhite.png'" onmouseout="this.src='./Assets/setting.png'" height=30px width=30px alt="settings-icon">

                            </a>
                        </li>
                        <li>
                            <a class="logout" href="link to signin page">
                                <img src=".\Assets\logout.png" height=30px width=30px alt="logout-icon">
                            </a>
                        </li>
                    </ul>

                </div>
            </div>



            <div class="middlePanel">
                <div id="banner">
                    <h1>Z Report</h1>
                </div>

                <p>
                    <!DOCTYPE html>
                    <html>

                    <!--  <body style="text-align:center;"> -->

                    <body>

                        <?php
                        if (array_key_exists('button', $_POST)) {
                            button();
                        }

                        function button()
                        {

                            //Connect to database
                            $host = '127.0.0.1';
                            $db = 'hv_audio_visual';
                            $user = 'root';
                            $pass = '';
                            $charset = 'utf8mb4';

                            $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
                            $options = [
                                PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
                                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                                PDO::ATTR_EMULATE_PREPARES   => false,
                            ];


                            //Print Company name, address, and phone
                            //echo Z Report
                            echo "Hudson Valley AV Rentals" . nl2br("\n") .
                                "123 Main Street, Hurley, NY 12443" . nl2br("\n") . "(845)555-1212" . nl2br("\n\n");


                            try {
                                //Create PDO instance to connect to database
                                $pdo = new PDO($dsn, $user, $pass, $options);

                                //Print Rentals by Tender Types
                                echo "Tender Types: " . nl2br("\n\n");







                                //   $getData = $pdo->query("SELECT 
                                //  SUM(i.total_due) AS total_due, 
                                //     i.payment_type, 
                                //      e.order_date
                                // FROM invoice i 
                                //   JOIN event_order e ON i.event_order_ID_fk = e.event_order_ID
                                //  WHERE e.order_date = CURRENT_DATE
                                //  AND (payment_type = 'check' 
                                //   OR payment_type = 'credit card'
                                //  OR payment_type = 'cash')");
                                //    foreach ($getData as $row) {
                                //         $total = $row['total_due'];
                                //        $payment_type = $row['payment_type'];

                                //        echo nl2br("\n\n") . $total . $payment_type;
                                //   }   

                                //Print First invoice of the day and last invoice of the day
                                $getData = $pdo->query("SELECT MIN(i.invoice_ID) AS first_id, MAX(i.invoice_ID) AS last_id, e.order_date 
                                FROM invoice i
                                JOIN event_order e ON i.event_order_ID_fk = e.event_order_ID
                                WHERE e.order_date = CURRENT_DATE");

                                foreach ($getData as $row) {
                                    $first_invoice = $row['first_id'];
                                    $last_invoice = $row['last_id'];
                                }
                                echo "First Invoice: " . $first_invoice . nl2br("\n");
                                echo "Last invoice: " . $last_invoice . nl2br("\n");



                                $check_sum = 0;
                                $credit_card_sum = 0;
                                $cash_sum = 0;
                                $getData = $pdo->query("SELECT i.invoice_ID, i.total_due, i.payment_type, e.order_date 
                                FROM invoice i
                                JOIN event_order e ON i.event_order_ID_fk = e.event_order_ID
                                WHERE e.order_date = CURRENT_DATE 
                                AND (payment_type = 'check' OR payment_type = 'credit card' OR payment_type = 'cash')");
                                foreach ($getData as $row) {
                                    //$invoice_ID = $row['invoice_ID'];          
                                    $total_due = $row['total_due'];
                                    $payment_type = $row['payment_type'];
                                    //$time_of_sale = $row['time_of_sale'];
                                    switch ($payment_type) {
                                        case "check":
                                            $check_sum += $total_due;
                                            break;

                                        case "credit card":
                                            $credit_card_sum += $total_due;
                                            break;

                                        case "cash":
                                            $cash_sum += $total_due;
                                            break;
                                    }

                                    //echo nl2br("\n\n") . "Total Checks: " . $check_sum . nl2br("\n\n");

                                }
                                echo nl2br("\n\n") . "Total Checks: " . $check_sum . nl2br("\n");
                                echo "Total Credit Card: " . $credit_card_sum . nl2br("\n");
                                echo "Total Cash: " . $cash_sum . nl2br("\n");

                                //Print Refunds 
                                $check_sum = 0;
                                $getData = $pdo->query("SELECT amt_refunded_check, amt_refunded_credit, amt_refunded_cash FROM refund");
                                foreach ($getData as $row) {
                                    $amt_refunded_check = $row['amt_refunded_check'];
                                    $check_sum -= $amt_refunded_check;
                                    $amt_refunded_credit = $row['amt_refunded_credit'];
                                    $amt_refunded_cash = $row['amt_refunded_cash'];

                                    echo nl2br("\n\n") . "Check Refunds: " . $amt_refunded_check . nl2br("\n");
                                    echo  "Credit Card Refunds: " . $amt_refunded_credit . nl2br("\n");
                                    echo "Cash Refunds: " . $amt_refunded_cash . nl2br("\n\n");
                                    //echo "Final Check Sum" . $check_sum;
                                }


                                //Use PHP Data Objects (PDO) to access database and Print Sales by Total, Payment Type, and Order Date/Time
                                /*
                                $check_sum = 0;
                                $credit_card_sum = 0;
                                $cash = 0;
                                $getData = $pdo->query("SELECT total_due, payment_type, time_of_sale FROM invoice
                                WHERE payment_type = 'check' OR payment_type = 'credit card' OR payment_type = 'cash'");
                                foreach ($getData as $row) {
                                    $total_due = $row['total_due'];
                                    $payment_type = $row['payment_type'];
                                    $time_of_sale = $row['time_of_sale'];
                                    if($payment_type == 'check') {
                                    $check_sum += $total_due;
                                }

                                echo "Checks: " . "Total Due: " . $total_due . ", Payment type: " . $payment_type . ", Order Date: " . $time_of_sale . nl2br("\n\n");
                                 } 
    
                                */

                                // $getData = $pdo->query("SELECT invoice_id, payment_type, subtotal, sales_tax, total_due, amount_paid, balance_due 
                                // FROM invoice JOIN payment ON client_ID_fk = payment_ID ORDER BY client_ID_fk");
                                // foreach ($getData as $row) {
                                //   $invoice_id = $row['invoice_id'];
                                //  $payment_type = $row['payment_type'];
                                //  $subtotal = $row['subtotal'];
                                // $sales_tax = $row['sales_tax'];
                                // $total_due = $row['total_due'];
                                // $amount_paid = $row['amount_paid'];
                                // $balance_due = $row['balance_due'];
                                //     echo "Invoice ID: " . $invoice_id . ", Payment type: " . $payment_type . ", Subtotal: " . $subtotal . ", Sales tax: " . $sales_tax . 
                                //   ", Total due: " . $total_due . ", Amount paid: " . $amount_paid . ", Balance due: " . $balance_due . nl2br("\n\n");
                                //}  

                                //  $getData = $pdo->query("SELECT total_due, sales_tax FROM invoice WHERE payment_type = 'credit card'");
                                // foreach ($getData as $row) {
                                //    $total = $row['total_due'];
                                //    $sales_tax = $row['sales_tax'];
                                //     echo "Total due: " . $total . " --- " . " Sales tax: " . $sales_tax . nl2br("\n\n");
                                //  }


                                // $getData = $pdo->query("SELECT first_name, last_name, company FROM client ORDER BY company");
                                // foreach ($getData as $row) {
                                //     $first_name = $row['first_name'];
                                //     $last_name = $row['last_name'];
                                //     $company = $row['company'];
                                //    echo "Name: " . $first_name . " " . $last_name . ", Company: " . $company . nl2br("\n\n");
                                //  }

                                // $getData = $pdo->query("SELECT invoice_id, sales_tax, subtotal FROM invoice WHERE date_due = '2022-02-07'");
                                // foreach ($getData as $row) {
                                //     $invoice_id = $row['invoice_id'];
                                //     $sales_tax = $row['sales_tax'];
                                //    $subtotal = $row['subtotal'];
                                //     echo "Amount due minus sales tax: " . $subtotal - $sales_tax . " for Invoice ID # " . $invoice_id . nl2br("\n\n");

                                // }




                            } catch (\PDOException $e) {
                            }
                        }
                        ?>
                        <form method="post">
                            <input type="submit" name="button" class="button" value="Run" />
                        </form>
                        </head>

                    </html>
                </p>
            </div>



            <!-- ------------------------------------------------------------------------------------------ -->


            <div class="rightPanel">

                <div id="banner">
                    <h1>Profit Loss Report</h1>
                </div>

                <p>
                    <!DOCTYPE html>
                    <html>

                    <head>
                        <link rel="stylesheet" href="css/moneyPageprofitLoss.css">
                        <script>
                            let img = document.querySelector('img');
                            let start = img.src;
                            let hover = img.getAttribute('data-hover');
                            console.log(start);

                            img.onmouseover = () => {
                                img.src = hover;
                            }
                            //Return to start
                            img.onmouseout = () => {
                                img.src = start;
                            }
                        </script>
                    </head>

                    <!--  <body style="text-align:center;"> -->

                    <body>

                        <?php
                        if (array_key_exists('button1', $_POST)) {
                            button1();
                        }

                        function button1()
                        {

                            //Connect to database
                            $host = '127.0.0.1';
                            $db = 'hv_audio_visual';
                            $user = 'root';
                            $pass = '';
                            $charset = 'utf8mb4';

                            $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
                            $options = [
                                PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
                                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                                PDO::ATTR_EMULATE_PREPARES   => false,
                            ];


                            //Print Company name, address, and phone
                            //echo Z Report
                            echo "Hudson Valley AV Rentals" . nl2br("\n") .
                                "123 Main Street, Hurley, NY 12443" . nl2br("\n") . "(845)555-1212" . nl2br("\n\n");


                            try {
                                //Create PDO instance to connect to database
                                $pdo = new PDO($dsn, $user, $pass, $options);

                                //Print Rentals by Tender Types
                                echo "Income: " . nl2br("\n\n");



                                //   $getData = $pdo->query("SELECT 
                                //  SUM(i.total_due) AS total_due, 
                                //     i.payment_type, 
                                //      e.order_date
                                // FROM invoice i 
                                //   JOIN event_order e ON i.event_order_ID_fk = e.event_order_ID
                                //  WHERE e.order_date = CURRENT_DATE
                                //  AND (payment_type = 'check' 
                                //   OR payment_type = 'credit card'
                                //  OR payment_type = 'cash')");
                                //    foreach ($getData as $row) {
                                //         $total = $row['total_due'];
                                //        $payment_type = $row['payment_type'];

                                //        echo nl2br("\n\n") . $total . $payment_type;
                                //   }   

                                //Print First invoice of the day and last invoice of the day
                                $getData = $pdo->query("SELECT MIN(i.invoice_ID) AS first_id, MAX(i.invoice_ID) AS last_id, e.order_date 
                                FROM invoice i
                                JOIN event_order e ON i.event_order_ID_fk = e.event_order_ID
                                WHERE e.order_date = CURRENT_DATE");

                                foreach ($getData as $row) {
                                    $first_invoice = $row['first_id'];
                                    $last_invoice = $row['last_id'];
                                }
                               // echo "First Invoice: " . $first_invoice . nl2br("\n");
                                //echo "Last invoice: " . $last_invoice . nl2br("\n");



                                $check_sum = 0;
                                $credit_card_sum = 0;
                                $cash_sum = 0;
                                $total_sales = 0;
                                $getData = $pdo->query("SELECT i.invoice_ID, i.total_due, i.payment_type, e.order_date 
                                FROM invoice i
                                JOIN event_order e ON i.event_order_ID_fk = e.event_order_ID
                                WHERE e.order_date = CURRENT_DATE 
                                AND (payment_type = 'check' OR payment_type = 'credit card' OR payment_type = 'cash')");
                                foreach ($getData as $row) {
                                    //$invoice_ID = $row['invoice_ID'];          
                                        $total_due = $row['total_due'];
                                        $payment_type = $row['payment_type'];
                                    //$time_of_sale = $row['time_of_sale'];
                                    switch ($payment_type) {
                                        case "check":
                                            $check_sum += $total_due;
                                            break;

                                        case "credit card":
                                            $credit_card_sum += $total_due;
                                            break;

                                        case "cash":
                                            $cash_sum += $total_due;
                                            break;
                                    }

                                    //echo nl2br("\n\n") . "Total Checks: " . $check_sum . nl2br("\n\n");

                                }
                                $total_sales = $check_sum + $credit_card_sum + $cash_sum; 
                                echo "Total Check Sales: " . $check_sum . nl2br("\n");
                                echo "Total Credit Card Sales: " . $credit_card_sum . nl2br("\n");
                                echo "Total Cash Sales: " . $cash_sum . nl2br("\n");
                                echo "Total Sales: " . $total_sales . nl2br("\n");

                                //Print Refunds 
                                $check_sum = 0;
                                $credit_card_sum = 0;
                                $cash_sum = 0;
                                $total_refunds = 0;
                                $profit = 0;
                                $getData = $pdo->query("SELECT amt_refunded_check, amt_refunded_credit, amt_refunded_cash FROM refund");
                                foreach ($getData as $row) {
                                    $amt_refunded_check = $row['amt_refunded_check'];
                                    $check_sum -= $amt_refunded_check;
                                    $amt_refunded_credit = $row['amt_refunded_credit'];
                                    $amt_refunded_cash = $row['amt_refunded_cash'];
                                }    
                                    $total_refunds = $amt_refunded_check + $amt_refunded_credit + $amt_refunded_cash; 
                                    $profit = $total_sales - $total_refunds;
                                    echo nl2br("\n\n") . "Total Check Refunds: " . $amt_refunded_check . nl2br("\n");
                                    echo  "Total Credit Card Refunds: " . $amt_refunded_credit . nl2br("\n");
                                    echo "Total Cash Refunds: " . $amt_refunded_cash . nl2br("\n\n");
                                    echo "Total Refunds: " . $total_refunds . nl2br("\n\n");
                                    echo nl2br("\n\n") . "Total Profit: " . $profit . nl2br("\n");


                                


                                //Use PHP Data Objects (PDO) to access database and Print Sales by Total, Payment Type, and Order Date/Time
                                /*
          $check_sum = 0;
          $credit_card_sum = 0;
          $cash = 0;
          $getData = $pdo->query("SELECT total_due, payment_type, time_of_sale FROM invoice
          WHERE payment_type = 'check' OR payment_type = 'credit card' OR payment_type = 'cash'");
          foreach ($getData as $row) {
              $total_due = $row['total_due'];
              $payment_type = $row['payment_type'];
              $time_of_sale = $row['time_of_sale'];
              if($payment_type == 'check') {
                  $check_sum += $total_due;
              }

              echo "Checks: " . "Total Due: " . $total_due . ", Payment type: " . $payment_type . ", Order Date: " . $time_of_sale . nl2br("\n\n");
          } 
    
        */

                                // $getData = $pdo->query("SELECT invoice_id, payment_type, subtotal, sales_tax, total_due, amount_paid, balance_due 
                                // FROM invoice JOIN payment ON client_ID_fk = payment_ID ORDER BY client_ID_fk");
                                // foreach ($getData as $row) {
                                //   $invoice_id = $row['invoice_id'];
                                //  $payment_type = $row['payment_type'];
                                //  $subtotal = $row['subtotal'];
                                // $sales_tax = $row['sales_tax'];
                                // $total_due = $row['total_due'];
                                // $amount_paid = $row['amount_paid'];
                                // $balance_due = $row['balance_due'];
                                //     echo "Invoice ID: " . $invoice_id . ", Payment type: " . $payment_type . ", Subtotal: " . $subtotal . ", Sales tax: " . $sales_tax . 
                                //   ", Total due: " . $total_due . ", Amount paid: " . $amount_paid . ", Balance due: " . $balance_due . nl2br("\n\n");
                                //}  

                                //  $getData = $pdo->query("SELECT total_due, sales_tax FROM invoice WHERE payment_type = 'credit card'");
                                // foreach ($getData as $row) {
                                //    $total = $row['total_due'];
                                //    $sales_tax = $row['sales_tax'];
                                //     echo "Total due: " . $total . " --- " . " Sales tax: " . $sales_tax . nl2br("\n\n");
                                //  }


                                // $getData = $pdo->query("SELECT first_name, last_name, company FROM client ORDER BY company");
                                // foreach ($getData as $row) {
                                //     $first_name = $row['first_name'];
                                //     $last_name = $row['last_name'];
                                //     $company = $row['company'];
                                //    echo "Name: " . $first_name . " " . $last_name . ", Company: " . $company . nl2br("\n\n");
                                //  }

                                // $getData = $pdo->query("SELECT invoice_id, sales_tax, subtotal FROM invoice WHERE date_due = '2022-02-07'");
                                // foreach ($getData as $row) {
                                //     $invoice_id = $row['invoice_id'];
                                //     $sales_tax = $row['sales_tax'];
                                //    $subtotal = $row['subtotal'];
                                //     echo "Amount due minus sales tax: " . $subtotal - $sales_tax . " for Invoice ID # " . $invoice_id . nl2br("\n\n");

                                // }




                            } catch (\PDOException $e) {
                            }
                        }
                        ?>
                        <form method="post">
                            <input type="submit" name="button1" class="button1" value="Report" />
                        </form>
                        </head>

                    </html>
                </p>





            </div>
        </main>
    </div>
</body>

</html>