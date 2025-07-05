


<?php
// echo "Digite um número: ";
// $teste = fgets(STDIN);

echo "Você digitou: " . $argv[1] . "\n";
echo "Você digitou: " . $argv[2] . "\n";










// Adição
$soma = $num1 + $num2;
echo "Soma: $num1 + $num2 = $soma\n";

// Subtração 
$subtracao = $num1 - $num2;
echo "Subtração: $num1 - $num2 = $subtracao\n";

// Multiplicação
$multiplicacao = $num1 * $num2;
echo "Multiplicação: $num1 * $num2 = $multiplicacao\n";

// Divisão
if($num2 != 0) {
    $divisao = $num1 / $num2;
    echo "Divisão: $num1 / $num2 = $divisao\n";
} else {
    echo "Não é possível dividir por zero!\n";
}


$num1 = 10;
$num2 = 2;

$modulo = $num1 % $num2;
echo "Módulo: $num1 % $num2 = $modulo\n";

$exponenciacao = $num1 ** $num2;
echo "Exponenciação: $num1 ** $num2 = $exponenciacao\n";

$incremento = $num1++;
echo "Incremento: $num1 = $incremento\n";

$decremento = $num2--;