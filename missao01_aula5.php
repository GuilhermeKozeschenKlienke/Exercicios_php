<?php

// Cadastra 5 funcionários utilizando for e readline, armazenando no array
function cadastrarFuncionarios() {
    $funcionarios = [];

    for ($i = 1; $i <= 5; $i++) {
        $nome = trim(readline("Nome do funcionário " . $i . ": "));
        $funcionarios[] = $nome;
    }

    return $funcionarios;
}

// Percorre o array com foreach e exibe cada funcionário
function listarFuncionarios($funcionarios) {
    echo PHP_EOL . "===== FUNCIONÁRIOS =====" . PHP_EOL;
    foreach ($funcionarios as $nome) {
        echo "- " . $nome . PHP_EOL;
    }
}

// Retorna a quantidade de funcionários cadastrados
function contarFuncionarios($funcionarios) {
    return count($funcionarios);
}

// Programa principal
$funcionarios = cadastrarFuncionarios();
listarFuncionarios($funcionarios);
echo "Total cadastrado: " . contarFuncionarios($funcionarios) . PHP_EOL;