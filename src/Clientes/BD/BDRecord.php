<?php

namespace Clientes\BD;

use Clientes\ClienteJuridico;
use Clientes\Util\Cliente;

class BDRecord
{
    /** @var \PDO */
    private $pdo;
    /** @var  Cliente */
    private $cliente;

    public function __construct( \PDO $pdo )
    {
        $this->pdo = $pdo;
    }

    public function persist( Cliente $cliente )
    {
        $this->cliente = $cliente;
        return $this;
    }

    public function flush()
    {
        $query = $this->pdo->prepare( '
            INSERT INTO 
              clientes ( cpf, nome, rua, cidade, numero, uf, hit, pessoa )
              VALUES ( :cpf, :nome, :rua, :cidade, :numero, :uf, :hit, :pessoa )
        ' );

        $query->bindValue( ':cpf', $this->cliente->getCpf(), \PDO::PARAM_STR );
        $query->bindValue( ':nome', $this->cliente->getNome(), \PDO::PARAM_STR );
        $query->bindValue( ':rua', $this->cliente->getLogradouro(), \PDO::PARAM_STR );
        $query->bindValue( ':cidade', $this->cliente->getCidade(), \PDO::PARAM_STR );
        $query->bindValue( ':numero', $this->cliente->getNumero(), \PDO::PARAM_STR );
        $query->bindValue( ':uf', $this->cliente->getUf(), \PDO::PARAM_STR );
        $query->bindValue( ':hit', $this->cliente->getImportancia(), \PDO::PARAM_INT );
        $query->bindValue( ':pessoa', ( $this->cliente instanceof ClienteJuridico) ? 'J' : 'F', \PDO::PARAM_STR );

        $query->execute();
    }
}