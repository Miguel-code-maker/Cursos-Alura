<?php

$peso = 45.00;
$altura = 1.60;

$imc = $peso / $altura**2;
echo "seu imc é ".$imc.PHP_EOL;

if ($imc < 18.5) {
    echo "seu imc esta baixo do recomendado.";
} elseif ($imc > 18.5 && $imc < 25) {
    echo "vc esta ne um imc recomendado.";
} elseif ($imc > 24.9) {
    echo "seu imc esta aciama do recomendado.";
} else {
    echo "valor invalido.";
}