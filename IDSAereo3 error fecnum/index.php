<?php 
require("Template.php");
require("conect.php");
$idCone = conectar();

$mConsulta = "SELECT * FROM referencias";
$query = mysqli_query($idCone,$mConsulta);


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
	  <h1 class="page-header" style="text-align:center">Procedimiento de Embarque Aereo</h1> 

		
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
				   <td>Fecha Inicial</td>
				  <td>No. Paso</td> 
        	      <td>Tiempo Inicial</td>
                   <td>*Pendientes*</td>
        	      <td>*Despachados*</td>
                  <td>Pasos Procesados</td>
				  <td>Tiempo Finalizado</td>
      	      </tr>
              <?php while($R =  mysqli_fetch_array($query)){ ?>
        	    <tr>
        	      <td><?php echo $R["REF"] ?></td>
				   <td><?php echo $R["NREF"] ?></td>
        	      <td><?php echo $R["CLIENTE"] ?></td>
				    <td>&nbsp;</td>
					<td><?php  echo $R["PASO"]; ?></td>
					 <td>&nbsp;</td>
        	      <td> <table width="200" border="0">
        	        <tbody>
        	          <tr>
                        <?php 
						$c = 1;
						while($c <= 20){
							
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
      	      </tr>
              <?php   } ?>
      	    </tbody>
      	  </table>
        </article>
    </div>
</div>


</body>
</html>
