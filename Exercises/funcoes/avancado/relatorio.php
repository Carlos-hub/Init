<?php

function gerarRelatorio() {
    global $pedidos;

    if (empty($pedidos)) {
        echo "Não há pedidos registrados.\n";
        return;
    }

    foreach ($pedidos as $pedido) {
        echo "Pedido para {$pedido['cliente']['nome']} (Email: {$pedido['cliente']['email']})\n";
        echo "Produtos:\n";
        foreach ($pedido['itens'] as $item) {
            echo "- {$item['nome']} ({$item['quantidade']}x) - R$ " . number_format($item['preco'], 2, ',', '.') . " cada\n";
        }
        echo "Total: R$ " . number_format($pedido['total'], 2, ',', '.') . "\n";
        echo "Desconto aplicado: {$pedido['desconto']}%\n";
        echo "Total com desconto: R$ " . number_format($pedido['total_com_desconto'], 2, ',', '.') . "\n\n";
    }
}