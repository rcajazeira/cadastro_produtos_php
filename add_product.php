<?php
// Inclui o arquivo de conexão com o banco de dados
// Garanta que o caminho esteja correto em relação a este arquivo
include_once 'includes/connection.php';

// Verifica se a requisição é do tipo POST (ou seja, o formulário foi enviado)
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // 1. Coleta os dados do formulário
    // Use isset() e um operador ternário ou null coalescing para evitar avisos se o campo não existir
    $nome               = $_POST['nome'] ?? '';
    $descricao          = $_POST['descricao'] ?? '';
    $preco              = $_POST['preco'] ?? '';
    $quantidade_estoque = $_POST['quantidade_estoque'] ?? '';

    // 2. Validação básica dos dados
    // - Remover espaços em branco no início e fim
    // - Garantir que campos obrigatórios não estão vazios
    // - Validação numérica para preco e quantidade_estoque
    if (empty($nome) || empty($preco) || empty($quantidade_estoque)) {
        // Redireciona de volta para index.php com uma mensagem de erro
        header("Location: index.php?status=error&message=Campos obrigatórios não preenchidos.");
        exit(); // Termina a execução do script
    }

    // Validação numérica para preço (DECIMAL)
    // str_replace(',', '.', $preco) para lidar com vírgula como separador decimal, comum no Brasil
    $preco = str_replace(',', '.', $preco);
    if (!is_numeric($preco) || $preco < 0) {
        header("Location: index.php?status=error&message=Preço inválido.");
        exit();
    }

    // Validação numérica para quantidade_estoque
    // ATENÇÃO: Se no seu banco a coluna quantidade_estoque for INT, use is_numeric() e intval()
    // Se você MANTIVER como VARCHAR(255) no banco, você pode não precisar do intval(),
    // mas ainda é bom validar se é um número para consistência.
    if (!is_numeric($quantidade_estoque) || $quantidade_estoque < 0) {
        header("Location: index.php?status=error&message=Quantidade em estoque inválida.");
        exit();
    }
    // Opcional: Se quantidade_estoque no banco for INT, converta explicitamente
    // $quantidade_estoque = intval($quantidade_estoque);


    try {
        // 3. Prepara a consulta SQL com placeholders para segurança (consultas preparadas)
        $stmt = $pdo->prepare("INSERT INTO produto (nome, descricao, preco, quantidade_estoque) VALUES (?, ?, ?, ?)");

        // 4. Executa a consulta, passando os valores como um array
        // A ordem dos valores no array deve corresponder à ordem dos placeholders na query
        $stmt->execute([$nome, $descricao, $preco, $quantidade_estoque]);

        // 5. Redireciona com mensagem de sucesso
        header("Location: index.php?status=success");
        exit();

    } catch (PDOException $e) {
        // Em caso de erro no banco de dados, redireciona com mensagem de erro
        // NUNCA exiba $e->getMessage() diretamente para o usuário final em produção!
        // Apenas para depuração: echo "Erro: " . $e->getMessage();
        header("Location: index.php?status=error&message=Erro ao cadastrar: " . urlencode($e->getMessage()));
        exit();
    }
} else {
    // Se a requisição não for POST (acesso direto a add_product.php), redireciona para o index
    header("Location: index.php");
    exit();
}
?>