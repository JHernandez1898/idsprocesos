<?php
require("Template.php");
include("conect.php");
$idCone = conectar();
$ref = $_GET["ref"];
$referencias =  mysqli_query($idCone,"SELECT * FROM referencias WHERE REF LIKE '$ref'");
$pasouno =  mysqli_query($idCone,"SELECT * FROM pasouno WHERE REF LIKE '$ref'");
$pasodos =  mysqli_query($idCone,"SELECT * FROM pasodos WHERE REF LIKE '$ref'");
$pasotres =  mysqli_query($idCone,"SELECT * FROM pasotres WHERE REF LIKE '$ref'");
$pasocuatro=  mysqli_query($idCone,"SELECT * FROM pasocuatro WHERE REF LIKE '$ref'");
$pasocinco =  mysqli_query($idCone,"SELECT * FROM pasocinco WHERE REF LIKE '$ref'");
$pasoseis =  mysqli_query($idCone,"SELECT * FROM pasoseis WHERE REF LIKE '$ref'");
$pasosiete =  mysqli_query($idCone,"SELECT * FROM pasosiete WHERE REF LIKE '$ref'");
$pasoocho =  mysqli_query($idCone,"SELECT * FROM pasoocho WHERE REF LIKE '$ref'");
$pasonueve =  mysqli_query($idCone,"SELECT * FROM pasonueve WHERE REF LIKE '$ref'");
$pasodiez =  mysqli_query($idCone,"SELECT * FROM pasodiez WHERE REF LIKE '$ref'");
$pasoonce =  mysqli_query($idCone,"SELECT * FROM pasoonce WHERE REF LIKE '$ref'");
$pasodoce =  mysqli_query($idCone,"SELECT * FROM pasodoce WHERE REF LIKE '$ref'");
$pasotrece =  mysqli_query($idCone,"SELECT * FROM pasotrece WHERE REF LIKE '$ref'");
$pasocatorce =  mysqli_query($idCone,"SELECT * FROM pasocatorce WHERE REF LIKE '$ref'");
$pasoquince =  mysqli_query($idCone,"SELECT * FROM pasoquince WHERE REF LIKE '$ref'");
 ?>
<html>
<head>
<title>
</title>
<link href="Recursos/css/bootstrap.css" rel="stylesheet" type="text/css">
</head>
<body>
<div class="container">
	<div class="row">
    	<h1 class="page-header"> Seguimiento </h1>
    </div>
    
	<div class="row">
    	<article class="col-lg-7">
    	  <table width="200"  class="table table-bordered table-striped" border="1">
    	    <tbody>
    	      <tr>
    	        <td>1</td>
    	        <td>Recepcion de Mercancias y Documentos</td>
    	        <td>
                <?php 
				if($F =  mysqli_fetch_array($pasouno)){
					
					$fecha = date("Y-m-d g:i a",$F["FECUNO"]);
				
					echo "Capturado el dia : $fecha <br>
";
					echo "<a href='mod1.php?ref=$ref'>";
					echo "<input type=button value='modificar' class='btn btn-sm btn-warning'"; 
					echo "</a>";
				}
				else{
				
					echo "<a href='paso1.php?ref=$ref'>";
					echo "<input type='button' class='btn btn-sm btn-success' value='Seguir'>";
					echo "</a>";
				}
					
				
				?>
                </td>
  	        </tr>
    	      <tr>
    	        <td>2</td>
    	        <td>Revisión</td>
    	        <td>
                <?php 
				if($F =  mysqli_fetch_array($pasodos)){
					
					$fecha = date("Y-m-d g:i a",$F["FEC"]);
				
					echo "Capturado el dia : $fecha <br>";
					echo "<a href='mod2.php?ref=$ref'>";
					echo "<input type=button value='modificar' class='btn btn-sm btn-warning'"; 
					echo "</a>";
				}
				else{
				
					echo "<a href='paso2.php?ref=$ref'>";
					echo "<input type='button' class='btn btn-sm btn-success' value='Seguir'>";
					echo "</a>";
				}
				?>
                </td>
  	        </tr>
    	      <tr>
    	        <td>3</td>
    	        <td>Trafico</td>
    	        <td>
                	<?php 
				if($F =  mysqli_fetch_array($pasotres)){
					
					$fecha = date("Y-m-d g:i a",$F["FECUNO"]);
				
					echo "Capturado el dia : $fecha <br>";
					echo "<a href='mod3.php?ref=$ref'>";
					echo "<input type=button value='modificar' class='btn btn-sm btn-warning'"; 
					echo "</a>";
				}
				else{
				
					echo "<a href='paso3.php?ref=$ref'>";
					echo "<input type='button' class='btn btn-sm btn-success' value='Seguir'>";
					echo "</a>";
				}
				?>
                    
                </td>
  	        </tr>
    	      <tr>
    	        <td>4</td>
    	        <td>Clasificacion</td>
    	        <td><?php 
				if($F =  mysqli_fetch_array($pasocuatro)){
					
					$fecha = date("Y-m-d g:i a",$F["FECUNO"]);
				
					echo "Capturado el dia : $fecha <br>";
					echo "<a href='mod4.php?ref=$ref'>";
					echo "<input type=button value='modificar' class='btn btn-sm btn-warning'"; 
					echo "</a>";
				}
				else{
				
					echo "<a href='paso4.php?ref=$ref'>";
					echo "<input type='button' class='btn btn-sm btn-success' value='Seguir'>";
					echo "</a>";
				}
				?></td>
  	        </tr>
    	      <tr>
    	        <td>5</td>
    	        <td>Trafico</td>
    	        <td><?php 
				if($F =  mysqli_fetch_array($pasocinco)){
					
					$fecha = date("Y-m-d g:i a",$F["UNO"]);
				
					echo "Capturado el dia : $fecha <br>";
					echo "<a href='mod5.php?ref=$ref'>";
					echo "<input type=button value='modificar' class='btn btn-sm btn-warning'"; 
					echo "</a>";
				}
				else{
				
					echo "<a href='paso5.php?ref=$ref'>";
					echo "<input type='button' class='btn btn-sm btn-success' value='Seguir'>";
					echo "</a>";
				}
				?></td>
  	        </tr>
    	      <tr>
    	        <td>6</td>
    	        <td>Revision Nota</td>
    	        <td><?php 
				if($F =  mysqli_fetch_array($pasoseis)){
					
					$fecha = date("Y-m-d g:i a",$F["UNO"]);
				
					echo "Capturado el dia : $fecha <br>";
					echo "<a href='mod6.php?ref=$ref'>";
					echo "<input type=button value='modificar' class='btn btn-sm btn-warning'"; 
					echo "</a>";
				}
				else{
				
					echo "<a href='paso6.php?ref=$ref'>";
					echo "<input type='button' class='btn btn-sm btn-success' value='Seguir'>";
					echo "</a>";
				}
				?></td>
  	        </tr>
    	      <tr>
    	        <td>7</td>
    	        <td>Captura de pedimento</td>
    	        <td><?php 
				if($F =  mysqli_fetch_array($pasosiete)){
					
					$fecha = date("Y-m-d g:i a",$F["UNO"]);
				
					echo "Capturado el dia : $fecha <br>";
					echo "<a href='mod7.php?ref=$ref'>";
					echo "<input type=button value='modificar' class='btn btn-sm btn-warning'"; 
					echo "</a>";
				}
				else{
				
					echo "<a href='paso7.php?ref=$ref'>";
					echo "<input type='button' class='btn btn-sm btn-success' value='Seguir'>";
					echo "</a>";
				}
				?></td>
  	        </tr>
    	      <tr>
    	        <td>8</td>
    	        <td>Revision de pedimento</td>
    	        <td><?php 
				if($F =  mysqli_fetch_array($pasoocho)){
					
					$fecha = date("Y-m-d g:i a",$F["UNO"]);
				
					echo "Capturado el dia : $fecha <br>";
					echo "<a href='mod8.php?ref=$ref'>";
					echo "<input type=button value='modificar' class='btn btn-sm btn-warning'"; 
					echo "</a>";
				}
				else{
				
					echo "<a href='paso8.php?ref=$ref'>";
					echo "<input type='button' class='btn btn-sm btn-success' value='Seguir'>";
					echo "</a>";
				}
				?></td>
  	        </tr>
    	      <tr>
    	        <td>9</td>
    	        <td>Confirmar deposito y equipo</td>
    	        <td><?php 
				if($F =  mysqli_fetch_array($pasonueve)){
					
					$fecha = date("Y-m-d g:i a",$F["UNO"]);
				
					echo "Capturado el dia : $fecha <br>";
					echo "<a href='mod9.php?ref=$ref'>";
					echo "<input type=button value='modificar' class='btn btn-sm btn-warning'"; 
					echo "</a>";
				}
				else{
				
					echo "<a href='paso9.php?ref=$ref'>";
					echo "<input type='button' class='btn btn-sm btn-success' value='Seguir'>";
					echo "</a>";
				}
				?></td>
  	        </tr>
    	      <tr>
    	        <td>10</td>
    	        <td>Validacion del pedimento</td>
    	        <td><?php 
				if($F =  mysqli_fetch_array($pasodiez)){
					
					$fecha = date("Y-m-d g:i a",$F["UNO"]);
				
					echo "Capturado el dia : $fecha <br>";
					echo "<a href='mod10.php?ref=$ref'>";
					echo "<input type=button value='modificar' class='btn btn-sm btn-warning'"; 
					echo "</a>";
				}
				else{
				
					echo "<a href='paso10.php?ref=$ref'>";
					echo "<input type='button' class='btn btn-sm btn-success' value='Seguir'>";
					echo "</a>";
				}
				?></td>
  	        </tr>
    	      <tr>
    	        <td>11</td>
    	        <td>Prepara documentos de importacion</td>
    	        <td><?php 
				if($F =  mysqli_fetch_array($pasoonce)){
					
					$fecha = date("Y-m-d g:i a",$F["UNO"]);
				
					echo "Capturado el dia : $fecha <br>";
					echo "<a href='mod11.php?ref=$ref'>";
					echo "<input type=button value='modificar' class='btn btn-sm btn-warning'"; 
					echo "</a>";
				}
				else{
				
					echo "<a href='paso11.php?ref=$ref'>";
					echo "<input type='button' class='btn btn-sm btn-success' value='Seguir'>";
					echo "</a>";
				}
				?></td>
  	        </tr>
    	      <tr>
    	        <td>12</td>
    	        <td>Solicitar carga de emergencia</td>
    	        <td><?php 
				if($F =  mysqli_fetch_array($pasodoce)){
					
						$fecha = date("Y-m-d g:i a",$F["UNO"]);
				
					echo "Capturado el dia : $fecha <br>";
					echo "<a href='mod12.php?ref=$ref'>";
					echo "<input type=button value='modificar' class='btn btn-sm btn-warning'"; 
					echo "</a>";
				}
				else{
				
					echo "<a href='paso12.php?ref=$ref'>";
					echo "<input type='button' class='btn btn-sm btn-success' value='Seguir'>";
					echo "</a>";
				}
				?>;</td>
  	        </tr>
    	      <tr>
    	        <td>13</td>
    	        <td>Carga de mercancia</td>
    	        <td><?php 
				if($F =  mysqli_fetch_array($pasotrece)){
					
					$fecha = date("Y-m-d g:i a",$F["UNO"]);
				
					echo "Capturado el dia : $fecha <br>";
					echo "<a href='mod13.php?ref=$ref'>";
					echo "<input type=button value='modificar' class='btn btn-sm btn-warning'"; 
					echo "</a>";
				}
				else{
				
					echo "<a href='paso13.php?ref=$ref'>";
					echo "<input type='button' class='btn btn-sm btn-success' value='Seguir'>";
					echo "</a>";
				}
				?></td>
  	        </tr>
    	      <tr>
    	        <td>14</td>
    	        <td>Despacho de embarque</td>
    	        <td><?php 
				if($F =  mysqli_fetch_array($pasocatorce)){
					
					$fecha = date("Y-m-d g:i a",$F["UNO"]);
				
					echo "Capturado el dia : $fecha <br>";
					echo "<a href='mod14.php?ref=$ref'>";
					echo "<input type=button value='modificar' class='btn btn-sm btn-warning'"; 
					echo "</a>";
				}
				else{
				
					echo "<a href='paso14.php?ref=$ref'>";
					echo "<input type='button' class='btn btn-sm btn-success' value='Seguir'>";
					echo "</a>";
				}
				?></td>
  	        </tr>
    	      <tr>
    	        <td>15</td>
    	        <td>Facturacion de cuenta de gastos americana</td>
    	        <td><?php 
				if($F =  mysqli_fetch_array($pasoquince)){
					
					$fecha = date("Y-m-d g:i a",$F["UNO"]);
				
					echo "Capturado el dia : $fecha <br>";
					echo "<a href='mod15.php?ref=$ref'>";
					echo "<input type=button value='modificar' class='btn btn-sm btn-warning'"; 
					echo "</a>";
				}
				else{
				
					echo "<a href='paso15.php?ref=$ref'>";
					echo "<input type='button' class='btn btn-sm btn-success' value='Seguir'>";
					echo "</a>";
				}
				?></td>
  	        </tr>
  	      </tbody>
  	    </table>
    	</article>
    </div>
</div>
</body>
</html>