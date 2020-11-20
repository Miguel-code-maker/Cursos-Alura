<?php
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

function sacar(Array &$conta, float $valor) {
    if ($conta['saldo'] < $valor) {
        echo "vc não tem dinheiro suficiente".PHP_EOL;
        return;
    }
    $conta['saldo'] -= $valor;
}

function depositar(Array &$conta, float $valor) {
    if ($valor < 0) {
        echo "Valor invalido".PHP_EOL;
        return;
    }
    $conta['saldo'] += $valor;
}

function toUpperNome(array &$conta) {
    $conta['titula'] = mb_strtoupper($conta['titula']);
}
