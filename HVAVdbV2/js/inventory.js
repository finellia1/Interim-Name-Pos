function editPane(id,name,type,description, make, model, quanitity, quantityInStock, promotional,regularPrice, discountedPrice, numRented, numBroken){
    document.getElementById('editPopup').style.visibility = 'visible';    
    document.getElementById('itemName').value = name;
    document.getElementById('productType').value = type;
    document.getElementById('description').value = description;
    document.getElementById('make').value = make;
    document.getElementById('model').value = model;
    document.getElementById('quantity').value = quanitity;
    document.getElementById('quantityInStock').value = quantityInStock;
    document.getElementById('isPromotional').value = promotional;
    document.getElementById('regularPrice').value = regularPrice;
    document.getElementById('discountedPrice').value = discountedPrice;
    document.getElementById('numberRented').value = numRented;
    document.getElementById('numberBroken').value = numBroken;
    document.getElementById('deleteID_edit').value = id;

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