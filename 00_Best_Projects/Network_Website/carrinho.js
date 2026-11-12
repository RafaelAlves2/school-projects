// carrinho.js - JavaScript específico para a página do carrinho

document.addEventListener('DOMContentLoaded', function() {
    inicializarCarrinho();
});

// Inicializar carrinho
function inicializarCarrinho() {
    atualizarCarrinho();
    
    // Adicionar event listeners para os botões
    document.addEventListener('click', function(event) {
        if (event.target.classList.contains('quantidade-btn')) {
            const acao = event.target.getAttribute('data-acao');
            const id = parseInt(event.target.getAttribute('data-id'));
            alterarQuantidade(id, acao);
        }
        
        if (event.target.classList.contains('remover-item')) {
            const id = parseInt(event.target.getAttribute('data-id'));
            removerItem(id);
        }
    });
    
    // Event listener para o botão finalizar compra
    const btnFinalizar = document.querySelector('.btn-finalizar');
    if (btnFinalizar) {
        btnFinalizar.addEventListener('click', finalizarCompra);
    }
}

// Atualizar visualização do carrinho
function atualizarCarrinho() {
    const containerItems = document.querySelector('.carrinho-items');
    const containerResumo = document.querySelector('.carrinho-resumo');
    const containerVazio = document.querySelector('.carrinho-vazio');
    
    if (!containerItems) return;
    
    if (carrinho.length === 0) {
        // Mostrar carrinho vazio
        if (containerVazio) {
            containerVazio.style.display = 'block';
        }
        if (containerItems) {
            containerItems.style.display = 'none';
        }
        if (containerResumo) {
            containerResumo.style.display = 'none';
        }
        return;
    }
    
    // Esconder carrinho vazio
    if (containerVazio) {
        containerVazio.style.display = 'none';
    }
    if (containerItems) {
        containerItems.style.display = 'block';
    }
    if (containerResumo) {
        containerResumo.style.display = 'block';
    }
    
    // Atualizar itens do carrinho
    containerItems.innerHTML = '';
    
    carrinho.forEach(item => {
        const itemElement = document.createElement('div');
        itemElement.className = 'carrinho-item';
        itemElement.innerHTML = `
            <div class="carrinho-item-imagem">
                <img src="${item.imagem}" alt="${item.nome}">
            </div>
            <div class="carrinho-item-info">
                <h4>${item.nome}</h4>
                <p class="carrinho-item-preco">${formatarPreco(item.preco)}</p>
            </div>
            <div class="carrinho-item-quantidade">
                <button class="quantidade-btn" data-id="${item.id}" data-acao="diminuir">-</button>
                <span>${item.quantidade}</span>
                <button class="quantidade-btn" data-id="${item.id}" data-acao="aumentar">+</button>
            </div>
            <div class="carrinho-item-remover">
                <button class="remover-item" data-id="${item.id}">×</button>
            </div>
        `;
        containerItems.appendChild(itemElement);
    });
    
    // Atualizar resumo
    atualizarResumo();
}

// Atualizar resumo do carrinho
function atualizarResumo() {
    const subtotal = carrinho.reduce((total, item) => total + (item.preco * item.quantidade), 0);
    const portes = subtotal > 50 ? 0 : 5.99; // Portes grátis acima de €50
    const total = subtotal + portes;
    
    const resumoHTML = `
        <div class="resumo-linha">
            <span>Subtotal</span>
            <span>${formatarPreco(subtotal)}</span>
        </div>
        <div class="resumo-linha">
            <span>Portes</span>
            <span>${portes === 0 ? 'Grátis' : formatarPreco(portes)}</span>
        </div>
        <div class="resumo-linha resumo-total">
            <span>Total</span>
            <span>${formatarPreco(total)}</span>
        </div>
        ${subtotal < 50 ? `<p class="info-portes">Adicione mais ${formatarPreco(50 - subtotal)} para portes grátis!</p>` : ''}
        <button class="btn-primary btn-finalizar">Finalizar Compra</button>
    `;
    
    const containerResumo = document.querySelector('.carrinho-resumo');
    if (containerResumo) {
        containerResumo.innerHTML = resumoHTML;
        
        // Re-adicionar event listener ao botão finalizar
        const btnFinalizar = containerResumo.querySelector('.btn-finalizar');
        if (btnFinalizar) {
            btnFinalizar.addEventListener('click', finalizarCompra);
        }
    }
}

// Alterar quantidade de um item
function alterarQuantidade(id, acao) {
    const item = carrinho.find(item => item.id === id);
    
    if (!item) return;
    
    if (acao === 'aumentar') {
        item.quantidade += 1;
    } else if (acao === 'diminuir') {
        item.quantidade -= 1;
        
        // Remover item se quantidade chegar a 0
        if (item.quantidade === 0) {
            removerItem(id);
            return;
        }
    }
    
    // Atualizar localStorage
    localStorage.setItem('carrinho', JSON.stringify(carrinho));
    
    // Atualizar visualização
    atualizarCarrinho();
    atualizarContadorCarrinho();
}

// Remover item do carrinho
function removerItem(id) {
    carrinho = carrinho.filter(item => item.id !== id);
    
    // Atualizar localStorage
    localStorage.setItem('carrinho', JSON.stringify(carrinho));
    
    // Atualizar visualização
    atualizarCarrinho();
    atualizarContadorCarrinho();
    
    mostrarMensagem('Item removido do carrinho.', 'sucesso');
}

// Finalizar compra
function finalizarCompra() {
    // Verificar se o utilizador está autenticado
    if (!redirecionarParaLogin()) {
        return;
    }
    
    if (carrinho.length === 0) {
        mostrarMensagem('O carrinho está vazio.', 'erro');
        return;
    }
    
    // Simular processamento da compra
    mostrarMensagem('A processar a sua compra...', 'sucesso');
    
    // Limpar carrinho após compra
    setTimeout(() => {
        carrinho = [];
        localStorage.setItem('carrinho', JSON.stringify(carrinho));
        
        atualizarCarrinho();
        atualizarContadorCarrinho();
        
        mostrarMensagem('Compra realizada com sucesso! Obrigado pela sua encomenda.', 'sucesso');
    }, 2000);
}