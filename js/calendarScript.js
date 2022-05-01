let nav = 0;
let clicked = null;
let events = localStorage.getItem('events') ? JSON.parse(localStorage.getItem('events')) : [];

const calendar = document.getElementById('calendar');
const newEventModal = document.getElementById('newEventModal');
const deleteEventModal = document.getElementById('deleteEventModal');
const backDrop = document.getElementById('modalBackDrop');
const eventTitleInput = document.getElementById('eventTitleInput');
const eventDescriptionInput = document.getElementById('eventDescriptionInput');
const eventInfo = document.getElementById('eventInfo');
const eventTitle = document.getElementById('eventTitle');
const weekdays = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];
const employee1 = document.getElementById('employee1');
const employee2 = document.getElementById('employee2');
const working1 = document.getElementById('working1');
const working2 = document.getElementById('working2');
const Employees = document.getElementById('Employees');



function openModal(date) {
  clicked = date;

  const eventForDay = events.find(e => e.date === clicked);

  if (eventForDay) {
    document.getElementById('eventText').innerText = eventForDay.title;
    document.getElementById('eventInfo').innerText = eventForDay.description;
    document.getElementById('eventTitle').innerText = eventForDay.title;
    document.getElementById('working1').innerText = eventForDay.employee1;
    document.getElementById('working2').innerText = eventForDay.employee2;
    deleteEventModal.style.display = 'block';
    eventInfo.style.display = 'block';
    eventTitle.style.display = 'block';
    working1.style.display = 'block';
    working2.style.display = 'block';
    Employees.innerHTML = 'Employees';
  } else {
    newEventModal.style.display = 'block';
  }
  backDrop.style.display = 'block';
      //AF - Focus on the first element on the form so that it can be used with the keyboard
      document.getElementById('eventTitleInput').focus();
}

function load() {//sets the current month and year to your local systems time
  const dt = new Date();
    //set dt to date

  if (nav !== 0) {
    dt.setMonth(new Date().getMonth() + nav);
  }

  const day = dt.getDate();
  const month = dt.getMonth();
  const year = dt.getFullYear();
  //initializes variables to day month and year so we can format date

  const firstDayOfMonth = new Date(year, month, 1);
  const daysInMonth = new Date(year, month + 1, 0).getDate();
  //necessary to understand how many boxes we should create and what day to start the month on

  const dateString = firstDayOfMonth.toLocaleDateString('en-us', {
    weekday: 'long',
    year: 'numeric',
    month: 'numeric',
    day: 'numeric',
  });
  //specifies what type of format we want our variables
  const paddingDays = weekdays.indexOf(dateString.split(', ')[0]);

  document.getElementById('monthDisplay').innerText = 
    `${dt.toLocaleDateString('en-us', { month: 'long' })} ${year}`;

  calendar.innerHTML = '';

  for(let i = 1; i <= paddingDays + daysInMonth; i++) {
    const daySquare = document.createElement('div');
    daySquare.classList.add('day');
    const dayString = `${month + 1}/${i - paddingDays}/${year}`;

    if (i > paddingDays) {
      daySquare.innerText = i - paddingDays;
      const eventForDay = events.find(e => e.date === dayString);

      if (i - paddingDays === day && nav === 0) {
        daySquare.id = 'currentDay';
      }

      if (eventForDay) {
        const eventDiv = document.createElement('div');
        eventDiv.classList.add('event');
        eventDiv.innerText = eventForDay.title;
        daySquare.appendChild(eventDiv);
      }
      //AF - Allows day to be tabbed over
      //https://www.w3schools.com/jsref/met_element_setattribute.asp
      //https://developer.mozilla.org/en-US/docs/Web/HTML/Global_attributes/tabindex
      //https://www.w3schools.com/howto/howto_js_trigger_button_enter.asp
      daySquare.setAttribute('tabindex',i+5);
      daySquare.addEventListener('click', () => openModal(dayString));
      //AF - Add second event listener to work with a keyboard
      daySquare.addEventListener('keypress', function(event){
        if(event.key === "Enter"){
          openModal(dayString);
        }
      });
    } else {
      daySquare.classList.add('padding');
    }

    calendar.appendChild(daySquare);    
  }
}

function closeModal() {
  eventTitleInput.classList.remove('error');
  newEventModal.style.display = 'none';
  deleteEventModal.style.display = 'none';
  backDrop.style.display = 'none';
  eventTitleInput.value = '';
  eventDescriptionInput.value='';
  eventInfo.style.display = 'none';
  eventTitle.style.display = 'none';
  working1.style.display = 'none';
  working2.style.display = 'none';
  Employees.innerHTML = '';


  clicked = null;
  load();
}

function saveEvent() {
  if (eventTitleInput.value) {
    eventTitleInput.classList.remove('error');

    events.push({
      date: clicked,
      title: eventTitleInput.value,
      description: eventDescriptionInput.value,
      employee1: employee1.options[employee1.selectedIndex].value,
      employee2: employee2.options[employee2.selectedIndex].value,
    });

    localStorage.setItem('events', JSON.stringify(events));
    closeModal();
  } else {
    eventTitleInput.classList.add('error');
  }
}

function deleteEvent() {
  events = events.filter(e => e.date !== clicked);
  localStorage.setItem('events', JSON.stringify(events));
  closeModal();
}

function initButtons() {
  document.getElementById('nextButton').addEventListener('click', () => {
    nav++;
    load();
  });

  document.getElementById('backButton').addEventListener('click', () => {
    nav--;
    load();
  });

  document.getElementById('saveButton').addEventListener('click', saveEvent);
  document.getElementById('cancelButton').addEventListener('click', closeModal);
  document.getElementById('deleteButton').addEventListener('click', deleteEvent);
  document.getElementById('closeButton').addEventListener('click', closeModal);
}

initButtons();
load();

