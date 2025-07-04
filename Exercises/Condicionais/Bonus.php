<?php

// Dados de entrada
$valorCompra = 1200.00;
$tipoCliente = "premium";
$itensComprados = 12;
$tipoPagamento = "pix";

// 1. Calcular desconto baseado no tipo de cliente
$descontoCliente = 0;

switch ($tipoCliente) {
    case "regular":
        $descontoCliente = 5;
        break;
    case "premium":
        $descontoCliente = 10;
        break;
    case "vip":
        $descontoCliente = 15;
        break;
    default:
        $descontoCliente = 2;
        break;
}

// 2. Calcular desconto extra por quantidade de itens
$descontoItens = 0;

if ($itensComprados > 10) {
    $descontoItens = 5;
}

// 3. Soma dos descontos
$descontoTotal = $descontoCliente + $descontoItens;

// 4. Limitar o desconto total a 20%
if ($descontoTotal > 20) {
    $descontoTotal = 20;
}

// 5. Aplicar desconto ao valor da compra
$valorComDesconto = $valorCompra - ($valorCompra * ($descontoTotal / 100));

// 6. Ajuste por tipo de pagamento (usando operador ternário)
$ajustePagamento = 
    $tipoPagamento === "pix" ? -3 :
    ($tipoPagamento === "boleto" ? 0 :
    ($tipoPagamento === "credito" ? 2 : 5));

// 7. Aplicar ajuste ao valor com desconto
$valorFinal = $valorComDesconto + ($valorComDesconto * ($ajustePagamento / 100));

// 8. Exibição formatada dos resultados
echo "Valor original: R$ " . number_format($valorCompra, 2, ',', '.') . PHP_EOL;
echo "Desconto aplicado: {$descontoTotal}%". PHP_EOL;
echo "Ajuste por pagamento ({$tipoPagamento}): " . 
     ($ajustePagamento >= 0 ? "+{$ajustePagamento}%" : "{$ajustePagamento}%") . PHP_EOL;
echo "Valor final: R$ " . number_format($valorFinal, 2, ',', '.') . PHP_EOL;

?>
