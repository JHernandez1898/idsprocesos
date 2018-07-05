<?php
date_default_timezone_set('America/Mexico_City');
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
					
					$fecha = date("m-d-Y g:i a",$F["UNO"]);
				
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
    	        <td>Notificación</td>
    	        <td>
                <?php 
				if($F =  mysqli_fetch_array($pasodos)){
					
					$fecha = date("m-d-Y g:i a",$F["UNO"]);
				
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
    	        <td>Manifiesto de mercancias</td>
    	        <td>
                	<?php 
				if($F =  mysqli_fetch_array($pasotres)){
					
					$fecha = date("m-d-Y g:i a",$F["UNO"]);
				
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
    	        <td>Etiquetar</td>
    	        <td><?php 
				if($F =  mysqli_fetch_array($pasocuatro)){
					
					$fecha = date("m-d-Y g:i a",$F["UNO"]);
				
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
    	        <td>Elaboración de documentos</td>
    	        <td><?php 
				if($F =  mysqli_fetch_array($pasocinco)){
					
					$fecha = date("m-d-Y g:i a",$F["UNO"]);
				
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
    	        <td>Solicitar carga de mercancias</td>
    	        <td><?php 
				if($F =  mysqli_fetch_array($pasoseis)){
					
					$fecha = date("m-d-Y g:i a",$F["UNO"]);
				
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
    	        <td>Carga de mercancias</td>
    	        <td><?php 
				if($F =  mysqli_fetch_array($pasosiete)){
					
					$fecha = date("m-d-Y g:i a",$F["UNO"]);
				
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
    	        <td>Despacho de Embarque</td>
    	        <td><?php 
				if($F =  mysqli_fetch_array($pasoocho)){
					
					$fecha = date("m-d-Y g:i a",$F["UNO"]);
				
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
    	        <td>Zarpe de Buque</td>
    	        <td>
				<?php 
				if($F =  mysqli_fetch_array($pasonueve)){
					
					$fecha = date("m-d-Y g:i a",$F["UNO"]);
				
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
    	     
    	   
  	      </tbody>
  	    </table>
    	</article>
    </div>
</div>
</body>
</html>