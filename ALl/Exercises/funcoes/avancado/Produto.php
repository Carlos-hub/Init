<?php


// 1. Função para cadastrar um produto
function cadastrarProduto($nome, $descricao, $preco, $desconto = 0) {
    // Definir a estrutura do produto
    $produto = [
        'estoque' => 10,
        'nome' => $nome,
        'descricao' => $descricao,
        'preco' => $preco,
        'desconto' => $desconto
    ];

    global $produtos;
    $produtos[] = $produto;
}

function calcularPrecoFinal($preco, $desconto) {
    return $preco * (1 - $desconto / 100);
}

function verificarDescricao($descricao) {
    $palavrasChave = ['Novo', 'Exclusivo', 'Oferta', 'Promoção'];
    $encontradas = [];

    foreach ($palavrasChave as $palavra) {
        if (stripos($descricao, $palavra) !== false) {
            $encontradas[] = $palavra;
        }
    }

    return $encontradas;
}

function mostrarProdutos() {
    global $produtos;
    foreach ($produtos as $produto) {
        $precoFinal = calcularPrecoFinal($produto['preco'], $produto['desconto']);
        $palavrasEncontradas = verificarDescricao($produto['descricao']);
        $palavrasTexto = !empty($palavrasEncontradas) ? implode(', ', $palavrasEncontradas) : 'Nenhuma palavra-chave encontrada';

        echo "Produto: {$produto['nome']}\n";
        echo "Descrição: {$produto['descricao']}\n";
        echo "Preço: R$ " . number_format($produto['preco'], 2, ',', '.') . "\n";
        echo "Preço com Desconto: R$ " . number_format($precoFinal, 2, ',', '.') . "\n";
        echo "Palavras-chave encontradas: $palavrasTexto\n\n";
    }
}