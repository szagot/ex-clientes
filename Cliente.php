<?php

class Cliente
{
    public $nome;
    public $cpf;
    public $logradouro;
    public $numero;
    public $cidade;
    public $uf;

    /**
     * Cliente constructor.
     *
     * @param $nome
     * @param $cpf
     * @param $logradouro
     * @param $numero
     * @param $cidade
     * @param $uf
     */
    public function __construct( $nome, $cpf, $logradouro, $numero, $cidade, $uf )
    {
        $this->nome = $nome;
        $this->cpf = $cpf;
        $this->logradouro = $logradouro;
        $this->numero = $numero;
        $this->cidade = $cidade;
        $this->uf = $uf;
    }


}