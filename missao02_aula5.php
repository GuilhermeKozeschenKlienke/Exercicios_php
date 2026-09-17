<?php

// Cadastra 5 notas em um array
function cadastrarNotas() {
    $notas = [];

    for ($i = 1; $i <= 5; $i++) {
        $nota = (float) str_replace(',', '.', readline("Nota " . $i . ": "));
        $notas[] = $nota;
    }

    return $notas;
}

// Exibe todas as notas cadastradas
function listarNotas($notas) {
    echo PHP_EOL . "===== NOTAS =====" . PHP_EOL;
    foreach ($notas as $nota) {
        echo number_format($nota, 2, ',', '.') . PHP_EOL;
    }
}

// Calcula a média utilizando foreach para somar as notas
function calcularMedia($notas) {
    $soma = 0;

    foreach ($notas as $nota) {
        $soma = $soma + $nota;
    }

    return $soma / count($notas);
}

// Apresenta a situação geral da turma de acordo com a média
function mostrarSituacao($media) {
    if ($media >= 7) {
        $situacao = "Bom desempenho";
    } else {
        $situacao = "Turma precisa melhorar";
    }

    echo "Situação: " . $situacao . PHP_EOL;
}

// Programa principal
$notas = cadastrarNotas();
listarNotas($notas);

$soma = 0;
foreach ($notas as $nota) {
    $soma = $soma + $nota;
}

$media = calcularMedia($notas);

echo "Soma das notas: " . number_format($soma, 2, ',', '.') . PHP_EOL;
echo "Média da turma: " . number_format($media, 2, ',', '.') . PHP_EOL;
echo "Quantidade de notas: " . count($notas) . PHP_EOL;
mostrarSituacao($media);