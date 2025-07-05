<?php

function criarPedido($emailCliente, $itens) {
    global $clientes, $produtos, $pedidos;

    // Verificar se o cliente existe
    $cliente = null;
    foreach ($clientes as $c) {
        if ($c['email'] === $emailCliente) {
            $cliente = $c;
            break;
        }
    }

    if ($cliente === null) {
        echo "Erro: Cliente não encontrado.\n";
        return;
    }

    // Verificar se o estoque é suficiente para os produtos
    $totalPedido = 0;
    foreach ($itens as $item) {
        $produto = null;
        foreach ($produtos as $p) {
            if ($p['nome'] === $item['nome']) {
                $produto = $p;
                break;
            }
        }

        if ($produto === null) {
            echo "Erro: Produto {$item['nome']} não encontrado.\n";
            return;
        }

        if ($produto['estoque'] < $item['quantidade']) {
            echo "Erro: Estoque insuficiente para o produto {$item['nome']}.\n";
            return;
        }

        // Calcular o total do pedido
        $totalPedido += $produto['preco'] * $item['quantidade'];
    }

    // Aplicar desconto progressivo
    $desconto = 0;
    if ($totalPedido > 1000) {
        $desconto = 0.20; // 20% de desconto
    } elseif ($totalPedido > 500) {
        $desconto = 0.10; // 10% de desconto
    }

    // Calcular o preço final com desconto
    $totalComDesconto = $totalPedido * (1 - $desconto);

    // Criar o pedido
    $pedidos[] = [
        'cliente' => $cliente,
        'itens' => $itens,
        'total' => $totalPedido,
        'desconto' => $desconto * 100,
        'total_com_desconto' => $totalComDesconto
    ];

    echo "Pedido criado com sucesso para {$cliente['nome']}. Total: R$ " . number_format($totalComDesconto, 2, ',', '.') . "\n";
}


function mostrarPedidos() {
    global $pedidos;
    foreach ($pedidos as $pedido) {
        echo "Cliente: {$pedido['cliente']['nome']}\n";
        echo "Itens: \n";
        foreach ($pedido['itens'] as $item) {
            echo "  - {$item['nome']} (Quantidade: {$item['quantidade']})\n";
        }
    }
}