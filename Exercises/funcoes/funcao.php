<?php
// 1. Função para cadastrar um produto
function cadastrarProduto($nome, $descricao, $preco, $desconto = 0) {
    // Definir a estrutura do produto
    $produto = [
        'nome' => $nome,
        'descricao' => $descricao,
        'preco' => $preco,
        'desconto' => $desconto
    ];

    // Armazenar o produto em um array global
    global $produtos;
    $produtos[] = $produto;
}

// 2. Função para calcular o preço final com desconto
function calcularPrecoFinal($preco, $desconto) {
    return $preco * (1 - $desconto / 100);
}

// 3. Função para verificar a descrição e retornar palavras-chave importantes
function verificarDescricao($descricao) {
    $palavrasChave = ['Novo', 'Exclusivo', 'Oferta', 'Promoção'];
    $encontradas = [];

    // Procurar palavras-chave na descrição
    foreach ($palavrasChave as $palavra) {
        if (stripos($descricao, $palavra) !== false) {
            $encontradas[] = $palavra;
        }
    }

    return $encontradas;
}

// 4. Função para mostrar todos os produtos cadastrados
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

// Array global para armazenar os produtos
$produtos = [];

// Cadastrar alguns produtos
cadastrarProduto("Camisa Polo", "Camisa exclusiva e nova para homens, super confortável", 79.90, 10);
cadastrarProduto("Smartphone X200", "Oferta imperdível! Smartphone novo e exclusivo com câmera de alta qualidade", 1499.99, 15);
cadastrarProduto("Tênis Running", "Tênis para corrida, excelente desempenho", 299.99);

// Mostrar todos os produtos cadastrados
mostrarProdutos();
?>
