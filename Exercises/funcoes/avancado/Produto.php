<?php

function cadastrarProduto($nome, $preco, $categoria, $estoque) {
    global $produtos;

    // Validação: Verificar se o nome do produto já existe
    foreach ($produtos as $produto) {
        if ($produto['nome'] === $nome) {
            echo "Erro: O produto $nome já está cadastrado.\n";
            return;
        }
    }

    // Validação: Verificar se o preço e estoque são números válidos
    if (!is_numeric($preco) || !is_numeric($estoque) || $preco <= 0 || $estoque < 0) {
        echo "Erro: O preço e o estoque devem ser números válidos.\n";
        return;
    }

    // Cadastrar o produto
    $produtos[] = ['nome' => $nome, 'preco' => $preco, 'categoria' => $categoria, 'estoque' => $estoque];
    echo "Produto cadastrado com sucesso: $nome\n";
}