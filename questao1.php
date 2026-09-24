<?php
// Dado que entra no sistema
$numero = readline("Digite um número para ver a tabuada (número inteiro): ");

$numero = (int) $numero;

echo "\n--- Tabuada do " . $numero . "---\n";
// Valor maximo de repetição 10, esse é o limitador: ($i <= 10)
// A variavel $i se repete 10 vezes onde o $i++ faz toda a parte de adição por cada repetição
for ($i = 1; $i <= 10; $i++) {
    // Calculo realizado em cada repetição: $resultado = $numero vezes $i (quantidade atual do loop)
    $resultado = $numero * $i;
    echo $numero . " x " . $i . " = " . $resultado . "\n";
}
// Em geral o for é utilizado, pois você consegue limitar a quantidade de repetição
?>