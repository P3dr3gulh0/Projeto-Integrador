function ativarContraste() {
    document.body.classList.toggle('alto-contraste');
}
function toggleForm() {
    const form = document.getElementById("certForm");
    form.classList.toggle("d-none");
}

function showTab(tab) {
    document.getElementById('info-tab').classList.toggle('d-none', tab !== 'info');
    document.getElementById('cert-tab').classList.toggle('d-none', tab !== 'cert');
    document.querySelectorAll('.tab-button').forEach(btn => {
        btn.classList.remove('active');
    });
    if (tab === 'info') {
        document.querySelectorAll('.tab-button')[0].classList.add('active');
    } else {
        document.querySelectorAll('.tab-button')[1].classList.add('active');
    }
}


// criação do certidicado
document.getElementById("certForm").addEventListener("submit", function (e) {
    e.preventDefault();

    const nome = document.getElementById("nomeCert").value;
    const instituicao = document.getElementById("instituicao").value;
    const conclusao = document.getElementById("dataConclusao").value;
    const link = document.getElementById("arquivoCert").value;

    // Criar o card
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

    document.getElementById("certificadosContainer").appendChild(card);

    // Limpar o formulário e esconder
    this.reset();
    this.classList.add("d-none");
});

function formatarMesAno(conclusao) {
    const meses = ["janeiro", "fevereiro", "março", "abril", "maio", "junho",
        "julho", "agosto", "setembro", "outubro", "novembro", "dezembro"];
    const [ano, mes] = conclusao.split("-");
    return `${meses[parseInt(mes) - 1]} de ${ano}`;
}

// Gerencia modo claro / escuro com persistência local (localStorage)
const body = document.body;
const modoSalvo = localStorage.getItem('modo');
if (modoSalvo === 'escuro') {
    body.classList.add('dark-mode');
    document.getElementById('modoEscuro').checked = true;
}

document.getElementById('aparenciaForm').addEventListener('submit', e => {
    e.preventDefault();
    const modo = document.querySelector('input[name="modo"]:checked').value;
    if (modo === 'escuro') {
        body.classList.add('dark-mode');
    } else {
        body.classList.remove('dark-mode');
    }
    localStorage.setItem('modo', modo);
    alert('Configurações de aparência salvas!');
});

document.getElementById('perfilForm').addEventListener('submit', e => {
    e.preventDefault();
    // Aqui pode enviar para backend ou salvar localmente
    alert('Configurações de perfil salvas!');
});