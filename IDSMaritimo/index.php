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
if(isset($_GET["pagina"])){
    $pagina = $_GET["pagina"]; 
    if (!$pagina) { 
   	    $inicio = 0; 
   	    $pagina=1; 
    } 
    else { 
   	$inicio = ($pagina - 1) * $TAMANO_PAGINA; 
    }
}
else{
    $pagina =1;
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
<div class="row">
    	<article class="col-lg-12">
        
        <?php 
		
		$idsCone =  conectarIDS();

	
			$max = "SELECT MAX(traReferencia) as mr FROM  dbo.Trafico";
			$maxquery =  sqlsrv_query($idsCone,$max);
			$m;
			if($R = sqlsrv_fetch_array($maxquery)){
				$m =$R["mr"]; 
			}
			$criterio = isset($_GET["criterio"]);
			//Limito la busqueda 
			$TAMANO_PAGINA = 10; 
			
			//examino la página a mostrar y el inicio del registro a mostrar 
			if(isset($_GET["paginax"])){
                $pagina = $_GET["paginax"];
			     if (!$pagina) { 
                     $inicio = 0; 
				    $pagina=1; 
			     } 
			     else { 
				    $inicio = ($pagina - 1) * $TAMANO_PAGINA; 
			     }
            }
            else{
                $pagina=1; 
                $inicio = ($pagina - 1) * $TAMANO_PAGINA; 
            }
					
    
		 echo "Fecha Actual: ".date("m-d-Y"); 
          echo " & Hora : ".date("g:i a"); 
		$idsql = "SELECT * FROM dbo.Trafico WHERE traFechaAct > '2018-01-01' AND traReferencia LIKE 'IDS%' AND traCli = '722' ORDER BY traFechaAct DESC OFFSET $inicio ROWS FETCH NEXT $TAMANO_PAGINA ROWS ONLY";
		
		$idsquery = sqlsrv_query($idsCone,$idsql);
		$q = "SELECT * FROM dbo.Trafico WHERE traFechaAct > '2018-01-01' AND traReferencia LIKE 'IDS%'";
		$qx =  sqlsrv_query($idsCone,$q);
		$r = 0;
		while(sqlsrv_fetch_array($qx)){
			$r++;
		}
	
		//calculo el total de páginas 
		$total_paginas = $r / 10;
		


	
		?>
     <div class="row">
    	<article class="col-lg-12" align="center">
          <table class="table table-bordered table-striped"  width="200" border="1">
            <tbody>
              <tr>
                <td>No.</td>
                <td>Cliente</td>
                <td>Referencia</td>
                <td>Embarque</td>
                <td>Pedimento</td>
                <td>Subdivisiones</td>
               
                <td>Agregar</td>
              </tr>
              <?php
			  if($pagina>1){
			  $c = 0 + ($pagina * 10) -10;
			  }else{
				  $c = 0;
			  }
			  while($R = sqlsrv_fetch_array($idsquery)){
			  	 	$sqlx = "SELECT * FROM referencias WHERE NREF LIKE '".$R["traReferencia"]."'";
					$w = mysqli_query($idCone,$sqlx);
					if(mysqli_fetch_array($w)){
					}
					else{
				  		?>
				  		<form action="registrarnuevo.php" method="post">
				  		<?php
				  		$ncliente = $R["traCli"];
				 
				  		$nom = "SELECT Nom FROM dbo.Clientes WHERE CLIENTE_ID LIKE '$ncliente'";
						$qunom=sqlsrv_query($idsCone,$nom);
						$nombre = "";
                        $id ="";
						if($T = sqlsrv_fetch_array($qunom)){
							$nombre  = $T["Nom"];
                       
						}
                  
			 
				  		$fe =  $R["traFechaAct"]->format("Y-d-m");
				  		$fecnum = strtotime($fe);
						$mes = date("m") - 1;
				  		$date =strtotime(date("Y-".$mes."-01"));
				
					   $c++;
			   			?>
              			<tr>
           
		                <td><?php echo $c ?></td>
		                <td><?php echo $nombre ?> <input type="hidden" name="cliente" value="<?php echo $nombre ?>"></td>
		                <td><?php echo $R["traReferencia"] ?>  <input type="hidden" name="ref" value="<?php echo $R["traReferencia"] ?>"></td>
		                <td><select name="embarque">
		                <option>Consolidado</option>
		                <option>Directo</option>
		                </select></td>
		                <td><?php echo $R["traPedimento"] ?> <input type="hidden" name="pedimento" value="<?php echo $R["traPedimento"] ?>"></td>
		                <td><input type="text" value="N/A" name="subdivisiones"></td>
		            
		                <td>
		                
		                <input type="submit" value="Comenzar" class="btn btn-sm btn-success"></td>
		                <?php  } ?>
		              	</tr>
		            	</form>  
		              	<?php
				  
				  }
				

				   ?>
            </tbody>
          </table>
        </article>
    </div>
     <div class="row">
    	<article class="col-lg-12">
        <?php 
		
		$c = 1;
		while($c<$total_paginas){
			
			echo "<a href='index.php?pagina=1&&paginax=$c'><button class='btn btn-sm btn-default'>$c</button></a>"; 
			
			$c++;
		}
		?>
        
        </article>
        
    </div>
</body>
</html>
