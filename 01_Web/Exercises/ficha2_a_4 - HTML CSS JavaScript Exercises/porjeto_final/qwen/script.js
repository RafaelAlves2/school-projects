// Mostra mensagem de sucesso após submissão do formulário
document.getElementById("contactForm").addEventListener("submit", function(event) {
  event.preventDefault();
  document.getElementById("responseMessage").innerHTML = "<p>Mensagem enviada com sucesso! Obrigado pelo contato.</p>";
});