// Get the input element
var dateInput = document.getElementsByName("dataNasc")[0];

// Get the current date
var today = new Date();
today.setHours(0,0,0,0);

// Add an event listener to the input element
dateInput.addEventListener("change", function(event) {
  // Get the selected date from the input element
  var selectedDate = new Date(event.target.value);
  
  // Check if the selected date is after today
  if (selectedDate > today) {
    // If it is, set the input value to today's date
    event.target.value = today.toISOString().slice(0,10);
    alert('Por favor, selecione uma data passada.');
  }
});
