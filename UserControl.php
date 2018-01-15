<?php
session_start();
require("conect.php");
$idCone = conectar();
  if (!isset($_SESSION['AdminUser']))  header('Location: 	UserControlLogin.php'); 
  if (isset($_GET["Logout"])) { unset($_SESSION["AdminUser"]); }
if($_POST){
$nombre =$_POST["txtUsuario"];
$contraseña = $_POST["txtContrasenia"];
$pass = MD5($contraseña);
echo $contraseña;
$status = $_POST["txtIdEm"];
$action = $_POST["action"];
echo $action;
switch($action){
	case "Grabar":
		echo $action;
		$select = "SELECT MAX(numero) as MNumero FROM usuarios";
		$querys = mysqli_query($idCone,$select);
		$numero;
		if($F = mysqli_fetch_array($querys)){
			$numero =  $F["MNumero"] + 1;
			echo  $numero;
			echo $action;
			echo MD5($contraseña);
		}
		$sql = "INSERT INTO usuarios VALUES('$numero','$nombre','$pass','$status')";
		$query =  mysqli_query($idCone,$sql);
		if($query){
			echo $action;
			header("Location: UserControl.php");
		}else{
			mysqli_error($idCone);
		}
	break;
}

}
mysqli_close($idCone);
?>
<html>
<head>
<style>

table {
	text-align: left;
	font-family:Verdana;
	font-size:11px;
      }
th {
	font-weight: bold;
	background-color: #ddd;
	border: 0px; }
td,th {
	padding: 4px 5px;
	border-bottom: 0px; }
tr,td {  border: 0px;  }	
.odd {
	background-color: #ddd; }
.odd td {
	border-bottom: 0px solid #cef; }
</style>
</head>
<table width="100%" height="100%" align="center">
<tr valign="top">
 <td>
  <table width="100%" height="100%" frame="box" align="center">
  <tr valign="top">
   <td align="center">
     <div style="overflow:scroll;width:800px;height:300px;">
     <table width="100%" cellpadding="0" cellspacing="0">
      <tr style="font-weight:bold;background:#ddd;">
        <td>Usuario</td>
	<td>Contrasenia</td>
	<td>Status</td>
	<td>Numero</td>
      </tr>
     <?php
        $r=0;
  $idCone = conectar();
	$cmdsql="SELECT * FROM usuarios";
	if (isset($_GET["action"])) {
	  if ($_GET["action"]=="Buscar") {
	   $cmdsql="SELECT * FROM usuarios ";
	  }
	} 
        $result = mysqli_query($idCone,$cmdsql);
        while($row = mysqli_fetch_array($result)) {
	  if  ($r++ % 2) $bgcolor="#cde"; else $bgcolor="#fff;";
          echo "<tr style='background:$bgcolor'><td><a href='UserControl.php?id=".$row['numero']."'>". $row['nombre'] . "</td><td>" . $row['password']."</td><td>". $row['estatus']."</td><td>".$row["numero"]."</td></tr>";
        }
        mysqli_close($idCone);
     ?>
     </table>
     </div> 
   </td>
  </tr>
  </table>  
 </td>
</tr>
<tr valign="top">
<td>
 <form method="POST" action ="#"> 
 <table width="400px" align="center"  frame="box" cellpadding="0" cellspacing="0">
 <tr>  
  <th colspan="3">
   <center>Control de usuarios&nbsp;&nbsp;<a href='?Logout=yes' ><img src='images/icon.png' style='border:0px' alt='Cerrar session' title='Cerrar session'/></a></center>
  </th>
  </tr>
  <tr>
    <td>Usuario:</td>
    <td><input type="text" name="txtUsuario"  required/></td>
  </tr>
  <tr>   
    <td>Contrasenia:</td>
    <td><input type="text" name="txtContrasenia"  required/></td>
  </tr>

   <tr>   
    <td>Status:</td>
    <td><input type="text" name="txtIdEm"  required/></td>
  </tr>
  <tr style="background:#fff">
    <th colspan="3">
   
    </th>
  </tr>
  <tr>  
    <td>    
     <center><input type="submit" name="action" value="Buscar"/></center>
    </td>
    <td>    
     <center><input type="submit" name="action" value="Grabar"/></center>
    </td>  
    <td>    
     <center><input type="submit" name="action" value="Limpiar"/></center>
    </td> 
  </tr> 
  <tr height="20px">
   <th colspan="3" style="color:#F00;background-color:#fff;text-align:center;">
 
   </th>
  </tr>
</table>
</td>
  </form>
</tr>
</table>
</form>
</html>


		

		