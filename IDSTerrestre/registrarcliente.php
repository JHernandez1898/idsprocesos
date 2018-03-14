<?php 
require("conect.php");
include("Template.php");
$idCone =  conectar();
$sqlid  = "SELECT MAX(id) as mid from clientes";
$queryid = mysqli_query($idCone,$sqlid);
$id;
if($G =  mysqli_fetch_array($queryid)){
	$id = $G["mid"] + 1;
}
$nombre = $_POST["nombre"];
$sql  ="INSERT INTO clientes VALUES('$id','$nombre')";
$query = mysqli_query($idCone,$sql);
if($query){
	header("Location: nuevo.php");
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
        Registro de clientes
        </h1>
	</div>
</div>
</body>
</html>