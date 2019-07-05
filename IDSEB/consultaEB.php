<html>

			   <?php 

session_start();

include("Template.php");
require("conect.php");
	
  
 ?>
 
 
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
			$pagina = $_GET["paginax"]; 
			if (!$pagina) { 
				$inicio = 0; 
				$pagina=1; 
			} 
			else { 
				$inicio = ($pagina - 1) * $TAMANO_PAGINA; 
			}
					
    
		 echo "Fecha : ".date("m-d-Y"); 
          echo " Hora : ".date("g:i a"); 
		$idsql = "SELECT * FROM dbo.Trafico WHERE traFechaAct > '2018-01-01'   ORDER BY traFechaAct DESC OFFSET $inicio ROWS FETCH NEXT $TAMANO_PAGINA ROWS ONLY";
		
		$idsquery = sqlsrv_query($idsCone,$idsql);
		$q = "SELECT * FROM dbo.Trafico WHERE traFechaAct > '2018-01-01'";
		$qx =  sqlsrv_query($idsCone,$q);
		$r = 0;
		while(sqlsrv_fetch_array($qx)){
			$r++;
		}
	
		//calculo el total de páginas 
		$total_paginas = $r / 10;
		


	
		?>

	<?php 
	
		//	$max =  "SELECT * FROM  dbo.TBLMT";
		//	$maxquery =  sqlsrv_query($idsCone,$max);
			//$idsql = "SELECT * FROM dbo.Trafico WHERE traFechaAct > '2018-01-01'   ORDER BY traFechaAct DESC OFFSET $inicio ROWS FETCH NEXT $TAMANO_PAGINA ROWS ONLY";
		//	"SELECT TBLMT.BODREFERENCIA,CLIENTES.NOM,TBLMT.BODFECHA,TBLMT.BODHORA FROM dbo.TBLMT 
		//LEFT JOIN CLIENTES ON TBLMT.BODCLI=CLIENTES.CLIENTE_ID 
		//ORDER BY TBLMT.BODFECHA";
////$sql = "SELECT TRAFICO_ID, traReferencia FROM dbo.Trafico";
////$stmt = sqlsrv_query( $idsCone, $sql );
////if( $stmt === false) {
/////    die( print_r( sqlsrv_errors(), true) );
/////}

/////while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_NUMERIC) ) {
////      echo $row[0].", ".$row[1]."<br />";
////}

/////sqlsrv_free_stmt( $stmt);
			
			
			
			//$m;
		//	if($R = sqlsrv_fetch_array($maxquery)){
		//		$m =$R[""]; 
	//		}
		//	$criterio = isset($_GET["criterio"]);
			//Limito la busqueda 
	//		$TAMANO_PAGINA = 10; 
			
			//examino la página a mostrar y el inicio del registro a mostrar 
	//		$pagina = $_GET["paginas"]; 
		//	if (!$pagina) { 
		//		$inicio = 0; 
		//		$pagina=1; 
		//	} 
		//	else { 
		//		$inicio = ($pagina - 1) * $TAMANO_PAGINA; 
		//	}
			
			 echo "Fecha : ".date("m-d-Y"); 
          echo " Hora : ".date("g:i a"); 
		//$idsql = "SELECT * FROM dbo.Trafico WHERE traFechaAct > '2018-01-01'   ORDER BY traFechaAct DESC OFFSET $inicio ROWS FETCH NEXT $TAMANO_PAGINA ROWS ONLY";
		
		//$idsquery = sqlsrv_query($idsCone,$idsql);
		//$q = "SELECT * FROM dbo.Trafico WHERE traFechaAct > '2018-01-01'";
		//$qx =  sqlsrv_query($idsCone,$q);
		//$r = 0;
		//while(sqlsrv_fetch_array($qx)){
		//	$r++;
		//}
	
		//calculo el total de páginas 
		//$total_paginas = $r / 10;
		
 ?>
 
<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
<head>
<link href="Recursos/css/bootstrap.css" rel="stylesheet" type="text/css">
</head>



<body>





<div class="container">
	<div class="row">
        <h1 class="page-header" style="text-align: center">
        Procedimiento de Reportes de (EBs)
        </h1>
    </div>

	
	
	
		<?php	
		
		$idsCone =  conectarIDS();

//SELECT TBLMT.BODREFERENCIA,CLIENTES.NOM,TBLMT.BODFECHA,TBLMT.BODHORA FROM TBLMT
//LEFT JOIN CLIENTES ON TBLMT.BODCLI=CLIENTES.CLIENTE_ID
//ORDER BY TBLMT.BODFECHA
		
$sql = "SELECT TBLMT.BODREFERENCIA,CLIENTES.NOM,TBLMT.BODFECHA,TBLMT.BODHORA FROM dbo.TBLMT 
		LEFT JOIN CLIENTES ON TBLMT.BODCLI=CLIENTES.CLIENTE_ID 
		ORDER BY TBLMT.BODFECHA";
$stmt = sqlsrv_query( $idsCone, $sql );
if( $stmt === false) {
    die( print_r( sqlsrv_errors(), true) );
}

while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_NUMERIC) ) {
      echo $row[0].", ".$row[1]."<br />";
}

sqlsrv_free_stmt( $stmt);
			
	?>   	
	
     <div class="row">
	 
    	<article class="col-lg-12" align="center">
          <table class="table table-bordered table-striped"  width="200" border="1">
            <tbody>
              <tr>
			  
        	      <td>N°</td>
        	      <td>Referencia EB</td>
				  <td>Cliente</td>
				   <td>Fecha Entrada</td>
				  <td>Hora Entrada</td> 
        	      <td>Aduana</td>
               
                <td>&nbsp;</td>
              </tr>
	   
	
<td><?php echo $row[0] ?></td>

    <tbody>


		
    </table>
		    	<article class="col-lg-12">
       <?php 
		
//		$c = 1;
	//	while($c<$total_paginas){
			//echo "<a href='consultaEBs.php?pagina=1&&paginas=$c'><button class='btn btn-sm btn-default'> $c</button></a>"; 			$c++;
		//}
		?>
	   </article>
