var cal = {
  // (A) INIT CALENDAR
  hMth:null, hYr:null, // MONTH & YEAR
  hWrap:null, // DAYS WRAPPER
  // EVENT FORM
  hBlock:null, hForm:null, hFormDel:null, hFormCX:null,
  hID:null, hltStart:null, htechs:null, htrucks:null,

  //Event information
  htitle:null, htype:null, hprofit:null, hconfirmed:null, horderdate:null,
  heventstart:null, heventend:null, hsetupstart:null, hbreakdownstart:null,
  hexpected:null, hstaffed:null, hcontact:null, hpayment:null,
  init : () => {
    // (A1) GET HTML ELEMENTS
    cal.hMth = document.getElementById("calmonth");
    cal.hYr = document.getElementById("calyear");
    cal.hWrap = document.getElementById("calwrap");
    cal.hBlock = document.getElementById("calblock");
    cal.hForm = document.getElementById("calform");
    cal.hFormDel = document.getElementById("calformdel");
    cal.hFormCX = document.getElementById("calformcx");
    cal.hID = document.getElementById("evtid");
    cal.hltStart = document.getElementById("load_truck_start");
    cal.htechs = document.getElementById("num_techs_needed");
    cal.htrucks = document.getElementById("num_trucks_needed");

    //Get right panel html elements
    cal.htitle= document.getElementById("event_title")
    cal.htype=document.getElementById("eventtype")
    cal.hprofit=document.getElementById("nonprofit")
    cal.hconfirmed=document.getElementById("isconfirmed")
    cal.horderdate=document.getElementById("orderdate")
    cal.heventstart=document.getElementById("eventstart")
    cal.heventend=document.getElementById("eventend")
    cal.hsetupstart=document.getElementById("setupStart")
    cal.hbreakdownstart=document.getElementById("breakdownStart")
    cal.hexpected=document.getElementById("expected_attendees")
    cal.hstaffed=document.getElementById("staffed")
    cal.hcontact=document.getElementById("contactPreferences")
    cal.hpayment=document.getElementById("payment_method")

    // (A2) ATTACH CONTROLS
    cal.hMth.onchange = cal.draw;
    cal.hYr.onchange = cal.draw;
    cal.hForm.onsubmit = cal.confirm;
    cal.hFormDel.onclick = cal.del;
    cal.hFormCX.onclick = cal.hide;

    // (A3) DRAW CURRENT MONTH/YEAR
    cal.draw();
  },

  // (B) SUPPORT FUNCTION - AJAX FETCH
  ajax : (data, load) => {
    fetch("./classes/order.ajax.php", { method:"POST", body:data }) 
    .then(res=>res.text()).then(load);
  },

  // (C) DRAW CALENDAR
  draw : () => {
    // (C1) FORM DATA
    let data = new FormData();
    data.append("req", "draw");
    data.append("month", cal.hMth.value);
    data.append("year", cal.hYr.value);
    // (C2) AJAX LOAD SELECTED MONTH
    cal.ajax(data, (res) => {
      // (C2-1) ATTACH CALENDAR TO WRAPPER
      cal.hWrap.innerHTML = res;

      // (C2-2) CLICK DAY CELLS TO ADD EVENT
      for (let day of cal.hWrap.getElementsByClassName("day")) {
        day.onclick = () => { cal.show(day); };
      }

      // (C2-3) CLICK EVENT TO EDIT
      for (let evt of cal.hWrap.getElementsByClassName("calevt")) {
        evt.onclick = (e) => { cal.show(evt); e.stopPropagation(); };
      }
    });
  },

  // (D) SHOW EVENT FORM
  show : (cell) => {
    let eid = cell.getAttribute("data-eid");
    
    // (D1) ADD NEW EVENT

    // (D2) EDIT EVENT
      let edata = JSON.parse(document.getElementById("evt"+eid).innerHTML);
      cal.hID.value = eid;
      cal.hltStart.value = edata["load_trucks_start"];
      cal.htechs.value = edata["num_techs_needed"]
      cal.htrucks.value = edata["num_trucks_needed"];
      cal.hFormDel.style.display = "block";
      cal.htitle.innerText = edata["event_name"];
      cal.htype.innerText = "Event Type: " + edata["event_type"];
      if(edata["is_confirmed"] == 0){
        cal.hconfirmed.innerText= "Needs to be Confirmed";
        cal.hconfirmed.style.color= "red";
      }
      else{
        cal.hconfirmed.innerText="Confirmed";
        cal.hconfirmed.style.color="green";
      }
      if(edata["is_nonprofit"] == 0){
        cal.hprofit.innerText = "";
      }
      else{
        cal.hprofit.innerText = "Non-Profit Event";
      }
      cal.horderdate.innerText = "Order Date: " + edata["order_date"];
      cal.heventstart.innerText = "Start Time: " + edata["event_start"];
      cal.heventend.innerText = "End Time: " + edata["event_end"];
      cal.hsetupstart.innerText = "Setup Time" + edata["setup_start"];
      cal.hbreakdownstart.innerText = "Equipment Retrieval Time: " + edata["breakdown_start"];
      cal.hexpected.innerText = "Expected Number of Attendees: " + edata["expected_num_people"];
      if (edata["is_staffed"] ==0){
        cal.hstaffed.innerText= "Event does not require technicians.";
      }
      else{
        cal.hstaffed.innerText="Event requires technicians."
      }
      cal.hcontact.innerText="Contact Preference: " + edata["contact_option"];

    // (D3) SHOW EVENT FORM
    //cal.hBlock.classList.add("show");
  },

  // (E) HIDE EVENT FORM
  hide : () => { cal.hBlock.classList.remove("show"); },

  // (F) SAVE EVENT
  confirm : () => {
    cal.ajax(new FormData(cal.hForm),(res) => {
      if (res=="OK") { cal.hide(); cal.draw(); }
      else { alert(res); }
    });
    return false;
  },

  // (G) DELETE EVENT
  del : () => { if (confirm("Delete Event?")) {
    // (G1) FORM DATA
    let data = new FormData();
    data.append("req", "del");
    data.append("eid", cal.hID.value);

    // (G2) AJAX DELETE
    cal.ajax(data, (res) => {
      if (res=="OK") { cal.hide(); cal.draw(); }
      else { alert(res); }
    });
  }}
};
window.addEventListener("DOMContentLoaded", cal.init);
