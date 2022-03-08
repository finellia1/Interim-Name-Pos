<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>POS</title>

    <link rel="stylesheet" href=".\css\calendarPage.css">
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
                            <a class = "logo" href="calendarPage.php">
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
                    <div id="container">
                        <div id="header">
                            <div id="monthDisplay"></div>
                            <div>
                            <button id="backButton">Back</button>
                            <button id="nextButton">Next</button>
                            </div>
                        </div>

                        <div id="weekdays">
                            <div>Sunday</div>
                            <div>Monday</div>
                            <div>Tuesday</div>
                            <div>Wednesday</div>
                            <div>Thursday</div>
                            <div>Friday</div>
                            <div>Saturday</div>
                        </div>

                        <div id="calendar"></div>
                        </div>

                        <div id="newEventModal">
                        <h2>New Event</h2>

                        <input id="eventTitleInput" placeholder="Event Title"/>
                        <textarea id="eventDescriptionInput" placeholder="Event Description" ></textarea>

                        <button id="saveButton">Save</button>
                        <button id="cancelButton">Cancel</button>
                        </div>

                        <div id="deleteEventModal">
                        <h2>Event</h2>

                        <p id="eventText"></p>

                        <button id="deleteButton">Delete</button>
                        <button id="closeButton">Close</button>
                        </div>

                        <div id="modalBackDrop"></div>
                        <script src=".\js\calendarScript.js"></script>
            </div>
            <div class = "rightPanel">
                <h1> Right Panel </h1>
                <div id="eventInfo"></div>
            </div>
        </main>
    </div>

</body>     
</html>