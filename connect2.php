<?php

$fuente = '
$CODEUR = "EUR";
$CODUSD = "USD";
$CODUSDWALLET = "WALLET";
$usuarioBD = "sa";
$contrasenaBD = "Ec14312183.-";
//$nombreBaseDeDatos = "[VAD10_PRUEBAS]";
$nombreBaseDeDatos = "[VAD10_PRUEBAS]";
# Puede ser 127.0.0.1 o el nombre de tu equipo; o la IP de un servidor remoto
$rutaServidor = "192.168.23.7";

try {
    $base_de_datos = new PDO("sqlsrv:server=$rutaServidor;database=$nombreBaseDeDatos", $usuarioBD, $contrasenaBD);
    $base_de_datos->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    } catch (Exception $e) {
    echo "Ocurrió un error con la base de datos: " . $e->getMessage();

}
echo "Conectado";

';
echo base64_encode ($fuente);
echo eval("eval(base64_decode('DQokQ09ERVVSID0gIkVVUiI7DQokQ09EVVNEID0gIlVTRCI7DQokdXN1YXJpb0JEID0gInNhIjsNCiRjb250cmFzZW5hQkQgPSAiIjsNCi8vJG5vbWJyZUJhc2VEZURhdG9zID0gIlBPU19MT0NBTCI7DQokbm9tYnJlQmFzZURlRGF0b3MgPSAiIjsNCiMgUHVlZGUgc2VyIDEyNy4wLjAuMSBvIGVsIG5vbWJyZSBkZSB0dSBlcXVpcG87IG8gbGEgSVAgZGUgdW4gc2Vydmlkb3IgcmVtb3RvDQokcnV0YVNlcnZpZG9yID0gIkRFU0tUT1AtSE5HNDM3UVxURVNUIjsNCnRyeSB7DQogICAgJGJhc2VfZGVfZGF0b3MgPSBuZXcgUERPKCJzcWxzcnY6c2VydmVyPSRydXRhU2Vydmlkb3I7ZGF0YWJhc2U9JG5vbWJyZUJhc2VEZURhdG9zIiwgJHVzdWFyaW9CRCwgJGNvbnRyYXNlbmFCRCk7DQogICAgJGJhc2VfZGVfZGF0b3MtPnNldEF0dHJpYnV0ZShQRE86OkFUVFJfRVJSTU9ERSwgUERPOjpFUlJNT0RFX0VYQ0VQVElPTik7DQogICAgDQogICAgfSBjYXRjaCAoRXhjZXB0aW9uICRlKSB7DQogICAgZWNobyAiT2N1cnJpw7MgdW4gZXJyb3IgY29uIGxhIGJhc2UgZGUgZGF0b3M6ICIgLiAkZS0+Z2V0TWVzc2FnZSgpOw0KDQp9DQplY2hvICJDb25lY3RhZG8iOw0KDQo=
'))");

?>