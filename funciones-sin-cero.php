<?php
/*Listado de funciones */
############### Actualiza Moneda ####

############# actualiza datos cliente en pedido despues de la sesion ########
function actualiza_TasaTablaMaestra($valor,$codMoneda){
   include "connect.php";


	if($valor > 0)
	{
		$sentencia = $base_de_datos->prepare("
		update [[VAD10_PRUEBAS]].[dbo].[MA_MONEDAS]
		set [n_factor] = '$valor'
		where c_codmoneda = '$codMoneda'
		");
		 $resultado = $sentencia->execute(); # Pasar en el mismo orden de los ?
				if ($resultado === true) {
					echo "Valor de $codMoneda es de $valor actualizado en tabla <br>";
				} else {
					echo "Algo salió mal. Por favor verifica que la tabla exista, así como el ID del usuario";
				}
	}
}

function actualizar_tr_pend($codMoneda1,$codMoneda2){
    include "connect.php";
	
    $sentencia = $base_de_datos->prepare("
    
insert into [[VAD10_PRUEBAS]].[dbo].[TR_PEND_MONEDAS]
sELECT [c_codmoneda]
    ,[c_descripcion]
    ,[n_factor]
    ,[b_preferencia]
    ,[c_observacio]
    ,[b_activa]
    ,[c_simbolo]
    ,[n_decimales]
    ,''
    ,[bUsoEnPOS]
    ,[CodigoISO]
    ,[n_Porc_IGTF]
    ,[c_Modalidad_IGTF]
FROM [192.168.23.7].[[VAD10_PRUEBAS]].[dbo].[MA_MONEDAS] where c_codmoneda in ('$codMoneda1','$codMoneda2')
    ");
     $resultado = $sentencia->execute(); # Pasar en el mismo orden de los ?
            if ($resultado === true) {
                echo "Valor de $codMoneda1 y $codMoneda2 creados en TR_PEND_MONEDA <br>";
            } else {
                echo "Algo salió mal. Por favor verifica que la tabla exista, así como el ID del usuario";
            }

}


function actualizar_historico($valor,$codMoneda){
    include "connect.php";

    if($valor > 0 )
	{
		$sentencia = $base_de_datos->prepare("
		insert into [[VAD10_PRUEBAS]].[dbo].[MA_HISTORICO_MONEDAS]
		SELECT TOP (1) 
		  [d_FechaCambioActual] 
		  ,getdate()
		  ,[c_CodMoneda]
		  ,[c_Descripcion]
		  ,[n_FactorPeriodo]
		  ,'$valor'
		  ,[b_Preferencia]
		  ,[c_Observacio]
		  ,[b_Activa]
		  ,[c_Simbolo]
		  ,[n_Decimales]
		  ,[FechaInsert]
		  ,[Host_Name]
		  ,[TxtPlus1]
		  ,[TxtPlus2]
		  ,[c_CodUsuario]
	  FROM [192.168.23.7].[[VAD10_PRUEBAS]].[dbo].[MA_HISTORICO_MONEDAS]
	  where c_CodMoneda = '$codMoneda'
	  order by d_FechaCambioActual desc");
	  
	}else{
		
		$sentencia = $base_de_datos->prepare("
		insert into [VAD10_PRUEBAS].[dbo].[MA_HISTORICO_MONEDAS]
		SELECT TOP (1) 
		  [d_FechaCambioActual] 
		  ,getdate()
		  ,[c_CodMoneda]
		  ,[c_Descripcion]
		  ,[n_FactorPeriodo]
		  ,(SELECT TOP 1 n_factor FROM [[VAD10_PRUEBAS]].[dbo].MA_MONEDAS where c_codmoneda = '$codMoneda')
		  ,[b_Preferencia]
		  ,[c_Observacio]
		  ,[b_Activa]
		  ,[c_Simbolo]
		  ,[n_Decimales]
		  ,[FechaInsert]
		  ,[Host_Name]
		  ,[TxtPlus1]
		  ,[TxtPlus2]
		  ,[c_CodUsuario]
	  FROM [192.168.23.7].[[VAD10_PRUEBAS]].[dbo].[MA_HISTORICO_MONEDAS]
	  where c_CodMoneda = '$codMoneda'
	  order by d_FechaCambioActual desc");		
		
	}
	 
	 
	 
     $resultado = $sentencia->execute(); # Pasar en el mismo orden de los ?
            if ($resultado === true) {
                echo "HISTORICO DE MONEDAS Creado <br>";
            } else {
                echo "Algo salió mal. Por favor verifica que la tabla exista, así como el ID del usuario";
            }

}

/////////////////// /////////////////// /////////////////// /////
/////////////////// FARMACIA ///////////////////////////////////
/////////////////// /////////////////// /////////////////// ////

function actualiza_TasaTablaMaestra_farmacia($valor,$codMoneda){
    include "connect_Farma.php";

	if($valor > 0)
	{
		$sentencia = $base_de_datos->prepare("
		update [VAD10_PRUEBAS_F].[dbo].[MA_MONEDAS]
		set [n_factor] = '$valor'
		where c_codmoneda = '$codMoneda'
		");
		 $resultado = $sentencia->execute(); # Pasar en el mismo orden de los ?
				if ($resultado === true) {
					echo "Valor de $codMoneda es de $valor actualizado en tabla <br>";
				} else {
					echo "Algo salió mal. Por favor verifica que la tabla [MA_MONEDAS] FARMACIA exista, así como el ID del usuario";
				}
	}
}


function actualizar_tr_pend_farmacia($codMoneda1,$codMoneda2){
    include "connect_Farma.php";
	
    $sentencia = $base_de_datos->prepare("
    
insert into [DCBAHIA\BAHIA].[VAD10_PRUEBAS_F].[dbo].[TR_PEND_MONEDAS]
SELECT [c_codmoneda]
    ,[c_descripcion]
    ,[n_factor]
    ,[b_preferencia]
    ,[c_observacio]
    ,[b_activa]
    ,[c_simbolo]
    ,[n_decimales]
    ,''
    ,[bUsoEnPOS]
    ,[CodigoISO]
    ,[n_Porc_IGTF]
    ,[c_Modalidad_IGTF]
FROM [DCBAHIA\BAHIA].[VAD10_PRUEBAS_F].[dbo].[MA_MONEDAS] where c_codmoneda in ('$codMoneda1','$codMoneda2')
    ");
     $resultado = $sentencia->execute(); # Pasar en el mismo orden de los ?
            if ($resultado === true) {
                echo "Valor de $codMoneda1 y $codMoneda2 creados en TR_PEND_MONEDA FARMACIA <br>";
            } else {
                echo "Algo salió mal. Por favor verifica que la tabla [TR_PEND_MONEDAS] exista, así como el ID del usuario";
            }

}


function actualizar_historico_farmacia($valor,$codMoneda){
    include "connect_Farma.php";


    if($valor > 0 )
	{
		$sentencia = $base_de_datos->prepare("
		insert into [DCBAHIA\BAHIA].[VAD10_PRUEBAS_F].[dbo].[MA_HISTORICO_MONEDAS]
		  SELECT TOP (1) 
		  [d_FechaCambioActual] 
		  ,getdate()
		  ,[c_CodMoneda]
		  ,[c_Descripcion]
		  ,[n_FactorPeriodo]
		  ,'$valor'
		  ,[b_Preferencia]
		  ,[c_Observacio]
		  ,[b_Activa]
		  ,[c_Simbolo]
		  ,[n_Decimales]
		  ,[FechaInsert]
		  ,[Host_Name]
		  ,[TxtPlus1]
		  ,[TxtPlus2]
		  ,[c_CodUsuario]
		FROM [DCBAHIA\BAHIA].[VAD10_PRUEBAS_F].[dbo].[MA_HISTORICO_MONEDAS]
		where c_CodMoneda = '$codMoneda'
		order by d_FechaCambioActual desc   ");
	}else{

		$sentencia = $base_de_datos->prepare("
		insert into [DCBAHIA\BAHIA].[VAD10_PRUEBAS_F].[dbo].[MA_HISTORICO_MONEDAS]
		  SELECT TOP (1) 
		  [d_FechaCambioActual] 
		  ,getdate()
		  ,[c_CodMoneda]
		  ,[c_Descripcion]
		  ,[n_FactorPeriodo]
		  ,(SELECT TOP 1 n_factor FROM [DCBAHIA\BAHIA].[VAD10_PRUEBAS_F].[dbo].[MA_MONEDAS] where c_codmoneda = '$codMoneda')
		  ,[b_Preferencia]
		  ,[c_Observacio]
		  ,[b_Activa]
		  ,[c_Simbolo]
		  ,[n_Decimales]
		  ,[FechaInsert]
		  ,[Host_Name]
		  ,[TxtPlus1]
		  ,[TxtPlus2]
		  ,[c_CodUsuario]
		FROM [DCBAHIA\BAHIA].[VAD10_PRUEBAS_F].[dbo].[MA_HISTORICO_MONEDAS]
		where c_CodMoneda = '$codMoneda'
		order by d_FechaCambioActual desc  ");

		
	}
     $resultado = $sentencia->execute(); # Pasar en el mismo orden de los ?
            if ($resultado === true) {
                echo "HISTORICO DE MONEDAS Creado FARMACIA <br>";
            } else {
                echo "Algo salió mal. Por favor verifica que la tabla [MA_HISTORICO_MONEDAS] exista, así como el ID del usuario";
            }

}

?>