<div class="row g-3">
    <?php foreach($listaCartoes as $cartao): ?>
        <div class="col-6 col-md-4 col-lg-3">
            <form method="post" class="h-100">
                <input type="hidden" name="cartao_id" value="<?= (int)$cartao["id"] ?>">
                <button type="submit" class="btn btn-outline-primary w-100 h-100 py-4 d-flex flex-column align-items-center justify-content-center shadow-sm">
                    <span class="fs-1 mb-2"><?= htmlspecialchars($cartao["icone"]) ?></span>
                    <span class="fw-bold text-dark"><?= htmlspecialchars($cartao["titulo"]) ?></span>
                </button>
            </form>
        </div>
    <?php endforeach; ?>
</div>