<?php


ini_set('max_execution_time', 300);
date_default_timezone_set("America/Mexico_City");
?>

<!DOCTYPE html>
<!-- Template by Quackit.com -->
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <title>Control IDS</title>

    <!-- Bootstrap Core CSS -->
    <link href="Recursos/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS: You can use this stylesheet to override any Bootstrap styles and/or apply your own styles -->
    <link href="Recursos/css/custom.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Logo and responsive toggle -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar">
                    <span class="sr-only">Toggle navi</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">
                	<span class="icon-bar"><a href="index.php?pagina=1&&paginax=1"><img class="active" src="Recursos/login/images/avatar-01.jpg" height="50" width="50"></a></span> 
                	
                </a>
            </div>
            <!-- Navbar links -->
            <div class="collapse navbar-collapse" id="navbar">
                <ul class="nav navbar-nav">
                    <li class="active">
                        <a href="index.php?pagina=1&&paginax=1">Home</a>
                    </li>
					<li>
                        <a href="index.php?pagina=1">Impo</a>
                    </li>
					<li>
                        <a href="index.php?pagina=1">Expo</a>
                    </li>
					<li>
                        <a href="index.php?pagina=1">Aereo</a>
                    </li>
					<li>
                        <a href="index.php?pagina=1">Ferrocarril</a>
                    </li>
                    <li>

                        <a href="index.php?pagina=1">Maritimo</a>
                    </li>
					<li>
                        <a href="index.php?pagina=1">Terrestre</a>
                    </li>
					<li>
                      

                        <a href="?Logout=yes&&pagina=1&&paginax=1">Cerrar Sesión</a>

                    </li>
                   
		
                </ul>

				<!-- Search -->
				<form class="navbar-form navbar-right" role="search">
					<div class="form-group">
						<input type="text" class="form-control">
					</div>
					<button type="submit" class="btn btn-default">Search</button>
				</form>

            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
