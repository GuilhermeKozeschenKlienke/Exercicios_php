<?php

// Cadastra 4 alunos utilizando arrays associativos
function cadastrarAlunos() {
    $alunos = [];

    for ($i = 1; $i <= 4; $i++) {
        $nome = trim(readline("Nome do aluno " . $i . ": "));
        $idade = (int) readline("Idade: ");
        $nota = (float) str_replace(',', '.', readline("Nota: "));

        $aluno = [
            "nome" => $nome,
            "idade" => $idade,
            "nota" => $nota
        ];

        $alunos[] = $aluno;
    }

    return $alunos;
}

// Verifica a situação do aluno de acordo com a nota
function verificarSituacao($nota) {
    if ($nota >= 7) {
        return "APROVADO";
    } else {
        return "REPROVADO";
    }
}

// Percorre o array de alunos e apresenta os dados de cada um
function listarAlunos($alunos) {
    echo PHP_EOL;
    foreach ($alunos as $aluno) {
        echo "Nome: " . $aluno["nome"] . PHP_EOL;
        echo "Idade: " . $aluno["idade"] . PHP_EOL;
        echo "Nota: " . number_format($aluno["nota"], 2, ',', '.') . PHP_EOL;
        echo "Situação: " . verificarSituacao($aluno["nota"]) . PHP_EOL;
        echo "---------------------" . PHP_EOL;
    }
}

// Programa principal
$alunos = cadastrarAlunos();
listarAlunos($alunos);