// colecao.js - JavaScript específico para a página de coleção

document.addEventListener('DOMContentLoaded', function() {
    carregarColecao();
    inicializarFiltros();
});

// Carregar produtos na coleção
function carregarColecao(filtros = {}) {
    const container = document.getElementById('colecao-produtos');
    
    if (!container) return;
    
    // Aplicar filtros
    let produtosFiltrados = [...produtos];
    
    if (filtros.categoria && filtros.categoria !== 'todos') {
        produtosFiltrados = produtosFiltrados.filter(produto => 
            produto.categoria === filtros.categoria
        );
    }
    
    if (filtros.marca && filtros.marca !== 'todos') {
        produtosFiltrados = produtosFiltrados.filter(produto => 
            produto.marca === filtros.marca
        );
    }
    
    if (filtros.preco && filtros.preco !== 'todos') {
        produtosFiltrados = produtosFiltrados.filter(produto => {
            switch(filtros.preco) {
                case '0-50':
                    return produto.preco <= 50;
                case '50-100':
                    return produto.preco > 50 && produto.preco <= 100;
                case '100-150':
                    return produto.preco > 100 && produto.preco <= 150;
                case '150+':
                    return produto.preco > 150;
                default:
                    return true;
            }
        });
    }
    
    // Limpar container
    container.innerHTML = '';
    
    // Adicionar produtos filtrados
    if (produtosFiltrados.length === 0) {
        container.innerHTML = '<p class="sem-resultados">Nenhum produto encontrado com os filtros selecionados.</p>';
        return;
    }
    
    produtosFiltrados.forEach(produto => {
        const produtoCard = criarCardProduto(produto);
        container.appendChild(produtoCard);
    });
}

// Criar card de produto
function criarCardProduto(produto) {
    const card = document.createElement('div');
    card.className = 'produto-card fade-in';
    
    const precoHTML = produto.promocao 
        ? `<p class="produto-preco-antigo">${formatarPreco(produto.precoOriginal)}</p>
           <p class="produto-preco">${formatarPreco(produto.preco)}</p>`
        : `<p class="produto-preco">${formatarPreco(produto.preco)}</p>`;
    
    const badgePromocao = produto.promocao 
        ? `<span class="promocao-badge">-${produto.desconto}%</span>`
        : '';
    
    card.innerHTML = `
        <div class="produto-imagem">
            <img src="${produto.imagem}" alt="${produto.nome}">
            ${badgePromocao}
        </div>
        <div class="produto-info">
            <h3>${produto.nome}</h3>
            ${precoHTML}
            <button class="btn-adicionar" 
                    data-id="${produto.id}" 
                    data-nome="${produto.nome}" 
                    data-preco="${produto.preco}">
                Adicionar ao Carrinho
            </button>
        </div>
    `;
    
    // Adicionar evento ao botão
    const botaoAdicionar = card.querySelector('.btn-adicionar');
    botaoAdicionar.addEventListener('click', function() {
        const id = parseInt(this.getAttribute('data-id'));
        const nome = this.getAttribute('data-nome');
        const preco = parseFloat(this.getAttribute('data-preco'));
        
        adicionarAoCarrinho(id, nome, preco, produto.imagem);
    });
    
    return card;
}

// Inicializar filtros
function inicializarFiltros() {
    const filtroCategoria = document.getElementById('categoria');
    const filtroMarca = document.getElementById('marca');
    const filtroPreco = document.getElementById('preco');
    
    if (filtroCategoria) {
        filtroCategoria.addEventListener('change', aplicarFiltros);
    }
    
    if (filtroMarca) {
        filtroMarca.addEventListener('change', aplicarFiltros);
    }
    
    if (filtroPreco) {
        filtroPreco.addEventListener('change', aplicarFiltros);
    }
}

// Aplicar filtros
function aplicarFiltros() {
    const filtros = {
        categoria: document.getElementById('categoria')?.value || 'todos',
        marca: document.getElementById('marca')?.value || 'todos',
        preco: document.getElementById('preco')?.value || 'todos'
    };
    
    carregarColecao(filtros);
}