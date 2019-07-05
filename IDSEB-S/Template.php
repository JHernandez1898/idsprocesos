


<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width,initial-scale=1" />
<link href="Recursos/css/nav.css" rel="stylesheet" type="text/css">
<img src="Recursos/imagenes/logo.PNG" width="100" height="100" ><br>
<div class="div">
<nav id="nav" role="navigation"> <a href="#nav" title="Show navigation">Show navigation</a> <a href="#" title="Hide navigation">Hide navigation</a>
      <ul class="clearfix">
			<li><a href="..\index.php?pagina=1&&paginax=1&&fecha='2019-01-01'">Home</a></li>
			<li> <a href=""><span>Despacho Terrestre</span></a>
			<ul>
				<li><a href="/idsProcesos/idsTerrestre/index.php">Importación</a></li>
				<li><a href="">Exportación</a></li>
			</ul>
			</li>
			<li> <a href=""><span>Despacho Maritimo</span></a>
			<ul>
				<li><a href="/idsProcesos/idsMaritimo/index.php">Importación</a></li>
				<li><a href="">Exportación</a></li>
			</ul>
			</li>
       
			<li> <a href=""><span>Despacho Aereo</span></a>
			<ul>
				<li><a href="/idsProcesos/idsAereo/index.php">Importación</a></li>
				<li><a href="">Exportación</a></li>
			</ul>
			</li>
			<!--<li><a href = "reportes.php" > Reportes EB</a></li>-->
      </ul>
</nav>
</div>  
<script src="http://osvaldas.info/examples/main.js"></script>

<script src="http://osvaldas.info/examples/drop-down-navigation-touch-friendly-and-responsive/doubletaptogo.js"></script> 
  
<script>
    $( function()
    {
        $( '#nav li:has(ul)' ).doubleTapToGo();
    });
</script>