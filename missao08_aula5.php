<?php

// Cadastra 5 alunos com nome e nota
function cadastrarAlunos() {
    $alunos = [];

    for ($i = 1; $i <= 5; $i++) {
        $nome = trim(readline("Nome do aluno " . $i . ": "));
        $nota = (float) str_replace(',', '.', readline("Nota: "));

        $alunos[] = [
            "nome" => $nome,
            "nota" => $nota
        ];
    }

    return $alunos;
}

// Percorre os alunos e exibe o relatório com a situação de cada um
function listarAlunos($alunos) {
    echo PHP_EOL . "===== RELATÓRIO =====" . PHP_EOL;
    foreach ($alunos as $aluno) {
        if ($aluno["nota"] >= 7) {
            $situacao = "APROVADO";
        } else {
            $situacao = "REPROVADO";
        }

        echo $aluno["nome"] . " - " . number_format($aluno["nota"], 1, ',', '.') . " - " . $situacao . PHP_EOL;
    }
}

// Calcula a média geral da turma
function calcularMedia($alunos) {
    $soma = 0;

    foreach ($alunos as $aluno) {
        $soma = $soma + $aluno["nota"];
    }

    return $soma / count($alunos);
}

// Conta a quantidade de alunos aprovados
function contarAprovados($alunos) {
    $contador = 0;

    foreach ($alunos as $aluno) {
        if ($aluno["nota"] >= 7) {
            $contador = $contador + 1;
        }
    }

    return $contador;
}

// Conta a quantidade de alunos reprovados
function contarReprovados($alunos) {
    $contador = 0;

    foreach ($alunos as $aluno) {
        if ($aluno["nota"] < 7) {
            $contador = $contador + 1;
        }
    }

    return $contador;
}

// Apresenta o resumo final da turma
function mostrarResumo($media, $aprovados, $reprovados) {
    echo PHP_EOL . "Quantidade de alunos: " . ($aprovados + $reprovados) . PHP_EOL;
    echo "Aprovados: " . $aprovados . PHP_EOL;
    echo "Reprovados: " . $reprovados . PHP_EOL;
    echo "Média da turma: " . number_format($media, 2, ',', '.') . PHP_EOL;
}

// Programa principal
$alunos = cadastrarAlunos();
listarAlunos($alunos);
$media = calcularMedia($alunos);
$aprovados = contarAprovados($alunos);
$reprovados = contarReprovados($alunos);
mostrarResumo($media, $aprovados, $reprovados);