<?php

class Pedido {
    private Cliente $cliente;
    private array $produtos;
    private string $tipoPagamento;

    // Construtor
    public function __construct($cliente, $produtos, $tipoPagamento) {
        $this->cliente = $cliente;
        $this->produtos = $produtos;
        $this->tipoPagamento = $tipoPagamento;
    }

    // Método para calcular o total do pedido
    public function calcularTotal() {
        $totalBruto = 0;
        foreach ($this->produtos as $produto) {
            $totalBruto += $produto->getSubtotal();
        }

        // Desconto base do cliente
        $descontoCliente = $this->cliente->getDescontoBase();
        $totalDesconto = ($totalBruto * $descontoCliente) / 100;

        // Desconto adicional se tiver mais de 5 itens
        $totalItens = 0;
        foreach ($this->produtos as $produto) {
            $totalItens += $produto->getQuantidade();
        }
        
        // Desconto por itens (se mais de 5)
        $descontoItens = ($totalItens > 5) ? ($totalBruto * 5) / 100 : 0;

        // Total de desconto
        $descontoTotal = $totalDesconto + $descontoItens;

        // Limitar desconto total a 25%
        if ($descontoTotal > ($totalBruto * 0.25)) {
            $descontoTotal = $totalBruto * 0.25;
        }

        // Valor após descontos
        $totalComDesconto = $totalBruto - $descontoTotal;

        // Ajuste por tipo de pagamento
        $ajustePagamento = $this->getAjustePagamento();
        $valorFinal = $totalComDesconto + ($totalComDesconto * $ajustePagamento / 100);

        return $valorFinal;
    }

    // Método para obter o ajuste por tipo de pagamento
    private function getAjustePagamento() {
        switch ($this->tipoPagamento) {
            case 'pix':
                return -3;
            case 'credito':
                return 2;
            case 'boleto':
                return 0;
            default:
                return 5;
        }
    }

    // Método para gerar resumo do pedido
    public function resumo() {
        $totalBruto = 0;
        foreach ($this->produtos as $produto) {
            $totalBruto += $produto->getSubtotal();
        }

        $descontoCliente = $this->cliente->getDescontoBase();
        $descontoItens = ($this->getTotalItens() > 5) ? ($totalBruto * 5) / 100 : 0;
        $totalDesconto = ($totalBruto * $descontoCliente) / 100 + $descontoItens;

        if ($totalDesconto > ($totalBruto * 0.25)) {
            $totalDesconto = $totalBruto * 0.25;
        }

        $valorFinal = $this->calcularTotal();
        
        echo "Cliente: {$this->cliente->getNome()} ({$this->cliente->getTipo()})\n";
        echo "Total bruto: R$ " . number_format($totalBruto, 2, ',', '.') . "\n";
        echo "Total de itens: {$this->getTotalItens()}\n";
        echo "Desconto aplicado: {$descontoCliente}%\n";
        echo "Desconto adicional por itens: " . ($descontoItens > 0 ? "5%" : "0%") . "\n";
        echo "Ajuste por pagamento ({$this->tipoPagamento}): " . $this->getAjustePagamento() . "%\n";
        echo "Total final: R$ " . number_format($valorFinal, 2, ',', '.') . "\n";
    }

    // Método para contar o total de itens
    private function getTotalItens() {
        $totalItens = 0;
        foreach ($this->produtos as $produto) {
            $totalItens += $produto->getQuantidade();
        }
        return $totalItens;
    }
}