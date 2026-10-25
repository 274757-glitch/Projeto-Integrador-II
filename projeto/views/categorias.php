<div class="my-2">
    <?php if($categoriaSelecionada !== "" && isset($categorias[$categoriaSelecionada])): ?>

        <div class="d-flex justify-content-between align-items-center mb-4">
            <a href="index.php?tela=categorias" class="btn btn-secondary">← Voltar</a>
            <h2 class="mb-0"><?= htmlspecialchars($categorias[$categoriaSelecionada]) ?></h2>
            <span style="width: 80px;"></span>
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

        <h2 class="text-center mb-4">Categorias</h2>
        <div class="row g-3">
            <?php foreach($categorias as $chave => $nome): ?>
                <div class="col-6">
                    <a href="index.php?tela=categorias&amp;categoria=<?= urlencode($chave) ?>" class="btn w-100 h-100 d-flex flex-column align-items-center justify-content-center text-decoration-none">
                        <span class="fs-1">🗂️</span>
                        <span class="fw-bold fs-5 text-dark"><?= htmlspecialchars($nome) ?></span>
                    </a>
                </div>
            <?php endforeach; ?>
        </div>

    <?php endif; ?>
</div>
