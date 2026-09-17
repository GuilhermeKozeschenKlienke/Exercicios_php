<?php

$quantidade = 0;
$soma = 0;

$numero = (float) str_replace(',', '.', readline("Informe um número: "));

while ($numero != 0) {
    $soma = $soma + $numero;
    $quantidade = $quantidade + 1;

    $numero = (float) str_replace(',', '.', readline("Informe um número: "));
}

if ($quantidade > 0) {
    $media = $soma / $quantidade;

    echo PHP_EOL . "Quantidade de valores: " . $quantidade . PHP_EOL;
    echo "Soma: " . number_format($soma, 2, ',', '.') . PHP_EOL;
    echo "Média: " . number_format($media, 2, ',', '.') . PHP_EOL;
} else {
    echo PHP_EOL . "Nenhum valor foi informado." . PHP_EOL;
}