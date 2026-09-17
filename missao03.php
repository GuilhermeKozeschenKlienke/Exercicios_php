<?php

// Cabeçalho da aplicação
echo "=====================================================" . PHP_EOL;
echo "         SISTEMA DE ESTACIONAMENTO                  " . PHP_EOL;
echo "=====================================================" . PHP_EOL . PHP_EOL;

// Dados gerados automaticamente
$numeroAtendimento = rand(1000, 9999);
$dataAtendimento = date("d/m/Y H:i:s");

// Entrada de dados
$nomeCliente = trim(readline("Nome do cliente: "));
$placa = trim(readline("Placa do veículo: "));
$tipoVeiculo = strtolower(trim(readline("Tipo do veículo (moto, carro ou suv): ")));
$horas = (float) str_replace(',', '.', readline("Quantidade de horas estacionadas: "));

// Validação do tipo de veículo
$tipoValido = ($tipoVeiculo === "moto" || $tipoVeiculo === "carro" || $tipoVeiculo === "suv");

if (!$tipoValido) {
    echo PHP_EOL . "Tipo de veículo inválido. Utilize: moto, carro ou suv." . PHP_EOL;
} elseif ($horas <= 0) {
    echo PHP_EOL . "Quantidade de horas inválida. Deve ser maior que zero." . PHP_EOL;
} else {
    // Define o valor da hora de acordo com o tipo de veículo
    if ($tipoVeiculo === "moto") {
        $valorHora = 5.00;
    } elseif ($tipoVeiculo === "carro") {
        $valorHora = 8.00;
    } else {
        $valorHora = 12.00;
    }

    // Cálculo do subtotal
    $subtotal = $valorHora * $horas;

    // Desconto de 10% para permanência acima de 8 horas
    if ($horas > 8) {
        $percentualDesconto = 10;
    } else {
        $percentualDesconto = 0;
    }

    $valorDesconto = $subtotal * ($percentualDesconto / 100);
    $totalFinal = $subtotal - $valorDesconto;

    // Exibição do comprovante
    echo PHP_EOL . "=====================================================" . PHP_EOL;
    echo "                    COMPROVANTE                     " . PHP_EOL;
    echo "=====================================================" . PHP_EOL;
    echo "Nº do atendimento: " . $numeroAtendimento . PHP_EOL;
    echo "Data.............: " . $dataAtendimento . PHP_EOL;
    echo "Cliente..........: " . $nomeCliente . PHP_EOL;
    echo "Placa............: " . $placa . PHP_EOL;
    echo "Tipo de veículo..: " . $tipoVeiculo . PHP_EOL;
    echo "Horas............: " . $horas . PHP_EOL;
    echo "Valor por hora...: R$ " . number_format($valorHora, 2, ',', '.') . PHP_EOL;
    echo "Subtotal.........: R$ " . number_format($subtotal, 2, ',', '.') . PHP_EOL;
    echo "Desconto.........: " . $percentualDesconto . "%" . PHP_EOL;
    echo "Valor do desconto: R$ " . number_format($valorDesconto, 2, ',', '.') . PHP_EOL;
    echo "TOTAL FINAL......: R$ " . number_format($totalFinal, 2, ',', '.') . PHP_EOL;
    echo "=====================================================" . PHP_EOL;
}