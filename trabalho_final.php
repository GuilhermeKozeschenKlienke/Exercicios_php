<?php

function ler(string $msg): string
{
    echo $msg;
    return trim(fgets(STDIN));
}

function calcularSubtotal(array $produto): float
{
    return $produto['preco'] * $produto['quantidade'];
}

function cadastrarProdutos(): array
{
    $produtos = [];

    echo "\nCadastro de produtos (digite SAIR no nome para parar)\n";

    while (true) {
        $nome = ler("\nNome do produto: ");
        if (strtoupper($nome) === 'SAIR') {
            break;
        }

        $categoria = ler("Categoria: ");
        $preco = (float) str_replace(',', '.', ler("Preço unitário: "));
        $quantidade = (int) ler("Quantidade: ");

        if ($preco <= 0 || $quantidade <= 0) {
            echo ">>> Produto \"$nome\" com preço ou quantidade inválidos. Ignorado.\n";
            continue;
        }

        $produtos[] = [
            'nome' => $nome,
            'categoria' => $categoria,
            'preco' => $preco,
            'quantidade' => $quantidade,
        ];
    }

    return $produtos;
}

function calcularPercentualDesconto(float $valorBruto, array $cliente, string $pagamento): float
{
    $percentual = 0;

    if ($valorBruto >= 1000) {
        $percentual = 15;
    } elseif ($valorBruto >= 500) {
        $percentual = 10;
    } elseif ($valorBruto >= 200) {
        $percentual = 5;
    }

    if ($cliente['tipo'] === 'premium') {
        $percentual += 3;
    }
    if ($pagamento === 'pix') {
        $percentual += 2;
    }
    if ($cliente['idade'] >= 60) {
        $percentual += 2;
    }

    return $percentual;
}

function classificarVenda(float $valorFinal): string
{
    if ($valorFinal < 300) {
        return 'VENDA PEQUENA';
    }
    if ($valorFinal < 1000) {
        return 'VENDA MÉDIA';
    }
    return 'VENDA DE ALTO VALOR';
}

function exibirComprovante(string $id, string $data, array $cliente, array $produtos): void
{
    echo "\n--- COMPROVANTE ---\n";
    echo "Venda: $id | Data: $data\n";
    echo "Cliente: {$cliente['nome']} ({$cliente['idade']} anos, {$cliente['tipo']})\n";

    foreach ($produtos as $p) {
        echo "- {$p['nome']} | {$p['categoria']} | R$ {$p['preco']} x {$p['quantidade']} = R$ " . calcularSubtotal($p) . "\n";
    }
}

function exibirRelatorio(array $produtos, float $valorBruto, float $percentual, float $desconto, float $valorFinal): void
{
    $maisCaro = $produtos[0];
    $maisBarato = $produtos[0];
    $totalUnidades = 0;

    foreach ($produtos as $p) {
        $totalUnidades += $p['quantidade'];
        if ($p['preco'] > $maisCaro['preco']) $maisCaro = $p;
        if ($p['preco'] < $maisBarato['preco']) $maisBarato = $p;
    }

    echo "\n--- RELATÓRIO GERENCIAL ---\n";
    echo "Produtos diferentes: " . count($produtos) . "\n";
    echo "Total de unidades: $totalUnidades\n";
    echo "Produto mais caro: {$maisCaro['nome']}\n";
    echo "Produto mais barato: {$maisBarato['nome']}\n";
    echo "Valor bruto: R$ $valorBruto\n";
    echo "Desconto: $percentual%\n";
    echo "Valor do desconto: R$ $desconto\n";
    echo "Valor final: R$ $valorFinal\n";
    echo "Classificação: " . classificarVenda($valorFinal) . "\n";
}

// ------- Programa principal -------

$arquivoId = __DIR__ . '/ultimo_id.txt';
$id = file_exists($arquivoId) ? ((int) file_get_contents($arquivoId)) + 1 : 1;
file_put_contents($arquivoId, $id);
$data = date('d/m/Y H:i:s');

echo "Nova venda: $id\n";

$cliente = [
    'nome' => ler("Nome do cliente: "),
    'idade' => (int) ler("Idade: "),
    'tipo' => strtolower(ler("Tipo (comum/premium): ")),
];

$produtos = cadastrarProdutos();

if (empty($produtos)) {
    echo "Nenhum produto cadastrado. Venda encerrada.\n";
    exit;
}

$valorBruto = 0;
foreach ($produtos as $p) {
    $valorBruto += calcularSubtotal($p);
}


echo "\nValor total sem desconto: ". $valorBruto;
$pagamento = strtolower(ler("\nForma de pagamento (pix/cartao/dinheiro/cancelar): "));

if ($pagamento === 'cancelar') {
    echo "\nCompra cancelada pelo cliente. Nenhum valor foi cobrado.\n";
    exit;
}

$percentual = calcularPercentualDesconto($valorBruto, $cliente, $pagamento);
$desconto = $valorBruto * ($percentual / 100);
$valorFinal = $valorBruto - $desconto;

if ($pagamento === 'cartao') {
    echo "\nSimulação de parcelamento:\n";
    for ($i = 1; $i <= 6; $i++) {
        echo "$i x de R$ " . round($valorFinal / $i, 2) . "\n";
    }
    $parcelas = (int) ler("Quantas parcelas (1 a 6)? ");
}

exibirComprovante($id, $data, $cliente, $produtos);
exibirRelatorio($produtos, $valorBruto, $percentual, $desconto, $valorFinal);