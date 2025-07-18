<?php
// Define o título da página para ser usado no head.php
$title = "Cadastro de Produtos";

// Inclui o cabeçalho da página (contém DOCTYPE, head, e a abertura do body)
include_once 'includes/head.php';

// Inclui o menu de navegação
include_once 'includes/navigation.php';
?>

<div class="container">
    <h1>Adicionar Novo Produto</h1>

    <?php
    // Aqui você pode adicionar lógica para exibir mensagens de sucesso/erro
    // após o envio do formulário, se redirecionar para esta página.
    // Por exemplo, se add_product.php redirecionar com um parâmetro GET:
    if (isset($_GET['status'])) {
        if ($_GET['status'] == 'success') {
            echo '<div class="message success">Produto cadastrado com sucesso!</div>';
        } elseif ($_GET['status'] == 'error') {
            echo '<div class="message error">Erro ao cadastrar o produto. Por favor, tente novamente.</div>';
        }
    }
    ?>

    <form action="add_product.php" method="POST">
        <div class="form-group">
            <label for="nome">Nome do Produto:</label>
            <input type="text" id="nome" name="nome" required>
        </div>

        <div class="form-group">
            <label for="descricao">Descrição:</label>
            <textarea id="descricao" name="descricao" rows="5"></textarea>
        </div>

        <div class="form-group">
            <label for="preco">Preço:</label>
            <input type="number" id="preco" name="preco" step="0.01" min="0" required>
        </div>

        <div class="form-group">
            <label for="quantidade_estoque">Quantidade em Estoque:</label>
            <input type="text" id="quantidade_estoque" name="quantidade_estoque" required>
            </div>

        <button type="submit" class="btn btn-success">Cadastrar Produto</button>
    </form>
</div> <?php
// Inclui o rodapé da página (contém o fechamento do body e html)
include_once 'includes/bottom.php';
?>