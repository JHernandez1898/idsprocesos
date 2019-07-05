<?php 
include("Template.php");
require("conect.php");
$idCone=  conectar();
$ref =  $_GET["ref"];
$pasodos =  mysqli_query($idCone,"SELECT * FROM pasodos WHERE REF LIKE '$ref'");
if($_POST){
$fecha =  $_POST["uno"];
$inicial = $_POST["iniciales"];
$fecnum =  strtotime($fecha);
$sql = "UPDATE pasodos SET FEC = '$fecnum',INICIAL = '$inicial' WHERE (REF LIKE '$ref')";
$query =  mysqli_query($idCone,$sql);
if($query){
	header("Location: seguir.php?ref=$ref");
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
   	  <h1 class="page-header" style="text-align:center">Revisión (Proceso...#2) </h1>
    </div>
    <div class="row">
   	  <h4 class=" alert-dismissible" style="text-align:center">Responsable: Revisador</h4>
    </div>
    <div class="row">
    <article class="col-lg-12">
    <form accept-charset="iso-8859-7" action="#" method="post">
    <?php if($M = mysqli_fetch_array($pasodos)){ ?>
      <table width="591" class="table table-striped table-bordered" border="1">
        <tbody>
          <tr>
            <th scope="col">CRITERIOS DE ACEPTACIÓN</th>
            <th scope="col"><p>ACEPTACION</p></th>
            <th scope="col">INICIALES</th>
          </tr>
          <tr>
            <td><p><span class="alert-info text-info" style="text-align:left">*Revisar fisicamente que las cartidades y caracteristicas de la mercancia coincida con las factueas o listas de empaques (en caso de daños,faltantes o sobrantes, elaborar reporte de discrepancias).</span></p>
              <p><span class="alert-info text-info" style="text-align:left">*Verificar la informacion de las facturas (pesos, origine,series, etc).</span></p></td>
            <td><p>
              <label for="datetime-local">Fecha y Hora:</label>
              <input type="datetime-local" name="uno" value = "<?php echo date('Y-m-d\TH:i',$M["FEC"])?>" id="datetime-local">
            </p></td>
            <td>
            <select  class="input-sm" value =<?php echo $M["INICIAL"]?> name="iniciales" required>
            <?php 
			$queryx = mysqli_query($idCone,"SELECT * FROM iniciales");
			while($F =  mysqli_fetch_array($queryx)){
			
			?>
            <option value="<?php echo $F["INICIALES"] ?>"><?php echo $F["INICIALES"] ?></option>            <?php }
			?>
            <option  selected value="<?php echo $M["INICIAL"] ?>"><?php echo $M["INICIAL"] ?></option>
            </select></td>
          </tr>
        </tbody>
      </table>
      <?php  } ?>
      <p><input type="submit" class="btn btn-sm btn-success" value="Continuar"></p>
    </form>
    </article>
    </div>
  <div class="row"></div>
</div>
</body>
</html>