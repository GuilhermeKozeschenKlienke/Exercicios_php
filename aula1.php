<?php

echo "=====================================================\n";
echo "                 AGÊNCIA SENAC TOUR                 \n";
echo "=====================================================\n\n";

$cliente = trim(readline("Nome do cliente: "));
$origem = trim(readline("Cidade de origem: "));
$destino = trim(readline("Cidade de destino: "));
$qtdViajantes = (int) readline("Quantidade de viajantes: ");
$qtdDias = (int) readline("Quantidade de dias: ");
$valorPassagem = (float) str_replace(',', '.', readline("Valor da passagem por pessoa (R$): "));
$valorDiaria = (float) str_replace(',', '.', readline("Valor da diária de hospedagem (R$): "));
$valorAlimentacaoDia = (float) str_replace(',', '.', readline("Valor diário de alimentação por pessoa (R$): "));
$valorTransporteDia = (float) str_replace(',', '.', readline("Valor diário de transporte local (R$): "));
$valorPasseio = (float) str_replace(',', '.', readline("Valor do passeio por pessoa (R$): "));

$totalPassagens = $valorPassagem * $qtdViajantes;
$totalHospedagem = $valorDiaria * $qtdDias;
$totalAlimentacao = $valorAlimentacaoDia * $qtdDias * $qtdViajantes;
$totalTransporte = $valorTransporteDia * $qtdDias;
$totalPasseios = $valorPasseio * $qtdViajantes;

$totalViagem = $totalPassagens + $totalHospedagem + $totalAlimentacao + $totalTransporte + $totalPasseios;
$valorPorViajante = $totalViagem / $qtdViajantes;

$numeroOrcamento = rand(10000, 99999);
$dataOrcamento = date("d/m/Y H:i:s");

echo "\n=====================================================\n";
echo "                 ORÇAMENTO DE VIAGEM                \n";
echo "=====================================================\n";
echo "Número do orçamento: " . $numeroOrcamento . "\n";
echo "Data de emissão.....: " . $dataOrcamento . "\n";
echo "-----------------------------------------------------\n";
echo "Cliente..............: " . $cliente . "\n";
echo "Trajeto..............: " . $origem . " -> " . $destino . "\n";
echo "Quantidade de pessoas: " . $qtdViajantes . "\n";
echo "Duração da viagem....: " . $qtdDias . " dia(s)\n";
echo "-----------------------------------------------------\n";
echo "Passagens.......: R$ " . number_format($totalPassagens, 2, ',', '.') . "\n";
echo "Hospedagem......: R$ " . number_format($totalHospedagem, 2, ',', '.') . "\n";
echo "Alimentação.....: R$ " . number_format($totalAlimentacao, 2, ',', '.') . "\n";
echo "Transporte local: R$ " . number_format($totalTransporte, 2, ',', '.') . "\n";
echo "Passeios........: R$ " . number_format($totalPasseios, 2, ',', '.') . "\n";
echo "-----------------------------------------------------\n";
echo "VALOR TOTAL DA VIAGEM.......: R$ " . number_format($totalViagem, 2, ',', '.') . "\n";
echo "VALOR MÉDIO POR VIAJANTE....: R$ " . number_format($valorPorViajante, 2, ',', '.') . "\n";
echo "=====================================================\n";