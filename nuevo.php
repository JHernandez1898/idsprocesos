<?php
require("Template.php");
include("conect.php");
$idCone  =  conectar();
$sql =  "SELECT * FROM clientes";
$query =  mysqli_query($idCone,$sql);

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
        	NUEVA ENTRADA
        </h1>
    </div>
    
    <div class="row">
    	<article class="col-lg-12" align="center">
        <form  method="post" action="registrarnuevo.php">
    	  <table width="638" class="table table-striped" align="center" border="0">
    	    <tbody>
    	      <tr>
    	        <td><p>CLIENTE:</p>
   	            <p>
                <select name="cliente" class="input-sm">
                	<?php 
					while($F = mysqli_fetch_array($query)){
						?>
                        <option value="<?php $F["razonsocial"]?>" ><?php  echo $F["razonsocial"];?></option>
                        <?php
					}
					
					?>
                    
                	</select>
                    <a href="nuevocliente"><input type="button" class="btn btn-default" value ="nuevo"></a></p>
                    </td>
    	        <td><p>N° REFERENCIA</p>
   	            <p><input type="text" class="input-sm" name = "ref"></p></td>
  	        </tr>
    	      <tr>
    	        <td><p>EMBARQUE</p>
   	            <p><select name="embarque">
                <option>Consolidado</option>
                <option>Directo</option>
                </select></p></td>
    	        <td><p>N° DE PEDIMENTO</p>
   	            <p><input type="text" class="input-sm" name = "pedimento"></p></td>
  	        </tr>
    	      <tr>
    	        <td><p>SUBDIVISIONES</p>
   	            <p><input type="text" class="input-sm" name = "subdivisiones"></p></td>
    	        <td><p>FECHA</p>
   	            <p><input type="date" class="input-sm" name = "fecha"></p></td>
  	        </tr>
    	      <tr>
    	        <td><p>HORA</p>
   	            <p><input type="time" class="input-sm" name = "hora"></p></td>
    	        <td>&nbsp;</td>
  	        </tr>
  	      </tbody>
  	    </table>
    	  <input type="submit" class="input-sm btn btn-success" name = "Cliente2">
        </form>
        </article>
    </div>
</div>
</body>
</html>