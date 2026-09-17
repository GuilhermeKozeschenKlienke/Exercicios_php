<?php

$qtdAlunos = (int) readline("Quantidade de alunos: ");

$somaNotas = 0;
$aprovados = 0;
$reprovados = 0;
$maiorNota = null;
$menorNota = null;

for ($i = 1; $i <= $qtdAlunos; $i++) {
    $nome = trim(readline("Nome: "));
    $nota = (float) str_replace(',', '.', readline("Nota: "));


    $somaNotas = $somaNotas + $nota;

    if ($nota >= 7) {
        $aprovados = $aprovados + 1;
    } else {
        $reprovados = $reprovados + 1;
    }

    if ($maiorNota === null || $nota > $maiorNota) {
        $maiorNota = $nota;
    }

    if ($menorNota === null || $nota < $menorNota) {
        $menorNota = $nota;
    }
}

$mediaTurma = $somaNotas / $qtdAlunos;

echo PHP_EOL . "Média da turma: " . number_format($mediaTurma, 2, ',', '.') . PHP_EOL;
echo "Maior nota: " . number_format($maiorNota, 2, ',', '.') . PHP_EOL;
echo "Menor nota: " . number_format($menorNota, 2, ',', '.') . PHP_EOL;
echo "Aprovados: " . $aprovados . PHP_EOL;
echo "Reprovados: " . $reprovados . PHP_EOL;