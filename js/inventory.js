function editPane(id,type,name,description, make, model, quanitity, quantityInStock, promotional, discountedPrice, numRented, numBroken){
    document.getElementById('editPopup').style.visibility = 'visible';    
    document.getElementById('itemName').value = id;
    document.getElementById('productType').value = type;
    document.getElementById('description').value = name;
    document.getElementById('make').value = description;
    document.getElementById('model').value = make;
    document.getElementById('quantity').value = model;
    document.getElementById('quantityInStock').value = quanitity;
    document.getElementById('isPromotional').value = quantityInStock;
    document.getElementById('regularPrice').value = promotional;
    document.getElementById('discountedPrice').value = discountedPrice;
    document.getElementById('numberRented').value = numRented;
    document.getElementById('numberBroken').value = numBroken;
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

function searchItem(){
    document.getElementById('searchPopup').style.visibility = 'visible';
    console.log("asdassad");
}