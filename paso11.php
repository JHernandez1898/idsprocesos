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
   	  <h1 class="page-header" style="text-align:center">Preparar documentos de importación</h1>
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
            <td><span class="alert-info text-info" style="text-align:left">*Elaborar EEI, relacion de carga y orden de remisión.</span></td>
            <td><p>
              <label for="datetime-local">Fecha y Hora:</label>
              <input type="datetime-local" name="datetime-local" id="datetime-local">
            </p></td>
            <td><input type="text" class="input-sm" name="iniciales" required></td>
          </tr>
          <tr>
            <td><span class="alert-info text-info" style="text-align:left">*Integrar al expediente losdocumentos (EEI y orden de remision) comprobantes y las indicaciones para su facturación.</span></td>
            <td><p>
              <label for="datetime-local2">Fecha y Hora:</label>
              <input type="datetime-local" name="datetime-local2" id="datetime-local2">
            </p></td>
            <td><input type="text" class="input-sm" name="iniciales2" required></td>
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