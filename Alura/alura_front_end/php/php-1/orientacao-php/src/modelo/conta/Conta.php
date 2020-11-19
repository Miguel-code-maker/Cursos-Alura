<?php
namespace alura\banco\modelo\conta;

use alura\banco\modelo\getsProps;

abstract class Conta {
    protected Titular $titular;
    protected float $saldo = 0;
    protected static $numerosDeContas = 0;

    public function __construct(Titular $titular) {
        $this->titular = $titular;
        Conta::$numerosDeContas++;
    }

    public function __destruct()
    {
        self::$numerosDeContas--;
    }

    public function sacar(float $value): void {
        if ($value < $this->saldo && $value > 0) {
            $value += $value * $this->taxa();
            $this->saldo -= $value;
            echo "saque feito com sucesso".PHP_EOL;
            return;
        }
        echo "saque invalido!!".PHP_EOL;
    }

    public function depositar($value): void {
        if ($value > 0) {
            $this->saldo += $value;
            echo "deposito feito com sucesso".PHP_EOL;
            return;
        }
        echo "deposito invalido!!".PHP_EOL;

    }

    public function transferir(Conta $conta, float $valor): void {
        if ($valor > 0 && $valor < $this->saldo) {
            $this->saldo -= $valor;
            $conta->saldo += $valor;
            echo "transferencia feita com sucesso".PHP_EOL;
            return;
        }
        echo "transferencia invalida!!".PHP_EOL;
    }

    //abstrato

    abstract protected function taxa(): float;

    /* definir gets*/

    /**
     * @return float
     */
    public function getSaldo(): float
    {
        return $this->saldo;
    }

    /**
     * @return int
     */
    public static function getNumerosDeContas(): int {
        return self::$numerosDeContas; //utiliza self:: ou nomeDaClass:: ou também static:: funciona.
    }

    //__Gets
    use getsProps;
}


