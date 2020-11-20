<?php declare(strict_types=1);

require_once './spl_autoload_register.php';

use alura\arrays\clas\ArraysUltils;
use alura\arrays\clas\Calculadora;


$notas = [
    "matematica"=>10,
    "portugues"=>8,
    "historia"=>8,
    "geografia"=>6
];

foreach($notas as $materia => $nota) {
    echo"<p>sua nota de $materia: $nota</p>";
}
$calculadora = new Calculadora();
$result = $calculadora->CalculaMedia($notas);
echo $result;

echo "<p>------------------------------------------------------------------------------</p>";

$saldos = [
    100,
    110,
    229,
    885,
    50,
    345,
];

sort($saldos); // ele ordena sua lista de arrays

foreach ($saldos as $saldo) {
    echo "<p>saldo: $saldo</p>";
}

echo "<p>o menor saldo: $saldos[0]</p>";

echo "<p>------------------------------------------------------------------------------</p>";

$nome = "Miguel siqueira reis";

$fullName = explode(' ', $nome);

echo "<pre>";
var_dump($fullName);
echo "</pre>";

$nameDoArray = implode(", ", $fullName);

echo $nameDoArray;

echo "<p>------------------------------------------------------------------------------</p>";
echo "<p>array completo:</p>";
echo "<pre>";
var_dump($fullName);
echo "</pre>";
ArraysUltils::remove('reis', $fullName);

echo "<p>array sem um elemento:</p>";
echo "<pre>";
var_dump($fullName);
echo "</pre>";

echo "<p>------------------------------------------------------------------------------</p>";
// filtra arrays a parti de outros arrays
$pessoas  = [
    "carlos",
    "jurema",
    "millene",
    "maisana",
    "marciana"
];

$pessoasBanidas = [
    "carlos",
    "jurema"
];

$pessoasPermitidas = array_diff($pessoas, $pessoasBanidas);
echo "<p>pessoas conectadas:</p>";
echo "<pre>";
var_dump($pessoasPermitidas);
echo "</pre>";

echo "<p>------------------------------------------------------------------------------</p>";
$trabalhadores = [
    "professor",
    "diretor",
    "guarda"
];

$outrosTrabalhadores = [
    "faxineira",
    "cuzinheira",
    "cordenadora"
];

$todosTrabalhadores = array_merge($trabalhadores, $outrosTrabalhadores);
echo "<p>junta dois arrays diferentes em um só:</p>";
echo "<pre>";
var_dump($todosTrabalhadores);
echo "</pre>";

echo "<p>------------------------------------------------------------------------------</p>";

$correntista = [
    "filemion",
    "matheus",
    "sabrina",
    "samanta"
];

$saldos = [
    500,
    1000,
    1500,
    50
];

$banco = array_combine($correntista, $saldos);
echo "<p>ele combina arrays</p>";
echo "<pre>";
var_dump($banco);
echo "</pre>";

echo "<p>imprimindo valor pela chave:</p>";
if (array_key_exists("filemion", $banco)) {
    echo "<p>filemion tem R\$ {$banco["filemion"]}</p>";
} else {
    echo "<p>não foi encontrado</p>";
}












echo "<script>document.body.style = \"padding-bottom: 15rem;\"</script>";
