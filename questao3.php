<?php
date_default_timezone_set('America/Sao_Paulo');

echo "=== SISTEMA DE CONTROLE DE COLHEITA ===\n";

// Define quantas colheitas o sistema irá processar
$totalColheitas = (int) readline("Quantas colheitas deseja registrar no sistema? ");

// O laço FOR é responsável por gerar o ID automaticamente e controlar as colheitas
for ($c = 1; $c <= $totalColheitas; $c++) {

    // Geração automática do ID da Colheita
    $idColheita = "COL-" . $c;
    $dataAtual = date('d/m/Y H:i');

    echo "\n======================================\n";
    echo "       REGISTRO DA COLHEITA: $idColheita\n";
    echo "======================================\n";

    $responsavel = readline("Nome do responsável: ");
    $qntCulturas = (int) readline("Quantas culturas serão registradas nesta colheita? ");

    $culturasValidas = [];
    $totalKg = 0;
    $valorTotalGeral = 0;

    // Leitura e validação das culturas da colheita atual
    for ($i = 1; $i <= $qntCulturas; $i++) {
        echo "\n--- Cultura $i ---\n";
        $nome = readline("Nome da cultura: ");
        $quantidade = (float) readline("Quantidade produzida (kg): ");
        $valorKg = (float) readline("Valor estimado por kg (R$): ");

        if ($quantidade > 0 && $valorKg > 0) {
            $valorProducao = $quantidade * $valorKg;

            $culturasValidas[] = [
                'nome' => $nome,
                'qtd' => $quantidade,
                'valor_kg' => $valorKg,
                'valor_producao' => $valorProducao
            ];

            $totalKg += $quantidade;
            $valorTotalGeral += $valorProducao;
        } else {
            echo "--> Registro inválido! Quantidade e valor devem ser maiores que zero. Ignorado.\n";
        }
    }

    // Exibição do relatório para a colheita atual
    echo "\n--------------------------------------\n";
    echo "     RELATÓRIO DA COLHEITA $idColheita\n";
    echo "--------------------------------------\n";

    echo "\n--- CULTURAS CADASTRADAS ---\n";
    if (empty($culturasValidas)) {
        echo "Nenhuma cultura válida foi registrada.\n";
    } else {
        foreach ($culturasValidas as $item) {
            echo "- Nome: " . $item['nome'] . "\n";
            echo "  Quantidade: " . $item['qtd'] . " kg\n";
            echo "  Valor/kg: R$ " . number_format($item['valor_kg'], 2, ',', '.') . "\n";
            echo "  Valor Estimado da Produção: R$ " . number_format($item['valor_producao'], 2, ',', '.') . "\n\n";
        }
    }

    echo "--- RESUMO GERAL ---\n";
    echo "Código da Colheita: $idColheita\n";
    echo "Data: $dataAtual\n";
    echo "Responsável: $responsavel\n";
    echo "Quantidade de Culturas Válidas: " . count($culturasValidas) . "\n";
    echo "Quantidade Total Produzida: $totalKg kg\n";
    echo "Valor Total Estimado: R$ " . number_format($valorTotalGeral, 2, ',', '.') . "\n";
}
?>