function editPane(){
    document.getElementById('editPopup').style.visibility = 'visible';
}

function exitPane(ID){
    document.getElementById(ID).style.visibility = 'hidden';
}

function deleteItem(){
    console.log("Delete item");
}

function addItem(){
    document.getElementById('addPopup').style.visibility = 'visible';
}