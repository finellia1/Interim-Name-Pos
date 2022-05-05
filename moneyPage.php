<!DOCTYPE html>
<html>
    <head>
    <link rel="stylesheet" href="navBar.css">
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
        <link rel="stylesheet" href="moneyPage.css">
    </head>

    <body>
        <!--Left Panel -->
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


                <!-- Create Z Report -->
                <div class="middlePanel">
                    <div id="banner">
                    <h1>Z Report</h1>
                </div>

                <!-- Print company name and address. -->
                <div id ="heading">
                    <h2 style="text-align:center;">RENT-EZ</h2>
                    <h3><span class="tab4">123 Main Street,</span> <span class="tab4">Hurley, NY 12443</span></h3>
                    <h3>(845)555-1212</h3>
                </div>

                <?php
                    //Use $_POST to pass variables
                    if (array_key_exists('button', $_POST)) {
                        button();
                    }

                    function button(){
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
                            echo '<hr>';
                            echo "Device name: " . gethostname();
                            date_default_timezone_set("America/New_York");
                            echo nl2br("\n") . "Today's Date: " . date("Y/m/d");
                            echo nl2br("\n") . "Current time: " . date("h:i:sa");

                            //Print First invoice of the day and last invoice of the day
                            $getData = $pdo->query("SELECT MIN(i.invoice_ID) AS first_id, MAX(i.invoice_ID) AS last_id, e.order_date
                            FROM invoice i
                            JOIN event_order e ON i.event_order_ID_fk = e.event_order_ID
                            WHERE e.order_date = CURRENT_DATE");
                            foreach ($getData as $row) {
                                $first_invoice = $row['first_id'];
                                $last_invoice = $row['last_id'];
                            }
                            echo nl2br("\n\n") . "From Invoice: #" . $first_invoice . nl2br("\n");
                            echo "To Invoice: #" . $last_invoice . nl2br("\n");

                            //Print Rentals by Tender Types
                            echo '<hr>';
                            echo "TENDER TYPES: " . nl2br("\n");

                            //Print Sales by check, credit card, and cash.
                            $check_sum = 0;
                            $credit_card_sum = 0;
                            $cash_sum = 0;
                            $total_sales=0;
                            $total_tendered = 0;
                            $getData = $pdo->query("SELECT i.invoice_ID, i.total_due, i.payment_type, i.is_tax_exempt, e.order_date
                            FROM invoice i
                            JOIN event_order e ON i.event_order_ID_fk = e.event_order_ID
                            WHERE e.order_date = CURRENT_DATE
                            AND (payment_type = 'check' OR payment_type = 'credit card' OR payment_type = 'cash')");
                            foreach ($getData as $row) {
                                $total_due = $row['total_due'];
                                $payment_type = $row['payment_type'];
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
                                    $total_sales = $check_sum + $credit_card_sum + $cash_sum;
                                }
                                $total_checks = number_format($check_sum, 2);
                                $total_credit = number_format($credit_card_sum, 2);
                                $total_cash = number_format($cash_sum, 2);
                                $total_tendered = number_format($total_sales, 2);

                            //Print totals
                            echo "Total Checks: $" . $total_checks . nl2br("\n");
                            echo "Total Credit Card: $" . $total_credit . nl2br("\n");
                            echo "Total Cash: $" . $total_cash . nl2br("\n");
                            echo '<hr>';
                            echo "Total Tendered: $" . $total_tendered . nl2br("\n");
                            echo '<hr>';

                            echo "RETURNS: " . nl2br("\n");
                            //Print Returns/Amount refunded
                            $check_sum = 0;
                            $credit_sum = 0;
                            $cash_sum = 0;
                            $total_refunded = 0;
                            $getData = $pdo->query("SELECT amt_refunded_check, amt_refunded_credit, amt_refunded_cash, date_refunded
                            FROM refund WHERE date_refunded = CURRENT_DATE");
                            foreach ($getData as $row) {
                                $amt_refunded_check = $row['amt_refunded_check'];
                                $check_sum += $amt_refunded_check;

                                $amt_refunded_credit = $row['amt_refunded_credit'];
                                $credit_sum += $amt_refunded_credit;

                                $amt_refunded_cash = $row['amt_refunded_cash'];
                                $cash_sum += $amt_refunded_cash;

                                $total_refunded = $check_sum + $credit_sum + $cash_sum;
                            }
                                $total_check_refunds = number_format($check_sum, 2);
                                $total_credit_refunds = number_format($credit_sum, 2);
                                $total_cash_refunds = number_format($cash_sum, 2);
                                $total_amt_refunded = number_format($total_refunded, 2);

                            //Print totals
                            echo "Check Refunds: $" . $total_check_refunds . nl2br("\n");
                            echo "Credit Card Refunds: $" . $total_credit_refunds . nl2br("\n");
                            echo "Cash Refunds: $" . $total_cash_refunds . nl2br("\n");
                            echo '<hr>';
                            echo "Total Refunds: $" . $total_amt_refunded . nl2br("\n");
                            echo '<hr>';


                        //Print Taxes Collected
                        $total_tax = 0;
                        $getData = $pdo->query("SELECT sales_tax
                        FROM invoice i
                        WHERE i.time_of_sale BETWEEN MAKEDATE(YEAR(CURDATE()), 1) AND MAKEDATE(YEAR(CURDATE())+1, 1)");
                        foreach ($getData as $row) {
                            $sales_tax = $row['sales_tax'];
                            $total_tax += $sales_tax;
                            }
                        $tax_total = number_format($total_tax, 2);
                        echo "TAXES COLLECTED: Tax Collected January 1st to Current Date: $" . $tax_total . nl2br("\n");
                        echo '<hr>';


                        $jan_tax = 0;
                            $getData = $pdo->query("SELECT sales_tax
                            FROM invoice i
                            WHERE MONTH(i.time_of_sale) = 1 AND YEAR(i.time_of_sale) = YEAR(NOW())");
                            foreach ($getData as $row) {
                                $jan_tax = $row['sales_tax'];
                                $total_tax += $jan_tax;
                            }

                            $feb_tax = 0;
                            $getData = $pdo->query("SELECT sales_tax
                            FROM invoice i
                            WHERE MONTH(i.time_of_sale) = 2 AND YEAR(i.time_of_sale) = YEAR(NOW())");
                            foreach ($getData as $row) {
                                $feb_tax = $row['sales_tax'];
                                $total_tax += $feb_tax;
                            }

                            $mar_tax = 0;
                            $getData = $pdo->query("SELECT sales_tax
                            FROM invoice i
                            WHERE MONTH(i.time_of_sale) = 3 AND YEAR(i.time_of_sale) = YEAR(NOW())");
                            foreach ($getData as $row) {
                                $mar_tax = $row['sales_tax'];
                                $total_tax += $mar_tax;
                            }

                            $apr_tax = 0;
                            $getData = $pdo->query("SELECT sales_tax
                            FROM invoice i
                            WHERE MONTH(i.time_of_sale) = 4 AND YEAR(i.time_of_sale) = YEAR(NOW())");
                            foreach ($getData as $row) {
                                $apr_tax = $row['sales_tax'];
                                $total_tax += $feb_tax;
                            }

                            $may_tax = 0;
                            $getData = $pdo->query("SELECT sales_tax
                            FROM invoice i
                            WHERE MONTH(i.time_of_sale) = 5 AND YEAR(i.time_of_sale) = YEAR(NOW())");
                            foreach ($getData as $row) {
                                $may_tax = $row['sales_tax'];
                                $total_tax += $may_tax;
                            }

                            $jun_tax = 0;
                            $getData = $pdo->query("SELECT sales_tax
                            FROM invoice i
                            WHERE MONTH(i.time_of_sale) = 6 AND YEAR(i.time_of_sale) = YEAR(NOW())");
                            foreach ($getData as $row) {
                                $jun_tax = $row['sales_tax'];
                                $total_tax += $jun_tax;
                            }

                            $jul_tax = 0;
                            $getData = $pdo->query("SELECT sales_tax
                            FROM invoice i
                            WHERE MONTH(i.time_of_sale) = 7 AND YEAR(i.time_of_sale) = YEAR(NOW())");
                            foreach ($getData as $row) {
                                $jul_tax = $row['sales_tax'];
                                $total_tax += $jul_tax;
                            }

                            $aug_tax = 0;
                            $getData = $pdo->query("SELECT sales_tax
                            FROM invoice i
                            WHERE MONTH(i.time_of_sale) = 8 AND YEAR(i.time_of_sale) = YEAR(NOW())");
                            foreach ($getData as $row) {
                                $aug_tax = $row['sales_tax'];
                                $total_tax += $aug_tax;
                            }

                            $sep_tax = 0;
                            $getData = $pdo->query("SELECT sales_tax
                            FROM invoice i
                            WHERE MONTH(i.time_of_sale) = 9 AND YEAR(i.time_of_sale) = YEAR(NOW())");
                            foreach ($getData as $row) {
                                $sep_tax = $row['sales_tax'];
                                $total_tax += $sep_tax;
                            }

                            $oct_tax = 0;
                            $getData = $pdo->query("SELECT sales_tax
                            FROM invoice i
                            WHERE MONTH(i.time_of_sale) = 10 AND YEAR(i.time_of_sale) = YEAR(NOW())");
                            foreach ($getData as $row) {
                                $oct_tax = $row['sales_tax'];
                                $total_tax += $oct_tax;
                            }

                            $nov_tax = 0;
                            $getData = $pdo->query("SELECT sales_tax
                            FROM invoice i
                            WHERE MONTH(i.time_of_sale) = 11 AND YEAR(i.time_of_sale) = YEAR(NOW())");
                            foreach ($getData as $row) {
                                $nov_tax = $row['sales_tax'];
                                $total_tax += $nov_tax;
                            }

                            $dec_tax = 0;
                            $getData = $pdo->query("SELECT sales_tax
                            FROM invoice i
                            WHERE MONTH(i.time_of_sale) = 12 AND YEAR(i.time_of_sale) = YEAR(NOW())");
                            foreach ($getData as $row) {
                                $dec_tax = $row['sales_tax'];
                                $total_tax += $dec_tax;
                            }
                        echo "TAXES COLLECTED BY MONTH: " . nl2br("\n");
                        echo "JAN-APR: &nbsp;&nbsp;&nbsp; Jan: $" . $jan_tax . ", Feb: $" . $feb_tax . ", Mar: $" . $mar_tax . ", Apr: $" . $apr_tax . nl2br("\n");
                        echo "MAY-AUG: &nbsp; May: $" . $may_tax . ", Jun: $" . $jun_tax . ", Jul: $" . $jul_tax . ", Aug: $" . $aug_tax . nl2br("\n");
                        echo "SEP-DEC: &nbsp;&nbsp;&nbsp; Sep: $" . $sep_tax . ", Oct: $" . $oct_tax . ", Nov: $" . $nov_tax . ", Dec: $" . $dec_tax. nl2br("\n");
                        echo '<hr>';

                        } catch (\PDOException $e) {
                            print "Error!: " . $e->getMessage() . "<br/>";
                            die();
                        }
                    }
                ?>
            <form method="post">
                <input type="submit" name="button" class="button" value="Print Report"/>
            </form>
        </div>

               <!-- CREATE PROFIT/LOSS REPORT -->
                <div class="rightPanel">
                    <div id="banner">
                        <h1>Profit Loss Report</h1>
                    </div>
                    
                    <!-- Print company name and address. -->
                    <div id ="heading">
                        <h2 style="text-align:center;">RENT-EZ</h2>
                        <h3>123 Main Street, Hurley, NY 12443</h3>
                        <h3>(845)555-1212</h3>
                    </div>

                        <?php
                            //Use $_POST to pass variables
                            if (array_key_exists('button1', $_POST)) {
                                button1();
                            }

                        function button1(){
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
                                echo '<hr>';
                                echo "Device name: " . gethostname();
                                date_default_timezone_set("America/New_York");
                                echo nl2br("\n") . "Today's Date: " . date("Y/m/d");
                                echo nl2br("\n") . "Current time: " . date("h:i:sa");

                                //Print Rentals by Tender Types
                                echo '<hr>';
                                echo "INCOME: " .  nl2br("\n");

                                //Print sales totals for checks, credit cards, and cash.
                                $check_sum = 0;
                                $credit_card_sum = 0;
                                $cash_sum = 0;
                                $total_sales = 0;
                                $getData = $pdo->query("SELECT i.invoice_ID, i.total_due, i.payment_type, e.order_date
                                FROM invoice i
                                JOIN event_order e ON i.event_order_ID_fk = e.event_order_ID
                                WHERE e.order_date BETWEEN MAKEDATE(YEAR(CURDATE()), 1) AND MAKEDATE(YEAR(CURDATE())+1, 1)
                                AND (payment_type = 'check' OR payment_type = 'credit card' OR payment_type = 'cash')");
                                foreach ($getData as $row) {
                                        $total_due = $row['total_due'];
                                        $payment_type = $row['payment_type'];
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
                                }
                                    $total_sales = $check_sum + $credit_card_sum + $cash_sum;
                                    $total_check_sales = number_format($check_sum, 2);
                                    $total_credit_sales = number_format($credit_card_sum, 2);
                                    $total_cash_sales = number_format($cash_sum, 2);
                                    $total_gross_sales = number_format($total_sales, 2);
                                echo "Total Check Sales: $" . $total_check_sales . nl2br("\n");
                                echo "Total Credit Card Sales: $" . $total_credit_sales . nl2br("\n");
                                echo "Total Cash Sales: $" . $total_cash_sales . nl2br("\n\n");
                                echo "Total Gross Sales: $" . $total_gross_sales . nl2br("\n");
                                echo '<hr>';

                                //Print amount of taxes collected
                                echo "TAXES COLLECTED: " . nl2br("\n");
                                $total_taxes = 0;
                                $net_sales = 0;
                                $getData = $pdo->query("SELECT sales_tax
                                FROM invoice i
                                WHERE i.time_of_sale BETWEEN MAKEDATE(YEAR(CURDATE()), 1) AND MAKEDATE(YEAR(CURDATE())+1, 1)");
                                foreach ($getData as $row) {
                                    $sales_tax = $row['sales_tax'];
                                    $total_taxes += $sales_tax;
                                }
                                    $net_sales = $total_sales - $total_taxes;
                                    $total_tax_collected = number_format($total_taxes, 2);
                                    $total_net_sales = number_format($net_sales, 2);
                                echo "Tax Collected: $" . $total_tax_collected . nl2br("\n");
                                echo '<hr>';
                                echo "Net Sales: $" . $total_net_sales . nl2br("\n");
                                echo '<hr>';

                                //Print Expenses by type
                                echo "EXPENSES: " . nl2br("\n");

                                //Print Refund Totals
                                $check_sum = 0;
                                $credit_card_sum = 0;
                                $cash_sum = 0;
                                $total_refunds = 0;
                                $profit_loss = 0;
                                $getData = $pdo->query("SELECT amt_refunded_check, amt_refunded_credit, amt_refunded_cash
                                FROM refund WHERE date_refunded BETWEEN MAKEDATE(YEAR(CURDATE()), 1) AND MAKEDATE(YEAR(CURDATE())+1, 1)");
                                foreach ($getData as $row) {
                                    $amt_refunded_check = $row['amt_refunded_check'];
                                    $check_sum += $amt_refunded_check;
                                    $amt_refunded_credit = $row['amt_refunded_credit'];
                                    $credit_card_sum += $amt_refunded_credit;
                                    $amt_refunded_cash = $row['amt_refunded_cash'];
                                    $cash_sum += $amt_refunded_cash;
                                }
                                    $total_refunds = $check_sum + $credit_card_sum + $cash_sum;
                                    $profit_loss = $total_sales - $total_refunds;
                                    $total_checks_refunded = number_format($check_sum, 2);
                                    $total_cards_refunded = number_format($credit_card_sum, 2);
                                    $total_cash_refunded = number_format($cash_sum, 2);
                                    $total_amt_refunded = number_format($total_refunds, 2);
                                echo "Total Check Refunds: $" . $total_checks_refunded . nl2br("\n");
                                echo "Total Credit Card Refunds: $" . $total_cards_refunded . nl2br("\n");
                                echo "Total Cash Refunds: $" . $total_cash_refunded . nl2br("\n\n");
                                echo "Total Refunds: $" . $total_amt_refunded . nl2br("\n\n");

                                //Print Employee Salary Total for Active Employees
                                $total_salaries = 0;
                                $getData = $pdo->query("SELECT yearly_salary
                                FROM employee
                                WHERE is_inactive = '0'");

                                foreach ($getData as $row) {
                                    $yearly_salary = $row['yearly_salary'];
                                    $total_salaries += $yearly_salary;
                                }
                                    $total_salary_amt = number_format($total_salaries, 2);
                                echo "Total Salaries: $" . $total_salary_amt . nl2br("\n");
                                echo '<hr>';
                                    $profit_loss = $net_sales - $total_refunds - $total_salaries;
                                    $total_profit_loss = number_format($profit_loss, 2);
                                echo "Total Profit/Loss: $" . $total_profit_loss . nl2br("\n");
                                echo '<hr>';

                                } catch (\PDOException $e) {
                                    print "Error!: " . $e->getMessage() . "<br/>";
                                    die();
                                }
                        }
                        ?>
                    <form method="post">
                        <input type="submit" name="button1" class="button1" value="Print Report" />
                    </form>
                    <!--  </head>
                    </html>  -->
                </div>
            </main>
        </div>
    </body>
</html>
