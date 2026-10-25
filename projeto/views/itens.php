<div class="row g-3">
    <?php foreach($listaItens as $item): ?>
        <div class="col-6">
            <form method="post" class="h-100">
                <input type="hidden" name="<?= htmlspecialchars($item["campo"]) ?>" value="<?= (int)$item["valor"] ?>">
                <button type="submit" class="btn w-100 h-100 d-flex flex-column align-items-center justify-content-center">
                    <span class="fs-1"><?= htmlspecialchars($item["icone"]) ?></span>
                    <span class="fw-bold text-dark"><?= htmlspecialchars($item["titulo"]) ?></span>
                </button>
            </form>
        </div>
    <?php endforeach; ?>
</div>
