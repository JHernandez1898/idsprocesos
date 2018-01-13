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
$pasonce =  mysqli_query($idCone,"SELECT * FROM pasoonce WHERE REF LIKE '$ref'");
$pasodoce =  mysqli_query($idCone,"SELECT * FROM pasodoce WHERE REF LIKE '$ref'");
$pasotrece =  mysqli_query($idCone,"SELECT * FROM pasotrece WHERE REF LIKE '$ref'");
$pasocatorce =  mysqli_query($idCone,"SELECT * FROM pasocatorce WHERE REF LIKE '$ref'");
$pasoquince =  mysqli_query($idCone,"SELECT * FROM pasoquince WHERE REF LIKE '$ref'");
 ?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
<link href="Recursos/css/bootstrap.css" rel="stylesheet" type="text/css">
</head>
<body>
<div class="container">
	<div class="row">
    <h1 class="page-header" style="text-align:center">
    	Detalles
    </h1>
  </div>
    <div class="row">
    <article class="col-lg-2">
    </article>
    	<article class="col-lg-8">
        <?php if($A =  mysqli_fetch_array($referencias)){?>
    	  <table width="100%" height="162" border="1" class="table table-striped table-bordered">
    	    <tbody>
    	      <tr>
    	        <td><p>Cliente:</p>
   	            <p><?php echo $A["CLIENTE"]; ?></p></td>
    	        <td><p>Referencia:</p>
   	            <p><?php echo $A["NREF"]; ?></p></td>
    	        <td><p>Embarque:</p>
   	            <p><?php echo $A["EMBARQUE"]; ?></p></td>
    	        <td><p>Pedimento:</p>
   	            <p><?php echo $A["PEDIMENTO"]; ?></p></td>
  	        </tr>
    	      <tr>
    	        <td><p>Subdivisiones:</p>
   	            <p><?php echo $A["SUBDIVISIONES"]; ?></p></td>
    	        <td><p>Fecha:</p>
   	            <p><?php echo date("Y-m-d",$A["FECNUM"]); ?></p></td>
    	        <td><p>Hora inicio:</p>
   	            <p><?php echo $A["HORA"]; ?></p></td>
    	        <td><p>Etapa:</p>
   	            <p><?php 
				  if($A["PASO"] == 0 ){
					  echo "FINALIZADO";
				  }else{
					  echo $A["PASO"];
				  }
				    ?></p></td>
  	        </tr>
  	      </tbody>
  	    </table>
        <?php  } ?>
    	</article>
        <article class="col-lg-2">
    </article>
    </div>
    
      <div class="row">
    	<article class="col-lg-12">
        <?php if($B =  mysqli_fetch_array($pasouno)){ ?>
    	  <table width="591" border="1" class="table table-striped table-bordered">
    	    <tbody>
    	      <tr>
    	        <th width="18%" scope="col"><p>Recepcion de mercancias y documentos</p></th>
    	        <th width="45%" scope="col">CRITERIOS DE ACEPTACIÓN</th>
    	        <th width="23%" scope="col"><p>ACEPTACION</p></th>
    	        <th width="14%" scope="col">INICIALES</th>
  	        </tr>
    	      <tr>
    	        <td>Responsable: <br>
    	          Jefe de Bodega/Ejecutivo de trafico</td>
    	        <td><span class="alert-info text-info" style="text-align:left">*Verificar cantidad y estado de los bultos(indicar discrepancias)<br>
    	          *Asignar número de entrada a bodega al embarque.<br>
    	          *Etiquetar bultos con código de control (EB).</span></td>
    	        <td><p>
    	          <?php echo date("F j, Y, g:i a",$B["FECUNO"]);   ?>
  	          </p></td>
    	        <td>  <?php echo $B["INIUNO"];?></td>
  	        </tr>
    	      <tr>
    	        <td>&nbsp;</td>
    	        <td height="50"><span class="alert-info text-info" style="text-align:left">*Recepcion de Documentos </span></td>
    	        <td><p>
    	  
				<?php echo date("F j, Y, g:i a",$B["FECDOS"]);   ?>
  	          </p></td>
    	        <td>  <?php echo $B["INIDOS"];?></td>
  	        </tr>
  	      </tbody>
  	    </table>
        <?php  }
		?>
        </article>
    </div>
    
    
      <div class="row">
    	<article class="col-lg-12">
         <?php if($B =  mysqli_fetch_array($pasodos)){ ?>
    	  <table width="591" border="1" class="table table-striped table-bordered">
    	    <tbody>
    	      <tr>
    	        <th width="12%" scope="col">Revisión</th>
    	        <th width="58%" scope="col">CRITERIOS DE ACEPTACIÓN</th>
    	        <th width="17%" scope="col"><p>ACEPTACION</p></th>
    	        <th width="13%" scope="col">INICIALES</th>
  	        </tr>
    	      <tr>
    	        <td><p>Responsable:</p>
   	            <p>Revisador</p></td>
    	        <td><p><span class="alert-info text-info" style="text-align:left">*Revisar fisicamente que las cartidades y caracteristicas de la mercancia coincida con las factueas o listas de empaques (en caso de daños,faltantes o sobrantes, elaborar reporte de discrepancias).</span></p>
    	          <p><span class="alert-info text-info" style="text-align:left">*Verificar la informacion de las facturas (pesos, origine,series, etc).</span></p></td>
    	        <td><p>
    	         
    	           <?php echo date("F j, Y, g:i a",$B["FEC"]);   ?>
  	          </p></td>
    	        <td> <?php echo $B["INICIAL"];   ?></td>
  	        </tr>
  	      </tbody>
  	    </table>
        <?php } ?>
        </article>
    </div>
    
      <div class="row">
    	<article class="col-lg-12">
         <?php if($C =  mysqli_fetch_array($pasotres)){ ?>
    	  <table width="591" border="1" class="table table-striped table-bordered">
    	    <tbody>
    	      <tr>
    	        <th scope="col">Trafico</th>
    	        <th scope="col">CRITERIOS DE ACEPTACIÓN</th>
    	        <th scope="col"><p>ACEPTACION</p></th>
    	        <th scope="col">INICIALES</th>
  	        </tr>
    	      <tr>
    	        <td><p>Responsable: </p>
    	          <p>Ejecutivo de trafico/ Asistente de trafico</p></td>
    	        <td><span class="alert-info text-info" style="text-align:left">*Verificar con cliente la mercancia a importar.</span></td>
    	        <td><p>
    	          
    	          <?php echo date("F j, Y, g:i a",$C["FECUNO"]);   ?>
  	          </p></td>
    	        <td><?php echo $C["INIUNO"];   ?></td>
  	        </tr>
    	      <tr>
    	        <td>&nbsp;</td>
    	        <td><span class="alert-info text-info" style="text-align:left">*Revisar que las facturas y documentos del embarque entes completos y correctos.</span></td>
    	        <td><p>
    	         <?php echo date("F j, Y, g:i a",$C["FECDOS"]);   ?>
  	          </p></td>
    	        <td><?php echo $C["INIDOS"];   ?></td>
  	        </tr>
  	      </tbody>
  	    </table>
        <?php } ?>
        </article>
    </div>
    
      <div class="row">
    	<article class="col-lg-12">
         <?php if($D =  mysqli_fetch_array($pasocuatro)){ ?>
    	  <table width="591" border="1" class="table table-striped table-bordered">
    	    <tbody>
    	      <tr>
    	        <th scope="col">Clasificación</th>
    	        <th scope="col">CRITERIOS DE ACEPTACIÓN</th>
    	        <th scope="col"><p>ACEPTACION</p></th>
    	        <th scope="col">INICIALES</th>
  	        </tr>
    	      <tr>
    	        <td>Clasificación</td>
    	        <td><span class="alert-info text-info" style="text-align:left">*Verificar número de parte en la base de datos.</span></td>
    	        <td><p>
    	         <?php echo date("F j, Y, g:i a",$D["FECUNO"]);   ?>
  	          </p></td>
    	        <td><?php echo $D["INIUNO"];   ?></td>
  	        </tr>
    	      <tr>
    	        <td>&nbsp;</td>
    	        <td><span class="alert-info text-info" style="text-align:left">*Solicitar fraccion arancelaria a clasificacdor si no esta aen la base de datos</span></td>
    	        <td><p>
    	          <?php echo date("F j, Y, g:i a",$D["FECDOS"]);   ?>
  	          </p></td>
    	        <td><?php echo $D["INIDOS"]   ?></td>
  	        </tr>
  	      </tbody>
  	    </table>
        <?php } ?>
    	</article>
    </div>
    
    
      <div class="row">
    	<article class="col-lg-12">
        <?php  if($E =  mysqli_fetch_array($pasocinco)){ ?>
    	  <table width="591" border="1" class="table table-striped table-bordered">
    	    <tbody>
    	      <tr>
    	        <th scope="col">Trafico</th>
    	        <th scope="col">CRITERIOS DE ACEPTACIÓN</th>
    	        <th scope="col"><p>ACEPTACION</p></th>
    	        <th scope="col">INICIALES</th>
  	        </tr>
    	      <tr>
    	        <td>Ejecutivo de trafico</td>
    	        <td><span class="alert-info text-info" style="text-align:left">* Verificar fraccion arancelaria de la mercancia y sus requisistos<br>
    	          * Documentar Factura</span></td>
    	        <td><?php echo date("F j, Y, g:i a",$E["UNO"]);   ?> </td>
    	        <td>  <?php echo $E["IUNO"];   ?></td>
  	        </tr>
    	      <tr>
    	        <td>&nbsp;</td>
    	        <td><span class="alert-info text-info" style="text-align:left">* Elaborar nota de remisison y cotización<br>
    	          * Verificar requisistos de importación</span></td>
    	       <td><?php echo date("F j, Y, g:i a",$E["DOS"]);   ?> </td>
    	        <td>  <?php echo $E["IDOS"];   ?></td>
  	        </tr>
    	      <tr>
    	        <td>&nbsp;</td>
    	        <td><span class="alert-info text-info" style="text-align:left">*Enviar al cliente para que depositen impuestos y gastos<br>
    	          * Solicitar equipo de tranporte<br>
  	          </span></td>
    	       
    	         <td><?php echo date("F j, Y, g:i a",$E["TRES"]);   ?> </td>
    	        <td>  <?php echo $E["ITRES"];   ?></td>
  	        </tr>
  	      </tbody>
  	    </table>
        <?php  } ?>
        </article>
    </div>
    
    
      <div class="row">
    	<article class="col-lg-12">
        <?php if($F =  mysqli_fetch_array($pasoseis)){ ?>
    	  <table width="591" border="1" class="table table-striped table-bordered">
    	    <tbody>
    	      <tr>
    	        <th scope="col">Revisión Nota</th>
    	        <th scope="col">CRITERIOS DE ACEPTACIÓN</th>
    	        <th scope="col"><p>ACEPTACION</p></th>
    	        <th scope="col">INICIALES</th>
  	        </tr>
    	      <tr>
    	        <td>Responsable: Gerente</td>
    	        <td><p><span class="alert-info text-info" style="text-align:left">*Revisar nota de revision reparar COVES y los e-Documents</span><span class="alert-info text-info" style="text-align:left">.</span></p></td>
    	         <td><?php echo date("F j, Y, g:i a",$F["UNO"]);   ?> </td>
    	        <td>  <?php echo $F["IUNO"];   ?></td>
  	        </tr>
  	      </tbody>
  	    </table>
        <?php } ?>
        </article>
    </div>
    
      <div class="row">
    	<article class="col-lg-12">
        <?php  if($G =  mysqli_fetch_array($pasosiete)){ ?>
    	  <table width="591" border="1" class="table table-striped table-bordered">
    	    <tbody>
    	      <tr>
    	        <th scope="col">Captura de pedimento </th>
    	        <th scope="col">CRITERIOS DE ACEPTACIÓN</th>
    	        <th scope="col"><p>ACEPTACION</p></th>
    	        <th scope="col">INICIALES</th>
  	        </tr>
    	      <tr>
    	        <td>Ejecutivo de trafico</td>
    	        <td><p><span class="alert-info text-info" style="text-align:left">*Verificar que se tiene la informacion completa para elaborar pedimento</span><span class="alert-info text-info" style="text-align:left"> (Nota de remosion, número programa immex si aplica,etc).<br>
    	          * Imprimir copia del pedimento para revisión</span></p></td>
    	         <td><?php echo date("F j, Y, g:i a",$G["UNO"]);   ?> </td>
    	        <td>  <?php echo $G["IUNO"];   ?></td>
  	        </tr>
  	      </tbody>
  	    </table>
        <?php  } ?>
        </article>
    </div>
    
      <div class="row">
    	<article class="col-lg-12">
        <?php if($H = mysqli_fetch_array($pasoocho)){?>
    	  <table width="591" border="1" class="table table-striped table-bordered">
    	    <tbody>
    	      <tr>
    	        <th scope="col">Revision del pedimento</th>
    	        <th scope="col">CRITERIOS DE ACEPTACIÓN</th>
    	        <th scope="col"><p>ACEPTACION</p></th>
    	        <th scope="col">INICIALES</th>
  	        </tr>
    	      <tr>
    	        <td>Responsable: Gerente/ Ejecutivo de Trafico</td>
    	        <td><p><span class="alert-info text-info" style="text-align:left">*Revisar proforma de pedimento</span><span class="alert-info text-info" style="text-align:left">.<br>
    	          * Verificar valor total de factura vs pedimento<br>
    	          *Verificar cumplimiento de requiereimiento conforme anexo 22</span></p></td>
    	         <td><?php echo date("F j, Y, g:i a",$H["UNO"]);   ?> </td>
    	        <td>  <?php echo $E["IUNO"];   ?></td>
  	        </tr>
  	      </tbody>
  	    </table>
        </article>
        <?php  } ?>
    </div>
    
      <div class="row">
    	<article class="col-lg-12">
        <?php  if($I =  mysqli_fetch_array($pasonueve)){?>
    	  <table width="591" border="1" class="table table-striped table-bordered">
    	    <tbody>
    	      <tr>
    	        <th scope="col">Confirmar deposito y equipo</th>
    	        <th scope="col">CRITERIOS DE ACEPTACIÓN</th>
    	        <th scope="col"><p>ACEPTACION</p></th>
    	        <th scope="col">INICIALES</th>
  	        </tr>
    	      <tr>
    	        <td>Ejecutivo de Tráfico</td>
    	        <td><span class="alert-info text-info" style="text-align:left">*Confirmar deposito de anticipo o financiamiento de impuestos..</span></td>
    	        <td><?php echo date("F j, Y, g:i a",$I["UNO"]);   ?> </td>
    	        <td>  <?php echo $I["IUNO"];   ?></td>
  	        </tr>
    	      <tr>
    	        <td>&nbsp;</td>
    	        <td><span class="alert-info text-info" style="text-align:left">*Confirmar arribo del equipo de tranporte y documentos..</span></td>
    	        <td><?php echo date("F j, Y, g:i a",$I["DOS"]);   ?> </td>
    	        <td>  <?php echo $I["IDOS"];   ?></td>
  	        </tr>
  	      </tbody>
  	    </table>
        <?php  } ?>
        </article>
    </div>
    
    
      <div class="row">
    	<article class="col-lg-12">
        <?php if($J =  mysqli_fetch_array($pasodiez)){ ?>
    	  <table width="591" border="1" class="table table-striped table-bordered">
    	    <tbody>
    	      <tr>
    	        <th scope="col">Validación del pedimento</th>
    	        <th scope="col">CRITERIOS DE ACEPTACIÓN</th>
    	        <th scope="col"><p>ACEPTACION</p></th>
    	        <th scope="col">INICIALES</th>
  	        </tr>
    	      <tr>
    	        <td>Ejecutivo de trafico/ Asistente de trafico</td>
    	        <td><p><span class="alert-info text-info" style="text-align:left">*Validacion, pago, impresion y armado de pedimentos<br>
    	          *Elaborar relacion de documentos </span></p></td>
    	       <td><?php echo date("F j, Y, g:i a",$J["UNO"]);   ?> </td>
    	        <td>  <?php echo $J["IUNO"];   ?></td>
  	        </tr>
  	      </tbody>
  	    </table><?php  } ?>
        </article>
    </div>
    
    
      <div class="row">
    	<article class="col-lg-12">
        <?php if($K = mysqli_fetch_array($pasonce)){ ?>
    	  <table width="591" border="1" class="table table-striped table-bordered">
    	    <tbody>
    	      <tr>
    	        <th scope="col">Preparar documentos de imporatacion</th>
    	        <th scope="col">CRITERIOS DE ACEPTACIÓN</th>
    	        <th scope="col"><p>ACEPTACION</p></th>
    	        <th scope="col">INICIALES</th>
  	        </tr>
    	      <tr>
    	        <td>Ejecutivo de Trafico / Asistente de Tráfico</td>
    	        <td><span class="alert-info text-info" style="text-align:left">*Elaborar EEI, relacion de carga y orden de remisión.</span></td>
    	         <td><?php echo date("F j, Y, g:i a",$K["UNO"]);   ?> </td>
    	        <td>  <?php echo $K["IUNO"];   ?></td>
  	        </tr>
    	      <tr>
    	        <td>&nbsp;</td>
    	        <td><span class="alert-info text-info" style="text-align:left">*Integrar al expediente losdocumentos (EEI y orden de remision) comprobantes y las indicaciones para su facturación.</span></td>
    	        <td><?php echo date("F j, Y, g:i a",$K["DOS"]);   ?> </td>
    	        <td>  <?php echo $K["IDOS"];   ?></td>
  	        </tr>
  	      </tbody>
  	    </table>
        <?php  } ?>
        </article>
    </div>
    
    
      <div class="row">
    	<article class="col-lg-12">
        <?php if($L = mysqli_fetch_array($pasodoce)) {  ?>
    	  <table width="591" border="1" class="table table-striped table-bordered">
    	    <tbody>
    	      <tr>
    	        <th scope="col"><p>Solicitar Carga de mercancias</p></th>
    	        <th scope="col">CRITERIOS DE ACEPTACIÓN</th>
    	        <th scope="col"><p>ACEPTACION</p></th>
    	        <th scope="col">INICIALES</th>
  	        </tr>
    	      <tr>
    	        <td>Responsable: Ejecutivo de Trafico / <br>
   	            Asistente de Tráfico</td>
    	        <td><p><span class="alert-info text-info" style="text-align:left">*Entregar relacion de carga a Jefe de Bodega </span></p></td>
    	        <td><?php echo date("F j, Y, g:i a",$L["UNO"]);   ?> </td>
    	        <td>  <?php echo $L["IUNO"];   ?></td>
  	        </tr>
  	      </tbody>
  	    </table>
        <?php }  ?>
        </article>
    </div>
    
    
      <div class="row">
    	<article class="col-lg-12">
        <?php  if($M =  mysqli_fetch_array($pasotrece)){?>
    	  <table width="591" border="1" class="table table-striped table-bordered">
    	    <tbody>
    	      <tr>
    	        <th scope="col">Carga de mercancias</th>
    	        <th scope="col">CRITERIOS DE ACEPTACIÓN</th>
    	        <th scope="col"><p>ACEPTACION</p></th>
    	        <th scope="col">INICIALES</th>
  	        </tr>
    	      <tr>
    	        <td>Ejecutivo de trafico</td>
    	        <td><p><span class="alert-info text-info" style="text-align:left">*Separar y etiquetar mercancia conforme a la relacion de carga<br>
    	          <br>
    	          *Cargar la cantidad total de bultos de la relacion de carga en vehiculo asiganado, bloquear y tomar fotografia </span></p></td>
    	        <td><?php echo date("F j, Y, g:i a",$M["UNO"]);   ?> </td>
    	        <td>  <?php echo $M["IUNO"];   ?></td>
  	        </tr>
  	      </tbody>
  	    </table>
        <?php  } ?>
        </article>
    </div>
    
    
      <div class="row">
    	<article class="col-lg-12">
        <?php if($N =  mysqli_fetch_array($pasocatorce)){ ?>
    	  <table width="591" border="1" class="table table-striped table-bordered">
    	    <tbody>
    	      <tr>
    	        <th scope="col">Despacho de embarque</th>
    	        <th scope="col">CRITERIOS DE ACEPTACIÓN</th>
    	        <th scope="col"><p>ACEPTACION</p></th>
    	        <th scope="col">INICIALES</th>
  	        </tr>
    	      <tr>
    	        <td>Ejecutivo de trafico/ Asistente de trafico / Gerente</td>
    	        <td><span class="alert-info text-info" style="text-align:left">*Confrontar pedimeto con Relacion de Documentos<br>
    	          *Verificar que pedimento lleve el acuse de validacion, pago y firma electronica<br>
    	          *Verificar que se le entrega la documentacion compleata al Tranfer </span></td>
    	        <td><?php echo date("F j, Y, g:i a",$N["UNO"]);   ?> </td>
    	        <td>  <?php echo $N["IUNO"];   ?></td>
  	        </tr>
    	      <tr>
    	        <td>&nbsp;</td>
    	        <td><span class="alert-info text-info" style="text-align:left">*Seguimiento de cruce hasta entrega al transportista asignado.</span></td>
    	        <td><?php echo date("F j, Y, g:i a",$N["DOS"]);   ?> </td>
    	        <td>  <?php echo $N["IDOS"];   ?></td>
  	        </tr>
  	      </tbody>
  	    </table>
        <?php }  ?>
        </article>
    </div>
    
      <div class="row">
    	<article class="col-lg-12">
        <?php if($O =  mysqli_fetch_array($pasoquince)){?>
    	  <table width="591" border="1" class="table table-striped table-bordered">
    	    <tbody>
    	      <tr>
    	        <th scope="col">Facturacion de gastos de cuenta americana</th>
    	        <th scope="col">CRITERIOS DE ACEPTACIÓN</th>
    	        <th scope="col"><p>ACEPTACION</p></th>
    	        <th scope="col">INICIALES</th>
  	        </tr>
    	      <tr>
    	        <td>&nbsp;</td>
              
    	        <td><p><span class="alert-info text-info">*Revisar indicaciones y comprobantes para facturar<br>
    	          *Verificar tarifas vigentes para facturación.<br>
    	          *Revisar que el expediente este completo para su entrega NLDO. </span></p></td>
    	        <td><?php echo date("F j, Y, g:i a",$O["UNO"]);   ?> </td>
    	        <td>  <?php echo $O["IUNO"];   ?></td>
  	        </tr>
  	      </tbody>
  	    </table>
        <?php  } ?>
        </article>
    </div>
</div>
</body>
</html>