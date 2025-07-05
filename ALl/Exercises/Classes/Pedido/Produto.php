<?php

class Produto {
    private $nome;
    private $preco;
    private $quantidade;

    // Construtor
    public function __construct($nome, $preco, $quantidade) {
        $this->nome = $nome;
        $this->preco = $preco;
        $this->quantidade = $quantidade;
    }

    // Método para calcular o subtotal do produto
    public function getSubtotal() {
        return $this->preco * $this->quantidade;
    }

    // Getters
    public function getNome() {
        return $this->nome;
    }
    
    public function getPreco() {
        return $this->preco;
    }
    
    public function getQuantidade() {
        return $this->quantidade;
    }
}
