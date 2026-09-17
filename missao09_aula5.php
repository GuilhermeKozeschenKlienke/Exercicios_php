<?php

// Cadastra 5 produtos com nome, preço e quantidade em estoque
function cadastrarProdutos() {
    $produtos = [];

    for ($i = 1; $i <= 5; $i++) {
        $nome = trim(readline("Nome do produto " . $i . ": "));
        $preco = (float) str_replace(',', '.', readline("Preço: "));
        $quantidade = (int) readline("Quantidade em estoque: ");

        $produtos[] = [
            "nome" => $nome,
            "preco" => $preco,
            "quantidade" => $quantidade
        ];
    }

    return $produtos;
}

// Percorre os produtos e exibe nome, preço e estoque
function listarProdutos($produtos) {
    echo PHP_EOL . "PRODUTOS" . PHP_EOL;
    foreach ($produtos as $produto) {
        echo $produto["nome"] . PHP_EOL;
        echo "Preço: R$ " . number_format($produto["preco"], 2, ',', '.') . PHP_EOL;
        echo "Estoque: " . $produto["quantidade"] . PHP_EOL;
    }
}

// Soma a quantidade total de unidades em estoque
function calcularUnidadesTotais($produtos) {
    $total = 0;

    foreach ($produtos as $produto) {
        $total = $total + $produto["quantidade"];
    }

    return $total;
}

// Soma o valor total do estoque (preço x quantidade de cada produto)
function calcularValorEstoque($produtos) {
    $total = 0;

    foreach ($produtos as $produto) {
        $total = $total + ($produto["preco"] * $produto["quantidade"]);
    }

    return $total;
}

// Encontra o produto com o maior preço
function produtoMaisCaro($produtos) {
    $maisCaro = null;

    foreach ($produtos as $produto) {
        if ($maisCaro === null || $produto["preco"] > $maisCaro["preco"]) {
            $maisCaro = $produto;
        }
    }

    return $maisCaro;
}

// Lista os produtos com estoque abaixo de 5 unidades
function produtosEstoqueBaixo($produtos) {
    echo PHP_EOL . "PRODUTOS COM ESTOQUE BAIXO" . PHP_EOL;
    foreach ($produtos as $produto) {
        if ($produto["quantidade"] < 5) {
            echo $produto["nome"] . PHP_EOL;
        }
    }
}

// Lista os produtos que custam mais de R$ 100
function produtosCaros($produtos) {
    echo PHP_EOL . "PRODUTOS COM PREÇO ACIMA DE R$ 100" . PHP_EOL;
    foreach ($produtos as $produto) {
        if ($produto["preco"] > 100) {
            echo $produto["nome"] . PHP_EOL;
        }
    }
}

// Programa principal
echo "========= LOJA SENAC =========" . PHP_EOL;

$produtos = cadastrarProdutos();
listarProdutos($produtos);

echo "==============================" . PHP_EOL;
echo "Produtos cadastrados: " . count($produtos) . PHP_EOL;
echo "Unidades em estoque: " . calcularUnidadesTotais($produtos) . PHP_EOL;
echo "Valor do estoque: R$ " . number_format(calcularValorEstoque($produtos), 2, ',', '.') . PHP_EOL;

$maisCaro = produtoMaisCaro($produtos);
echo "Produto mais caro: " . $maisCaro["nome"] . " (R$ " . number_format($maisCaro["preco"], 2, ',', '.') . ")" . PHP_EOL;

produtosEstoqueBaixo($produtos);
produtosCaros($produtos);