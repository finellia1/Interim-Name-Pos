<!DOCTYPE html>
<html>

<head>


    <link rel="stylesheet" href="moneyPage.css">
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
    <div class = "wrap">
        <main>
            <div class = "left-panel">
                <div class = "nav-bar">
                    <ul>
                        <li>
                            <a class = "logo" href="moneyPage.php">
                                    <img src=".\Assets\logo-placeholder-image.png" height = 60px width = 60px alt="logo">
                            </a>
                        </li>
                        <li>
                            <a class = "home" href="homePage.php">
                                    <img src=".\Assets\home.png" onmouseover="this.src='./Assets/homewhite.png'" onmouseout="this.src='./Assets/home.png'" height= 30px  width= 30px alt="home-icon">
                            </a>
                        </li>
                        <li>
                            <a class = "calendar" href="calendarPage.php">
                                <img src=".\Assets\calendar.png" onmouseover="this.src='./Assets/whitecalendar.png'" onmouseout="this.src='./Assets/calendar.png'" height = 30px width = 30px alt = "calendar-icon">
                            </a>
                        </li>
                        <li>
                            <a class = "money" href="moneyPage.php">
                                <img src=".\Assets\wallet.png" onmouseover="this.src='./Assets/whitewallet.png'" onmouseout="this.src='./Assets/wallet.png'" height = 30px width = 30px alt = "wallet-icon">
                            </a>
                        </li>
                        <li>
                            <a class = "history" href="historyPage.php">
                                <img src=".\Assets\history.png" onmouseover="this.src='./Assets/historywhite.png'" onmouseout="this.src='./Assets/history.png'" height = 30px width = 30px alt = "history-icon">
                            </a>
                        </li> 
                        <li>
                            <a class = "settings" href="settingsPage.php">
                                <img src=".\Assets\setting.png" onmouseover="this.src='./Assets/settingswhite.png'" onmouseout="this.src='./Assets/setting.png'" height = 30px width = 30px alt = "settings-icon">
                            
                            </a>
                        </li>
                        <li>
                            <a class = "logout" href="link to signin page">
                                <img src=".\Assets\logout.png" height = 30px width = 30px alt = "logout-icon">
                            </a>
                        </li>
                    </ul>
                    
                </div>
            </div>


   


            <div class="middlePanel">
                <div id="banner">
                    <h1>Z Report</h1> 
                </div>

                <div id="instructions">
                <p><b>Please print the Z report at the end of each business day.</b></p>
            </div>

            <div id ="heading">
                    <h3>Hudson Valley AV Rentals</h3>
                    <h3>123 Main Street, Hurley, NY 12443</h3>
                    <h3>(845)555-1212</h3>       
                </div>

                    <!DOCTYPE html>
                    <html>


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


                            try {
                                //Create PDO instance to connect to database
                                $pdo = new PDO($dsn, $user, $pass, $options);
                                
                                //Print name of computer that ran the report, today's date, and current time.
                                echo nl2br("\n\n") . "Device name: " . gethostname();
                                date_default_timezone_set("America/New_York");
                                echo nl2br("\n") . "Today's Date: " . date("Y/m/d");
                                echo nl2br("\n") . "Current time: " . date("h:i:sa");


                                //Print Rentals by Tender Types
                                echo nl2br("\n\n") . "Tender Types: " . nl2br("\n\n");



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
                               
                                }


                            } catch (\PDOException $e) {
                                print "Error!: " . $e->getMessage() . "<br/>";
                                die();
                            }
                        }
                        ?>
                        <form method="post">
                            <input type="submit" name="button" class="button" value="Print Report" />
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

                <div id="instructions">
                <p><b>Profit and loss reports are financial statements that summarize business revenue and expenses. 
                To print the Profit/Loss Report click "print report."</b></p>
                 </div>

            <div id ="heading">
                    <h3>Hudson Valley AV Rentals</h3>
                    <h3>123 Main Street, Hurley, NY 12443</h3>
                    <h3>(845)555-1212</h3>       
                </div>


                    <!DOCTYPE html>
                    <html>

                    <head>
                        <link rel="stylesheet" href="moneyPage.css">
                        
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




                            try {
                                //Create PDO instance to connect to database
                                $pdo = new PDO($dsn, $user, $pass, $options);

                                //Print name of computer that ran the report, today's date, and current time.
                                echo nl2br("\n") . "Device name: " . gethostname();
                                date_default_timezone_set("America/New_York");
                                echo nl2br("\n") . "Today's Date: " . date("Y/m/d");
                                echo nl2br("\n") . "Current time: " . date("h:i:sa");

                                //Print Rentals by Tender Types
                                echo nl2br("\n\n") . "Income: ";


                                //Print sales totals fro checks, credit cards, and cash.
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
                                echo "Total Check Sales: $" . $check_sum . nl2br("\n");
                                echo "Total Credit Card Sales: $" . $credit_card_sum . nl2br("\n");
                                echo "Total Cash Sales: $" . $cash_sum . nl2br("\n");
                                echo "Total Sales: $" . $total_sales . nl2br("\n");


                                //Print Expenses by type
                                echo nl2br("\n\n") . "Expenses: " . nl2br("\n");

                                //Print Refund Totals 
                                $check_sum = 0;
                                $credit_card_sum = 0;
                                $cash_sum = 0;
                                $total_refunds = 0;
                                $profit_loss = 0;
                                $getData = $pdo->query("SELECT amt_refunded_check, amt_refunded_credit, amt_refunded_cash FROM refund");
                                foreach ($getData as $row) {
                                    $amt_refunded_check = $row['amt_refunded_check'];
                                    $check_sum -= $amt_refunded_check;
                                    $amt_refunded_credit = $row['amt_refunded_credit'];
                                    $amt_refunded_cash = $row['amt_refunded_cash'];
                                }    
                                    $total_refunds = $amt_refunded_check + $amt_refunded_credit + $amt_refunded_cash; 
                                    $profit_loss = $total_sales - $total_refunds;
                                    echo "Total Check Refunds: $" . $amt_refunded_check . nl2br("\n");
                                    echo "Total Credit Card Refunds: $" . $amt_refunded_credit . nl2br("\n");
                                    echo "Total Cash Refunds: $" . $amt_refunded_cash . nl2br("\n\n");
                                    echo "Total Refunds: $" . $total_refunds . nl2br("\n\n");
                                    echo "Total Profit/Loss: $" . $profit_loss . nl2br("\n");


                                //Print Employee Salary Total for Active Employees
                                $total_salaries = 0;
                                $getData = $pdo->query("SELECT yearly_salary 
                                FROM employee 
                                WHERE is_inactive = '0'");
                                
                                foreach ($getData as $row) {
                                    $yearly_salary = $row['yearly_salary'];
                                    $total_salaries += $yearly_salary;
                                }
                                echo nl2br("\n") ."Total Salaries: $" . $total_salaries . nl2br("\n");

                                $profit_loss = $total_sales - $total_refunds - $total_salaries;
                                echo nl2br("\n\n") . "Total Profit/Loss: $" . $profit_loss . nl2br("\n"); 

                                } catch (\PDOException $e) {
                                    print "Error!: " . $e->getMessage() . "<br/>";
                                    die();
                                }
                        }
                        ?>
                        <form method="post">
                            <input type="submit" name="button1" class="button1" value="Print Report" />
                        </form>
                        </head>

                    </html>
                </p>



               <!-- <script src=".\js\moneyScript.js"></script>  -->  
                


            </div>
        </main>
    </div>
</body>
</html>     