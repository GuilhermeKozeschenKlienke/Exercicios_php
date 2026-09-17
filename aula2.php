<?php

echo "=====================================================\n";
echo "         AUTOTECH SERVIÇOS AUTOMOTIVOS              \n";
echo "=====================================================\n\n";

$numeroOrcamento = rand(1000, 9999);
$dataOrcamento = date("d/m/Y H:i:s");

$nomeCliente = trim(readline("Nome do cliente: "));
$telefone = trim(readline("Telefone: "));

$modelo = trim(readline("Modelo do veículo: "));
$marca = trim(readline("Marca do veículo: "));
$ano = (int) readline("Ano do veículo: ");
$placa = trim(readline("Placa do veículo: "));
$quilometragem = (int) readline("Quilometragem atual: ");

$descricaoServico = trim(readline("Descrição do serviço: "));
$valorHora = (float) str_replace(',', '.', readline("Valor da hora de mão de obra (R$): "));
$qtdHoras = (float) str_replace(',', '.', readline("Quantidade de horas previstas: "));

$nomePeca = trim(readline("Nome da peça: "));
$valorUnitarioPeca = (float) str_replace(',', '.', readline("Valor unitário da peça (R$): "));
$qtdPeca = (int) readline("Quantidade de peças: ");

$valorMateriais = (float) str_replace(',', '.', readline("Valor estimado de materiais adicionais (R$): "));

$valorMaoDeObra = $valorHora * $qtdHoras;
$custoPecas = $valorUnitarioPeca * $qtdPeca;

$totalOrcamento = $valorMaoDeObra + $custoPecas + $valorMateriais;
$valorParcela = $totalOrcamento / 3;

echo "\n=====================================================\n";
echo "               COMPROVANTE DE ORÇAMENTO             \n";
echo "=====================================================\n";
echo "Número do orçamento: " . $numeroOrcamento . "\n";
echo "Data de emissão.....: " . $dataOrcamento . "\n";
echo "-----------------------------------------------------\n";
echo "DADOS DO CLIENTE\n";
echo "Nome.....: " . $nomeCliente . "\n";
echo "Telefone.: " . $telefone . "\n";
echo "-----------------------------------------------------\n";
echo "DADOS DO VEÍCULO\n";
echo "Modelo..........: " . $modelo . "\n";
echo "Marca...........: " . $marca . "\n";
echo "Ano.............: " . $ano . "\n";
echo "Placa...........: " . $placa . "\n";
echo "Quilometragem...: " . $quilometragem . " km\n";
echo "-----------------------------------------------------\n";
echo "SERVIÇO\n";
echo "Descrição.......: " . $descricaoServico . "\n";
echo "Peça utilizada..: " . $nomePeca . "\n";
echo "-----------------------------------------------------\n";
echo "Valor da mão de obra..: R$ " . number_format($valorMaoDeObra, 2, ',', '.') . "\n";
echo "Valor das peças.......: R$ " . number_format($custoPecas, 2, ',', '.') . "\n";
echo "Materiais adicionais..: R$ " . number_format($valorMateriais, 2, ',', '.') . "\n";
echo "-----------------------------------------------------\n";
echo "VALOR TOTAL DO ORÇAMENTO: R$ " . number_format($totalOrcamento, 2, ',', '.') . "\n";
echo "3 parcelas de..........: R$ " . number_format($valorParcela, 2, ',', '.') . "\n";
echo "=====================================================\n";