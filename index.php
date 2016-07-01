<?php
require_once '_loader.php';

use
    Clientes\ClienteFisico,
    Clientes\ClienteJuridico;

// Configs
$ordecacaoAsc = filter_input( INPUT_GET, 'ordem' );
$clientId = filter_input( INPUT_GET, 'clientId' );

if ( $ordecacaoAsc != 'DESC' )
    $ordecacaoAsc = 'ASC';

$pdo = new \PDO( 'mysql:host=localhost;dbname=ex-clientes;charset=utf8', 'root', '' );
$query = $pdo->query( 'SELECT COUNT(id) AS qtde FROM clientes' );
$clientesQtde = $query->fetch( PDO::FETCH_ASSOC )[ 'qtde' ];

// Se clientes estiver vazio
if ( $clientesQtde == 0 ) {

    $clientesTmp = [
        new ClienteFisico( 'Daniel', '999999999-99', 'Rua das flores', 35, 'Serra negra', 'SP', 5 ),
        new ClienteFisico( 'Kamile', '999999999-99', 'Rua das flores', 25, 'São Paulo', 'SP', 4 ),
        new ClienteFisico( 'Tatiane', '999999999-99', 'Rua das flores', 84, 'São Paulo', 'SP', 5 ),
        new ClienteJuridico( 'TMW E-commerce', '999999999-99', 'Rua das flores', 37, 'Serra negra', 'SP', 5 ),
        new ClienteJuridico( 'Google', '999999999-99', 'Rua das flores', 88, 'Serra negra', 'SP', 4 ),
        new ClienteJuridico( 'Microsoft', '999999999-99', 'Rua das flores', 99, 'São Paulo', 'SP', 2 ),
        new ClienteFisico( 'Antony', '999999999-99', 'Rua das flores', 1, 'Serra negra', 'SP' ),
        new ClienteFisico( 'João', '999999999-99', 'Rua das flores', 10, 'São Paulo', 'SP', 3 ),
        new ClienteJuridico( 'Code Education', '999999999-99', 'Rua das flores', 15, 'Serra negra', 'SP' ),
        new ClienteFisico( 'José', '999999999-99', 'Rua das flores', 30, 'Serra negra', 'SP' )
    ];

    $bdRecord = new \Clientes\BD\BDRecord( $pdo );
    foreach ( $clientesTmp as $cliente )
        $bdRecord->persist( $cliente )->flush();
}

$query = $pdo->query( "SELECT * FROM clientes ORDER BY id {$ordecacaoAsc}" );
$clientes = $query->fetchAll( PDO::FETCH_ASSOC );

// Detalhes do cliente?
if ( is_numeric( $clientId ) && $clientId > 0 ) {
    foreach ( $clientes as $cliente )
        if ( $cliente[ 'id' ] == $clientId )
            break;

    $pessoa = ( $cliente[ 'pessoa' ] == 'J' ) ? 'Jurídica' : 'Física';
    ?>
    <p>
        <strong>ID:</strong> <?= $clientId ?><br>
        <strong>Pessoa:</strong> <?= $pessoa ?><br>
        <strong>Nome:</strong> <?= $cliente[ 'nome' ] ?><br>
        <strong>CPF:</strong> <?= $cliente[ 'cpf' ] ?><br>
        <strong>Endereço:</strong>
        <?= $cliente[ 'rua' ] ?>, <?= $cliente[ 'numero' ] ?> -
        <?= $cliente[ 'cidade' ] ?>/<?= $cliente[ 'uf' ] ?><br>
        <strong>Grau de Importância:</strong> <?= $cliente[ 'hit' ] ?>
    </p>
    <hr>
    <?php
}

?>
<table cellpadding="5" cellspacing="1" border="1">
    <tr>
        <td><a href="?ordem=<?= ( $ordecacaoAsc == 'ASC' ) ? 'DESC' : 'ASC' ?>"><strong>ID</strong></a></td>
        <td><strong>Pessoa</strong></td>
        <td><strong>Nome</strong></td>
    </tr>
    <?php
    foreach ( $clientes as $cliente ) {
        $pessoa = ( $cliente[ 'pessoa' ] == 'J' ) ? 'Jurídica' : 'Física';
        ?>
        <tr class="cliente">
            <td><strong><?= $cliente[ 'id' ] ?></strong></td>
            <td><?= $pessoa ?></td>
            <td>
                <a href="?clientId=<?= $cliente[ 'id' ] ?>&ordem=<?= $ordecacaoAsc ?>"><?= $cliente[ 'nome' ] ?></a>
            </td>
        </tr>
        <?php
    }
    ?>
</table>
