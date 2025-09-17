<?php
include('connect.php');
include('connect_Farma.php');
include('funciones.php');

$ch = curl_init();

$arrContextOptions=array(
    "ssl"=>array(
       "verify_peer"=>false,
       "verify_peer_name"=>false,
    ),
); 
###################################################
$pagina = file_get_contents("https://www.bcv.org.ve/", false, stream_context_create($arrContextOptions));
$datos = htmlentities(strip_tags(urldecode($pagina)));
########## Actualiza valor del DOLAR #######
$valorNativo =  strstr($datos, 'USD');
$USD= str_replace(',','.',substr($valorNativo, 3,70) ) ;
$USD = floatval($USD) * 1;
  
 
  
   actualiza_TasaTablaMaestra(number_format($USD,2,".",""),$CODUSD);
   actualiza_TasaTablaMaestra_farmacia(number_format($USD,2,".",""),$CODUSD);
   
   ###################### ACTIVAR SOLO CUANDO NO SE DETECTE EL TRIGGER DE ACTUALIZACION 
   actualizar_historico(number_format($USD,2,".",""),$CODUSD);
   actualizar_historico_farmacia(number_format($USD,2,".",""),$CODUSD);

######################################################################################
########## Actualiza valor del EURO #######
 $valorNativo2 =  strstr($datos, 'EUR');
 $EUR= str_replace(',','.',substr($valorNativo2, 3,70) ) ;
 $EUR =  floatval($EUR) * 1;

 #######  Actualizando Tablas 
   actualiza_TasaTablaMaestra(number_format($EUR,2,".",""),$CODEUR);
   actualiza_TasaTablaMaestra_farmacia(number_format($EUR,2,".",""),$CODEUR);
   ###################### ACTIVAR SOLO CUANDO NO SE DETECTE EL TRIGGER DE ACTUALIZACION  
   actualizar_historico(number_format($EUR,2,".",""),$CODEUR);
   actualizar_historico_farmacia(number_format($EUR,2,".",""),$CODEUR);
   ######################################################################################

########## Actualiza valor del WALLET #######
######################################################################################
  
   actualiza_TasaTablaMaestra(number_format($USD,2,".",""),$CODUSDWALLET);
   actualiza_TasaTablaMaestra_farmacia(number_format($USD,2,".",""),$CODUSDWALLET);   
   ###################### ACTIVAR SOLO CUANDO NO SE DETECTE EL TRIGGER DE ACTUALIZACION 
   actualizar_historico(number_format($USD,2,".",""),$CODUSDWALLET);
   actualizar_historico_farmacia(number_format($USD,2,".",""),$CODUSDWALLET);
   
if($USD > 0 && $EUR > 0)
{	   
   actualizar_tr_pend($CODUSD,$CODEUR,$CODUSDWALLET);
   actualizar_tr_pend_farmacia($CODUSD,$CODEUR,$CODUSDWALLET);
}
?>