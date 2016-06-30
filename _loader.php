<?php
header( 'Content-type: text/html; charset=utf-8' );

define( 'CLASS_DIR', 'src' . DIRECTORY_SEPARATOR );
set_include_path( get_include_path() . DIRECTORY_SEPARATOR . CLASS_DIR );
spl_autoload_register( function ( $className ) {
    $path = str_replace( '\\', DIRECTORY_SEPARATOR, $className );
    $file = CLASS_DIR . $path . '.php';
    if ( is_file( $file ) )
        require_once( $file );
    else
        die( "Não foi possivel abrir a classe {$className}. Arquivo não encontrado: {$file}" );
} );