ercicio03 soma 1 ate n · PHP
<?php
 

$numero = (int) readline("Informe um número: ");
 
if ($numero <= 0) {
    echo "Número inválido. Informe um valor maior que zero." . PHP_EOL;
} else {

    $soma = 0;
 
    for ($i = 1; $i <= $numero; $i++) {
        $soma = $soma + $i;
    }
 
    echo "A soma de 1 até " . $numero . " é " . $soma . "." . PHP_EOL;
}