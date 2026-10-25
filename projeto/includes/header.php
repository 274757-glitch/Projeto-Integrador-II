<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Expressa — Comunicação Alternativa</title>
    <!-- Bootstrap CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/estilo.css">
</head>
<body class="min-vh-100 d-flex flex-column pb-5">

    <!-- Topo Estilo Expressa (Figma) -->
    <header class="expressa-header py-3">
        <div class="container d-flex justify-content-between align-items-center">
            <a class="expressa-logo text-decoration-none" href="index.php?tela=inicio">Expressa</a>
            <span class="badge-perfil">Comunicação</span>
        </div>
    </header>

    <!-- Conteúdo Principal -->
    <main class="container my-3 flex-grow-1 pb-5">

        <!-- Mensagens de Feedback (Estilo "Reproduzindo" do Figma) -->
        <?php if($mensagem !== ""): ?>
            <div class="alert alert-success alert-dismissible fade show shadow-sm mb-4" role="alert">
                🔊 <strong><?= htmlspecialchars($mensagem) ?></strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Fechar"></button>
            </div>
        <?php endif; ?>