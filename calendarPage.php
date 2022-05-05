
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>POS</title>

    <link rel="stylesheet" href=".\css\calendarPage.css">
    <script>
            //let img = document.querySelector('img');
            //let start = img.src;
            //let hover = img.getAttribute('data-hover'); //specified in img tag
            //console.log(start);

            //img.onmouseover = () => { img.src = hover; } 
            //img.onmouseout = () => { img.src = start; } //to revert back to start
    </script>
    <link rel="stylesheet" href="./css/skipnavlink.css">
    <script type="text/javascript" src=".\js\calendarScript.js"></script>
</head>
<body>
    <div class = "wrap">
        <main title = "Calender Page">
        <a class = "skipNav" href="skipNav.html" alt = "Skip navigation link">Skip Navigation</a>
            <div class = "left-panel">
                <div class = "nav-bar">
                    <ul>
                        <li>
                            <a class="logo" href="homePage.php" title="Navigate to homepage">
                                <img src=".\Assets\logo-placeholder-image.png" height=60px width=60px alt="logo">
                            </a>
                        </li>
                        <li>
                            <a class="home" href="homePage.php" title="Navigate to homepage">
                                <img src=".\Assets\home.png" onmouseover="this.src='./Assets/homewhite.png'"
                                    onmouseout="this.src='./Assets/home.png'" height=30px width=30px alt="home-icon">
                            </a>
                        </li>
                        <li>
                            <a class="calendar" href="calendarPage.php" title="Navigate to calender page">
                                <img src=".\Assets\calendar.png" onmouseover="this.src='./Assets/whitecalendar.png'"
                                    onmouseout="this.src='./Assets/calendar.png'" height=30px width=30px
                                    alt="calendar-icon">
                            </a>
                        </li>
                        <li>
                            <a class="money" href="moneyPage.php" title="Navigate to money page">
                                <img src=".\Assets\wallet.png" onmouseover="this.src='./Assets/whitewallet.png'"
                                    onmouseout="this.src='./Assets/wallet.png'" height=30px width=30px
                                    alt="wallet-icon">
                            </a>
                        </li>
                        <li>
                            <a class="logout" href="link to signin page" title="Navigate to signin page">
                                <!-- <img src=".\Assets\logout.png" height=30px width=30px alt="logout-icon"> -->
                                <form action="includes/logout.inc.php" method="post">
                                    <input type="image" name="submit" src=".\Assets\logout.png" height=30px width=30px alt="logout-icon"/>
                                    <input type="hidden" name="action" value="Submit Form">
                                </form>
                            </a>
                        </li>
                    </ul>
                    
                </div>
            </div>
            <div class = "middlePanel"> 
                <div id="banner">
                    <h1>Calendar</h1>
                </div>
                <!-- (A) PERIOD SELECTOR -->
                <div id="calPeriod"><?php
                // (A1) MONTH SELECTOR
                // NOTE: DEFAULT TO CURRENT SERVER MONTH YEAR
                $months = [
                    1 => "January", 2 => "Febuary", 3 => "March", 4 => "April",
                    5 => "May", 6 => "June", 7 => "July", 8 => "August",
                    9 => "September", 10 => "October", 11 => "November", 12 => "December"
                ];
                $monthNow = date("m");
                echo "
                <label for = 'Calender month input'>
                <select id='calmonth'>
                </label>
                ";
                foreach ($months as $m=>$mth) {
                    printf("<option value='%s'%s>%s</option>",
                    $m, $m==$monthNow?" selected":"", $mth
                    );
                }
                echo "</select>";

                // (A2) YEAR SELECTOR
                echo "<input type='number' id='calyear' value='".date("Y")."'/>";
                ?></div>

                <!-- (B) CALENDAR WRAPPER -->
                <div id="calwrap"></div>

                <!-- (C) EVENT FORM -->
                <div id="calblock"><form id="calform">
                <input type="hidden" name="req" value="confirm"/>
                <input type="hidden" id="evtid" name="eid"/>
                <label for="start">Load Trucks:</label>
                <input type="datetime-local" id="load_truck_start" name="load_truck_start" required/>
                <label for="num_techs_needed">Number of Techs:</label>
                <input type ="text" name="num_techs_needed" id="num_techs_needed" required/>
                <label for="num_trucks_needed">Number of Trucks:</label>
                <input type ="text" name="num_trucks_needed" id="num_trucks_needed" required/>
                <input type="submit" id="calformsave" value="Confirm"/>
                <input type="button" id="calformcx" value="Cancel"/>
                </form></div>
            </div>
            <div class = "rightPanel">
                
                    <p id="event_title"></p>
                    <p id="isconfirmed"></p>
                    <p id="nonprofit"></p>
                    <p id="eventtype"></p>
                    <p id ="orderdate"></p>
                    <p id="eventstart"></p>
                    <p id="eventend"></p>
                    <p id="setupStart"></p>
                    <p id="breakdownStart"></p>
                    <p id="expected_attendees"></p>
                    <p id="staffed"></p>
                    <p id="contactPreferences"></p>

                <input type="button" id="calformdel" value="Delete"/>   
            </div>
        </main>
    </div>

</body>     
</html>