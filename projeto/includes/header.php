<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cartões de Comunicação</title>
    <!-- Bootstrap CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/estilo.css">
</head>
<body class="bg-light min-vh-100 d-flex flex-column">

    <!-- Barra de Navegação -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow-sm">
        <div class="container">
            <a class="navbar-brand fw-bold" href="index.php?tela=inicio">💬 Comunicação Alternativa</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link <?= ($tela === 'inicio') ? 'active fw-bold' : '' ?>" href="index.php?tela=inicio">Início</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= ($tela === 'categorias') ? 'active fw-bold' : '' ?>" href="index.php?tela=categorias">Categorias</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= ($tela === 'historico') ? 'active fw-bold' : '' ?>" href="index.php?tela=historico">Histórico</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Conteúdo Principal -->
    <main class="container my-4 flex-grow-1">

        <!-- Mensagens de Feedback -->
        <?php if($mensagem !== ""): ?>
            <div class="alert alert-success alert-dismissible fade show shadow-sm" role="alert">
                <strong>Ação realizada:</strong> <?= htmlspecialchars($mensagem) ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Fechar"></button>
            </div>
        <?php endif; ?>