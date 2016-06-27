<?php
header( 'Content-type: text/html; charset=utf-8' );

// Configs
$ordecacaoAsc = filter_input( INPUT_GET, 'ordem' ) === 'asc';
$clientId = filter_input( INPUT_GET, 'clientId' );

require_once 'Cliente.php';

$clientes = [
    new Cliente( 'Daniel', '999999999-99', 'Rua das flores', 35, 'Serra negra', 'SP' ),
    new Cliente( 'Kamile', '999999999-99', 'Rua das flores', 25, 'São Paulo', 'SP' ),
    new Cliente( 'Tatiane', '999999999-99', 'Rua das flores', 84, 'São Paulo', 'SP' ),
    new Cliente( 'Alini', '999999999-99', 'Rua das flores', 37, 'Serra negra', 'SP' ),
    new Cliente( 'Tony', '999999999-99', 'Rua das flores', 88, 'Serra negra', 'SP' ),
    new Cliente( 'Tassia', '999999999-99', 'Rua das flores', 99, 'São Paulo', 'SP' ),
    new Cliente( 'Antony', '999999999-99', 'Rua das flores', 1, 'Serra negra', 'SP' ),
    new Cliente( 'João', '999999999-99', 'Rua das flores', 10, 'São Paulo', 'SP' ),
    new Cliente( 'Maria', '999999999-99', 'Rua das flores', 15, 'Serra negra', 'SP' ),
    new Cliente( 'José', '999999999-99', 'Rua das flores', 30, 'Serra negra', 'SP' )
];

// Detalhes do cliente?
if ( is_numeric( $clientId ) && $clientId >= 0 && $clientId < count( $clientes ) ) {
    $cliente = $clientes[ $clientId ];
    ?>
    <p>
        <strong>ID:</strong> <?= $clientId ?><br>
        <strong>Nome:</strong> <?= $cliente->nome ?><br>
        <strong>CPF:</strong> <?= $cliente->cpf ?><br>
        <strong>Endereço:</strong>
        <?= $cliente->logradouro ?>, <?= $cliente->numero ?> - <?= $cliente->cidade ?>/<?= $cliente->uf ?><hr>
    </p>
    <?php
}

if ( ! $ordecacaoAsc )
    krsort( $clientes )

?>
<table>
    <tr>
        <td><a href="?ordem=<?= $ordecacaoAsc ? 'desc' : 'asc' ?>"><strong>ID</strong></a></td>
        <td><strong>Nome</strong></td>
    </tr>
    <?php
    foreach ( $clientes as $index => $cliente ) {
        ?>
        <tr class="cliente">
            <td><strong><?= $index ?></strong></td>
            <td><a href="?clientId=<?= $index ?>&ordem=<?= $ordecacaoAsc ? 'asc' : 'desc' ?>"><?= $cliente->nome ?></a>
            </td>
        </tr>
        <?php
    }
    ?>
</table>
