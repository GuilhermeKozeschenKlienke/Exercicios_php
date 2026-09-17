<?php

// Movimentações bancárias realizadas pelo cliente
$movimentacoes = [
    ["tipo" => "deposito", "valor" => 1000],
    ["tipo" => "saque", "valor" => 250],
    ["tipo" => "deposito", "valor" => 500],
    ["tipo" => "saque", "valor" => 100]
];

// Percorre as movimentações e exibe o extrato completo
function listarExtrato($movimentacoes) {
    echo "===== EXTRATO =====" . PHP_EOL;
    foreach ($movimentacoes as $mov) {
        echo ucfirst($mov["tipo"]) . ": R$ " . number_format($mov["valor"], 2, ',', '.') . PHP_EOL;
    }
}

// Soma todos os valores do tipo "deposito"
function calcularDepositos($movimentacoes) {
    $total = 0;

    foreach ($movimentacoes as $mov) {
        if ($mov["tipo"] === "deposito") {
            $total = $total + $mov["valor"];
        }
    }

    return $total;
}

// Soma todos os valores do tipo "saque"
function calcularSaques($movimentacoes) {
    $total = 0;

    foreach ($movimentacoes as $mov) {
        if ($mov["tipo"] === "saque") {
            $total = $total + $mov["valor"];
        }
    }

    return $total;
}

// Calcula o saldo final (depósitos menos saques)
function calcularSaldo($movimentacoes) {
    return calcularDepositos($movimentacoes) - calcularSaques($movimentacoes);
}

// Programa principal
listarExtrato($movimentacoes);

$totalDepositos = calcularDepositos($movimentacoes);
$totalSaques = calcularSaques($movimentacoes);
$saldo = calcularSaldo($movimentacoes);

echo PHP_EOL . "Total depositado: R$ " . number_format($totalDepositos, 2, ',', '.') . PHP_EOL;
echo "Total sacado: R$ " . number_format($totalSaques, 2, ',', '.') . PHP_EOL;
echo "Saldo final: R$ " . number_format($saldo, 2, ',', '.') . PHP_EOL;