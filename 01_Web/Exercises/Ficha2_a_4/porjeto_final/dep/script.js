// Função para adicionar itens ao carrinho
let cartItems = 0;

function addToCart(productName, price) {
    cartItems++;
    updateCartCount();
    
    // Criar notificação
    const notification = document.createElement('div');
    notification.className = 'notification';
    notification.innerHTML = `
        <p>${productName} foi adicionado ao carrinho!</p>
        <p>Preço: R$ ${price.toFixed(2)}</p>
    `;
    
    document.body.appendChild(notification);
    
    // Mostrar notificação
    setTimeout(() => {
        notification.style.opacity = '1';
        notification.style.transform = 'translateY(0)';
    }, 100);
    
    // Remover notificação após 3 segundos
    setTimeout(() => {
        notification.style.opacity = '0';
        notification.style.transform = 'translateY(-20px)';
        setTimeout(() => {
            document.body.removeChild(notification);
        }, 300);
    }, 3000);
    
    return false; // Prevenir comportamento padrão do link
}

function updateCartCount() {
    const cartCountElements = document.querySelectorAll('.cart-count');
    cartCountElements.forEach(el => {
        el.textContent = cartItems;
    });
}

// Validação do formulário de contato
document.getElementById('contact-form')?.addEventListener('submit', function(e) {
    e.preventDefault();
    
    const nome = document.getElementById('nome').value;
    const email = document.getElementById('email').value;
    
    if (nome && email) {
        alert('Obrigado por sua mensagem! Entraremos em contato em breve.');
        this.reset();
    } else {
        alert('Por favor, preencha os campos obrigatórios.');
    }
});

// Efeito de rolagem suave para links internos
document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function(e) {
        e.preventDefault();
        
        const targetId = this.getAttribute('href');
        if (targetId === '#') return;
        
        const targetElement = document.querySelector(targetId);
        if (targetElement) {
            window.scrollTo({
                top: targetElement.offsetTop - 100,
                behavior: 'smooth'
            });
        }
    });
});

// Adicionar estilos para notificações dinamicamente
const style = document.createElement('style');
style.textContent = `
    .notification {
        position: fixed;
        top: 20px;
        right: 20px;
        background-color: #27ae60;
        color: white;
        padding: 15px 20px;
        border-radius: 5px;
        box-shadow: 0 3px 10px rgba(0, 0, 0, 0.2);
        z-index: 1000;
        opacity: 0;
        transform: translateY(-20px);
        transition: all 0.3s ease;
    }
`;
document.head.appendChild(style);

// Carregamento de produtos (simulação)
document.addEventListener('DOMContentLoaded', function() {
    console.log('Loja Moda Elegante carregada com sucesso!');
    
    // Simular carregamento de produtos
    setTimeout(() => {
        console.log('Produtos carregados');
    }, 1000);
});