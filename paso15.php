<?php 
include("Template.php");
require("conect.php");
$idCone=  conectar();
$ref =  $_GET["ref"];
if($_POST){
$fechaini  =strtotime($_POST["fechaini"]);
$horain =$_POST["horaini"];
$fechafin  =strtotime($_POST["fechafin"]);
$horafin  =$_POST["horafin"];
$iniciales  =$_POST["iniciales"];
$sql = "INSERT INTO pasouno VALUES('$fechaini','$fechafin','$horain','$horafin','$iniciales','$ref')";
$update = "UPDATE referencias SET paso = '2' WHERE(REF like '$ref') ";
$queryu = mysqli_query($idCone,$update);
$query =  mysqli_query($idCone,$sql);
if($query&&$queryu){
	header("Location: paso2.php?ref=$ref");
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
   	  <h1 class="page-header" style="text-align:center">Facturacion de cuenta de gastos americana</h1>
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
            <td><p><span class="alert-info text-info" style="text-align:left">*Revisar indicaciones y comprobantes para facturar<br>
              *Verificar tarifas vigentes para facturación.<br>
              *Revisar que el expediente este completo para su entrega NLDO.
            </span></p></td>
            <td><p>
              <label for="datetime-local">Fecha y Hora:</label>
              <input type="datetime-local" name="datetime-local" id="datetime-local">
            </p></td>
            <td><input type="text" class="input-sm" name="iniciales" required></td>
          </tr>
        </tbody>
      </table>
      
      <p><input type="submit" class="btn btn-sm btn-success" value="Continuar"></p>
    </form>
    </article>
  </div>
  <div class="row"></div>
</div>