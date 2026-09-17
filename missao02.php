<?php

// Cabeçalho da aplicação
echo "=====================================================" . PHP_EOL;
echo "         SISTEMA DE SITUAÇÃO ACADÊMICA              " . PHP_EOL;
echo "=====================================================" . PHP_EOL . PHP_EOL;

// Entrada de dados
$aluno = trim(readline("Nome do aluno: "));
$nota1 = (float) str_replace(',', '.', readline("Primeira nota (0 a 10): "));
$nota2 = (float) str_replace(',', '.', readline("Segunda nota (0 a 10): "));
$frequencia = (float) str_replace(',', '.', readline("Frequência (0 a 100): "));

// Validação dos dados antes de qualquer cálculo
$notasValidas = ($nota1 >= 0 && $nota1 <= 10) && ($nota2 >= 0 && $nota2 <= 10);
$frequenciaValida = ($frequencia >= 0 && $frequencia <= 100);

if (!$notasValidas || !$frequenciaValida) {
    echo PHP_EOL . "Dados inválidos. Notas devem estar entre 0 e 10, e frequência entre 0 e 100." . PHP_EOL;
} else {
    // Cálculo da média
    $media = ($nota1 + $nota2) / 2;

    // A frequência é verificada primeiro, pois tem prioridade sobre a média
    if ($frequencia < 75) {
        $situacao = "REPROVADO POR FREQUÊNCIA";
    } elseif ($media >= 7) {
        $situacao = "APROVADO";
    } elseif ($media >= 4) {
        $situacao = "RECUPERAÇÃO";
    } else {
        $situacao = "REPROVADO POR NOTA";
    }

    // Exibição do resultado
    echo PHP_EOL . "=====================================================" . PHP_EOL;
    echo "                     RESULTADO                      " . PHP_EOL;
    echo "=====================================================" . PHP_EOL;
    echo "Aluno.......: " . $aluno . PHP_EOL;
    echo "Nota 1......: " . number_format($nota1, 2, ',', '.') . PHP_EOL;
    echo "Nota 2......: " . number_format($nota2, 2, ',', '.') . PHP_EOL;
    echo "Média.......: " . number_format($media, 2, ',', '.') . PHP_EOL;
    echo "Frequência..: " . number_format($frequencia, 2, ',', '.') . "%" . PHP_EOL;
    echo "Situação....: " . $situacao . PHP_EOL;
    echo "=====================================================" . PHP_EOL;
}