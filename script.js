// Funções de UI/Interação
function ativarContraste() {
    document.body.classList.toggle('alto-contraste');
}

function toggleForm() {
    const form = document.getElementById("certForm");
    form.classList.toggle("d-none");
}

function showTab(tab) {
    // Mostra/oculta abas
    document.getElementById('info-tab').classList.toggle('d-none', tab !== 'info');
    document.getElementById('cert-tab').classList.toggle('d-none', tab !== 'cert');
    
    // Ativa/desativa botões
    document.querySelectorAll('.tab-button').forEach(btn => {
        btn.classList.remove('active');
    });
    
    const tabIndex = tab === 'info' ? 0 : 1;
    document.querySelectorAll('.tab-button')[tabIndex].classList.add('active');
}

// Funções de manipulação de certificados
function criarCardCertificado(nome, instituicao, conclusao, link) {
    const card = document.createElement("div");
    card.className = "card mb-3 shadow-sm";
    card.innerHTML = `
      <div class="card-body">
        <h5 class="card-title">${nome}</h5>
        <h6 class="card-subtitle mb-2 text-muted">Instituição: ${instituicao}</h6>
        <p class="card-text">Concluído em <strong>${formatarMesAno(conclusao)}</strong></p>
        ${link ? `<a href="${link}" target="_blank" class="btn btn-sm btn-primary">Ver Certificado</a>` : ""}
      </div>
    `;
    return card;
}

function handleCertFormSubmit(e) {
    e.preventDefault();

    const nome = document.getElementById("nomeCert").value;
    const instituicao = document.getElementById("instituicao").value;
    const conclusao = document.getElementById("dataConclusao").value;
    const link = document.getElementById("arquivoCert").value;

    const card = criarCardCertificado(nome, instituicao, conclusao, link);
    document.getElementById("certificadosContainer").appendChild(card);

    // Limpar o formulário e esconder
    this.reset();
    this.classList.add("d-none");
}

function formatarMesAno(conclusao) {
    const meses = ["janeiro", "fevereiro", "março", "abril", "maio", "junho",
        "julho", "agosto", "setembro", "outubro", "novembro", "dezembro"];
    const [ano, mes] = conclusao.split("-");
    return `${meses[parseInt(mes) - 1]} de ${ano}`;
}

// Funções de gerenciamento de tema
function safeCheckRadio(id) {
    const element = document.getElementById(id);
    if (element) element.checked = true;
}

function aplicarModoSalvo() {
    const body = document.body;
    const modoSalvo = localStorage.getItem('modo');

    if (modoSalvo) {
        body.classList.remove('dark-mode', 'alto-contraste');
        
        if (modoSalvo === 'escuro') {
            body.classList.add('dark-mode');
            safeCheckRadio('modoEscuro');
        } else if (modoSalvo === 'contraste') {
            body.classList.add('alto-contraste');
            safeCheckRadio('modoContraste');
        } else {
            safeCheckRadio('modoClaro');
        }
    }
}

function handleAparenciaSubmit(e) {
    e.preventDefault();
    const modoSelecionado = document.querySelector('input[name="modo"]:checked');
    
    if (modoSelecionado) {
        const modo = modoSelecionado.value;
        document.body.classList.remove('dark-mode', 'alto-contraste');
        
        if (modo === 'escuro') {
            document.body.classList.add('dark-mode');
        } else if (modo === 'contraste') {
            document.body.classList.add('alto-contraste');
        }
        
        localStorage.setItem('modo', modo);
        alert('Configurações de aparência salvas!');
    }
}

function handlePerfilSubmit(e) {
    e.preventDefault();
    alert('Configurações de perfil salvas!');
}

// Inicialização
function init() {
    // Certificados
    const certForm = document.getElementById("certForm");
    if (certForm) {
        certForm.addEventListener("submit", handleCertFormSubmit);
    }

    // Tema
    aplicarModoSalvo();
    
    const formAparencia = document.getElementById('aparenciaForm');
    if (formAparencia) {
        formAparencia.addEventListener('submit', handleAparenciaSubmit);
    }

    // Perfil
    const perfilForm = document.getElementById('perfilForm');
    if (perfilForm) {
        perfilForm.addEventListener('submit', handlePerfilSubmit);
    }
}

// Inicia quando o DOM estiver carregado
document.addEventListener('DOMContentLoaded', init);