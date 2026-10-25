<div class="my-2">
    <?php if($editar): ?>

        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="mb-0">Gerenciar Favoritos</h2>
            <a href="index.php?tela=inicio" class="btn btn-secondary">← Voltar</a>
        </div>

        <h3 class="h5 fw-bold text-primary mb-3">Seus favoritos atuais</h3>
        <?php $listaFavoritos = buscarFavoritos($itens, $_SESSION["favoritos"]); ?>
        
        <?php if(count($listaFavoritos) === 0): ?>
            <div class="alert alert-info rounded-4 border-0">Nenhum favorito cadastrado.</div>
        <?php else: ?>
            <div class="list-group mb-4">
                <?php foreach($listaFavoritos as $item): ?>
                    <div class="list-group-item d-flex justify-content-between align-items-center">
                        <div class="d-flex align-items-center">
                            <span class="fs-3 me-3"><?= htmlspecialchars($item["icone"]) ?></span>
                            <div>
                                <span class="fw-bold fs-5 d-block"><?= htmlspecialchars($item["titulo"]) ?></span>
                                <span class="badge bg-secondary rounded-pill"><?= htmlspecialchars($categorias[$item["grupo"]]) ?></span>
                            </div>
                        </div>
                        <form method="post" class="m-0">
                            <button type="submit" name="remover_favorito" value="<?= htmlspecialchars($item["chave"]) ?>" class="btn btn-outline-danger btn-sm rounded-pill px-3">Remover</button>
                        </form>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>

        <h3 class="h5 fw-bold text-primary mb-3">Adicionar aos favoritos</h3>
        
        <?php foreach($categorias as $chaveCategoria => $nomeCategoria): ?>
            <?php $disponiveis = []; ?>
            <?php foreach($itens as $item): ?>
                <?php if($item["grupo"] === $chaveCategoria && !in_array($item["chave"], $_SESSION["favoritos"], true)): ?>
                    <?php $disponiveis[] = $item; ?>
                <?php endif; ?>
            <?php endforeach; ?>
            
            <?php if(count($disponiveis) > 0): ?>
                <h4 class="h6 fw-bold text-muted mt-4 mb-2"><?= htmlspecialchars($nomeCategoria) ?></h4>
                <div class="list-group mb-3">
                    <?php foreach($disponiveis as $item): ?>
                        <div class="list-group-item d-flex justify-content-between align-items-center">
                            <div class="d-flex align-items-center">
                                <span class="fs-3 me-3"><?= htmlspecialchars($item["icone"]) ?></span>
                                <span class="fw-bold fs-5"><?= htmlspecialchars($item["titulo"]) ?></span>
                            </div>
                            <form method="post" class="m-0">
                                <button type="submit" name="add_favorito" value="<?= htmlspecialchars($item["chave"]) ?>" class="btn btn-primary btn-sm rounded-pill px-3">+ Adicionar</button>
                            </form>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        <?php endforeach; ?>

    <?php else: ?>

        <?php $listaItens = buscarFavoritos($itens, $_SESSION["favoritos"]); ?>
        
        <div class="text-center mb-4">
            <h2 class="mb-1">Olá! Como você está hoje?</h2>
            <p class="text-muted small mb-0">Toque em um cartão para se comunicar</p>
        </div>

        <div class="d-flex justify-content-between align-items-center mb-3">
            <span class="fw-bold text-primary">⭐ Meus Favoritos</span>
            <a href="index.php?tela=inicio&amp;editar=1" class="btn btn-outline-primary btn-sm">✏️ Editar favoritos</a>
        </div>

        <?php if(count($listaItens) === 0): ?>
            <div class="text-center py-5">
                <p class="text-muted fs-5">Você ainda não tem favoritos na tela inicial.</p>
                <a href="index.php?tela=inicio&amp;editar=1" class="btn btn-primary w-100">+ Adicionar favorito</a>
            </div>
        <?php else: ?>
            <?php require "views/itens.php"; ?>
            <div class="mt-4">
                <a href="index.php?tela=inicio&amp;editar=1" class="btn btn-primary w-100">+ Adicionar favorito</a>
            </div>
        <?php endif; ?>

    <?php endif; ?>
</div>