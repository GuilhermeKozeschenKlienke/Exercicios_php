<?php

// Catálogo de produtos disponíveis
$produtos = [
    ["nome" => "Notebook", "preco" => 3500],
    ["nome" => "Mouse", "preco" => 80],
    ["nome" => "Teclado", "preco" => 150]
];

// Vendas realizadas
$vendas = [
    ["produto" => "Notebook", "quantidade" => 2],
    ["produto" => "Mouse", "quantidade" => 5]
];

// Procura o produto pelo nome e retorna o seu preço
function buscarProduto($produtos, $nomeProduto) {
    foreach ($produtos as $produto) {
        if ($produto["nome"] === $nomeProduto) {
            return $produto["preco"];
        }
    }

    return null;
}

// Calcula o valor total de uma venda (preço unitário x quantidade)
function calcularVenda($venda, $produtos) {
    $precoUnitario = buscarProduto($produtos, $venda["produto"]);
    return $precoUnitario * $venda["quantidade"];
}

// Percorre as vendas e exibe os detalhes de cada uma
function listarVendas($vendas, $produtos) {
    echo "========== VENDAS ==========" . PHP_EOL;
    foreach ($vendas as $venda) {
        $precoUnitario = buscarProduto($produtos, $venda["produto"]);
        $totalVenda = calcularVenda($venda, $produtos);

        echo $venda["produto"] . PHP_EOL;
        echo "Quantidade: " . $venda["quantidade"] . PHP_EOL;
        echo "Valor unitário: R$ " . number_format($precoUnitario, 2, ',', '.') . PHP_EOL;
        echo "Total: R$ " . number_format($totalVenda, 2, ',', '.') . PHP_EOL;
    }
}

// Soma o total de todas as vendas, gerando o faturamento
function calcularFaturamento($vendas, $produtos) {
    $faturamento = 0;

    foreach ($vendas as $venda) {
        $faturamento = $faturamento + calcularVenda($venda, $produtos);
    }

    return $faturamento;
}

// Apresenta o relatório final de vendas
function mostrarRelatorio($vendas, $produtos) {
    listarVendas($vendas, $produtos);
    $faturamento = calcularFaturamento($vendas, $produtos);
    echo "============================" . PHP_EOL;
    echo "Faturamento: R$ " . number_format($faturamento, 2, ',', '.') . PHP_EOL;
}

// Programa principal
mostrarRelatorio($vendas, $produtos);