<?php 
include("Template.php");
require("conect.php");
$idCone=  conectar();
$ref =  $_GET["ref"];
$pasosiete =  mysqli_query($idCone,"SELECT * FROM pasosiete WHERE REF LIKE '$ref'");
if($_POST){
$uno  =strtotime($_POST["uno"]);
$iuno =$_POST["iuno"];

$sql = "UPDATE pasosiete SET UNO = '$uno',IUNO = '$iuno' WHERE(REF = '$ref')";
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
   	  <h1 class="page-header" style="text-align:center">Captura de pedimento (Proceso...#7) </h1>
    </div>
    <div class="row">
    <article class="col-lg-12">
    <form accept-charset="iso-8859-7" action="#" method="post">
    <?php if($M  = mysqli_fetch_array($pasosiete)){?>
      <table width="591" class="table table-striped table-bordered" border="1">
        <tbody>
          <tr>
            <th scope="col">CRITERIOS DE ACEPTACIÓN</th>
            <th scope="col"><p>ACEPTACION</p></th>
            <th scope="col">INICIALES</th>
          </tr>
          <tr>
            <td><p><span class="alert-info text-info" style="text-align:left">*Verificar que se tiene la informacion completa para elaborar pedimento</span><span class="alert-info text-info" style="text-align:left"> (Nota de remosion, número programa immex si aplica,etc).<br>
            * Imprimir copia del pedimento para revisión</span></p></td>
            <td><p>
              <label for="datetime-local">Fecha y Hora:</label>
              <input type="datetime-local" value = "<?php echo date('Y-m-d\TH:i',$M["UNO"])?>"  name="uno" id="datetime-local">
            </p></td>
            <td>
            <select  class="input-sm" name="iuno" required>
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
      <?php } ?>
      <p><input type="submit" class="btn btn-sm btn-success" value="Continuar"></p>
    </form>
    </article>
    </div>
  <div class="row"></div>
</div>