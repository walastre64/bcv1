<?php


$CODEUR = 'EUR';
$CODUSD = 'USD';
$CODUSDWALLET = 'WALLET';

$usuarioBD = "sa";
$contrasenaBD = "";
//$nombreBaseDeDatos = "VAD10";
$nombreBaseDeDatos = "VAD10_PRUEBAS_F";
# Puede ser 127.0.0.1 o el nombre de tu equipo; o la IP de un servidor remoto
$rutaServidor = "DCBAHIA\BAHIA";
try {
    $base_de_datos = new PDO("sqlsrv:server=$rutaServidor;database=$nombreBaseDeDatos;TrustServerCertificate=true", $usuarioBD, $contrasenaBD);
    $base_de_datos->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    } catch (Exception $e) {
    echo "Ocurrió un error con la base de datos: " . $e->getMessage();
}

////////////////////////////////////////////////////////////////////////////

?>
