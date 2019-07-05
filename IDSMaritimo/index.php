<?php 
session_start();

//require("Template.php");
include("Template.php");
require("conect.php");

$idCone = conectar();

//$mConsulta = "SELECT * FROM referencias";
$mConsulta = "SELECT MAX(REF) as mr FROM referencias";
//$max = "SELECT MAX(REF) as mr FROM referencias";
$mConsultaquery = mysqli_query($idCone,$mConsulta);
$m;
if($R = mysqli_fetch_array($mConsultaquery)){
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
//$sql =  "SELECT *  FROM referencias A JOIN pasouno B ON (A.REF = B.REF) ORDER BY PASO ASC LIMIT $inicio,10";
$sql =  "SELECT *  FROM referencias ORDER BY PASO ASC LIMIT $inicio,10";
$query = mysqli_query($idCone,$sql);

$q = "SELECT * FROM referencias ";
$qx =  mysqli_query($idCone,$q);
$num_total_registros = mysqli_num_rows($qx); 
//calculo el total de páginas 
$total_paginas = ceil($num_total_registros / $TAMANO_PAGINA); 

echo mysqli_error($idCone);

?>

<!DOCTYPE html>
<html>
<head>
	<title>Maritimo</title>
<link href="Recursos/css/bootstrap.css" rel="stylesheet" type="text/css">
</head>
<body>
<div class="container">
	<div class="row">
	  <h1 class="page-header" style="text-align:center">Procedimiento de Embarque Maritimo</h1>
	</div>
    <div class="row">
    	<article class="col-lg-10">
        
        </article>
        <article class="col-lg-1">
        	<form method="post" action="nuevo.php">
                  <input type="submit" class=" btn btn-default btn-sm" Value="Nuevo">
            </form>
        </article>

        <article class="col-lg-1">
        	<form method="post" action="reportes.php">
                  <input type="submit" class=" btn btn-default btn-sm" value = "Reportes">
            </form>

            
        </article>
    </div>
    <div class="row">
   		<article class="col-lg-12">
       	  <table class="table table-bordered table-striped" width="200" border="1">
        	  <tbody>
        	    <tr style="background-color:#0B799B " >
        	     <td>N°</td>
				    <td>Referencia</td>
        	      <td>Cliente</td>
        	     <td>Fecha Captura</td>
				 <td>Fecha Inicial</td>
        	      <td>No. Paso</td> 
        	     <td>Tiempo Inicial</td>
				 <td>Pasos Procesados</td>
				 <td>*Pendientes*</td>
				  <td>*Despachados*</td>
                  
				  <td>Tiempo Finalizado</td>
      	      </tr>
              <?php 
			  
			  $s = 1;
			  
			  while($R =  mysqli_fetch_array($query)){ ?>
			  <tr>
			  
			 
			  
        	      <td><?php echo $R["REF"] ?></td>
				  <td><img src="barcode.php?text=<?php echo $R["NREF"] ?>
				   &size=20&orientation=horizontal&codetype=code39&print=true&sizefactor=1" /></td> 
        	      <td><?php echo $R["CLIENTE"] ?></td>
				  <td><?php echo date("m-d-Y",$R["FECNUM"]) ?></td>
				  
				  <td><?php echo date("m-d-Y",$R["FECNUM"]) ?></td>
				  
				  <td><?php  echo $R["PASO"]; ?></td>
				  
				  				   <td><?php 
				   $fecha =  date("Y-m-d",$R["FECNUM"]); 
				  $date = date("Y-m-d");
				  $datetime1 = date_create($fecha);
				  $datetime2 = date_create($date);
				  $interval = date_diff($datetime1, $datetime2);
				  $dias = $interval->format('%a');
				  echo $dias." dias";
				  ?></td>
				  
				  
				  
        	      <td> <table width="200" border="0">
        	        <tbody>
        	          <tr>
                        <?php 
						$c = 1;
						while($c <= 9){
							
							if($c <= $R["PASO"]){
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
				  $ref =$R["REF"];
				  echo "<a href='seguir.php?ref=$ref'>"  ?>
                  <input type="submit" class=" btn btn-info btn-sm" value="Seguir">
                  </a>
                  </td>
        	      <td>
                   <?php 
				  $ref =$R["REF"];
				  echo "<a href='detalles.php?ref=$ref'>"  ?>
                  <input type="submit" class=" btn btn-success btn-sm" value="Detalles">
                  </a>
                  </td>
				  
				   <td>
                   <?php 
				   $sql =  "SELECT * FROM pasonueve WHERE REF like ".$R['REF']."";
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
              <?php   }
		 echo "Fecha Actual : ".date("m-d-Y"); 
          echo " & Hora : ".date("g:i a");
			  ?>
      	    </tbody>
      	  </table>
        </article>
    </div>
</div>

<div class="row">
    	<article class="col-lg-12">
        <?php 
		if ($total_paginas > 1){ 
   	for ($i=1;$i<=$total_paginas;$i++){ 
      	if ($pagina == $i) {
         	//si muestro el índice de la página actual, no coloco enlace 
			echo "Pagina # ";
         	echo $pagina . " "; 
			
		}
		
      	else {
         	//si el índice no corresponde con la página mostrada actualmente, coloco el enlace para ir a esa página 
         	echo "<a href='index.php?pagina=$i&&paginax=1'>";
			?> <input type="button" class="btn btn-default btn-sm" value="<?php echo $i ?>"  width="10" height="10"><?php
			echo "</a>"; 
		}
   	} 
}
		?>
        
        </article>
        
    </div>

</body>
</html>
