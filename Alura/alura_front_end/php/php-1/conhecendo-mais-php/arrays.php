<?php

// funcionamento de arrays em php
echo "Funcionamento Basico de um array".PHP_EOL;
$number = [
    10,
    20,
    30,
    40,
    50
];

for ($i = 0; $i < count($number); $i++) {
    echo $number[$i].PHP_EOL;
}

// Array associativo em php
echo PHP_EOL;
//forma de fazer iniciante
$conta1 = [
    'titula' => 'Miguel',
    'saldo' => 10
];

$conta2 = [
    'titula' => 'Millene',
    'saldo' => 10
];

$conta3 = [
    'titula' =>'Marcia',
    'saldo' => 1000
];

$contaTeste = [$conta1, $conta2, $conta3];

echo "Maneira amadora:".PHP_EOL;

for ($i = 0; $i < count($contaTeste); $i++) {
    echo $contaTeste[$i]['titula']." \n";
}


echo PHP_EOL;
echo "Maneira proficional:".PHP_EOL;
// forma de fazer avançado.
$contas = [
    25437834 => [
        'titula' => 'Miguel',
        'saldo' => 10
    ],
    64567867 => [
        'titula' => 'Millene',
        'saldo' => 10
    ],
    79834590 => [
        'titula' =>'Marcia',
        'saldo' => 1000
    ]
];

function listArray($array, $key) {
    foreach ($array as $associa => $itensArray) {
        if ($key == null) {
            echo "iten:".$itensArray.PHP_EOL;
        } else {
            echo "iten:".$itensArray[$key] . PHP_EOL;
        }

        echo "chave é " . $associa . PHP_EOL; // maneira de pegar as associações no foreach.
    }
}
listArray($contas, 'titula');
echo PHP_EOL;
echo "ou imprima o array todo com print_r(Array)".PHP_EOL;
print_r($contas);
echo PHP_EOL;
echo "Adicionando um novo array".PHP_EOL;
//adicionar um novo array
$contas[96754656] = ['titula' => 'Mãe', 'saldo' => 1500];

listArray($contas, 'titula');

//echo PHP_EOL;
//echo "outra forma de adicionar Array com incremento".PHP_EOL;
////o array do php tem auto increment ao adicionar um nomvo array
//$numbers2 = [1 => a , 2 => b, 3 => c, 4 => d];
//listArray($numbers2);
//
//echo PHP_EOL;
//echo "Adicionando o array 5 com incremento".PHP_EOL;
//$numbers2[] = e;
//listArray($numbers2);

echo PHP_EOL;

echo "Atenção!!! para adicionar um array com incremento so adicionar sem passar nenhum atributo e as chaves
estiver numeradas ou não estiver editado as chaves se quiser observa tire o comentario do exemplo a cima.";

echo PHP_EOL;
echo PHP_EOL;

echo "não pode em array:".PHP_EOL;
$array = [
    1 => 'a',
    1.5 => 'b',
    true => 'c'
];

print_r($array);
echo "essas são as duas formas de mostrar um array inteiro".PHP_EOL;
var_dump($array);
echo "o valor boleano nas chaves é invalida 1.5 então fico 1 e enguinoro 1.5\n";
echo "o valor true é invalido então colocou 1 que ao se igualado com o true é true veja abaixo:\n";
if(true == 1) $ehTrue = 'true';
echo $ehTrue.PHP_EOL;
echo "entenda no codigo fonte.";
echo PHP_EOL;
echo PHP_EOL;

echo "pegar arrays e transformar em variaveis".PHP_EOL;
$numbers = [10, 20, 30, 40, 50, 60];

// forma de pegar os valores dentro de um array e colocar ele em variaveis
list($number10, $number20 , $number30) = $numbers;
echo "Pegando os arrays na posicao 0 1 e 2:".PHP_EOL;
echo "$number10, $number20, $number30".PHP_EOL;

// outra forma de fazer isso só com comchetes é mostrar como é feitos as posicoes
[$number10, ,$number30, , ,$number60] = $numbers;
echo "pegando na posicao 0 2 5:".PHP_EOL;
echo "pegando na posicao 0 2 5:".PHP_EOL;
echo "$number10, $number30, $number60".PHP_EOL;
echo PHP_EOL;
//se o array tiver chave não vai funcionar a não se que vc coloque tambem as chaves personalizadas na list ex:
echo "outra forma de fazer isso quando as chaves for editadas:".PHP_EOL;
$numbers = ['numero1' => 10, 'numero2' => 20, 'numero3' => 30, 'numero4' => 40, 'numero5' => 50 , 'numero6' => 60];
['numero1' => $numero10, 'numero3' => $numero30, 'numero6' => $numero60] = $numbers;
echo "$numero10, $numero30, $numero60";
