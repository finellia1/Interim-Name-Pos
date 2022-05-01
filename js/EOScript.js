var today = new Date();
var dd = today.getDate();
var mm = today.getMonth() + 1; //January is 0!
var yyyy = today.getFullYear();


var placeSearch, autocomplete;

// List all address components (corresponds to form field IDs and Google address object)
var componentForm = {
  autocomplete: ['street_number', 'route'],
  inputCity: 'locality',
  inputState: 'administrative_area_level_1',
  inputZip: 'postal_code',
  inputCounty: 'administrative_area_level_2',
  inputCountry: 'country'
};


function startDate(){
    if (dd < 10) {
        dd = '0' + dd;
    }
    
    if (mm < 10) {
     mm = '0' + mm;
    } 
            
    today = yyyy + '-' + mm + '-' + dd;
    document.getElementById("start").setAttribute("min", today); 
    document.getElementById("start").setAttribute("value", today);
    document.getElementById("end").setAttribute("min", today);
    document.getElementById("end").setAttribute("value", today);
}


// Create autocomplete object based on the autocomplete ("street") field
// Location type restricted to geocode
function initAutocomplete() {
  autocomplete = new google.maps.places.Autocomplete(
      /** @type {!HTMLInputElement} */ (document.getElementById('autocomplete')),
      {type: ['geocode']});

  // Call fillInAddress when user selects an address from dropdown
  autocomplete.addListener('place_changed', fillInAddress);
}


// Fill fields with values from Google Maps autocomplete object
function fillInAddress() {

  // Get place data from autocomplete object
  var place = autocomplete.getPlace();
  console.log(place);
  
  // Enable each field, then fill them with the corresponding value from the place object
  for (var component in componentForm) {
    document.getElementById(component).disabled = false;
    document.getElementById(component).value = search(componentForm[component], place.address_components);
  }
  // Fill the autocomplete field with values from the place object
  // If a street number is not found, set the field to route only.
  if (search("street_number", place.address_components) != "") {
    document.getElementById("autocomplete").value = search("street_number", place.address_components) + " ";
  }
  document.getElementById("autocomplete").value += search("route", place.address_components);
  
  // Search the passed object for a specified address component/type and return the short_name value of the matched component/type
  // If requested type does not exist in the placeObject, return an empty string
  function search(type, placeObject) {
    for (var i = 0; i < placeObject.length; i++) {
      if (placeObject[i].types[0] === type) {
        return placeObject[i].short_name;
      } else if (i === placeObject.length - 1) {
        return "";
      }
    }
  }
}

function otherEvent(){
    a=document.getElementById('other_event');
    a.checked=true;
}
function regularEvent(){
    a=document.getElementById('other_text');
    a.value="";
}   
