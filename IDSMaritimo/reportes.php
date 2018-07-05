<?php 
include("Template.php");
require("conect.php");
$idCone = conectar();
$sql =  "SELECT * FROM referencias ORDER BY NREF ASC";
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
        	Reportes Maritimo
      </h1>
    </div>
    <div class="row">
    	<article class="col-lg-12">
          <table class="table table-striped table-bordered" align="center" width="200" border="1">
            <tbody>
              <tr>
                <td>Por referencia individual</td>
                <td>Reporte de tiempos de importación</td>
              </tr>
              <tr align="center">
                <td><form action="individualexcel.php" method="post">
                  <select class="input-sm" name="referencia">
                    <?php 
				$query = mysqli_query($idCone,$sql);
				while($F =mysqli_fetch_array($query)){
					?>
                    <option value="<?php echo $F["REF"] ?>" > <?php echo $F["NREF"]?></option>
                    <?php } ?>
                  </select>
                  <br>
                  <br>
                  <input type="submit" value="Ir" class="btn btn-sm btn-success">
                </form></td>
                <form  action="mensualexcel.php" method="post">
                <td><p>
                  <label for="month">Mes:</label>
                  <input type="month" name="month" id="month" value =<?php echo date("Y-m")?>>
                  </p>
                  <p>
                    <input type="submit" value="Ir" class="btn btn-sm btn-success">
                  </p>
                <p>&nbsp;</p></td>
              
              </form>
            </tbody>
          </table>
        </article>
    </div>
</div>
</body>
</html>