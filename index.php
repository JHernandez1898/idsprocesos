<?php
include("Template.php");
require("conect.php");
$idCone =  conectar();
$sql =  "SELECT *  FROM referencias";
$query = mysqli_query($idCone,$sql);

?>
<html>
<title></title>
<link href="Recursos/css/bootstrap.css" rel="stylesheet" type="text/css">
<head>
</head>
<body>
<div class="container">
	<div class="row">
    <h1 class="page-header" style="text-align: center">
    PROCEDIMIENTO DE IMPORTACION
    </h1>
    </div>
    
    <div class="row">
    	<article class="col-lg-11">
        </article>
    	<article class="col-lg-1">
        <form action="nuevo.php">
        <input type="submit" class="btn btn-default"  value="Nuevo">
        </form>
        </article>
    </div>
    
    <div class="row">
    	<article class="col-lg-12">
       	  <table width="200" class="table table-striped table-responsive" border="0">
        	  <tbody>
              <thead style="background-color:#699C95">
        	    <tr>
        	      <td>N°</td>
        	      <td>CLIENTE</td>
        	      <td>REFERENCIA</td>
        	      <td>EMBARQUE</td>
        	      <td>PEDIMENTO</td>
        	      <td>SUBDIVISIONES</td>
        	      <td>FECHA</td>
        	      <td>HORA</td>
        	      <td>PASO ACTUAL</td>
        	      <td></td>
        	      <td>&nbsp;</td>
      	      </tr>
              </thead>
              <?php while($F = mysqli_fetch_array($query)){ ?>
        	    <tr>
        	      <td><?php  echo $F["REF"]; ?></td>
        	      <td><?php  echo $F["CLIENTE"]; ?></td>
        	      <td><?php  echo $F["NREF"]; ?></td>
        	      <td><?php  echo $F["EMBARQUE"]; ?></td>
        	      <td><?php  echo $F["PEDIMENTO"]; ?></td>
        	      <td><?php  echo $F["SUBDIVISIONES"]; ?></td>
        	      <td><?php  echo date("Y-m-d",$F["FECNUM"]); ?></td>
        	      <td><?php  echo $F["HORA"]; ?></td>
        	      <td><?php  echo $F["PASO"]; ?></td>
        	      <td>
                  	<form action ="seguir.php" method="post">
                    	<input type="hidden" name="ref" value="<?php echo $F["REF"]; ?>">
                    	<input type="hidden" name="paso" value="<?php echo $F["PASO"]; ?>">
                        <input type="hidden" name="fecha" value="<?php echo $F["FECNUM"]; ?>">
                    	<input type="submit" class="btn btn-sm btn-success" value="Continuar">
                    </form>
                   </td>
        	      <td>
                  <form action ="detalles.php">
                    	<input type="submit" class="btn btn-sm btn-info" value="Detalles">
                    </form>
                  	</td>
      	      </tr>
              <?php  } ?>
      	    </tbody>
      	  </table>
        </article>
    </div>
</div>
</body>
</html>