<?php 
include("Template.php");
require("conect.php");
$idCone = conectar();
$sql =  "SELECT * FROM referencias";
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
        	Reportes
      </h1>
    </div>
    <div class="row">
    	<article class="col-lg-12">
          <table class="table table-striped table-bordered" align="center" width="200" border="1">
            <tbody>
              <tr>
                <td>Por referencia individual</td>
                <td>Por Fecha</td>
              </tr>
              <tr align="center">
                <td>
                <form action="individual.php" method="post">
                <select class="input-sm" name="referencia">
                <?php 
				$query = mysqli_query($idCone,$sql);
				while($F =mysqli_fetch_array($query)){
					?>
                   <option value="<?php echo $F["REF"] ?>" > <?php echo $F["NREF"]?></option> 
                    
				<?php } ?>
                 </select><br>
<br>

              	<input type="submit" value="Ir" class="btn btn-sm btn-success">
               
                </form>
                </td>
                <td>
                <form action="porfecha.php" method="post">
                Del día: <br>
				<input type="date" class="input-sm" name="fecuno" required><br>
				Al día:<br>
				<input type="date" class="input-sm" name="fecdos" required><br>
                <br>
				<input type="submit" value="Ir" class="btn btn-sm btn-success">
                </form>
                </td>
              </tr>
            </tbody>
          </table>
        </article>
    </div>
</div>
</body>
</html>