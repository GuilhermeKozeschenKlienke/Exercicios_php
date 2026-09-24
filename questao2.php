<?php
// Dados que entram no sistema
// Dados que são convertidos
$num1 = (int) readline("Primeiro número(inteiro): ");
// Dados que são convertidos
$num2 = (int) readline("Segundo número(inteiro): ");

$operacao = trim(readline("Operação (+, -, *, /): "));

// Decições do sistema:
switch ($operacao) {
    //Soma:
    case '+':
        $resultado = $num1 + $num2;
        echo "$num1 + $num2 = $resultado\n";
        break;
    //Subtração:
    case '-':
        $resultado = $num1 - $num2;
        echo "$num1 - $num2 = $resultado\n";
        break;
    //Multiplicação:
    case '*':
        $resultado = $num1 * $num2;
        echo "$num1 * $num2 = $resultado\n";
        break;

    //Divisão:
    case '/':
        // validação antes da divisão:
        if ($num2 == 0) {
            echo "Erro: Divisão por zero não é permitida!\n";
        } else {
            $resultado = $num1 / $num2;
            echo "$num1 / $num2 = $resultado\n";
        }
        break;

    default:
        echo "Operação inválida! Use apenas +, -, * ou /.\n";
        break;
}
?>