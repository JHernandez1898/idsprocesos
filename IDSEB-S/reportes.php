<?php
session_start();
include("Template.php");
require("conect.php");
$fecha='2019-01-01';
$paginax = 1;
if(isset($_GET["fecha"])){
	$fecha=$_GET["fecha"];
}else{
	$fecha = "";
}
if(isset($_GET["fechaLimite"])){
	$fechaLimite=$_GET["fechaLimite"];
}else{
	$fechaLimite = "";
}
$idCone =  conectar();
   
		
		$idsCone =  conectarIDS();

	
			$max = "SELECT MAX(traReferencia) as mr FROM  dbo.Trafico";
			$maxquery =  sqlsrv_query($idsCone,$max);
			$m;
			if($R = sqlsrv_fetch_array($maxquery)){
				$m =$R["mr"]; 
			}
			$criterio = isset($_GET["criterio"]);
			//Limito la busqueda 
			$TAMANO_PAGINA =50 ; 
			
			//examino la página a mostrar y el inicio del registro a mostrar 
			$pagina = isset($_GET["paginax"]); 
			if (!$pagina) { 
				$inicio = 0; 
				$pagina=1; 
			} 
			else { 
				$inicio = ($pagina - 1) * $TAMANO_PAGINA; 
			}
					
    
		
		$idsql = "SELECT tblMT.BODREFERENCIA, CLIENTES.NOM,TBLMT.BODFECHA,TBLMT.BODFECHA,TBLMT.BODHORA
TRAFICO,TRAADUANA 
FROM TBLMT LEFT JOIN CLIENTES ON TBLMT.BODCLI = CLIENTES.CLIENTE_ID
LEFT JOIN TRAFICO ON TBLMT.REFASIGNADA = TRAFICO.TRAREFERENCIA
WHERE TBLMT.BODFECHA BETWEEN '$fecha' AND '$fechaLimite'
ORDER BY TBLMT.BODFECHA DESC OFFSET $inicio ROWS FETCH NEXT $TAMANO_PAGINA ROWS ONLY";
		
		$idsquery = sqlsrv_query($idsCone,$idsql);
		$q = "SELECT tblMT.BODREFERENCIA, CLIENTES.NOM,TBLMT.BODFECHA,TBLMT.BODFECHA,TBLMT.BODHORA
TRAFICO,TRAADUANA 
FROM TBLMT LEFT JOIN CLIENTES ON TBLMT.BODCLI = CLIENTES.CLIENTE_ID
LEFT JOIN TRAFICO ON TBLMT.REFASIGNADA = TRAFICO.TRAREFERENCIA
WHERE TBLMT.BODFECHA BETWEEN '$fecha' AND '$fechaLimite'";
		$qx =  sqlsrv_query($idsCone,$q);
		$r = 0;
		while(sqlsrv_fetch_array($qx)){
			$r++;
		}
	
		//calculo el total de páginas 
		$total_paginas = $r / 40;
		


	
		?>


<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Reportes</title>
<link href="Recursos/css/bootstrap.css" rel="stylesheet" type="text/css">
</head>
<body>
<div class="container">
	<div class="row">
   	  <h1 class="page-header" style="text-align:center">
        	REFERENCIAS EB
      </h1>
    </div>
    <div class="row">
    	<article class="col-lg-12" align="center">
	 <form action ='reportes.php'>Inicio:   <input type = 'date' name="fecha">  a 
		Fin:  <input type = 'date' name="fechaLimite">
		<input type="submit" value="Mostrar"></form>
		<a href="excel.php?fecha=<?php echo $fecha?>&&fechaLimite=<?php echo $fechaLimite?>"> <input type="submit" value="Generar reporte"></a>
          <table class="table table-bordered table-striped"  width="200" border="1">
            <tbody>
              <tr>
                <td>No.</td>
                <td>Referencia</td>
                <td>Cliente</td>
                <td>Fecha</td>

               
              
              </tr>
              <?php
			  if($pagina>1){
			  $c = 0 + ($pagina * 10) -10;
			  }else{
				  $c = 0;
			  }
			  while($R = sqlsrv_fetch_array($idsquery)){
			  	 	
				 
				  		$referencia = $R["BODREFERENCIA"];
				$nombre = $R["NOM"];
				$fecha = $R["BODFECHA"];
				$hora = $R["TRAFICO"];
				$aduana = $R["TRAADUANA"];
$result = $fecha->format('Y-m-d');

			
					   $c++;
			   			?>
              			<tr>
           
		                <td><?php echo $c ?></td>
		                <td><?php echo $nombre ?> <input type="hidden" name="cliente" value="<?php echo $nombre ?>"></td>
		                <td><?php echo $referencia ?> </td>
		                <td><?php echo   $result;?> </td>

		            
		               
		                
		               
		                <?php  } ?>
		              	</tr>
		            	</form>  
		              	<?php
				  
				  
				

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
			$fecha =$_GET["fecha"];
	
			echo "<a href='reportes.php?pagina=1&&paginax=$c&&fecha=$fecha&&fechaLimite=$fechaLimite'><button class='btn btn-sm btn-default'>$c</button></a>"; 
			
			$c++;
		}
		?>
        
        </article>
        
    </div>
</div>
</body>
</html>