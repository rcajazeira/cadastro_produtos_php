<?php
// Obtém o nome do arquivo da página atual (ex: "index.php", "product.php")
$currentPage = basename($_SERVER['PHP_SELF']);
?>

<nav class="navbar">
    <ul>
        <li class="<?php echo ($currentPage == 'product.php') ? 'active' : ''; ?>">
            <a href="product.php">Ver Produtos em Estoque</a>
        </li>

        <li class="<?php echo ($currentPage == 'index.php' || $currentPage == 'add_product.php') ? 'active' : ''; ?>">
            <a href="index.php">Adicionar Produto</a>
        </li>
    </ul>
</nav>