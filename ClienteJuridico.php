<?php

class ClienteJuridico extends Cliente implements Empresa
{
    protected $importancia;

    public function __construct( $nome, $cpf, $logradouro, $numero, $cidade, $uf, $importancia = 1 )
    {
        parent::__construct( $nome, $cpf, $logradouro, $numero, $cidade, $uf );
        $this->setImportancia( $importancia );
    }

    /**
     * @return mixed
     */
    public function getImportancia()
    {
        return $this->importancia;
    }

    /**
     * @param mixed $importancia
     */
    public function setImportancia( $importancia )
    {
        $this->importancia = ( $importancia > 0 && $importancia < 6 ) ? $importancia : 1;

        return $this;
    }

}