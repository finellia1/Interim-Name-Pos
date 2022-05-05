<!DOCTYPE html>
<!--https://www.w3schools.com/tags/ref_language_codes.asp ADA LANGUAGE COMPLIANCE -->
<html lang="en">

<head>
    <title>Homepage</title>
    <link rel="stylesheet" href=".\css\homePage.css">
    <script>
        let img = document.querySelector('img');
        let start = img.src;
        let hover = img.getAttribute('data-hover'); //specified in img tag
        console.log(start);

        img.onmouseover = () => {
            img.src = hover;
        }
        img.onmouseout = () => {
            img.src = start;
        } //to revert back to start
    </script>
    <link rel="stylesheet" href="./css/inventoryStyle.css">
</head>

<body>
    <div class="wrap">
        <main title="main page content">
        <!--Example of skip nav https://webaim.org/techniques/skipnav/-->
        <a class = "skipNav" href="skipNav.html" alt = "Skip navigation link">Skip Navigation</a>
            <div class="leftPanel">
                <div class="nav-bar">
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
                            <a class="history" href="historyPage.php" title="Navigate to history page">
                                <img src=".\Assets\history.png" onmouseover="this.src='./Assets/historywhite.png'"
                                    onmouseout="this.src='./Assets/history.png'" height=30px width=30px
                                    alt="history-icon">
                            </a>
                        </li>
                        <li>
                            <a class="settings" href="settingsPage.php" title="Navigate to settings page">
                                <img src=".\Assets\setting.png" onmouseover="this.src='./Assets/settingswhite.png'"
                                    onmouseout="this.src='./Assets/setting.png'" height=30px width=30px
                                    alt="settings-icon">

                            </a>
                        </li>
                        <li>
                            <a class="logout" href="link to signin page" title="Navigate to signin page">
                                <img src=".\Assets\logout.png" height=30px width=30px alt="logout-icon">
                            </a>
                        </li>
                    </ul>
                </div>
            </div>

            <table>
                <tr>
            <div class = "middlePanel">
                <br>
                <div class = "inventory">
                        <div class = "headerBar">
                            <h1 class = "inline" id = "titleHeader">VENDOR</h1>
                            <div >
                                <button class = "alternatePages" onclick = "callChangePage(1)" id = "newForm1">CLIENTS</button>
                                <button class = "alternatePages" onclick = "callChangePage(2)"id = "newForm2">INVENTORY</button>
                                <button class="alternatePages" onclick="callChangePage(3)" id="newForm3">EMPLOYEES</button>
                            </div>
                        </div>
                    <iframe src="inventory.php"  id = "home" title="inventory"></iframe>
                </div>  
                    </tr>
                    <tr>
                <script type="text/javascript" src="./js/homepage.js"></script>
                <div class = "rightPanel">
                    <iframe title = "shopping cart" src="shopcart\index.php" frameborder="0" height=100%"></iframe>
                </div>
                </tr>
            </table>
        </main>
    </div>
    <script type="text/javascript" src="./js/homepage.js"></script>

</body>

</html>