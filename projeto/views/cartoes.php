<?php 
require_once __DIR__ . '/../dados.php';
global $listaCartoes;
?>
<div class="row g-3">
    <?php foreach($listaCartoes as $cartao): ?>
        <div class="col-6">
            <form method="post" class="h-100">
                <input type="hidden" name="cartao_id" value="<?= (int)$cartao["id"] ?>">
                <button type="submit" class="btn w-100 h-100 d-flex flex-column align-items-center justify-content-center">
                    <span class="fs-1"><?= htmlspecialchars($cartao["icone"]) ?></span>
                    <span class="fw-bold text-dark"><?= htmlspecialchars($cartao["titulo"]) ?></span>
                </button>
            </form>
        </div>
    <?php endforeach; ?>
</div>