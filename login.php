<?php
include("conect.php");
session_start();

$idCone = conectar();
if($_POST){
	$pass = $_POST["pass"];
	$contra =  MD5($pass);
	$username = $_POST["username"];
	$sql =  "SELECT  * FROM usuarios";
	$query =  mysqli_query($idCone,$sql);
	while($F = mysqli_fetch_array($query)){
		if($F['nombre']==$username &&$F["password"] == $contra){
				
			$_SESSION['AdminUser']=1;
			header("Location:index.php");
		}
	
	}
	
	}


 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login </title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="Recursos/login/images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="Recursos/login/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="Recursos/login/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="Recursos/login/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="Recursos/login/vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="Recursos/login/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="Recursos/login/vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="Recursos/login/css/util.css">
	<link rel="stylesheet" type="text/css" href="Recursos/login/css/main.css">
<!--===============================================================================================-->
</head>

<body>
	
	<div class="limiter">
		<div class="container-login100" style="background-image: url('Recursos/login/images/img-01.jpg');">
			<div class="wrap-login100 p-t-190 p-b-30">
				<form class="login100-form validate-form" method="post" action="Template.php">
					<div class="login100-form-avatar">
						<img src="Recursos/login/images/avatar-01.jpg" alt="AVATAR">
					</div>

					<span class="login100-form-title p-t-20 p-b-45">
						Iniciar Sesion
					</span>

					<div class="wrap-input100 validate-input m-b-10" data-validate = "Username is required">
						<input class="input100" type="text" name="username" placeholder="Username">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-user"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input m-b-10" data-validate = "Password is required">
						<input class="input100" type="password" name="password" placeholder="Password">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock"></i>
						</span>
					</div>

					<div class="container-login100-form-btn p-t-10">
						<input type="submit" value="Login" class="login100-form-btn">
						
					</div>

					<div class="text-center w-full p-t-25 p-b-230">
						<a href="#" class="txt1">
							Forgot Username / Password?
						</a>
					</div>

				


					
					<div class="text-center w-full">
						<a class="txt1" href="#">
							Create new account
							<i class="fa fa-long-arrow-right"></i>						
						</a>
					</div>
					
					
					<div class="text-center w-full">					
			<HEAD>
<STYLE type="text/css">
P#mipar {font-style: italic; color: blue}
</STYLE>
</HEAD>
<P id="mipar"> <i><small><b>Developed by: Ti Outsourcing Solution, LCC. / Ver: 1.1 @ 2018.11.09</b></small></i>


		</div>					
				</form>
			</div>
		</div>
	</div>
  
	
	

	
<!--===============================================================================================-->	
	<script src="Recursos/login/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="Recursos/login/vendor/bootstrap/js/popper.js"></script>
	<script src="Recursos/login/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="Recursos/login/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="Recursos/login/js/main.js"></script>

</body>
</html>