<?php

// Cabeçalho da aplicação
echo "=====================================================" . PHP_EOL;
echo "         SISTEMA DE PEDIDO DELIVERY                 " . PHP_EOL;
echo "=====================================================" . PHP_EOL . PHP_EOL;

// Dados gerados automaticamente
$codigoPedido = rand(1000, 9999);
$dataPedido = date("d/m/Y H:i:s");

// Entrada de dados
$nomeCliente = trim(readline("Nome do cliente: "));
$produto = trim(readline("Produto: "));
$valorUnitario = (float) str_replace(',', '.', readline("Valor unitário (R$): "));
$quantidade = (int) readline("Quantidade: ");
$formaPagamento = strtolower(trim(readline("Forma de pagamento: ")));
$distancia = (float) str_replace(',', '.', readline("Distância da entrega (km): "));

// Validação dos dados antes de qualquer cálculo
if ($valorUnitario <= 0 || $quantidade <= 0 || $distancia < 0) {
    echo PHP_EOL . "Dados inválidos. Verifique valor unitário, quantidade e distância." . PHP_EOL;
} else {
    // Cálculo do subtotal
    $subtotal = $valorUnitario * $quantidade;

    // Regra de frete conforme a distância
    if ($distancia <= 3) {
        $frete = 5.00;
    } elseif ($distancia <= 8) {
        $frete = 10.00;
    } else {
        $frete = 18.00;
    }

    // Regra de desconto conforme o subtotal
    if ($subtotal >= 200) {
        $percentualDesconto = 10;
    } elseif ($subtotal >= 100) {
        $percentualDesconto = 5;
    } else {
        $percentualDesconto = 0;
    }

    // Desconto adicional para pagamento via PIX (comparação estrita)
    if ($formaPagamento === "pix") {
        $percentualDesconto = $percentualDesconto + 2;
    }

    $valorDesconto = $subtotal * ($percentualDesconto / 100);
    $totalPedido = ($subtotal + $frete) - $valorDesconto;

    // Exibição do comprovante
    echo PHP_EOL . "=====================================================" . PHP_EOL;
    echo "                    COMPROVANTE                     " . PHP_EOL;
    echo "=====================================================" . PHP_EOL;
    echo "Código do pedido....: " . $codigoPedido . PHP_EOL;
    echo "Data................: " . $dataPedido . PHP_EOL;
    echo "Cliente.............: " . $nomeCliente . PHP_EOL;
    echo "Produto.............: " . $produto . PHP_EOL;
    echo "Quantidade..........: " . $quantidade . PHP_EOL;
    echo "Valor unitário......: R$ " . number_format($valorUnitario, 2, ',', '.') . PHP_EOL;
    echo "Subtotal............: R$ " . number_format($subtotal, 2, ',', '.') . PHP_EOL;
    echo "Distância...........: " . number_format($distancia, 2, ',', '.') . " km" . PHP_EOL;
    echo "Frete...............: R$ " . number_format($frete, 2, ',', '.') . PHP_EOL;
    echo "Forma de pagamento..: " . $formaPagamento . PHP_EOL;
    echo "Percentual desconto.: " . $percentualDesconto . "%" . PHP_EOL;
    echo "Valor do desconto...: R$ " . number_format($valorDesconto, 2, ',', '.') . PHP_EOL;
    echo "VALOR TOTAL DO PEDIDO: R$ " . number_format($totalPedido, 2, ',', '.') . PHP_EOL;
    echo "=====================================================" . PHP_EOL;
}