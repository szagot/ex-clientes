<?php
namespace Clientes;

class Cliente
{
    private $nome;
    private $cpf;
    private $logradouro;
    private $numero;
    private $cidade;
    private $uf;
    protected $importancia;

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
        $this
            ->setNome( $nome )
            ->setCidade( $cidade )
            ->setCpf( $cpf )
            ->setLogradouro( $logradouro )
            ->setNumero( $numero )
            ->setUf( $uf );
    }

    /**
     * @return mixed
     */
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * @param mixed $nome
     */
    public function setNome( $nome )
    {
        $this->nome = $nome;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getCpf()
    {
        return $this->cpf;
    }

    /**
     * @param mixed $cpf
     */
    public function setCpf( $cpf )
    {
        $this->cpf = $cpf;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getLogradouro()
    {
        return $this->logradouro;
    }

    /**
     * @param mixed $logradouro
     */
    public function setLogradouro( $logradouro )
    {
        $this->logradouro = $logradouro;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getNumero()
    {
        return $this->numero;
    }

    /**
     * @param mixed $numero
     */
    public function setNumero( $numero )
    {
        $this->numero = $numero;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getCidade()
    {
        return $this->cidade;
    }

    /**
     * @param mixed $cidade
     */
    public function setCidade( $cidade )
    {
        $this->cidade = $cidade;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getUf()
    {
        return $this->uf;
    }

    /**
     * @param mixed $uf
     */
    public function setUf( $uf )
    {
        $this->uf = $uf;

        return $this;
    }


}