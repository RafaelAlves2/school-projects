// script.js - JavaScript principal para funcionalidades comuns

// Dados dos produtos
const produtos = [
    {
        id: 1,
        nome: "Air Max 270",
        preco: 129.99,
        categoria: "desporto",
        marca: "nike",
        imagem: "https://via.placeholder.com/300x300?text=Air+Max+270",
        promocao: false
    },
    {
        id: 2,
        nome: "Classic Leather",
        preco: 89.99,
        categoria: "casual",
        marca: "reebok",
        imagem: "https://via.placeholder.com/300x300?text=Classic+Leather",
        promocao: false
    },
    {
        id: 3,
        nome: "Ultra Boost",
        preco: 159.99,
        categoria: "desporto",
        marca: "adidas",
        imagem: "https://via.placeholder.com/300x300?text=Ultra+Boost",
        promocao: false
    },
    {
        id: 4,
        nome: "Old Skool",
        preco: 63.99,
        precoOriginal: 79.99,
        categoria: "casual",
        marca: "vans",
        imagem: "https://via.placeholder.com/300x300?text=Old+Skool",
        promocao: true,
        desconto: 20
    },
    {
        id: 5,
        nome: "Chuck Taylor",
        preco: 55.25,
        precoOriginal: 65.00,
        categoria: "casual",
        marca: "converse",
        imagem: "https://via.placeholder.com/300x300?text=Chuck+Taylor",
        promocao: true,
        desconto: 15
    },
    {
        id: 6,
        nome: "Air Force 1",
        preco: 119.99,
        categoria: "casual",
        marca: "nike",
        imagem: "https://via.placeholder.com/300x300?text=Air+Force+1",
        promocao: false
    },
    {
        id: 7,
        nome: "Superstar",
        preco: 99.99,
        categoria: "casual",
        marca: "adidas",
        imagem: "https://via.placeholder.com/300x300?text=Superstar",
        promocao: false
    },
    {
        id: 8,
        nome: "RS-X",
        preco: 139.99,
        categoria: "desporto",
        marca: "puma",
        imagem: "https://via.placeholder.com/300x300?text=RS-X",
        promocao: false
    }
];

// Carrinho de compras
let carrinho = JSON.parse(localStorage.getItem('carrinho')) || [];

// Utilizador atual
let utilizadorAtual = JSON.parse(localStorage.getItem('utilizadorAtual')) || null;

// Inicialização quando o DOM estiver carregado
document.addEventListener('DOMContentLoaded', function() {
    inicializarNavegacaoMobile();
    inicializarSeletorCores();
    atualizarContadorCarrinho();
    inicializarBotoesAdicionarCarrinho();
    
    // Verificar se estamos na página de carrinho
    if (window.location.pathname.includes('carrinho.html')) {
        inicializarCarrinho();
    }
    
    // Verificar se estamos na página de login
    if (window.location.pathname.includes('login.html')) {
        inicializarAuthTabs();
    }
});

// Navegação Mobile
function inicializarNavegacaoMobile() {
    const mobileMenu = document.getElementById('mobile-menu');
    const navMenu = document.querySelector('.nav-menu');
    
    if (mobileMenu && navMenu) {
        mobileMenu.addEventListener('click', function() {
            mobileMenu.classList.toggle('active');
            navMenu.classList.toggle('active');
        });
    }
}

// Seletor de Cores de Fundo
function inicializarSeletorCores() {
    const botoesCor = document.querySelectorAll('.cor-btn');
    
    botoesCor.forEach(botao => {
        botao.addEventListener('click', function() {
            const cor = this.getAttribute('data-cor');
            document.body.style.backgroundColor = cor;
            localStorage.setItem('corFundo', cor);
        });
    });
    
    // Aplicar cor salva
    const corSalva = localStorage.getItem('corFundo');
    if (corSalva) {
        document.body.style.backgroundColor = corSalva;
    }
}

// Atualizar contador do carrinho
function atualizarContadorCarrinho() {
    const contadores = document.querySelectorAll('#contador-carrinho');
    const totalItens = carrinho.reduce((total, item) => total + item.quantidade, 0);
    
    contadores.forEach(contador => {
        contador.textContent = totalItens;
    });
}

// Adicionar produto ao carrinho
function adicionarAoCarrinho(id, nome, preco, imagem) {
    const produtoExistente = carrinho.find(item => item.id === id);
    
    if (produtoExistente) {
        produtoExistente.quantidade += 1;
    } else {
        carrinho.push({
            id: id,
            nome: nome,
            preco: preco,
            imagem: imagem || 'https://via.placeholder.com/100x100?text=Sneaker',
            quantidade: 1
        });
    }
    
    // Atualizar localStorage
    localStorage.setItem('carrinho', JSON.stringify(carrinho));
    
    // Atualizar contador
    atualizarContadorCarrinho();
    
    // Mostrar mensagem de sucesso
    mostrarMensagem(`${nome} adicionado ao carrinho!`, 'sucesso');
}

// Inicializar botões de adicionar ao carrinho
function inicializarBotoesAdicionarCarrinho() {
    const botoesAdicionar = document.querySelectorAll('.btn-adicionar');
    
    botoesAdicionar.forEach(botao => {
        botao.addEventListener('click', function() {
            const id = parseInt(this.getAttribute('data-id'));
            const nome = this.getAttribute('data-nome');
            const preco = parseFloat(this.getAttribute('data-preco'));
            
            // Encontrar produto completo para obter a imagem
            const produto = produtos.find(p => p.id === id);
            const imagem = produto ? produto.imagem : 'https://via.placeholder.com/100x100?text=Sneaker';
            
            adicionarAoCarrinho(id, nome, preco, imagem);
        });
    });
}

// Mostrar mensagem de feedback
function mostrarMensagem(mensagem, tipo) {
    // Criar elemento de mensagem
    const mensagemElement = document.createElement('div');
    mensagemElement.className = `mensagem ${tipo}`;
    mensagemElement.textContent = mensagem;
    
    // Adicionar ao corpo do documento
    document.body.appendChild(mensagemElement);
    
    // Remover após 3 segundos
    setTimeout(() => {
        mensagemElement.remove();
    }, 3000);
}

// Formatar preço em euros
function formatarPreco(preco) {
    return `€${preco.toFixed(2).replace('.', ',')}`;
}

// Verificar se o utilizador está autenticado
function verificarAutenticacao() {
    return utilizadorAtual !== null;
}

// Redirecionar para login se não estiver autenticado
function redirecionarParaLogin() {
    if (!verificarAutenticacao()) {
        window.location.href = 'login.html';
        return false;
    }
    return true;
}

// Função para logout
function logout() {
    utilizadorAtual = null;
    localStorage.removeItem('utilizadorAtual');
    window.location.href = 'index.html';
}