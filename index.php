<?php
header( 'Content-type: text/html; charset=utf-8' );

// Configs
$ordecacaoAsc = filter_input( INPUT_GET, 'ordem' ) === 'asc';
$clientId = filter_input( INPUT_GET, 'clientId' );

require_once 'Empresa.php';
require_once 'Cliente.php';
require_once 'ClienteFisico.php';
require_once 'ClienteJuridico.php';

$clientes = [
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

// Detalhes do cliente?
if ( is_numeric( $clientId ) && $clientId >= 0 && $clientId < count( $clientes ) ) {
    $cliente = $clientes[ $clientId ];
    $pessoa = ( $cliente instanceof ClienteJuridico ) ? 'Jurídica' : 'Física';
    ?>
    <p>
        <strong>ID:</strong> <?= $clientId ?><br>
        <strong>Pessoa:</strong> <?= $pessoa ?><br>
        <strong>Nome:</strong> <?= $cliente->getNome() ?><br>
        <strong>CPF:</strong> <?= $cliente->getCpf() ?><br>
        <strong>Endereço:</strong>
        <?= $cliente->getLogradouro() ?>, <?= $cliente->getNumero() ?> - <?= $cliente->getCidade() ?>/<?= $cliente->getUf() ?><br>
        <strong>Grau de Importância:</strong><?= $cliente->getImportancia() ?>
    <hr>
    </p>
    <?php
}

if ( ! $ordecacaoAsc )
    krsort( $clientes )

?>
<table cellpadding="5" cellspacing="1" border="1">
    <tr>
        <td><a href="?ordem=<?= $ordecacaoAsc ? 'desc' : 'asc' ?>"><strong>ID</strong></a></td>
        <td><strong>Pessoa</strong></td>
        <td><strong>Nome</strong></td>
    </tr>
    <?php
    foreach ( $clientes as $index => $cliente ) {
        $pessoa = ( $cliente instanceof ClienteJuridico ) ? 'Jurídica' : 'Física';
        ?>
        <tr class="cliente">
            <td><strong><?= $index ?></strong></td>
            <td><?= $pessoa ?></td>
            <td><a href="?clientId=<?= $index ?>&ordem=<?= $ordecacaoAsc ? 'asc' : 'desc' ?>"><?= $cliente->getNome() ?></a>
            </td>
        </tr>
        <?php
    }
    ?>
</table>
