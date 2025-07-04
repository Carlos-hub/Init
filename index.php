<?php

// Funções de Array
$array = [1, 2, 3, 4, 5];
echo "Array original: ";
print_r($array);
echo "\n";

// array_push - Adiciona elementos ao final do array
array_push($array, 6, 7);
echo "Após array_push: ";
print_r($array);
echo "\n";

// array_pop - Remove e retorna o último elemento
$ultimo = array_pop($array);
echo "Elemento removido com array_pop: $ultimo\n";
echo "Array após pop: ";
print_r($array);
echo "\n";

// array_map - Aplica uma função a cada elemento
$dobrado = array_map(function($n) { return $n * 2; }, $array);
echo "Array após map (dobrar valores): ";
print_r($dobrado);
echo "\n";

// array_filter - Filtra elementos baseado em uma condição
$pares = array_filter($array, function($n) { return $n % 2 == 0; });
echo "Números pares (array_filter): ";
print_r($pares);
echo "\n";

// Casting de tipos
$numero = "123.45";
echo "String original: " . $numero . " - Tipo: " . gettype($numero) . "\n";

$inteiro = (int)$numero;
echo "Convertido para inteiro: " . $inteiro . " - Tipo: " . gettype($inteiro) . "\n";

$float = (float)$numero;
echo "Convertido para float: " . $float . " - Tipo: " . gettype($float) . "\n";

$booleano = (bool)$numero;
echo "Convertido para booleano: " . ($booleano ? "true" : "false") . " - Tipo: " . gettype($booleano) . "\n";

// Funções de array adicionais
$frutas = ["maçã", "banana", "laranja"];

// array_merge - Combina arrays
$mais_frutas = ["uva", "pera"];
$todas_frutas = array_merge($frutas, $mais_frutas);
echo "Arrays combinados: ";
print_r($todas_frutas);
echo "\n";

// array_slice - Extrai uma parte do array
$parte = array_slice($todas_frutas, 1, 2);
echo "Slice do array (posição 1, 2 elementos): ";
print_r($parte);
echo "\n";

// array_search - Busca um valor e retorna sua chave
$posicao = array_search("banana", $todas_frutas);
echo "Posição da banana: $posicao\n";

// in_array - Verifica se um valor existe no array
$existe = in_array("uva", $todas_frutas);
echo "Existe uva? " . ($existe ? "Sim" : "Não") . "\n";





ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

echo "teste";
var_dump("teste");
print_r("teste");
file_put_contents("teste.txt", "teste");
// teste
// string(5) "teste"
// int(123)
// float(123.45)
// bool(true)
// array(3) { [0]=> string(5) "maçã" [1]=> string(6) "banana" [2]=> string(7) "laranja" }
// array(5) { [0]=> string(3) "uva" [1]=> string(4) "pera" [2]=> string(5) "maçã" [3]=> string(6) "banana" [4]=> string(7) "laranja" }







$numeros = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10];

for($i = 0; $i < count($numeros); $i++) {
    echo $numeros[$i] . "\n";
}





// array_push - Adiciona elementos ao final do array
$numeros_novos = [11, 12];
array_push($numeros, ...$numeros_novos);
// array_pop - Remove e retorna o último elemento
$ultimo = array_pop($numeros); 
// array_shift - Remove e retorna o primeiro elemento
$primeiro = array_shift($numeros);
// array_unshift - Adiciona elementos no início do array
array_unshift($numeros, 0);
// array_merge - Combina arrays
$outros_numeros = [13, 14, 15];
$numeros_combinados = array_merge($numeros, $outros_numeros);
// array_filter - Filtra elementos com base em uma condição
$pares = array_filter($numeros, fn($n) => $n % 2 == 0);
// array_map - Aplica uma função a cada elemento
$dobrados = array_map(fn($n) => $n * 2, $numeros);
// array_reduce - Reduz o array a um único valor
$soma = array_reduce($numeros, fn($acc, $n) => $acc + $n, 0);
// array_key_exists - Verifica se uma chave existe no array
$existe = array_key_exists(0, $numeros);
// array_keys - Retorna as chaves do array
$chaves = array_keys($numeros);
// array_values - Retorna os valores do array
$valores = array_values($numeros);
// array_unique - Remove valores duplicados do array


$numeros_unicos = array_unique($numeros);
// array_reverse - Inverte a ordem dos elementos do array
$numeros_invertidos = array_reverse($numeros);
// array_sum - Calcula a soma dos elementos do array
$soma = array_sum($numeros);
// array_product - Calcula o produto dos elementos do array
$produto = array_product($numeros);
// array_chunk - Divide o array em partes
$partes = array_chunk($numeros, 2);

// array_count_values - Conta quantas vezes cada valor aparece no array
$contagem = array_count_values($numeros);
// array_diff - Calcula a diferença entre arrays
$diferenca = array_diff($numeros, $numeros_novos);
// array_intersect - Calcula a interseção entre arrays
$interseccao = array_intersect($numeros, $numeros_novos);
// array_merge_recursive - Combina arrays recursivamente
$arrays_combinados = array_merge_recursive($numeros, $numeros_novos);
// array_pad - Preenche o array com valores
$numeros_padded = array_pad($numeros, 10, 0);







