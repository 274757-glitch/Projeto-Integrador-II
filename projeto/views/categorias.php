<div class="container my-4">
    <?php if($categoriaSelecionada !== "" && isset($categorias[$categoriaSelecionada])): ?>

        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2><?= htmlspecialchars($categorias[$categoriaSelecionada]) ?></h2>
            <a href="index.php?tela=categorias" class="btn btn-secondary">Voltar</a>
        </div>

        <?php if($categoriaSelecionada === "pessoas"): ?>
            <?php require "views/pessoas.php"; ?>
        <?php elseif($categoriaSelecionada === "lugares"): ?>
            <?php require "views/lugares.php"; ?>
        <?php else: ?>
            <?php $listaCartoes = buscarPorCategoria($cartoes, $categoriaSelecionada); ?>
            <?php require "views/cartoes.php"; ?>
        <?php endif; ?>

    <?php else: ?>

        <h2 class="mb-4">Categorias</h2>
        <div class="row g-3">
            <?php foreach($categorias as $chave => $nome): ?>
                <div class="col-6 col-md-4">
                    <a href="index.php?tela=categorias&amp;categoria=<?= urlencode($chave) ?>" class="btn btn-outline-dark w-100 py-4 d-flex flex-column align-items-center justify-content-center shadow-sm text-decoration-none">
                        <span class="fw-bold fs-4 text-dark"><?= htmlspecialchars($nome) ?></span>
                    </a>
                </div>
            <?php endforeach; ?>
        </div>

    <?php endif; ?>
</div>
