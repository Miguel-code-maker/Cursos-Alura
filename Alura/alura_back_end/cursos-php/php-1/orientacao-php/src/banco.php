<?php
require_once './spl_autoload.php';

use alura\banco\modelo\conta\{Conta, ContaCorrente, ContaPoupanssa, Cpf, Titular};
use alura\banco\modelo\Endereco;
use alura\banco\modelo\funcionarios\{ Diretor, Gerente, Desenvolvedor};
use alura\banco\modelo\controller\{Bonificacao, autenticador};

function listaConta($tipoDeConta,string $nome, string $cpf ,array &$listaContas, $cidade, $bairro, $rua, $numero) {

    $endereco = new Endereco($cidade, $bairro, $rua, $numero);
    if ($tipoDeConta == 1) {
        $conta = new ContaCorrente(new Titular($nome, new Cpf($cpf), $endereco));
    } elseif ($tipoDeConta == 2) {
        $conta = new ContaPoupanssa(new Titular($nome, new Cpf($cpf), $endereco));
    }
    $listaContas[] = $conta;

}

$listaContas = [];
listaConta(2,"Miguel", "51465757", $listaContas, "DF", "Gama", "st leste", "casa 106");
listaConta(1,"Maria","574873218" , $listaContas, "DF", "Gama", "st leste", "casa 106");
listaConta(2,"ana maria", "15935781", $listaContas, "DF", "Gama", "st sul", "casa 13");

print_r($listaContas);
echo "--------------------------------------------------------------------------------".PHP_EOL;

$listaContas[0]->depositar(300);
$listaContas[0]->sacar(100);
$listaContas[0]->transferir($listaContas[1], 100);
print_r($listaContas);
echo "Numero de contas: ",$listaContas[0]->getNumerosDeContas().PHP_EOL;

echo "-------------------------------------------------------------------------------".PHP_EOL;
$funcionario1 = new Gerente("Miguel", new Cpf('236842084'), 5000);
$funcionario2 = new Diretor("Miguel2", new Cpf('543125721'),  10000);
$titular = new Titular("titular",new Cpf('1254879544'),new Endereco('gama','36','14','12b'));

print_r($funcionario1);

$controler = new Bonificacao();
$controler->adicionarBunificacao($funcionario1);
$controler->adicionarBunificacao($funcionario2);
$autenticacao = new autenticador();
$autenticacao->login($funcionario2, '123');
$autenticacao->login($funcionario1, '123');
$autenticacao->login($titular, '123');

echo $controler->getTotalDeBunificacao().PHP_EOL;

echo "+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+".PHP_EOL;
$endereco = new Endereco('DF', 'Gama', 'Q36 st lest', '106');

echo $endereco.PHP_EOL;

echo $endereco->cidade;

