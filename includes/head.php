<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title ?? 'Pruduto em estoque'; ?></title>

    <style>
        /* Reset Básico para melhor consistência */
        *, *::before, *::after {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        /* Estilos Globais */
        body {
            font-family: 'Segoe UI', 'Roboto', 'Oxygen', 'Ubuntu', 'Cantarell', 'Fira Sans', 'Droid Sans', 'Helvetica Neue', sans-serif;
            line-height: 1.6;
            color: #333;
            background-color: #f4f7f6; /* Um cinza claro suave */
            display: flex;
            flex-direction: column; /* Para layouts de coluna, como cabeçalho, conteúdo, rodapé */
            min-height: 100vh; /* Garante que o body ocupe toda a altura da tela */
        }

        /* Container Principal para centralizar o conteúdo */
        .container {
            max-width: 960px;
            margin: 20px auto; /* Centraliza e adiciona margem superior/inferior */
            padding: 20px;
            background-color: #fff; /* Fundo branco para o conteúdo */
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1); /* Sombra suave */
            flex-grow: 1; /* Permite que o container principal ocupe o espaço disponível */
        }

        /* Títulos */
        h1, h2, h3, h4, h5, h6 {
            color: #2c3e50; /* Cor mais escura para títulos */
            margin-bottom: 15px;
            font-weight: 600;
        }

        h1 { font-size: 2.2em; }
        h2 { font-size: 1.8em; }
        h3 { font-size: 1.5em; }

        /* Navegação (Exemplo para o seu navigation.php) */
        .navbar {
            background-color: #2c3e50; /* Azul escuro */
            color: #fff;
            padding: 15px 0;
            text-align: center;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
        }

        .navbar ul {
            list-style: none;
            display: flex;
            justify-content: center;
            gap: 25px; /* Espaçamento entre os itens do menu */
        }

        .navbar ul li a {
            color: #fff;
            text-decoration: none;
            font-weight: bold;
            padding: 5px 10px;
            transition: background-color 0.3s ease;
        }

        .navbar ul li a:hover {
            background-color: #34495e; /* Um pouco mais claro no hover */
            border-radius: 4px;
        }

        /* Formulários */
        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
            font-weight: 500;
            color: #555;
        }

        .form-group input[type="text"],
        .form-group input[type="number"],
        .form-group textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 1em;
            outline: none;
            transition: border-color 0.3s ease;
        }

        .form-group input[type="text"]:focus,
        .form-group input[type="number"]:focus,
        .form-group textarea:focus {
            border-color: #3498db; /* Azul no foco */
        }

        /* Botões */
        .btn {
            display: inline-block;
            background-color: #3498db; /* Azul padrão */
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 1em;
            transition: background-color 0.3s ease;
            text-decoration: none; /* Para usar em links com estilo de botão */
        }

        .btn:hover {
            background-color: #2980b9; /* Azul mais escuro no hover */
        }

        .btn-success {
            background-color: #27ae60; /* Verde para sucesso */
        }

        .btn-success:hover {
            background-color: #229a56;
        }

        .btn-danger {
            background-color: #e74c3c; /* Vermelho para perigo/excluir */
        }

        .btn-danger:hover {
            background-color: #c0392b;
        }

        /* Mensagens de Sucesso/Erro */
        .message {
            padding: 15px;
            margin-bottom: 20px;
            border-radius: 5px;
            font-weight: bold;
        }

        .message.success {
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }

        .message.error {
            background-color: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }

        /* Tabela de Listagem de Produtos (Exemplo para o seu product.php) */
        .product-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        .product-table th,
        .product-table td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
        }

        .product-table th {
            background-color: #f2f2f2;
            font-weight: bold;
            color: #444;
        }

        .product-table tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        /* Rodapé (Exemplo para o seu bottom.php ou um includes/footer.php) */
        .footer {
            text-align: center;
            padding: 20px;
            margin-top: 30px;
            background-color: #eee;
            color: #777;
            font-size: 0.9em;
            border-top: 1px solid #ddd;
        }

        /* Estilos Responsivos Básicos */
        @media (max-width: 768px) {
            .container {
                margin: 10px auto;
                padding: 15px;
            }

            .navbar ul {
                flex-direction: column;
                gap: 10px;
            }
        }
    </style>
</head>
<body>
   

