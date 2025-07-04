<?php

// Exercicio 1
$a = 10;
$b = 20;

$c = $a + $b;

echo $c;


// Exercicio 3
$numero1 = 10;
$numero2 = 20;

$sub = $numero1 - $numero2;

echo $sub;


// Exercicio 4
$numero1 = 10;
$numero2 = 20;

$multi = $numero1 * $numero2;

echo $multi;


// Exercicio 4,5

$notas = [10, 20, 30, 40, 50];
$somaMedia = 0;
foreach ($notas as $nota) {
    $somaMedia += $nota;
}
$media = $somaMedia / count($notas);

echo $media;


// Exercicio 6 Calcular troco:

<?php

// Valores da compra e do pagamento
$valorCompra = 127;
$valorPago = 200;

// Verifica se o pagamento é suficiente
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

    // Mostra o número de notas utilizadas
    echo "Notas de R\$50: $nota50\n";
    echo "Notas de R\$20: $nota20\n";
    echo "Notas de R\$10: $nota10\n";
    echo "Notas de R\$5: $nota5\n";
    echo "Notas de R\$2: $nota2\n";

    // Caso haja troco que não possa ser dado (ex: R$1)
    if ($troco > 0) {
        echo "Valor restante de R\$$troco não pode ser devolvido com as notas disponíveis.\n";
    }
}

