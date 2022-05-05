<!DOCTYPE html>

<html>

<head>
    <link rel="stylesheet" href="navBar.css">
    <script>
            let img = document.querySelector('img');
            let start = img.src;
            let hover = img.getAttribute('data-hover'); //specified in img tag
            console.log(start);

            img.onmouseover = () => { img.src = hover; }
            img.onmouseout = () => { img.src = start; } //to revert back to start
    </script>
</head>
<body>
    <div class = "wrap">
        <main>
            <div class = "left-panel">
                <div class = "nav-bar">
                    <ul>
                        <li>
                            <a class = "logo" href="settingsPage.php">
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
            <div class = "middlePanel">
                <h1 style="font-family:Verdana, Geneva, Tahoma, sans-serif; padding-left:20px;"> Financial Control Panel</h1>
                <a href="payment/editsCredPage.php"><button style="background: linear-gradient(135.76deg,#452ADD 7.5%, #602add 88.59%);color: #fff;cursor: pointer;padding: 5px;border-radius:20px;margin:20px">Edit Api Credentials</button></a><br>
                <a href="payment/refundPage.php"><button style="background: linear-gradient(135.76deg,#452ADD 7.5%, #602add 88.59%);color: #fff;cursor: pointer;padding: 5px;border-radius:20px; margin:20px">Refund Page</button></a>
            </div>
        </main>
    </div>
</body>
</html>     