<div class="my-2">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2 class="mb-0">Histórico de comunicação</h2>
        <?php if(!empty($_SESSION["historico"])): ?>
            <form method="post" class="m-0">
                <button type="submit" name="limpar_historico" value="1" class="btn btn-outline-danger btn-sm rounded-pill px-3">Limpar</button>
            </form>
        <?php endif; ?>
    </div>

    <!-- Cartão de Perfil Demonstrativo (Igual ao Figma) -->
    <div class="perfil-card d-flex align-items-center p-3 mb-4">
        <div class="avatar-ls me-3">LS</div>
        <div>
            <h5 class="mb-0 fw-bold">Lucas Silva</h5>
            <small class="text-muted d-block">8 anos • Acompanhamento de rotina</small>
            <small class="text-primary fw-semibold">Perfil demonstrativo • escolhas registradas</small>
        </div>
    </div>

    <?php if(empty($_SESSION["historico"])): ?>
        <div class="alert alert-info text-center py-4 rounded-4 border-0">
            Nenhum registro de comunicação no histórico ainda.
        </div>
    <?php else: ?>
        <div class="d-flex justify-content-between align-items-center mb-3">
            <span class="fw-bold">Registros recentes</span>
            <small class="text-muted"><?= count($_SESSION["historico"]) ?> escolhas</small>
        </div>

        <!-- Linha do Tempo (Timeline estilo Figma) -->
        <div class="timeline-expressa">
            <?php foreach(array_reverse($_SESSION["historico"]) as $hist): ?>
                <div class="timeline-item">
                    <div class="timeline-dot"></div>
                    <div class="timeline-card p-3">
                        <div class="d-flex justify-content-between align-items-center mb-1">
                            <span class="fw-bold small text-dark"><?= htmlspecialchars($hist["data"]) ?></span>
                            <span class="badge-categoria">Comunicação</span>
                        </div>
                        <h5 class="mb-1 fw-bold text-dark"><?= htmlspecialchars($hist["titulo"]) ?></h5>
                        <p class="mb-1 text-muted small"><?= htmlspecialchars($hist["mensagem"]) ?></p>
                        <small class="text-success fw-semibold">✓ Registrado no histórico</small>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
</div>