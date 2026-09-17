<?php

// Cadastra 5 produtos com nome, preço e quantidade
function cadastrarProdutos() {
    $produtos = [];

    for ($i = 1; $i <= 5; $i++) {
        $nome = trim(readline("Nome do produto " . $i . ": "));
        $preco = (float) str_replace(',', '.', readline("Preço: "));
        $quantidade = (int) readline("Quantidade: ");

        $produto = [
            "nome" => $nome,
            "preco" => $preco,
            "quantidade" => $quantidade
        ];

        $produtos[] = $produto;
    }

    return $produtos;
}

// Calcula o valor em estoque de um único produto (preço x quantidade)
function calcularValorProduto($produto) {
    return $produto["preco"] * $produto["quantidade"];
}

// Percorre os produtos e exibe o estoque de cada um
function listarEstoque($produtos) {
    echo PHP_EOL . "===== ESTOQUE =====" . PHP_EOL;
    foreach ($produtos as $produto) {
        $valorProduto = calcularValorProduto($produto);

        echo $produto["nome"] . PHP_EOL;
        echo "Preço: R$ " . number_format($produto["preco"], 2, ',', '.') . PHP_EOL;
        echo "Quantidade: " . $produto["quantidade"] . PHP_EOL;
        echo "Valor em estoque: R$ " . number_format($valorProduto, 2, ',', '.') . PHP_EOL;
        echo "---------------------" . PHP_EOL;
    }
}

// Soma o valor em estoque de todos os produtos
function calcularValorEstoque($produtos) {
    $total = 0;

    foreach ($produtos as $produto) {
        $total = $total + calcularValorProduto($produto);
    }

    return $total;
}

// Programa principal
$produtos = cadastrarProdutos();
listarEstoque($produtos);

$valorTotalEstoque = calcularValorEstoque($produtos);
echo PHP_EOL . "Valor total do estoque: R$ " . number_format($valorTotalEstoque, 2, ',', '.') . PHP_EOL;