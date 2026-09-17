<?php

// Cadastra 5 produtos utilizando arrays associativos
function cadastrarProdutos() {
    $produtos = [];

    for ($i = 1; $i <= 5; $i++) {
        $nome = trim(readline("Nome do produto " . $i . ": "));
        $preco = (float) str_replace(',', '.', readline("Preço: "));

        $produto = [
            "nome" => $nome,
            "preco" => $preco
        ];

        $produtos[] = $produto;
    }

    return $produtos;
}

// Percorre o array e exibe todos os produtos
function listarProdutos($produtos) {
    echo PHP_EOL . "===== PRODUTOS =====" . PHP_EOL;
    foreach ($produtos as $produto) {
        echo $produto["nome"] . " - R$ " . number_format($produto["preco"], 2, ',', '.') . PHP_EOL;
    }
}

// Soma o preço de todos os produtos
function calcularTotal($produtos) {
    $total = 0;

    foreach ($produtos as $produto) {
        $total = $total + $produto["preco"];
    }

    return $total;
}

// Calcula o preço médio dos produtos
function calcularMedia($produtos) {
    return calcularTotal($produtos) / count($produtos);
}

// Lista apenas os produtos que custam R$ 100 ou mais
function listarProdutosCaros($produtos) {
    echo PHP_EOL . "===== PRODUTOS A PARTIR DE R$ 100 =====" . PHP_EOL;
    foreach ($produtos as $produto) {
        if ($produto["preco"] >= 100) {
            echo $produto["nome"] . " - R$ " . number_format($produto["preco"], 2, ',', '.') . PHP_EOL;
        }
    }
}

// Programa principal
$produtos = cadastrarProdutos();
listarProdutos($produtos);

$total = calcularTotal($produtos);
$media = calcularMedia($produtos);

echo PHP_EOL . "Quantidade de produtos: " . count($produtos) . PHP_EOL;
echo "Soma dos preços: R$ " . number_format($total, 2, ',', '.') . PHP_EOL;
echo "Preço médio: R$ " . number_format($media, 2, ',', '.') . PHP_EOL;

listarProdutosCaros($produtos);