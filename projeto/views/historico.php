<div class="container my-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Histórico de Ações</h2>
        <?php if(!empty($_SESSION["historico"])): ?>
            <form method="post" class="m-0">
                <button type="submit" name="limpar_historico" value="1" class="btn btn-outline-danger btn-sm">Limpar Histórico</button>
            </form>
        <?php endif; ?>
    </div>

    <?php if(empty($_SESSION["historico"])): ?>
        <div class="alert alert-info">Nenhum registro no histórico ainda.</div>
    <?php else: ?>
        <div class="list-group shadow-sm">
            <?php foreach(array_reverse($_SESSION["historico"]) as $hist): ?>
                <div class="list-group-item list-group-item-action d-flex justify-content-between align-items-center py-3">
                    <div>
                        <h5 class="mb-1 fw-bold text-primary"><?= htmlspecialchars($hist["titulo"]) ?></h5>
                        <p class="mb-1 text-dark"><?= htmlspecialchars($hist["mensagem"]) ?></p>
                    </div>
                    <span class="badge bg-secondary rounded-pill"><?= htmlspecialchars($hist["data"]) ?></span>
                </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
</div>