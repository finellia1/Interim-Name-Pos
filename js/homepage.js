class Page{
    constructor(headerText, link0Display, link0src, link1Display,link1src,link2Display,link2src){
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
    let clients = new Page("CLIENTS", "VENDORS", "vendor.php", "INVENTORY","inventory.php","EMPLOYEES","employees.php");
    let vendors = new Page("VENDORS", "CLIENTS", "clients.php", "INVENTORY","inventory.php","EMPLOYEES","employees.php");
    let inventory = new Page("INVENTORY", "VENDORS", "vendor.php", "CLIENTS","clients.php","EMPLOYEES","employees.php");
    let employees = new Page("EMPLOYEES", "VENDORS", "vendor.php", "CLIENTS","clients.php", "INVENTORY","inventory.php");
    pages = [clients,vendors,inventory,employees]
    var currentPage= 2;
    changePage(currentPage)
}

function changePage(newPage){
    document.getElementById("newForm1").innerHTML = pages[newPage].link0Display;
    document.getElementById("newForm2").innerHTML = pages[newPage].link1Display;
    document.getElementById("newForm3").innerHTML = pages[newPage].link2Display;
    document.getElementById("titleHeader").innerHTML = pages[newPage].headerText;

}

function callChangePage(inPage){
    var checkLoc;
    if(inPage == 1){
        checkLoc = "newForm1"
    }
    if(inPage == 2){
        checkLoc = "newForm2"
    }
    if(inPage == 3){
        checkLoc = "newForm3"
    }

    if(document.getElementById(checkLoc).innerHTML == "CLIENTS"){
        changePage(0)
        console.log("CLINET")
        document.getElementById("home").src = "clients.php";
    }else if(document.getElementById(checkLoc).innerHTML == "VENDORS"){
        changePage(1)
        console.log("VENDORS")
        document.getElementById("home").src = "vendor.php";
    }else if(document.getElementById(checkLoc).innerHTML == "INVENTORY"){
        changePage(2)
        console.log("INVENRORY ")
        document.getElementById("home").src = "inventory.php";
    }
    else if(document.getElementById(checkLoc).innerHTML == "EMPLOYEES"){
        changePage(3)
        console.log("EMPLOY ")
        document.getElementById("home").src = "employees.php";
    }

        

}

