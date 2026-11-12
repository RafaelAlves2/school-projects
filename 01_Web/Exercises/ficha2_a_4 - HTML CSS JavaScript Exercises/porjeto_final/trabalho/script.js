document.getElementById("contactForm").addEventListener("submit", function(event) {
  event.preventDefault();
  const messageDiv = document.getElementById("responseMessage");
  messageDiv.innerHTML = "<p>Mensagem enviada com sucesso! Em breve entraremos em contato.</p>";
});