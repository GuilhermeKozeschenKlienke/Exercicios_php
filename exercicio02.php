<?php
 
$numero = (int) readline("Informe um número para a tabuada: ");
 
for ($i = 1; $i <= 10; $i++) {
    $resultado = $numero * $i;
    echo $numero . " x " . $i . " = " . $resultado . PHP_EOL;
}
 