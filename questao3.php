<?php
// Configura o fuso horário para a data atual
date_default_timezone_set('America/Sao_Paulo');

// Identificação, data e responsável
$idColheita = uniqid('COL-');
$dataAtual = date('d/m/Y H:i');

echo "=== SISTEMA DE CONTROLE DE COLHEITA ===\n";
$responsavel = readline("Nome do responsável: ");

// Quantidade de culturas
$qntCulturas = (int) readline("Quantas culturas serão registradas? ");

$culturasValidas = [];
$totalKg = 0;
$valorTotalGeral = 0;

// Leitura e validação das culturas
for ($i = 1; $i <= $qntCulturas; $i++) {
    echo "\n--- Cultura $i ---\n";
    $nome = readline("Nome da cultura: ");
    $quantidade = (float) readline("Quantidade produzida (kg): ");
    $valorKg = (float) readline("Valor estimado por kg (R$): ");

    // Validação: quantidade e valor devem ser maiores que zero
    if ($quantidade > 0 && $valorKg > 0) {
        $valorProducao = $quantidade * $valorKg;

        // Guarda os dados no array para o relatório final
        $culturasValidas[] = [
            'nome' => $nome,
            'qtd' => $quantidade,
            'valor_kg' => $valorKg,
            'valor_producao' => $valorProducao
        ];

        // Acumula totais
        $totalKg += $quantidade;
        $valorTotalGeral += $valorProducao;
    } else {
        echo "--> Registo inválido! Quantidade e valor devem ser maiores que zero. Ignorado.\n";
    }
}

// Relatório Final
echo "\n======================================\n";
echo "         RELATÓRIO DE COLHEITA        \n";
echo "======================================\n";

echo "\n--- CULTURAS CADASTRADAS ---\n";
if (empty($culturasValidas)) {
    echo "Nenhuma cultura válida foi registada.\n";
} else {
    foreach ($culturasValidas as $c) {
        echo "- Nome: " . $c['nome'] . "\n";
        echo "  Quantidade: " . $c['qtd'] . " kg\n";
        echo "  Valor/kg: R$ " . number_format($c['valor_kg'], 2, ',', '.') . "\n";
        echo "  Valor Estimado da Produção: R$ " . number_format($c['valor_producao'], 2, ',', '.') . "\n\n";
    }
}

echo "--- RESUMO GERAL ---\n";
echo "Código da Colheita:" . $idColheita . "\n";
echo "Data: " . $dataAtual . "\n";
echo "Responsável:" . $responsavel . "\n";
echo "Quantidade de Culturas Válidas: " . count($culturasValidas) . "\n";
echo "Quantidade Total Produzida:" . $totalKg . "kg\n";
echo "Valor Total Estimado: R$ " . number_format($valorTotalGeral, 2, ',', '.') . "\n";
?>