<?php

// Itens do pedido
$pedido = [
    ["produto" => "Hambúrguer", "preco" => 25, "quantidade" => 2],
    ["produto" => "Refrigerante", "preco" => 8, "quantidade" => 1]
];

// Calcula o subtotal de um item (preço x quantidade)
function calcularSubtotal($item) {
    return $item["preco"] * $item["quantidade"];
}

// Percorre o pedido e exibe cada item com seu subtotal
function listarPedido($pedido) {
    echo "===== PEDIDO =====" . PHP_EOL;
    foreach ($pedido as $item) {
        $subtotal = calcularSubtotal($item);
        echo $item["produto"] . PHP_EOL;
        echo $item["quantidade"] . " x R$ " . number_format($item["preco"], 2, ',', '.') . PHP_EOL;
        echo "Subtotal: R$ " . number_format($subtotal, 2, ',', '.') . PHP_EOL;
    }
}

// Soma o subtotal de todos os itens do pedido
function calcularTotal($pedido) {
    $total = 0;

    foreach ($pedido as $item) {
        $total = $total + calcularSubtotal($item);
    }

    return $total;
}

// Calcula o valor do desconto de acordo com o total do pedido
function calcularDesconto($total) {
    if ($total >= 100) {
        return $total * 0.10;
    } else {
        return 0;
    }
}

// Apresenta o resumo final do pedido
function mostrarResumo($total, $desconto) {
    $totalFinal = $total - $desconto;

    echo PHP_EOL . "Total: R$ " . number_format($total, 2, ',', '.') . PHP_EOL;
    echo "Desconto: R$ " . number_format($desconto, 2, ',', '.') . PHP_EOL;
    echo "Total final: R$ " . number_format($totalFinal, 2, ',', '.') . PHP_EOL;
}

// Programa principal
listarPedido($pedido);

$total = calcularTotal($pedido);
$desconto = calcularDesconto($total);
mostrarResumo($total, $desconto);