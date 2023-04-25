// Pega o input
var dateInput = document.getElementsByName("dataNasc")[0];

// Pega a data atual
var today = new Date();
today.setHours(0,0,0,0);

// Adiciona um event listener ao input
dateInput.addEventListener("change", function(event) {
  // Pega o valor do input
  var selectedDate = new Date(event.target.value);
  
  // Verifica se o dia do input é maior que a data de hoje
  if (selectedDate > today) {
    // Se for a data do input é troca pra data de hoje
    event.target.value = today.toISOString().slice(0,10);
    // e um alert é mostrado informando o usuário
    alert('Por favor, selecione uma data passada.');
  }
});
