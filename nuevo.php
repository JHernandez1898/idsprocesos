<?php
require("Template.php");
include("conect.php");
$idCone  =  conectar();
$idsCone =  conectarIDS();

$sql =  "SELECT * FROM dbo.Clientes ORDER BY Nom ASC";
$query =  sqlsrv_query($idsCone,$sql);

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
        	Nueva entrada
        </h1>
    </div>
    
    <div class="row">
    	<article class="col-lg-12" align="center">
        <form  method="post" action="#">
          <table class="table table-bordered table-striped" width="200" border="1">
            <tbody>
              <tr>
                <td>
                <select name="cliente" class="input-lg">
                	<?php 
					while($F = sqlsrv_fetch_array($query)){
					?>
                    <option value="<?php echo $F["CLIENTE_ID"] ?>"><?php echo $F["Nom"]?></option>
                    
                    <?php 
					}
					?>
                </select>
                <input type="submit" class="btn btn-sm btn-success" value="Buscar Referencias">
                </td>
              </tr>
            </tbody>
          </table>
        </form>
        </article>
    </div>
    <?php if($_POST){
		$ncliente= $_POST["cliente"];
		 echo "Fecha : ".date("m-d-Y"); 
          echo " Hora : ".date("g:i a"); 
		$idsql = "SELECT * FROM dbo.Trafico WHERE dbo.Trafico.traCli LIKE '$ncliente'";
		$nom = "SELECT Nom FROM dbo.Clientes WHERE CLIENTE_ID LIKE '$ncliente'";
		$qunom=sqlsrv_query($idsCone,$nom);
		$nombre;
		if($T = sqlsrv_fetch_array($qunom)){
			$nombre  = $T["Nom"];
		}
		$idsquery = sqlsrv_query($idsCone,$idsql);
	
		?>
     <div class="row">
    	<article class="col-lg-12" align="center">
          <table class="table table-bordered table-striped"  width="200" border="1">
            <tbody>
              <tr>
                <td>&nbsp;</td>
                <td>Cliente</td>
                <td>Referencia</td>
                <td>Embarque</td>
                <td>Pedimento</td>
                <td>Subdivisiones</td>
               
                <td>&nbsp;</td>
              </tr>
              <?php
			  $c = 0;
			  while($R = sqlsrv_fetch_array($idsquery)){
				  ?>
				  <form action="registrarnuevo.php" method="post">
				  <?php
			 
				  $fe =  $R["traFechaAct"]->format("Y-m-d");
				  $fecnum = strtotime($fe);
				$mes = date("m") - 1;
				  $date =strtotime(date("Y-".$mes."-01"));
				  if($fecnum>=$date){
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
            
                <td><input type="submit" value="Comenzar" class="btn btn-sm btn-success"></td>
              </tr>
            </form>  
              <?php
				  }
				  } ?>
            </tbody>
          </table>
        </article>
    </div>
    <?php  } ?>
</div>
</body>
</html>