<?php

require_once 'Pedido/Cliente.php';
require_once 'Pedido/Produto.php';
require_once 'Pedido/Pedido.php';

// Criando o cliente
$cliente = new Cliente("João", "premium");

// Criando os produtos
$produtos = [
    new Produto("Mouse", 100.00, 2),
    new Produto("Teclado", 250.00, 1),
    new Produto("Monitor", 900.00, 1),
    new Produto("Pen Drive", 50.00, 3)
];

// Criando o pedido
$pedido = new Pedido($cliente, $produtos, "pix");

// Gerando o resumo do pedido
$pedido->resumo();

?>
