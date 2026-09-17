<?php

// Cabeçalho da aplicação
echo "=====================================================" . PHP_EOL;
echo "         SISTEMA DE CLASSIFICAÇÃO ETÁRIA            " . PHP_EOL;
echo "=====================================================" . PHP_EOL . PHP_EOL;

// Entrada de dados
$nome = trim(readline("Nome da pessoa: "));
$idade = (int) readline("Idade: ");

// Verifica as faixas etárias em ordem, da mais restritiva para a mais ampla
if ($idade <= 0) {
    $classificacao = "IDADE INVÁLIDA";
} elseif ($idade < 12) {
    $classificacao = "CRIANÇA";
} elseif ($idade <= 17) {
    $classificacao = "ADOLESCENTE";
} elseif ($idade <= 59) {
    $classificacao = "ADULTO";
} else {
    $classificacao = "IDOSO";
}

// Exibição do resultado
echo PHP_EOL . "=====================================================" . PHP_EOL;
echo "                     RESULTADO                      " . PHP_EOL;
echo "=====================================================" . PHP_EOL;
echo "Nome..........: " . $nome . PHP_EOL;
echo "Idade.........: " . $idade . PHP_EOL;
echo "Classificação.: " . $classificacao . PHP_EOL;
echo "=====================================================" . PHP_EOL;