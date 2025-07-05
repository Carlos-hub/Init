<?php

// Criação da tabela clientes
$sql_clientes = "CREATE TABLE IF NOT EXISTS clientes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
    cpf VARCHAR(14) UNIQUE NOT NULL,
    telefone VARCHAR(15),
    endereco TEXT,
    data_cadastro TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";

// Criação da tabela usuarios
$sql_usuarios = "CREATE TABLE IF NOT EXISTS usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome_usuario VARCHAR(50) UNIQUE NOT NULL,
    senha VARCHAR(255) NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
    nivel_acesso TEXT CHECK(nivel_acesso IN ('admin', 'usuario')) NOT NULL,
    data_cadastro TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";


// Criação da tabela produtos
$sql_produtos = "CREATE TABLE IF NOT EXISTS produtos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    descricao TEXT,
    preco DECIMAL(10,2) NOT NULL,
    estoque INT NOT NULL,
    data_cadastro TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";

// Criação da tabela pedidos
$sql_pedidos = "CREATE TABLE IF NOT EXISTS pedidos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    cliente_id INT NOT NULL,
    data_pedido TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    status TEXT CHECK(status IN ('pendente', 'aprovado', 'cancelado')) DEFAULT 'pendente',
    valor_total DECIMAL(10,2) NOT NULL,
    FOREIGN KEY (cliente_id) REFERENCES clientes(id)
)";

// Criação da tabela de relacionamento entre pedidos e produtos
$sql_pedidos_produtos = "CREATE TABLE IF NOT EXISTS pedidos_produtos (
    pedido_id INT NOT NULL,
    produto_id INT NOT NULL,
    quantidade INT NOT NULL,
    preco_unitario DECIMAL(10,2) NOT NULL,
    PRIMARY KEY (pedido_id, produto_id),
    FOREIGN KEY (pedido_id) REFERENCES pedidos(id),
    FOREIGN KEY (produto_id) REFERENCES produtos(id)
)";


try {
    // Conectar ao banco SQLite
    $pdo = new PDO('sqlite:sql.db');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Executar as queries de criação das tabelas
    $pdo->exec($sql_clientes);
    $pdo->exec($sql_usuarios); 
    $pdo->exec($sql_produtos);
    $pdo->exec($sql_pedidos);
    $pdo->exec($sql_pedidos_produtos);

    echo "Tabelas criadas com sucesso!\n";

    // Funções CRUD para Clientes
    function criarCliente($pdo, $nome, $email, $cpf, $telefone, $endereco) {
        $sql = "INSERT INTO clientes (nome, email, cpf, telefone, endereco) 
                VALUES (:nome, :email, :cpf, :telefone, :endereco)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            ':nome' => $nome,
            ':email' => $email, 
            ':cpf' => $cpf,
            ':telefone' => $telefone,
            ':endereco' => $endereco
        ]);
        return $pdo->lastInsertId();
    }

    function buscarCliente($pdo, $id) {
        $sql = "SELECT * FROM clientes WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([':id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    function atualizarCliente($pdo, $id, $nome, $email, $cpf, $telefone, $endereco) {
        $sql = "UPDATE clientes 
                SET nome = :nome, email = :email, cpf = :cpf, 
                    telefone = :telefone, endereco = :endereco 
                WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        return $stmt->execute([
            ':id' => $id,
            ':nome' => $nome,
            ':email' => $email,
            ':cpf' => $cpf, 
            ':telefone' => $telefone,
            ':endereco' => $endereco
        ]);
    }

    function deletarCliente($pdo, $id) {
        $sql = "DELETE FROM clientes WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        return $stmt->execute([':id' => $id]);
    }

    // Funções CRUD para Produtos
    function criarProduto($pdo, $nome, $descricao, $preco, $estoque) {
        $sql = "INSERT INTO produtos (nome, descricao, preco, estoque)
                VALUES (:nome, :descricao, :preco, :estoque)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            ':nome' => $nome,
            ':descricao' => $descricao,
            ':preco' => $preco,
            ':estoque' => $estoque
        ]);
        return $pdo->lastInsertId();
    }

    function buscarProduto($pdo, $id) {
        $sql = "SELECT * FROM produtos WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([':id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    function atualizarProduto($pdo, $id, $nome, $descricao, $preco, $estoque) {
        $sql = "UPDATE produtos 
                SET nome = :nome, descricao = :descricao,
                    preco = :preco, estoque = :estoque 
                WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        return $stmt->execute([
            ':id' => $id,
            ':nome' => $nome,
            ':descricao' => $descricao,
            ':preco' => $preco,
            ':estoque' => $estoque
        ]);
    }

    function deletarProduto($pdo, $id) {
        $sql = "DELETE FROM produtos WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        return $stmt->execute([':id' => $id]);
    }

    // Exemplo de uso:
    /*
    // Criar cliente
    $idCliente = criarCliente($pdo, "João Silva", "joao@email.com", "123.456.789-00", "11999999999", "Rua ABC, 123");
    
    // Buscar cliente
    $cliente = buscarCliente($pdo, $idCliente);
    print_r($cliente);
    
    // Atualizar cliente
    atualizarCliente($pdo, $idCliente, "João Silva Jr", "joao@email.com", "123.456.789-00", "11999999999", "Rua XYZ, 456");
    
    // Deletar cliente
    deletarCliente($pdo, $idCliente);
    */

} catch(PDOException $e) {
    echo "Erro: " . $e->getMessage() . "\n";
}


// Funções para gerenciar pedidos

function criarPedido($pdo, $clienteId, $dataPedido, $status) {
    $sql = "INSERT INTO pedidos (cliente_id, data_pedido, status) 
            VALUES (:cliente_id, :data_pedido, :status)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        ':cliente_id' => $clienteId,
        ':data_pedido' => $dataPedido,
        ':status' => $status
    ]);
    return $pdo->lastInsertId();
}

function adicionarItemPedido($pdo, $pedidoId, $produtoId, $quantidade, $precoUnitario) {
    $sql = "INSERT INTO pedidos_produtos (pedido_id, produto_id, quantidade, preco_unitario)
            VALUES (:pedido_id, :produto_id, :quantidade, :preco_unitario)";
    $stmt = $pdo->prepare($sql);
    return $stmt->execute([
        ':pedido_id' => $pedidoId,
        ':produto_id' => $produtoId,
        ':quantidade' => $quantidade,
        ':preco_unitario' => $precoUnitario
    ]);
}

function buscarPedido($pdo, $id) {
    $sql = "SELECT p.*, c.nome as nome_cliente 
            FROM pedidos p
            JOIN clientes c ON p.cliente_id = c.id
            WHERE p.id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([':id' => $id]);
    $pedido = $stmt->fetch(PDO::FETCH_ASSOC);
    
    if ($pedido) {
        // Buscar itens do pedido
        $sql = "SELECT ip.*, pr.nome as nome_produto
                FROM pedidos_produtos ip
                JOIN produtos pr ON ip.produto_id = pr.id
                WHERE ip.pedido_id = :pedido_id";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([':pedido_id' => $id]);
        $pedido['itens'] = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    return $pedido;
}

function atualizarPedido($pdo, $id, $status) {
    $sql = "UPDATE pedidos SET status = :status WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    return $stmt->execute([
        ':id' => $id,
        ':status' => $status
    ]);
}

function deletarPedido($pdo, $id) {
    // Primeiro deletar os itens do pedido
    $sql = "DELETE FROM pedidos_produtos WHERE pedido_id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([':id' => $id]);
    
    // Depois deletar o pedido
    $sql = "DELETE FROM pedidos WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    return $stmt->execute([':id' => $id]);
}

// Exemplo de uso:
/*
// Criar pedido
$dataPedido = date('Y-m-d H:i:s');
$idPedido = criarPedido($pdo, $idCliente, $dataPedido, 'pendente');

// Adicionar itens ao pedido
adicionarItemPedido($pdo, $idPedido, $idProduto1, 2, 99.90);
adicionarItemPedido($pdo, $idPedido, $idProduto2, 1, 149.90);

// Buscar pedido com seus itens
$pedido = buscarPedido($pdo, $idPedido);
print_r($pedido);

// Atualizar status do pedido
atualizarPedido($pdo, $idPedido, 'aprovado');

// Deletar pedido
deletarPedido($pdo, $idPedido);
*/
