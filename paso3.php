<?php 
include("Template.php");
require("conect.php");
$idCone=  conectar();
$ref =  $_GET["ref"];

if($_POST){
$uno  = $_POST["uno"];
$uno =  strtotime($uno);
$iniuno  = $_POST["iniuno"];
$dos = $_POST["dos"];
$dos =strtotime($dos);
$inidos = $_POST["inidos"];
$sql = "INSERT INTO pasotres VALUES('$ref','$uno','$iniuno','$dos','$inidos')";
$update = "UPDATE referencias SET paso = '4' WHERE(REF like '$ref') ";
$queryu = mysqli_query($idCone,$update);
$query =  mysqli_query($idCone,$sql);
if($query&&$queryu){
	header("Location: paso4.php?ref=$ref");
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
            <td><span class="alert-info text-info" style="text-align:left">*Verificar con cliente la mercancia a importar.</span></td>
            <td><p>
              <label for="datetime-local">Fecha y Hora:</label>
              <input type="datetime-local" name="uno" id="datetime-local">
            </p></td>
            <td><input type="text" class="input-sm" name="iniuno" required></td>
          </tr>
          <tr>
            <td><span class="alert-info text-info" style="text-align:left">*Revisar que las facturas y documentos del embarque entes completos y correctos.</span></td>
            <td><p>
              <label for="datetime-local2">Fecha y Hora:</label>
              <input type="datetime-local" name="dos" id="datetime-local2">
            </p></td>
            <td><input type="text" class="input-sm" name="inidos" required></td>
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