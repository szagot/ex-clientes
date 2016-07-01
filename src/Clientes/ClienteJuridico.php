<?php
namespace Clientes;

class ClienteJuridico extends Util\Cliente implements Util\Empresa
{

    public function __construct( $nome, $cpf, $logradouro, $numero, $cidade, $uf, $importancia = 1 )
    {
        parent::__construct( $nome, $cpf, $logradouro, $numero, $cidade, $uf );
        $this->setImportancia( $importancia );
    }

    public function setImportancia( $importancia )
    {
        $this->importancia = ( $importancia > 0 && $importancia < 6 ) ? $importancia : 1;

        return $this;
    }

}