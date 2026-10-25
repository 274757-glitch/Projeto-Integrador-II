<div class="container my-4">
    <?php if($editar): ?>

        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2>Gerenciar Favoritos</h2>
            <a href="index.php?tela=inicio" class="btn btn-secondary">Concluir</a>
        </div>

        <h3 class="h4 text-primary mb-3">Seus favoritos atuais</h3>
        <?php $listaFavoritos = buscarFavoritos($itens, $_SESSION["favoritos"]); ?>
        
        <?php if(count($listaFavoritos) === 0): ?>
            <div class="alert alert-info">Nenhum favorito cadastrado.</div>
        <?php else: ?>
            <div class="list-group mb-4 shadow-sm">
                <?php foreach($listaFavoritos as $item): ?>
                    <div class="list-group-item d-flex justify-content-between align-items-center py-3">
                        <div class="d-flex align-items-center">
                            <span class="fs-3 me-3"><?= htmlspecialchars($item["icone"]) ?></span>
                            <div>
                                <span class="fw-bold fs-5"><?= htmlspecialchars($item["titulo"]) ?></span>
                                <span class="badge bg-secondary ms-2"><?= htmlspecialchars($categorias[$item["grupo"]]) ?></span>
                            </div>
                        </div>
                        <form method="post" class="m-0">
                            <button type="submit" name="remover_favorito" value="<?= htmlspecialchars($item["chave"]) ?>" class="btn btn-outline-danger btn-sm">Remover</button>
                        </form>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>

        <h3 class="h4 text-primary mb-3">Adicionar aos favoritos</h3>
        
        <?php foreach($categorias as $chaveCategoria => $nomeCategoria): ?>
            <?php $disponiveis = []; ?>
            <?php foreach($itens as $item): ?>
                <?php if($item["grupo"] === $chaveCategoria && !in_array($item["chave"], $_SESSION["favoritos"], true)): ?>
                    <?php $disponiveis[] = $item; ?>
                <?php endif; ?>
            <?php endforeach; ?>
            
            <?php if(count($disponiveis) > 0): ?>
                <h4 class="h5 text-secondary mt-4 mb-3"><?= htmlspecialchars($nomeCategoria) ?></h4>
                <div class="list-group mb-3 shadow-sm">
                    <?php foreach($disponiveis as $item): ?>
                        <div class="list-group-item d-flex justify-content-between align-items-center py-3">
                            <div class="d-flex align-items-center">
                                <span class="fs-3 me-3"><?= htmlspecialchars($item["icone"]) ?></span>
                                <span class="fw-bold fs-5"><?= htmlspecialchars($item["titulo"]) ?></span>
                            </div>
                            <form method="post" class="m-0">
                                <button type="submit" name="add_favorito" value="<?= htmlspecialchars($item["chave"]) ?>" class="btn btn-outline-success btn-sm">Adicionar</button>
                            </form>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        <?php endforeach; ?>

    <?php else: ?>

        <?php $listaItens = buscarFavoritos($itens, $_SESSION["favoritos"]); ?>
        
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2>Início</h2>
            <a href="index.php?tela=inicio&amp;editar=1" class="btn btn-outline-primary">Editar favoritos</a>
        </div>

        <?php if(count($listaItens) === 0): ?>
            <div class="text-center py-5">
                <p class="text-muted fs-5">Você ainda não tem favoritos na tela inicial.</p>
                <a href="index.php?tela=inicio&amp;editar=1" class="btn btn-primary">Adicionar favoritos agora</a>
            </div>
        <?php else: ?>
            <?php require "views/itens.php"; ?>
        <?php endif; ?>

    <?php endif; ?>
</div>
