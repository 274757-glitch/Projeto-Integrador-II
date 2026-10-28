<?php 
require_once __DIR__ . '/../dados.php';
global $lugares;
?>


<div class="row g-3">
    <?php foreach($lugares as $id => $lugar): ?>
        <div class="col-6">
            <form method="post" class="h-100">
                <input type="hidden" name="lugar_id" value="<?= (int)$id ?>">
                <button type="submit" class="btn w-100 h-100 d-flex flex-column align-items-center justify-content-center">
                    <span class="fs-1"><?= htmlspecialchars($lugar["icone"]) ?></span>
                    <span class="fw-bold text-dark"><?= htmlspecialchars($lugar["nome"]) ?></span>
                </button>
            </form>
        </div>
    <?php endforeach; ?>
</div>