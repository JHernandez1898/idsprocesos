<?php 
//date_default_timezone_set('America/Mexico_City');

// function conectar(){
//	  $strHost ="localhost";
 // $strUsuario = "root";
//  $strClave = "123";
 // $strBaseDeDatos = "idsaereo";
 // $idCone = mysqli_connect ($strHost, $strUsuario, $strClave,$strBaseDeDatos) or
  //         die ("Error conectando al servidor $host con el
   //              nombre de usuario $usuario");

 // return $idCone;
 //}
 
 function conectarIDS(){
$serverName = "localhost"; //serverName\instanceName
$connectionInfo = array( "Database"=>"Aduana", "UID"=>"masterIDS", "PWD"=>"masterIDS");
$conn = sqlsrv_connect($serverName, $connectionInfo) ;

if( $conn ) {
     echo "Conectado Satisfactoriamente al Servidor IDS.........<br />";
}else{
     echo "Conexión no se pudo establecer.<br />";
     die( print_r( sqlsrv_errors(), true));
	 
}

  return $conn;
	 
 }
?>