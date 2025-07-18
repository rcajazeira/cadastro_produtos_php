CREATE DATABASE produto_estoque;
use produto_estoque;
USE produto_estoque;

CREATE TABLE produto (
    id_produto INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    descricao TEXT,
    preco DECIMAL(10, 2) NOT NULL,
    quantidade_estoque VARCHAR(255) NOT NULL
);

select * from produto;