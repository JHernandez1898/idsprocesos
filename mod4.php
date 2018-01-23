<?php 
include("Template.php");
require("conect.php");
$idCone=  conectar();
$ref =  $_GET["ref"];
$pasocuatro=  mysqli_query($idCone,"SELECT * FROM pasocuatro WHERE REF LIKE '$ref'");
if($_POST){
$uno =  $_POST["uno"];
$uno =  strtotime($uno);
$iniuno  =$_POST["iniuno"];
$dos = $_POST["dos"];
$dos =  strtotime($dos);
$inidos = $_POST["inidos"];
$sql = "UPDATE pasocuatro SET FECUNO = '$uno',INIUNO = '$iniuno',FECDOS = '$dos',INIDOS = '$inidos' WHERE(REF LIKE '$ref')";
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
   	  <h1 class="page-header" style="text-align:center">Clasificación</h1>
    </div>
    <div class="row">
    <article class="col-lg-12">
    <form accept-charset="iso-8859-7" action="#" method="post">
    <?php if($M =  mysqli_fetch_array($pasocuatro)){ ?>
      <table width="591" class="table table-striped table-bordered" border="1">
        <tbody>
          <tr>
            <th scope="col">CRITERIOS DE ACEPTACIÓN</th>
            <th scope="col"><p>ACEPTACION</p></th>
            <th scope="col">INICIALES</th>
          </tr>
          <tr>
            <td><span class="alert-info text-info" style="text-align:left">*Verificar número de parte en la base de datos.</span></td>
            <td><p>
              <label for="datetime-local">Fecha y Hora:</label>
              <input type="datetime-local" name="uno" value = "<?php echo date('Y-m-d\TH:i',$M["FECUNO"])?>"  id="datetime-local">
            </p></td>
            <td>
            <select  class="input-sm" value =<?php echo $M["INIUNO"] ?> name="iniuno" required>
            <?php 
			$queryx = mysqli_query($idCone,"SELECT * FROM iniciales");
			while($F =  mysqli_fetch_array($queryx)){
			
			?>
            <option  value="<?php echo $F["INICIALES"] ?>"><?php echo $F["INICIALES"] ?></option>            <?php }
			?>
            </select></td>
          </tr>
          <tr>
            <td><span class="alert-info text-info" style="text-align:left">*Solicitar fraccion arancelaria a clasificacdor si no esta aen la base de datos</span></td>
            <td><p>
              <label for="datetime-local2">Fecha y Hora:</label>
              <input type="datetime-local" name="dos" value = "<?php echo date('Y-m-d\TH:i',$M["FECDOS"])?>" id="datetime-local2">
            </p></td>
            <td>
            <select  class="input-sm" value= <?php echo $M["INIDOS"]  ?> name="inidos" required>
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
      <?php }  ?>
      <p><input type="submit" class="btn btn-sm btn-success" value="Continuar"></p>
    </form>
    </article>
    </div>
  <div class="row"></div>
</div>
</body>
</html>