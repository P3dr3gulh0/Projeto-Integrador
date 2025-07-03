<!-- perfil.html -->
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Perfil do Profissional - Trust Work</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="style.css" />
</head>

<body class="container-sm py-4">

  <!-- Cabeçalho: Foto, nome, selo verificado, avaliação e CTA -->
  <div class="card header-card mb-4 shadow-sm p-3">
    <div class="d-flex align-items-center mb-3">
      <img src="img/coisasamais/perfil.png"
           alt="Foto do profissional"
           class="rounded-circle me-3"
           width="80" height="80">
      <div>
        <h5 class="perfil-nome mb-1">
          Joaquim Moreira
          <span class="badge bg-success">
            <i class="bi bi-shield-fill-check"></i> Verificado
          </span>
        </h5>
        <p class="perfil-info small mb-1">Encanador • São Paulo, SP</p>
        <div class="d-flex align-items-center">
          <span class="cor-primaria fw-bold">★ 4.8</span>
          <small class="text-muted ms-1">(125 avaliações)</small>
        </div>
      </div>
    </div>
    <button class="btn btn-cta w-100" data-bs-toggle="modal" data-bs-target="#agendamentoModal">
      Contratar Agora
    </button>
  </div>

  <!-- Abas de navegação -->
  <ul class="nav nav-tabs mb-3" id="profileTabs" role="tablist">
    <li class="nav-item" role="presentation">
      <button class="nav-link active" id="sobre-tab" data-bs-toggle="tab" data-bs-target="#sobre" type="button">Sobre</button>
    </li>
    <li class="nav-item" role="presentation">
      <button class="nav-link" id="portfolio-tab" data-bs-toggle="tab" data-bs-target="#portfolio" type="button">Portfólio</button>
    </li>
    <li class="nav-item" role="presentation">
      <button class="nav-link" id="avaliacoes-tab" data-bs-toggle="tab" data-bs-target="#avaliacoes" type="button">Avaliações</button>
    </li>
    <li class="nav-item" role="presentation">
      <button class="nav-link" id="certificacoes-tab" data-bs-toggle="tab" data-bs-target="#certificacoes" type="button">Certificações</button>
    </li>
  </ul>

  <!-- Conteúdo das abas -->
  <div class="tab-content" id="profileTabsContent">

    <!-- SOBRE -->
    <div class="tab-pane fade show active" id="sobre">
      <div class="card mb-3">
        <div class="card-body">
          <h6 class="fw-bold">Biografia</h6>
          <p>Profissional com mais de 10 anos de experiência em encanamento residencial e comercial. Fluente em Português e Espanhol.</p>
          <h6 class="fw-bold mt-3">Detalhes</h6>
          <div class="row text-center">
            <div class="col">
              <strong>10+</strong>
              <p class="small text-muted">Anos de Experiência</p>
            </div>
            <div class="col">
              <strong>30</strong>
              <p class="small text-muted">Atendimentos/mês</p>
            </div>
            <div class="col">
              <strong>4.8</strong>
              <p class="small text-muted">Média de Avaliações</p>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- PORTFÓLIO -->
    <div class="tab-pane fade" id="portfolio">
      <div id="portfolioCarousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner rounded shadow-sm">
          <div class="carousel-item active">
            <img src="https://via.placeholder.com/400x200" class="d-block w-100" alt="Portfólio 1">
          </div>
          <div class="carousel-item">
            <img src="https://via.placeholder.com/400x200" class="d-block w-100" alt="Portfólio 2">
          </div>
          <div class="carousel-item">
            <img src="https://via.placeholder.com/400x200" class="d-block w-100" alt="Portfólio 3">
          </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#portfolioCarousel" data-bs-slide="prev">
          <span class="carousel-control-prev-icon"></span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#portfolioCarousel" data-bs-slide="next">
          <span class="carousel-control-next-icon"></span>
        </button>
      </div>
    </div>

    <!-- AVALIAÇÕES -->
    <div class="tab-pane fade" id="avaliacoes">
      <div class="list-group">
        <div class="list-group-item mb-2">
          <div class="d-flex justify-content-between">
            <div>
              <strong>Ana Souza</strong>
              <span class="cor-primaria">★★★★☆</span>
            </div>
            <small class="text-muted">15 junho, 2025</small>
          </div>
          <p class="mb-0">Ótimo serviço, chegou no horário e resolveu meu vazamento.</p>
        </div>
      </div>
    </div>

    <!-- CERTIFICAÇÕES -->
    <div class="tab-pane fade" id="certificacoes">
      <button class="btn btn-outline-dark mb-3" onclick="toggleForm()">➕ Adicionar Certificado</button>
      <form id="certForm" class="border p-3 mb-4 d-none rounded bg-light">
        <!-- Campos de certificado -->
      </form>
      <div id="certificadosContainer"></div>
    </div>

  </div>

  <!-- Modal de Agendamento -->
  <div class="modal fade" id="agendamentoModal" tabindex="-1">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Agendar Serviço</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body">
          <form>
            <div class="mb-3">
              <label class="form-label">Data e Hora</label>
              <input type="datetime-local" class="form-control">
            </div>
            <div class="mb-3">
              <label class="form-label">Detalhes</label>
              <textarea class="form-control" rows="3"></textarea>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-outline-dark" data-bs-dismiss="modal">Cancelar</button>
          <button type="button" class="btn btn-cta">Confirmar</button>
        </div>
      </div>
    </div>
  </div>

    <!-- Navegação inferior -->
    <nav role="navigation" aria-label="Navegação principal" class="bottom-nav">
        <a href="index.html" aria-label="Ir para página inicial">
            <i class="bi bi-house-door-fill"></i>
            <span class="sr-only">Início</span>
        </a>
        <a href="pesquisa.html" aria-label="Pesquisar serviços">
            <i class="bi bi-search"></i>
            <span class="sr-only">Pesquisa</span>
        </a>
        <a href="notificacoes.html" aria-label="Ver notificações">
            <i class="bi bi-bell-fill"></i>
            <span class="sr-only">Notificações</span>
        </a>
        <a href="http://localhost/Projeto-Integrador/perfil.php" aria-label="Ver perfil">
            <i class="bi bi-person-circle"></i>
            <span class="sr-only">Perfil</span>
        </a>
    </nav>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="script.js"></script>
</body>
</html>