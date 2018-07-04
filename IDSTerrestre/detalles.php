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
$pasodoce =  mysqli_query($idCone,"SELECT * FROM pasodoce WHERE REF LIKE '$ref'");
$pasotrece =  mysqli_query($idCone,"SELECT * FROM pasotrece WHERE REF LIKE '$ref'");
$pasocatorce =  mysqli_query($idCone,"SELECT * FROM pasocatorce WHERE REF LIKE '$ref'");
$pasoquince =  mysqli_query($idCone,"SELECT * FROM pasoquince WHERE REF LIKE '$ref'");
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
              <td width="40%"><strong>CRITERIOS DE ACEPTACIÓN</strong></td>
              <td width="16%"><strong>ACEPTACIÓN</strong></td>
              <td width="11%"><strong>INICIALES</strong></td>
            </tr>
            <tr>
              <td>1°</td>
              <td>Recepción de Mercancias y Documentos</td>
              <td>Jefe de Bodefa/ Ejecutivo de Tráfico</td>
              <td>*Verificar cantidad y estado de los bultos(indicar discrepancias)<br>
                *Asignar número de entrada a bodega al embarque.<br>
              *Etiquetar bultos con código de control (EB).<br><br>

				*Recepcion de Documentos </td>
                <?php if($R = mysqli_fetch_array($pasouno)){?>
              <td>
			  
			 	<?php echo date("m-d-Y g:i a",$R["FECUNO"]);?><br><br><br><br>
             	<?php echo date("m-d-Y g:i a",$R["FECDOS"]);?>
              
             	</td>
              <td>
              <?php echo $R["INIUNO"]?><br><br><br><br>
             	<?php echo $R["INIDOS"]?>
              </td>
              <?php }?>
            </tr>
            <tr>
              <td>2°</td>
              <td>Revisión </td>
              <td>Revisador</td>
              <td>*Revisar fisicamente que las cartidades y caracteristicas de la mercancia coincida con las factueas o listas de empaques (en caso de daños,faltantes o sobrantes, elaborar reporte de discrepancias).<br>
              *Verificar la informacion de las facturas (pesos, origine,series, etc).</td>
              <?php if($R = mysqli_fetch_array($pasodos)){?>
              <td>
			  
			 	<?php echo date("m-d-Y g:i a",$R["FEC"]);?>
             	
              
             	</td>
              <td>
              <?php echo $R["INICIAL"]?>
             	
              </td>
              <?php }?>
            </tr>
            <tr>
              <td>3°</td>
              <td>Tráfico</td>
              <td>Ejecutivo de Tráfico</td>
              <td>*Verficar con el cliente la mercancia a importar<br>
              <br>
              *Revisar que las facturas y documentos del embarque estén completos y correctos(revisar fletes y otros costos)</td>
               <?php if($R = mysqli_fetch_array($pasotres)){?>
              <td>
			  
			 	<?php echo date("m-d-Y g:i a",$R["FECUNO"]);?><br><br>
             	<?php echo date("m-d-Y g:i a",$R["FECDOS"]);?>
              
             	</td>
              <td>
              <?php echo $R["INIUNO"]?><br><br>
             	<?php echo $R["INIDOS"]?>
              </td>
              <?php }?>
            </tr>
            <tr>
              <td>4°</td>
              <td>Clasificacion</td>
              <td>Clasificador</td>
              <td>*Verificar número de parte en la base de datos.<br>
                <br>
                *Solicitar fracción arancelaria de clasificador si no está en la base de datos
              <br></td>
              <?php if($R = mysqli_fetch_array($pasocuatro)){?>
              <td>
			  
			 	<?php echo date("m-d-Y g:i a",$R["FECUNO"]);?><br><br>
             	<?php echo date("m-d-Y g:i a",$R["FECDOS"]);?>
              
             	</td>
              <td>
              <?php echo $R["INIUNO"]?><br><br>
             	<?php echo $R["INIDOS"]?>
              </td>
              <?php }?>
            </tr>
            <tr>
              <td>5°</td>
              <td>Trafico</td>
              <td>Ejecutivo de Tráfico</td>
              <td>*Verficar fraccion arancerlaria de la mercancia y sus requisitos<br>
                *Documentar factura<br>
                <br>
                *Elaborar nota de revisión y cotización<br>
                *Verificar requisitos de importación<br>
                <br>
                *Enviar al cliente para que depositen impiestos y gastos<br>
                *Solicitar equipo de transporte</td>
               <?php if($R = mysqli_fetch_array($pasocinco)){?>
              <td>
			  
			 	<?php echo date("m-d-Y g:i a",$R["UNO"]);?><br><br><br>
             	<?php echo date("m-d-Y g:i a",$R["DOS"]);?><br><br><br>
              	<?php echo date("m-d-Y g:i a",$R["TRES"]);?>
             	</td>
              <td>
              <?php echo $R["IUNO"]?><br><br><br>
             	<?php echo $R["IDOS"]?><br><br><br>
                <?php echo $R["ITRES"]?>
              </td>
              <?php }?>
            </tr>
            <tr>
              <td>6°</td>
              <td>Revisión Nota</td>
              <td>Gerente </td>
              <td>*Revisar Nota de Revisión preparar COVES y los e-Documents</td>
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
              <td>Captura de pedimento</td>
              <td>Ejecutivo de trafico</td>
              <td>*Verificar que se tiene la información completa para elaborar pedimento(Nota de Revisión, número programa immex si aplica, etc)<br>
                *Imprimir copia de pedimento para revisión</td>
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
              <td>Revisión de pedimento</td>
              <td>Gerente / Ejecutivo de Tráfico</td>
              <td>*Revisar proforma de pedimento<br>
                *Verificar valor total de factura vs pedimento<br>
                *Verificar cumplimiento de requerimientos conforme anexo 22</td>
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
              <td>Confirmar depósito y equipo</td>
              <td>Ejecutivo de Tráfico / Asistente de Tráfico</td>
              <td>*Confirmar depósito de anticipo o financiamiento de impuestos <br>
                *Confirmar arribo del equipo de transporte y documentos</td>
               <?php if($R = mysqli_fetch_array($pasonueve)){?>
              <td>
			  
			 	<?php echo date("m-d-Y g:i a",$R["UNO"]);?><br>
                <?php echo date("m-d-Y g:i a",$R["DOS"]);?>
               </td>
              <td>
              <?php echo $R["IUNO"]?><br>
              <?php echo $R["IDOS"]?>
           
              </td>
              <?php }?>
            </tr>
            <tr>
              <td>10°</td>
              <td>Validación del pedimento</td>
              <td>Ejecutivo de Tráfico / Asistente de Tráfico</td>
              <td>*Validacion, pago, impresión,y armado de pedimentos<br>
                *Elaborar relacion de documentos</td>
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
              <td>Preparar documentos de importación</td>
              <td>Ejecutivo de Tráfico / Asistente de Tráfico</td>
              <td>*Elaborar EEI, relacion de carga y orden de remisión<br>
                <br>
                *Integrar al expediente los documentos (EEI y orden de remisión). comprobantes y las indicaciones para su facturacion</td>
               <?php if($R = mysqli_fetch_array($pasoonce)){?>
              <td>
			  
			 	<?php echo date("m-d-Y g:i a",$R["UNO"]);?><br>
			 	<br>
                <?php echo date("m-d-Y g:i a",$R["DOS"]);?>
              </td>
              <td>
              <?php echo $R["IUNO"]?><br>
              <br>
              <?php echo $R["IDOS"]?>
           
              </td>
              <?php }?>
            </tr>
            <tr>
              <td>12°</td>
              <td>Solicitar caga de mercancia</td>
              <td>Ejecutivo de Tráfico</td>
              <td>*Entregar relacion de carga a Jefe de Bodega</td>
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
              <td>Carga de mercancia</td>
              <td>Jefe de Bodega / Montecarguista</td>
              <td>*Separar y etiquetar mercancia conforme a la relacion de carga <br>
                *Cargar la cantidad total de bultos de la relacion de carga en vehiculo asignado, bloquear y tomar fotografia.<br>                <br></td>
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
              <td>Despacho de embarque</td>
              <td>Ejecutivo de Trafico / Asistente de Trafico/ Gerente</td>
              <td>*Confrontar pedimento contra Relacion de documentos<br>
                *Verificar pedimento lleve el acuese de validacion, pago y firma electronica<br>
                *Verificar que se le entrega la documentacion completa al Transfer<br>
                <br>
                *Seguimiento de cruce hasta entrega al transportista asignado<br></td>
               <?php if($R = mysqli_fetch_array($pasocatorce)){?>
              <td>
			  
			 	<?php echo date("m-d-Y g:i a",$R["UNO"]);?><br>
			 	<br>
			 	<br>
			 	<br>
<br>
                <?php echo date("m-d-Y g:i a",$R["DOS"]);?>
              </td>
              <td>
              <?php echo $R["IUNO"]?><br>
              <br>
              <br>
<br>
              <br>
              <?php echo $R["IDOS"]?>
           
              </td>
              <?php }?>
            </tr>
            <tr>
              <td>15°</td>
              <td>Facturación de cuenta de gastos americana</td>
              <td>Gerente</td>
              <td>*Revisar indicaciones y comprobantes para facturar<br>
                *Verificar tarifas vigentes para facturación<br>
                *Revisar que el expediente este completo pasu entrega a NLDO</td>
               <?php if($R = mysqli_fetch_array($pasoquince)){?>
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