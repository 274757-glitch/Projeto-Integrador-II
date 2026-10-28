<?php 
require_once __DIR__ . '/../dados.php';
global $tela;
?>

</main>

    <!-- Barra de Navegação Inferior (Bottom Bar igual ao Figma) -->
    <nav class="expressa-bottom-nav fixed-bottom bg-white border-top">
        <div class="container d-flex justify-content-around py-2">
            <a href="index.php?tela=inicio" class="bottom-nav-item <?= ($tela === 'inicio') ? 'active' : '' ?>">
                <span class="nav-icon">🏠</span>
                <span class="nav-label">Início</span>
            </a>
            <a href="index.php?tela=categorias" class="bottom-nav-item <?= ($tela === 'categorias') ? 'active' : '' ?>">
                <span class="nav-icon">🗂️</span>
                <span class="nav-label">Categorias</span>
            </a>
            <a href="index.php?tela=historico" class="bottom-nav-item <?= ($tela === 'historico') ? 'active' : '' ?>">
                <span class="nav-icon">🕒</span>
                <span class="nav-label">Histórico</span>
            </a>
        </div>
    </nav>

    <!-- Bootstrap JS Bundle CDN -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>