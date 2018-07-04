<?php 
date_default_timezone_set('America/Mexico_City');
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
        	Detalles Maritimo
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
              <td>Recepción de Mercancias y Documentos</td>
              <td>Jefe de Bodefa/ Ejecutivo de Tráfico</td>
              <?php if($R = mysqli_fetch_array($pasouno)){?>
              <td>
			  
			 	<?php echo date("m-d-Y g:i a",$R["UNO"]);?><br><br><br></td>
              <td>
              <?php echo $R["IUNO"]?><br><br><br><br></td>
              <?php }?>
            </tr>
    
     
  
 


            <tr>
              <td>8°</td>
              <td>Despacho de Embarque</td>
              <td>Personal de Tráfico</td>
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
              <td>Zarpe de Buque</td>
              <td>Personal de Tráfico</td>
              <?php if($R = mysqli_fetch_array($pasonueve)){?>
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