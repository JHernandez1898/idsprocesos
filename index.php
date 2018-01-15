<?php
session_start();
include("Template.php");
require("conect.php");
  if (!isset($_SESSION['AdminUser']))  header('Location: login.php'); 
  if (isset($_GET["Logout"])) { unset($_SESSION["AdminUser"]); }
$idCone =  conectar();
$sql =  "SELECT *  FROM referencias";
$query = mysqli_query($idCone,$sql);

?>
<html>
<head>
<link href="Recursos/css/bootstrap.css" rel="stylesheet" type="text/css">
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
        	      <td>REFERENCIA</td>
        	    
        	      <td></td>
        	      <td>&nbsp;</td>
      	      </tr>
              </thead>
              <?php while($F = mysqli_fetch_array($query)){ ?>
        	    <tr>
        	      <td><?php  echo $F["REF"]; ?></td>
        	      <td><?php  echo $F["NREF"]; ?></td>
       
        	      
        	      <td>
                
                  	<?php 
					$ref = $F["REF"];
                  echo "<a href='seguir.php?ref=$ref'>";
                  echo "<input type='submit' class='btn btn-sm btn-success' value='Seguir'>";
				  echo "</a>";
                    ?>
                
				  
                    
                   </td>
        	      <td>
                  <?php $ref = $F["REF"];
                  echo "<a href='detalles.php?ref=$ref'>";
                  echo "<input type='submit' class='btn btn-sm btn-info' value='Detalles'>";
				  echo "</a>";
                    ?>
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
