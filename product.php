<?php
// Define o título da página
$title = "Produtos em Estoque";

// Inclui o arquivo de conexão com o banco de dados
include_once 'includes/connection.php';

// Inclui o cabeçalho da página
include_once 'includes/head.php';

// Inclui o menu de navegação
include_once 'includes/navigation.php';

// Variável para armazenar a mensagem (se houver, de alguma operação)
$message = '';
$message_type = '';

if (isset($_GET['status'])) {
    if ($_GET['status'] == 'deleted_success') {
        $message = 'Produto excluído com sucesso!';
        $message_type = 'success';
    } elseif ($_GET['status'] == 'deleted_error') {
        $message = 'Erro ao excluir o produto. ' . ($_GET['message'] ?? '');
        $message_type = 'error';
    }
}

?>

<div class="container">
    <h1>Produtos Cadastrados</h1>

    <?php if (!empty($message)): ?>
        <div class="message <?php echo $message_type; ?>">
            <?php echo $message; ?>
        </div>
    <?php endif; ?>

    <?php
    try {
        // Prepara a consulta para selecionar todos os produtos
        $stmt = $pdo->query("SELECT id_produto, nome, descricao, preco, quantidade_estoque FROM produto ORDER BY nome ASC");
        // Executa a consulta e busca todos os resultados como um array associativo
        $produtos = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if ($produtos) {
            // Se houver produtos, exibe a tabela
            ?>
            <table class="product-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>Descrição</th>
                        <th>Preço</th>
                        <th>Estoque</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($produtos as $produto): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($produto['id_produto']); ?></td>
                        <td><?php echo htmlspecialchars($produto['nome']); ?></td>
                        <td><?php echo htmlspecialchars($produto['descricao']); ?></td>
                        <td>R$ <?php echo number_format($produto['preco'], 2, ',', '.'); ?></td>
                        <td><?php echo htmlspecialchars($produto['quantidade_estoque']); ?></td>
                        <td>
                            <a href="#" class="btn btn-primary btn-sm">Editar</a>
                            <a href="#" class="btn btn-danger btn-sm" onclick="return confirm('Tem certeza que deseja excluir este produto?');">Excluir</a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <?php
        } else {
            // Se não houver produtos cadastrados
            echo '<p>Nenhum produto cadastrado ainda. <a href="index.php">Adicione um agora!</a></p>';
        }

    } catch (PDOException $e) {
        // Em caso de erro na consulta ao banco de dados
        echo '<div class="message error">Erro ao carregar produtos: ' . htmlspecialchars($e->getMessage()) . '</div>';
    }
    ?>
</div>

<?php
// Inclui o rodapé da página
include_once 'includes/bottom.php';
?>