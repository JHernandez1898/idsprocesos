<?php 
include("Template.php");
require("conect.php");
$idCone=  conectar();
$ref =  $_GET["ref"];

if($_POST){
$fechauno  = $_POST["uno"];
$inicialesuno =  $_POST["inicialesuno"];
$fecnumuno =  strtotime($fechauno);
$sql = "INSERT INTO pasocinco VALUES('$inicialesuno','$ref','$fecnumuno')";
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
   	  <h1 class="page-header" style="text-align:center">
        	Captura de EEI
      </h1>
    </div>
    <div class="row">
    <div class="row">
   	  <h4 class="alert-dismissible" style="text-align:center">
        	Responsable: Gerente/Ejecutivo de Tráfico
      </h4>
    </div>
    <div class="row">
    <article class="col-lg-12">
    <form  action="#" method="post">
      <table width="591" class="table table-striped table-bordered" border="1">
        <tbody>
          <tr>
            <th scope="col"><p>ACEPTACION</p></th>
            <th scope="col">INICIALES</th>
          </tr>
          <tr>
            <td><p>
              <label for="datetime">Fecha y Hora:</label>
              <input type="datetime-local" value="<?php echo date('Y-d-m\TH:i');?>"  name="uno" class="input-sm" required>
            </p></td>
            <td>
            <select  class="input-sm" name="inicialesuno" required>
            <?php 
			$queryx = mysqli_query($idCone,"SELECT * FROM iniciales");
			while($F =  mysqli_fetch_array($queryx)){
			
			?>
            <option value="<?php echo $F["INICIALES"] ?>"><?php echo $F["INICIALES"] ?></option>            <?php }
			?>
            </select></td>
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