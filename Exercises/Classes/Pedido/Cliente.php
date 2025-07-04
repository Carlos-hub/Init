<?php

class Cliente {
    private string $nome;
    private string $tipo;

    /**
     * @param string $nome
     * @param string $tipo
     */
    public function __construct($nome, $tipo) {
        $this->nome = $nome;
        $this->tipo = $tipo;
    }

    // Método para calcular o desconto base
    public function getDescontoBase() {
        switch ($this->tipo) {
            case 'regular':
                return 5;
            case 'premium':
                return 10;
            case 'vip':
                return 15;
            default:
                return 2;
        }
    }

    // Getters
    public function getNome() {
        return $this->nome;
    }
    
    public function getTipo() {
        return $this->tipo;
    }
}
