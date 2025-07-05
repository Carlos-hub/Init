<?php

require "avancado/Produto.php";
require "avancado/Cliente.php";
require "avancado/Pedido.php";

$produtos = [];
$clientes = [];
$pedidos = [];

// Cadastrar alguns produtos
cadastrarProduto("Camisa Polo", "Camisa exclusiva e nova para homens, super confortável", 79.90, 10);
cadastrarProduto("Smartphone X200", "Oferta imperdível! Smartphone novo e exclusivo com câmera de alta qualidade", 1499.99, 15);
cadastrarProduto("Tênis Running", "Tênis para corrida, excelente desempenho", 299.99);

cadastrarCliente("João da Silva", "joao@gmail.com", "(11) 99999-9999");
cadastrarCliente("Maria Oliveira", "maria@gmail.com", "(11) 99999-9999");
cadastrarCliente("Pedro Santos", "pedro@gmail.com", "(11) 99999-9999");


criarPedido("joao@gmail.com", [
    ['nome' => 'Camisa Polo', 'quantidade' => 2],
    ['nome' => 'Smartphone X200', 'quantidade' => 1]
]);

criarPedido("maria@gmail.com", [
    ['nome' => 'Tênis Running', 'quantidade' => 1]
]);

criarPedido("pedro@gmail.com", [
    ['nome' => 'Camisa Polo', 'quantidade' => 1]
]);


mostrarPedidos();

?>
