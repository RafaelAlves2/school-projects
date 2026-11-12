// login.js - JavaScript específico para a página de login/registo

document.addEventListener('DOMContentLoaded', function() {
    inicializarAuthTabs();
    inicializarFormularios();
});

// Inicializar tabs de autenticação
function inicializarAuthTabs() {
    const tabs = document.querySelectorAll('.auth-tab');
    const forms = document.querySelectorAll('.auth-form');
    
    tabs.forEach(tab => {
        tab.addEventListener('click', function() {
            const tabAlvo = this.getAttribute('data-tab');
            
            // Remover classe active de todas as tabs e forms
            tabs.forEach(t => t.classList.remove('active'));
            forms.forEach(f => f.classList.remove('active'));
            
            // Adicionar classe active à tab e form selecionados
            this.classList.add('active');
            document.getElementById(`${tabAlvo}-form`).classList.add('active');
        });
    });
}

// Inicializar formulários
function inicializarFormularios() {
    const formLogin = document.getElementById('form-login');
    const formRegistro = document.getElementById('form-registro');
    
    if (formLogin) {
        formLogin.addEventListener('submit', fazerLogin);
    }
    
    if (formRegistro) {
        formRegistro.addEventListener('submit', fazerRegistro);
    }
}

// Fazer login
function fazerLogin(event) {
    event.preventDefault();
    
    const email = document.getElementById('login-email').value;
    const password = document.getElementById('login-password').value;
    
    // Validar campos
    if (!email || !password) {
        mostrarMensagem('Por favor, preencha todos os campos.', 'erro');
        return;
    }
    
    // Simular verificação de credenciais
    const utilizadores = JSON.parse(localStorage.getItem('utilizadores')) || [];
    const utilizador = utilizadores.find(u => u.email === email && u.password === password);
    
    if (utilizador) {
        // Login bem-sucedido
        utilizadorAtual = {
            nome: utilizador.nome,
            email: utilizador.email
        };
        
        localStorage.setItem('utilizadorAtual', JSON.stringify(utilizadorAtual));
        
        mostrarMensagem('Login realizado com sucesso!', 'sucesso');
        
        // Redirecionar após 1 segundo
        setTimeout(() => {
            window.location.href = 'index.html';
        }, 1000);
    } else {
        mostrarMensagem('Email ou password incorretos.', 'erro');
    }
}

// Fazer registo
function fazerRegistro(event) {
    event.preventDefault();
    
    const nome = document.getElementById('reg-nome').value;
    const email = document.getElementById('reg-email').value;
    const password = document.getElementById('reg-password').value;
    const confirmPassword = document.getElementById('reg-confirm-password').value;
    const termos = document.getElementById('reg-termos').checked;
    
    // Validar campos
    if (!nome || !email || !password || !confirmPassword) {
        mostrarMensagem('Por favor, preencha todos os campos.', 'erro');
        return;
    }
    
    if (password !== confirmPassword) {
        mostrarMensagem('As passwords não coincidem.', 'erro');
        return;
    }
    
    if (!termos) {
        mostrarMensagem('Deve aceitar os termos e condições.', 'erro');
        return;
    }
    
    // Verificar se o email já existe
    const utilizadores = JSON.parse(localStorage.getItem('utilizadores')) || [];
    const emailExistente = utilizadores.find(u => u.email === email);
    
    if (emailExistente) {
        mostrarMensagem('Este email já está registado.', 'erro');
        return;
    }
    
    // Criar novo utilizador
    const novoUtilizador = {
        nome: nome,
        email: email,
        password: password,
        dataRegisto: new Date().toISOString()
    };
    
    utilizadores.push(novoUtilizador);
    localStorage.setItem('utilizadores', JSON.stringify(utilizadores));
    
    // Fazer login automaticamente
    utilizadorAtual = {
        nome: nome,
        email: email
    };
    
    localStorage.setItem('utilizadorAtual', JSON.stringify(utilizadorAtual));
    
    mostrarMensagem('Conta criada com sucesso!', 'sucesso');
    
    // Redirecionar após 1 segundo
    setTimeout(() => {
        window.location.href = 'index.html';
    }, 1000);
}