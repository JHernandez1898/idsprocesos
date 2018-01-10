<?php 
include("Template.php");
require("conect.php");
$idCone=  conectar();
$ref =  $_GET["ref"];
if($_POST){
$uno = strtotime($_POST["uno"]);
$iuno  =  $_POST["iuno"];
$dos =  strtotime($_POST["dos"]);
$idos =  $_POST["idos"];
$tres =  strtotime($_POST["tres"]);
$itres = $_POST["itres"];
$sql = "INSERT INTO pasocinco VALUES('$ref','$uno','$iuno','$dos','$idos','$tres','$itres')";
$update = "UPDATE referencias SET paso = '6' WHERE(REF like '$ref') ";
$queryu = mysqli_query($idCone,$update);
$query =  mysqli_query($idCone,$sql);
if($query&&$queryu){
	header("Location: paso6.php?ref=$ref");
}else{
	echo mysqli_error($idCone);
}
	
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
	<div class="row">
   	  <h1 class="page-header" style="text-align:center">Trafico</h1>
    </div>
    <div class="row">
    <article class="col-lg-12">
    <form accept-charset="iso-8859-7" action="#" method="post">
      <table width="591" class="table table-striped table-bordered" border="1">
        <tbody>
          <tr>
            <th scope="col">CRITERIOS DE ACEPTACIÓN</th>
            <th scope="col"><p>ACEPTACION</p></th>
            <th scope="col">INICIALES</th>
          </tr>
          <tr>
            <td><span class="alert-info text-info" style="text-align:left">* Verificar fraccion arancelaria de la mercancia y sus requisistos<br>
            * Documentar Factura</span></td>
            <td><p>
              <label for="datetime-local">Fecha y Hora:</label>
              <input type="datetime-local" name="uno" id="datetime-local">
            </p></td>
            <td><input type="text" class="input-sm" name="iuno" required></td>
          </tr>
          <tr>
            <td><span class="alert-info text-info" style="text-align:left">* Elaborar nota de remisison y cotización<br>
* Verificar requisistos de importación</span></td>
            <td><label for="datetime-local2">Fecha y Hora:</label>
              <input type="datetime-local" name="dos" id="datetime-local2"></td>
            <td><input type="text" class="input-sm" name="idos" required></td>
          </tr>
          <tr>
            <td><span class="alert-info text-info" style="text-align:left">*Enviar al cliente para que depositen impuestos y gastos<br>
              * Solicitar equipo de tranporte<br>
            </span></td>
            <td><p>
              <label for="datetime-local5">Fecha y Hora:</label>
              <input type="datetime-local" name="tres" id="datetime-local5">
            </p></td>
            <td><input type="text" class="input-sm" name="itres" required></td>
          </tr>
        </tbody>
      </table>
      
      <p><input type="submit" class="btn btn-sm btn-success" value="Continuar"></p>
    </form>
    </article>
    </div>
  <div class="row"></div>
</div>
</body>
</html>