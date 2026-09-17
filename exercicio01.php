<?php


$numero = (int) readline("Informe um número: ");

if ($numero <= 0) {
    echo "Número inválido. Informe um valor maior que zero." . PHP_EOL;
} else {

    $contador = 1;

    while ($contador <= $numero) {
        echo $contador . PHP_EOL;
        $contador = $contador + 1;
    }
}