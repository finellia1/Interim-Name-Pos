//Page class used to store page information
class PageClass{
    constructor(headerText, link0Display, link0src, link1Display,link1src,link2Display,link2src){
        //Class parameters
        this.headerText = headerText;
        this.link0Display = link0Display;
        this.link0src = link0src;
        this.link1Display = link1Display;
        this.link1src = link1src;
        this.link2Display = link2Display;
        this.link2src = link2src;
    }
    
}

let pages
{
    //Instantiate Page class with data per page.
    let clients = new PageClass("CLIENTS", "VENDORS", "vendor.php", "INVENTORY","inventory.php","EMPLOYEES","employees.php");
    let vendors = new PageClass("VENDORS", "CLIENTS", "clients.php", "INVENTORY","inventory.php","EMPLOYEES","employees.php");
    let inventory = new PageClass("INVENTORY", "VENDORS", "vendor.php", "CLIENTS","clients.php","EMPLOYEES","employees.php");
    let employees = new PageClass("EMPLOYEES", "VENDORS", "vendor.php", "CLIENTS","clients.php", "INVENTORY","inventory.php");
    //Create pages array
    pages = [clients,vendors,inventory,employees]
    //Set initial page to 2, the inventory page
    var currentPage= 2;
    changePage(currentPage)
}

function changePage(newPage){
    //Set html to correct values based on classes and current page
    document.getElementById("newForm1").innerHTML = pages[newPage].link0Display;
    document.getElementById("newForm2").innerHTML = pages[newPage].link1Display;
    document.getElementById("newForm3").innerHTML = pages[newPage].link2Display;
    document.getElementById("titleHeader").innerHTML = pages[newPage].headerText;

}

function callChangePage(inPage){
    var checkLoc;
    //Set the location to check for input based on what button is clicked
    if(inPage == 1){
        checkLoc = "newForm1"
    }
    if(inPage == 2){
        checkLoc = "newForm2"
    }
    if(inPage == 3){
        checkLoc = "newForm3"
    }

    //Based on what button is clicked, changePage to desired page
    if(document.getElementById(checkLoc).innerHTML == "CLIENTS"){
        changePage(0)
        document.getElementById("home").src = "clients.php";
    }else if(document.getElementById(checkLoc).innerHTML == "VENDORS"){
        changePage(1)
        document.getElementById("home").src = "vendor.php";
    }else if(document.getElementById(checkLoc).innerHTML == "INVENTORY"){
        changePage(2)
        document.getElementById("home").src = "inventory.php";
    }
    else if(document.getElementById(checkLoc).innerHTML == "EMPLOYEES"){
        changePage(3)
        document.getElementById("home").src = "employees.php";
    }

        

}

