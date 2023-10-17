const calendarIcon = document.querySelector('.fa-regular.fa-calendar-days.fa-lg.calendar-icon');
const dateInput = document.querySelector('#dateInput');

calendarIcon.addEventListener('click', () => {
    $(dateInput).datepicker(); // Initialize the datepicker
    $(dateInput).datepicker('show');
  });
