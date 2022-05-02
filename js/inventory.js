function editPane(id,vendor,name,type,description, make, model, quanitity, quantityInStock, promotional,regularPrice, discountedPrice, numRented, numBroken){
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
    document.getElementById('productType').focus();
}

function editPane_vendor(product_ID,vendor,company_name,website,sales_representative, email, phone, vendor_notes){
    document.getElementById('editPopup').style.visibility = 'visible';    
    document.getElementById('companyName').value = company_name;
    document.getElementById('companyName').focus();
    document.getElementById('website').value = website;
    document.getElementById('salesrep').value = sales_representative;
    document.getElementById('email').value = email;
    document.getElementById('phone').value = phone;
    document.getElementById('vendorNotes').value = vendor_notes;
    document.getElementById('deleteID_edit').value = product_ID;
}

function editPane_client(product_ID,company_name,client_type,first_name,last_name,email,address_line1,address_line2,city,state_abbr,zip_code,phone,client_notes){
    document.getElementById('editPopup').style.visibility = 'visible';    
    document.getElementById('company_name').value = company_name;
    document.getElementById('client_type').value = client_type;
    document.getElementById('first_name').value = first_name;
    document.getElementById('last_name').value = last_name;
    document.getElementById('email').value = email;
    document.getElementById('address_line1').value = address_line1;
    document.getElementById('address_line2').value = address_line2;
    document.getElementById('city').value = city;
    document.getElementById('state_abbr').value = state_abbr;
    document.getElementById('zip_code').value = zip_code;
    document.getElementById('phone').value = phone;
    document.getElementById('client_notes').value = client_notes;
    document.getElementById('deleteID_edit').value = product_ID;
    document.getElementById('company_name').focus();
}

function editPane_employee(product_ID,company_name,client_type,first_name,last_name,email,address_line1,address_line2,city,state_abbr,zip_code,phone,client_notes){
    document.getElementById('editPopup').style.visibility = 'visible';    
    document.getElementById('company_name').value = company_name;
    document.getElementById('client_type').value = client_type;
    document.getElementById('first_name').value = first_name;
    document.getElementById('last_name').value = last_name;
    document.getElementById('email').value = email;
    document.getElementById('address_line1').value = address_line1;
    document.getElementById('address_line2').value = address_line2;
    document.getElementById('city').value = city;
    document.getElementById('state_abbr').value = state_abbr;
    document.getElementById('zip_code').value = zip_code;
    document.getElementById('phone').value = phone;
    document.getElementById('client_notes').value = client_notes;
    document.getElementById('deleteID_edit').value = product_ID;
    document.getElementById('company_name').focus();
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