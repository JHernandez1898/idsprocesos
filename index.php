<?php
session_start();
include("Template.php");
require("conect.php");
  if (!isset($_SESSION['AdminUser']))  header('Location: login.php'); 
  if (isset($_GET["Logout"])) { unset($_SESSION["AdminUser"]); }
$idCone =  conectar();
$max = "SELECT MAX(REF) as mr FROM referencias";
$maxquery =  mysqli_query($idCone,$max);
$m;
if($R = mysqli_fetch_array($maxquery)){
	$m =$R["mr"]; 
}
$criterio = isset($_GET["criterio"]);
//Limito la busqueda 
$TAMANO_PAGINA = 10; 

//examino la página a mostrar y el inicio del registro a mostrar 
$pagina = $_GET["pagina"]; 
if (!$pagina) { 
   	$inicio = 0; 
   	$pagina=1; 
} 
else { 
   	$inicio = ($pagina - 1) * $TAMANO_PAGINA; 
}
$sql =  "SELECT *  FROM referencias ORDER BY PASO ASC LIMIT $inicio,10";
$query = mysqli_query($idCone,$sql);

$q = "SELECT * FROM referencias";
$qx =  mysqli_query($idCone,$q);
$num_total_registros = mysqli_num_rows($qx); 
//calculo el total de páginas 
$total_paginas = ceil($num_total_registros / $TAMANO_PAGINA); 

echo mysqli_error($idCone);
?>
<html>
<head>
<link href="Recursos/css/bootstrap.css" rel="stylesheet" type="text/css">
</head>
<body>
<div class="container">
	<div class="row">
        <h1 class="page-header" style="text-align: center">
        PROCEDIMIENTO DE IMPORTACION
        </h1>
    </div>
    
    <div class="row">
    	<article class="col-lg-10">
        </article>
    	<article class="col-lg-1">
        <form action="nuevo.php">
        <input type="submit" class="btn btn-default"  value="Nuevo">
        </form>
       
        </article>
        <article class="col-lg-1">
        <a href="reportes.php"><input type="button" class="btn btn-sm btn-default" value="Reportes" placeholder="Reportes"></a>
        </article>
    </div>
    
    <div class="row">
    	<article class="col-lg-12">
       	  <table width="200" class="table table-striped table-responsive" border="0">
        	  <tbody>
              <thead style="background-color:#699C95">
        	    <tr>
        	      <td>N°</td>
        	      <td>REFERENCIA</td>
        	      <td>TIEMPO</td>
                   <td></td>
        	      <td></td>
                  <td>PASO</td>
                   <td>TIEMPO DESDE FINALIZACIÓN</td>
        	    
      	      </tr>
              </thead>
              <?php
			  $s = 1;
			   while($F = mysqli_fetch_array($query)){ ?>
        	    <tr>
        	      <td><?php  echo $s; $s++; ?></td>
        	      <td><?php  echo $F["NREF"]; ?></td>
       			  <td>
				  
				  <?php  $fecha =  date("Y-m-d",$F["FECNUM"]); 
				  $date = date("Y-m-d");
				  $datetime1 = date_create($fecha);
				  $datetime2 = date_create($date);
				  $interval = date_diff($datetime1, $datetime2);
				  $dias = $interval->format('%a');
				  echo $dias." dias";
				  ?></td>
					  <td>
                  
                
                  	<?php 
					$ref = $F["REF"];
					
					
                  echo "<a href='seguir.php?ref=$ref'>";
				  if($F["PASO"] == 16)
				  {
					echo "<input type='submit' class='btn btn-sm btn-success' value='Editar proceso'>"; 
					  
				  }
				  else if($F["PASO"] >=7){
					  echo "<input type='submit' class='btn btn-sm btn-warning' value='Editar proceso'>"; 
				  }else{
					  
					  echo "<input type='submit' class='btn btn-sm btn-danger' value='Editar proceso'>"; 
				  }
                 
				  echo "</a>";
                    ?>
                
				  
                    
                   </td>
        	      <td>
                  <?php $ref = $F["REF"];
                  echo "<a href='detalles.php?ref=$ref'>";
                  echo "<input type='submit' class='btn btn-sm btn-info' value='Ver proceso'>";
				  echo "</a>";
                    ?>
                  	</td>
        	      <td>
                
                  <table width="200" border="0">
        	        <tbody>
        	          <tr>
                        <?php 
						$c = 1;
						while($c <= 15){
							
							if($c < $F["PASO"]){
								?>
							 <td bgcolor="#6ADF48"><?php echo $c ?></td>
							<?php
							}else{
							?>
							 <td bgcolor="#E84D4D"><?php echo $c ?></td>
							<?php
							}
							$c++;
						}?>
        	           
        	           
      	            </tr>
      	          </tbody>
      	        </table></td>
                   <td>
                   <?php 
				   $sql =  "SELECT * FROM pasoquince WHERE REF like ".$F['REF']."";
				   $fe = mysqli_query($idCone,$sql);
				  if($R = mysqli_fetch_array($fe)){
					  $fec =  date("Y-m-d",$R["UNO"]); 
				 	 $date = date("Y-m-d");
				  	$datetime1 = date_create($fec);
				  $datetime2 = date_create($date);
				  $interval = date_diff($datetime1, $datetime2);
				  $dias = $interval->format('%a');
				  echo $dias." dias";
				  }
				   
				   ?>
                   </td>
        	    
      	      </tr>
              <?php  } ?>
      	    </tbody>
      	  </table>
        </article>
    </div>
    <div class="row">
    	<article class="col-lg-12">
        <?php 
		if ($total_paginas > 1){ 
   	for ($i=1;$i<=$total_paginas;$i++){ 
      	if ($pagina == $i) {
         	//si muestro el índice de la página actual, no coloco enlace 
         	echo $pagina . " "; 
		}
		
      	else {
         	//si el índice no corresponde con la página mostrada actualmente, coloco el enlace para ir a esa página 
         	echo "<a href='index.php?pagina=$i'>";
			?> <input type="button" class="btn btn-default btn-sm" value="<?php echo $i ?>"  width="10" height="10"><?php
			echo "</a>"; 
		}
   	} 
}
		?>
        <input type="text" name="lector" autofocus >
        </article>
    </div>
</div>
</body>
</html>
