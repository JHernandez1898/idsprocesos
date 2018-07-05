<?php 
require("Template.php");
include("conect.php");
$idCone =  conectar();
$ref = $_GET["ref"];
$sql = "SELECT * FROM referencias WHERE (REF LIKE '$ref')";
$query = mysqli_query($idCone,$sql);
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
	$pasodoce=  mysqli_query($idCone,"SELECT * FROM pasodoce WHERE REF LIKE '$ref'");
	$pasotrece =  mysqli_query($idCone,"SELECT * FROM pasotrece WHERE REF LIKE '$ref'");
	$pasocatorce =  mysqli_query($idCone,"SELECT * FROM pasocatorce WHERE REF LIKE '$ref'");
	$pasoquince =  mysqli_query($idCone,"SELECT * FROM pasoquince WHERE REF LIKE '$ref'");
	$pasodieciseis =  mysqli_query($idCone,"SELECT * FROM pasodieciseis WHERE REF LIKE '$ref'");
	$pasodiecisiete =  mysqli_query($idCone,"SELECT * FROM pasodiecisiete WHERE REF LIKE '$ref'");
	$pasodieciocho =  mysqli_query($idCone,"SELECT * FROM pasodieciocho WHERE REF LIKE '$ref'");
	$pasodiecinueve =  mysqli_query($idCone,"SELECT * FROM pasodiecinueve WHERE REF LIKE '$ref'");
	$pasoveinte =  mysqli_query($idCone,"SELECT * FROM pasoveinte WHERE REF LIKE '$ref'");
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
        	Detalles
      </h1>
    </div>
    <?php if($F = mysqli_fetch_array($query)){ ?>
    <div class ="row">
    
    <article class="col-lg-12">
      <table width="200" class="table table-bordered" border="1">
        <tbody> 
          <tr>
            <td><b>PLAN DE CALIDAD DEL PROCEDIMIENTO DE IMPORTACION<b></td>
            <td>Cliente: <?php echo $F["CLIENTE"]?></td>
            <td> N° Referencia: <img src="barcode.php?text=<?php echo $F["NREF"] ?>
				   &size=20&orientation=horizontal&codetype=code39&print=true&sizefactor=1" /></td>
          </tr>
        </tbody>
      </table>
    </article>
     <article class="col-lg-12">
       <table width="200"  align="left" class="table table-bordered"border="1">
         <tbody>
           <tr align="left">
             <td align="left">Elaborar el Plan de Calidad de acuerdo a los siguiente criteros:<br>
             *Conforme: Fromar de aceptacion y avanzar a la siguiente operación.<br>
             *No Conforme: Se detiene el flujo y/o se regresa la operacion anterior para su corrección.<br>
             *Observaciones: Registrar las situaciones que impidan o modifiquen la normal relizacion de las actividades .<br>
             En todos los casos que la agilidad de la operación lo requiera, se puede llenar al plan en un orden distinto, siempre y cuando se realice una revision final por los responsables correspondientes.</td>
           </tr>
         </tbody>
       </table>
     </article>
      <article class="col-lg-12">
        <table class="table table-bordered" width="200" border="1">
          <tbody>
            <tr>
              <td><b>Embarque:</b></td>
              <td><b>Información de referencia</b></td>
              <td>Subdivisiones: <?php echo $F["SUBDIVISIONES"] ?></td>
            </tr>
            <tr>
              <td><?php echo $F["EMBARQUE"] ?></td>
              <td>N° de pedimento: <?php echo $F["PEDIMENTO"] ?></td>
              <td>Fecha y hora: <?php echo date("m-d-Y",$F["FECNUM"]);  echo "  ".$F["HORA"] ?> </td>
            </tr>
          </tbody>
        </table>
      </article>
      <article class="col-lg-12">
        <table class="table table-bordered table-striped" width="200" border="1">
          <tbody>
            <tr>
              <td width="4%">&nbsp;</td>
              <td width="15%"><b>OPERACIÓN</b></td>
              <td width="14%"><strong>RESPOSABLE</strong></td>
              <td width="16%"><strong>ACEPTACIÓN</strong></td>
              <td width="11%"><strong>INICIALES</strong></td>
            </tr>
            <tr>
              <td>1°</td>
              <td>Recepción de Mercancias </td>
              <td>Jefe de Bodefa/ Encargado Entrada a Bodega</td>
              <?php if($R = mysqli_fetch_array($pasouno)){?>
              <td>
			  
			 	<?php echo date("m-d-Y g:i a",$R["UNO"]);?><br><br><br></td>
              <td>
              <?php echo $R["IUNO"]?><br><br><br><br></td>
              <?php }?>
            </tr>
            <tr>
              <td>2°</td>
              <td>Revisión</td>
              <td>Revisador</td>
              <?php if($R = mysqli_fetch_array($pasodos)){?>
              <td>
			  
			 	<?php echo date("m-d-Y g:i a",$R["UNO"]);?>
             	
              
             	</td>
              <td>
              <?php echo $R["IUNO"]?>
             	
              </td>
              <?php }?>
            </tr>
            <tr>
              <td>3°</td>
              <td>Tráfico</td>
              <td>Ejecutivo de Tráfico / Asistente de Tráfico</td>
              <?php if($R = mysqli_fetch_array($pasotres)){?>
              <td>
			  
			 	<?php echo date("m-d-Y g:i a",$R["UNO"]);?><br><br></td>
              <td>
              <?php echo $R["IUNO"]?><br><br></td>
              <?php }?>
            </tr>
            <tr>
              <td>4°</td>
              <td>Trafico</td>
              <td><p>Gerente /Ejecutivo  de Tráfico</p></td>
              <?php if($R = mysqli_fetch_array($pasocuatro)){?>
              <td>
			  
			 	<?php echo date("m-d-Y g:i a",$R["UNO"]);?><br></td>
              <td>
              <?php echo $R["IUNO"]?><br></td>
              <?php }?>
            </tr>
            <tr>
              <td>5°</td>
              <td>Captura de EEI</td>
              <td>Gerente /Ejecutivo  de Tráfico</td>
              <?php if($R = mysqli_fetch_array($pasocinco)){?>
              <td>
			  
			 	<?php echo date("m-d-Y g:i a",$R["UNO"]);?><br><br></td>
              <td>
              <?php echo $R["IUNO"]?><br><br><br></td>
              <?php }?>
            </tr>
            <tr>
              <td>6°</td>
              <td>Revisión de EEI</td>
              <td>Gerente /Ejecutivo  de Tráfico</td>
              <?php if($R = mysqli_fetch_array($pasoseis)){?>
              <td>
			  
			 	<?php echo date("m-d-Y g:i a",$R["UNO"]);?>
               </td>
              <td>
              <?php echo $R["IUNO"]?>
           
              </td>
              <?php }?>
            </tr>
            <tr>
              <td>7°</td>
              <td>Gestion ante aduana CBP</td>
              <td>Gerente /Ejecutivo  de Tráfico</td>
              <?php if($R = mysqli_fetch_array($pasosiete)){?>
              <td>
			  
			 	<?php echo date("m-d-Y g:i a",$R["UNO"]);?>
               </td>
              <td>
              <?php echo $R["IUNO"]?>
           
              </td>
              <?php }?>
            </tr>
            <tr>
              <td>8°</td>
              <td>Solicitud de equipo</td>
              <td>Gerente /Ejecutivo  de Tráfico</td>
              <?php if($R = mysqli_fetch_array($pasoocho)){?>
              <td>
			  
			 	<?php echo date("m-d-Y g:i a",$R["UNO"]);?>
               </td>
              <td>
              <?php echo $R["IUNO"]?>
           
              </td>
              <?php }?>
            </tr>
            <tr>
              <td>9°</td>
              <td>Solicitar carga de mercancia</td>
              <td>Ejecutivo de Trafico/ Asistente de Trafico</td>
              <?php if($R = mysqli_fetch_array($pasonueve)){?>
              <td>
			  
			 	<?php echo date("m-d-Y g:i a",$R["UNO"]);?>
               </td>
              <td>
              <?php echo $R["IUNO"]?>
           
              </td>
              <?php }?>
            </tr>
            <tr>
              <td>10°</td>
              <td>Carga de mercancia</td>
              <td>Jefe de bodega/Montecarguista</td>
              <?php if($R = mysqli_fetch_array($pasodiez)){?>
              <td>
			  
			 	<?php echo date("m-d-Y g:i a",$R["UNO"]);?>
               </td>
              <td>
              <?php echo $R["IUNO"]?>
           
              </td>
              <?php }?>
            </tr>
            <tr>
              <td>11°</td>
              <td>Llegada de custodia</td>
              <td>Gerente /Ejecutivo  de Tráfico</td>
              <?php if($R = mysqli_fetch_array($pasoonce)){?>
              <td>
			  
			 	<?php echo date("m-d-Y g:i a",$R["UNO"]);?>
               </td>
              <td>
              <?php echo $R["IUNO"]?>
           
              </td>
              <?php }?>
            </tr>
            <tr>
              <td>12°</td>
              <td>Envio de mercancia al aeropuerto</td>
              <td>Gerente /Ejecutivo  de Tráfico</td>
              <?php if($R = mysqli_fetch_array($pasodoce)){?>
              <td>
			  
			 	<?php echo date("m-d-Y g:i a",$R["UNO"]);?>
               </td>
              <td>
              <?php echo $R["IUNO"]?>
           
              </td>
              <?php }?>
            </tr>
            <tr>
              <td>13°</td>
              <td>Descarga de mercancia</td>
              <td>Gerente /Ejecutivo  de Tráfico</td>
              <?php if($R = mysqli_fetch_array($pasotrece)){?>
              <td>
			  
			 	<?php echo date("m-d-Y g:i a",$R["UNO"]);?>
               </td>
              <td>
              <?php echo $R["IUNO"]?>
           
              </td>
              <?php }?>
            </tr>
            <tr>
              <td>14°</td>
              <td>Arribo de avión</td>
              <td>Gerente /Ejecutivo  de Tráfico</td>
              <?php if($R = mysqli_fetch_array($pasocatorce)){?>
              <td>
			  
			 	<?php echo date("m-d-Y g:i a",$R["UNO"]);?>
               </td>
              <td>
              <?php echo $R["IUNO"]?>
           
              </td>
              <?php }?>
            </tr>
            <tr>
              <td>15°</td>
              <td>Inspeccion por parte de Aduana CBP</td>
              <td>Jefe de Bodega/ Ejecutivo de Trafico/Asistente de Trafico/ Gerente</td>
              <?php if($R = mysqli_fetch_array($pasoquince)){?>
              <td>
			  
			 	<?php echo date("m-d-Y g:i a",$R["UNO"]);?>
               </td>
              <td>
              <?php echo $R["IUNO"]?>
           
              </td>
              <?php }?>
            </tr>
            <tr>
              <td>16°</td>
              <td>Supervisar Carga</td>
              <td>Jefe de Bodega/ Ejecutivo de Trafico/Asistente de Trafico/ Gerente</td>
              <?php if($R = mysqli_fetch_array($pasodieciseis)){?>
              <td>
			  
			 	<?php echo date("m-d-Y g:i a",$R["UNO"]);?>
               </td>
              <td>
              <?php echo $R["IUNO"]?>
           
              </td>
              <?php }?>
            </tr>
            <tr>
              <td>17°</td>
              <td>Despacho de Avión</td>
              <td>Gerente /Ejecutivo  de Tráfico</td>
              <?php if($R = mysqli_fetch_array($pasodiecisiete)){?>
              <td>
			  
			 	<?php echo date("m-d-Y g:i a",$R["UNO"]);?>
               </td>
              <td>
              <?php echo $R["IUNO"]?>
           
              </td>
              <?php }?>
            </tr>
            <tr>
              <td>18°</td>
              <td>Despegue de Avión</td>
              <td>Gerente /Ejecutivo  de Tráfico</td>
              <?php if($R = mysqli_fetch_array($pasodieciocho)){?>
              <td>
			  
			 	<?php echo date("m-d-Y g:i a",$R["UNO"]);?>
               </td>
              <td>
              <?php echo $R["IUNO"]?>
           
              </td>
              <?php }?>
            </tr>
            <tr>
              <td>19°</td>
              <td>Documentacion de expediente</td>
              <td>Gerente</td>
              <?php if($R = mysqli_fetch_array($pasodiecinueve)){?>
              <td>
			  
			 	<?php echo date("m-d-Y g:i a",$R["UNO"]);?>
               </td>
              <td>
              <?php echo $R["IUNO"]?>
           
              </td>
              <?php }?>
            </tr>
            <tr>
              <td>20°</td>
              <td>Facturacion de cuenta de gastos americana</td>
              <td>Gerente</td>
              <?php if($R = mysqli_fetch_array($pasoveinte)){?>
              <td>
			  
			 	<?php echo date("m-d-Y g:i a",$R["UNO"]);?>
              </td>
              <td>
              <?php echo $R["IUNO"]?>
           
              </td>
              <?php }?>
            </tr>
          </tbody>
        </table>
       
      </article>
    </div>
    <?php } ?>
</div>
</body>
</html>