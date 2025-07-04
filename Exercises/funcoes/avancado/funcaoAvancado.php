<?php

require_once 'Cliente.php';
require_once 'Produto.php';
require_once 'Pedido.php';
require_once 'relatorio.php';

$clientes = [];
$produtos = [];
$pedidos = [];


// Teste do sistema
cadastrarCliente("João Silva", "joao@exemplo.com", "123456789");
cadastrarProduto("Camiseta", 49.90, "Vestuário", 100);
cadastrarProduto("Celular X", 1200.00, "Eletrônicos", 50);

criarPedido("joao@exemplo.com", [
    ['nome' => "Camiseta", 'quantidade' => 3],
    ['nome' => "Celular X", 'quantidade' => 1]
]);

gerarRelatorio();
?>
