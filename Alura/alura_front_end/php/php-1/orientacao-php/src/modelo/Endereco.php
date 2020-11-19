<?php
namespace alura\banco\modelo;


/**
 * Class Endereco
 * @package alura\banco\modelo
 * @property  string $cidade
 * @property string $bairro
 * @property string $rua
 * @property string $numero
 */

class Endereco {
    //props
    private string $cidade;
    private string $bairro;
    private string $rua;
    private string $numero;

    // __Methds magic

    public function __construct (string $cidade, string $bairro, string $rua, string $numero) {
        $this->cidade = $cidade;
        $this->bairro = $bairro;
        $this->rua = $rua;
        $this->numero = $numero;
    }

    public function __toString(): string {
        return "cidade: {$this->cidade}, bairro: {$this->bairro}, rua: {$this->rua}, número: {$this->numero}";
    }

    //methds

    // gets

    /**
     * @return mixed
     */
    private function getBairro(): string {
        return $this->bairro;
    }

    /**
     * @return mixed
     */
    private function getCidade(): string {
        return $this->cidade;
    }

    /**
     * @return mixed
     */
    private function getNumero(): string
    {
        return $this->numero;
    }

    /**
     * @return mixed
     */
    private function getRua(): string
    {
        return $this->rua;
    }

    //sets

    /**
     * @param string $bairro
     */
    private function setBairro(string $bairro): void
    {
        $this->bairro = $bairro;
    }

    /**
     * @param string $cidade
     */
    private function setCidade(string $cidade): void
    {
        $this->cidade = $cidade;
    }

    /**
     * @param string $numero
     */
    private function setNumero(string $numero): void
    {
        $this->numero = $numero;
    }

    /**
     * @param string $rua
     */
    private function setRua(string $rua): void
    {
        $this->rua = $rua;
    }


    //__Gets
    use getsProps;

    //__Set
    use setProps;

}