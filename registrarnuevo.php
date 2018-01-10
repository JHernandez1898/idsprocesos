<?php 
require("conect.php");
include("Template.php");
$idCone =  conectar();
$cliente = $_POST["cliente"];
$nref = $_POST["ref"];
$embarque = $_POST["embarque"];
$pedimento = $_POST["pedimento"];
$fecha = $_POST["fecha"];
$fecnum =  strtotime($fecha);
$hora = $_POST["hora"];
$subdivisiones = $_POST["subdivisiones"];

$sql =  "SELECT MAX(REF) as MREF FROM referencias";
$query  =  mysqli_query($idCone,$sql);
$ref;
if($F =  mysqli_fetch_array($query)){
	$ref = $F["MREF"] + 1;
}

$sql  ="INSERT INTO referencias VALUES('$ref','$cliente','$nref','$embarque','$pedimento','$subdivisiones','$fecnum','$hora','1')";
$query = mysqli_query($idCone,$sql);
if($query){
	header("Location: index.php");
}
else{
	echo mysqli_error($idCone);
}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
<link href="Recursos/css/bootstrap.css" rel="stylesheet" type="text/css">
</head>

<body>
<div class="container">
	<div class ="row">
		<h1 class="page-header">
        Registro
        </h1>
	</div>
</div>
</body>
</html>
