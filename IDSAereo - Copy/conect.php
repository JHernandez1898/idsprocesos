<?php 
date_default_timezone_set('America/Mexico_City');

 function conectar(){
	  $strHost ="localhost";
  $strUsuario = "root";
  $strClave = "123";
  $strBaseDeDatos = "idsaereo";
  $idCone = mysqli_connect ($strHost, $strUsuario, $strClave,$strBaseDeDatos) or
           die ("Error conectando al servidor $host con el
                 nombre de usuario $usuario");

  return $idCone;
 }
 
 function conectarIDS(){
  $serverName = "70.124.112.243"; //serverName\instanceName
$connectionInfo = array( "Database"=>"Aduana", "UID"=>"masterIDS", "PWD"=>"masterIDS");
$conn = sqlsrv_connect($serverName, $connectionInfo) ;

if( $conn ) {
     echo "";
}else{
     echo "Conexión no se pudo establecer.<br />";
     die( print_r( sqlsrv_errors(), true));
	 
}

  return $conn;
	 
 }
?>