<?php 
include("Template.php");
require("conect.php");
$idCone = conectar();
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>IDS</title>
<link href="Recursos/css/bootstrap.css" rel="stylesheet" type="text/css">
</head>
<body>
<div class="container">
    <div class="row">
        <h1 class="page-header" style="text-align:center">
       	 AGREGAR CLIENTE
        </h1> 
    </div>
    
    <div class="row">
    <article class="col-lg-12" align="center" >
    <form method="post" action="registrarcliente.php">
      <table class="table table-striped" align="center" width="200" border="0">
        <tbody>
         
          <tr>
            <td><p>NOMBRE:</p>
            <p><input type="text" class="input-sm" name="nombre"></p></td>
          </tr>
           </tbody>
      </table>
            <a href="nuevo.php"><input type="button" class="btn btn-sm btn-warning" value="Regresar"></a>      
         
            <input type="submit" class="btn btn-sm btn-success" value="Continuar">
       
         
          
          
       
    </form>
    </article>
    </div>
</div>
</body>
</html>