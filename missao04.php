<?php

// Cabeçalho da aplicação
echo "=====================================================" . PHP_EOL;
echo "         SIMULADOR DE EMPRÉSTIMO                    " . PHP_EOL;
echo "=====================================================" . PHP_EOL . PHP_EOL;

// Entrada de dados
$nomeCliente = trim(readline("Nome do cliente: "));
$salario = (float) str_replace(',', '.', readline("Salário mensal (R$): "));
$valorSolicitado = (float) str_replace(',', '.', readline("Valor do empréstimo solicitado (R$): "));
$qtdParcelas = (int) readline("Quantidade de parcelas: ");

// Validação dos dados antes de qualquer cálculo
if ($salario <= 0 || $valorSolicitado <= 0 || $qtdParcelas <= 0) {
    echo PHP_EOL . "Dados inválidos. Salário, valor solicitado e parcelas devem ser maiores que zero." . PHP_EOL;
} else {
    // Dado gerado automaticamente
    $codigoSimulacao = rand(1000, 9999);

    // Cálculo da parcela e do limite de comprometimento
    $valorParcela = $valorSolicitado / $qtdParcelas;
    $limiteParcela = $salario * 0.30;

    // Verifica se a parcela cabe no limite de 30% do salário
    if ($valorParcela <= $limiteParcela) {
        $resultado = "EMPRÉSTIMO PRÉ-APROVADO";
    } else {
        $resultado = "EMPRÉSTIMO NÃO APROVADO";
    }

    // Exibição do resultado
    echo PHP_EOL . "=====================================================" . PHP_EOL;
    echo "                     RESULTADO                      " . PHP_EOL;
    echo "=====================================================" . PHP_EOL;
    echo "Código da simulação.....: " . $codigoSimulacao . PHP_EOL;
    echo "Cliente.................: " . $nomeCliente . PHP_EOL;
    echo "Salário..................: R$ " . number_format($salario, 2, ',', '.') . PHP_EOL;
    echo "Valor solicitado.........: R$ " . number_format($valorSolicitado, 2, ',', '.') . PHP_EOL;
    echo "Quantidade de parcelas...: " . $qtdParcelas . PHP_EOL;
    echo "Valor da parcela.........: R$ " . number_format($valorParcela, 2, ',', '.') . PHP_EOL;
    echo "Limite de comprometimento: R$ " . number_format($limiteParcela, 2, ',', '.') . PHP_EOL;
    echo "Resultado da análise.....: " . $resultado . PHP_EOL;
    echo "=====================================================" . PHP_EOL;
}