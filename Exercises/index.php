<?php

$valorCompra = 127;
$valorPago = 200;

if ($valorPago < $valorCompra) {
    echo "Pagamento insuficiente.";
} else {
    // Calcula o troco
    $troco = $valorPago - $valorCompra;
    echo "Troco: R$" . $troco . "\n";

    // Cálculo das notas
    $nota50 = intdiv($troco, 50);
    $troco = $troco % 50;

    $nota20 = intdiv($troco, 20);
    $troco = $troco % 20;

    $nota10 = intdiv($troco, 10);
    $troco = $troco % 10;

    $nota5 = intdiv($troco, 5);
    $troco = $troco % 5;

    $nota2 = intdiv($troco, 2);
    $troco = $troco % 2;

    $nota1 = intdiv($troco, 1);
    $troco = $troco % 1;

    // Mostra o número de notas utilizadas
    echo "Notas de R\$50: $nota50\n";
    echo "Notas de R\$20: $nota20\n";
    echo "Notas de R\$10: $nota10\n";
    echo "Notas de R\$5: $nota5\n";
    echo "Notas de R\$2: $nota2\n";
    echo "Notas de R\$1: $nota1\n";

    // Caso haja troco que não possa ser dado (ex: R$1)
   
}