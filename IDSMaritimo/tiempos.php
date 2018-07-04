<?php 
echo date("a") // este parametro permite poner el (pm) en modo minuscula de la hora
?>
<?php 
echo date("A") // este parametro permite poner el (PM) en modo mayuscula de la hora
?>
<?php 
echo date("B") // este parametro permite poner el tiempo en modo de la hora en formato de microsegundos
?>
<?php 
echo date("g") // este parametro permite poner el tiempo en formato de 12 horas
?>
<?php 
echo date("G") // este parametro permite poner el tiempo en formato de 24 horas
?>
<?php 
echo date("h") // este parametro permite poner la hora en modo de 12 horas
?>
<?php 
echo date("H") // este parametro permite poner la hora en modo de 24 horas
?>
<?php 
echo date("i") // este parametro permite poner los minutos
?>
<?php 
echo date("s") // este parametro permite poner los segundos
?>
<?php 
echo date("u") // este parametro permite poner los microsegundos
?>
<?php 
	date_default_timezone_set("America/Monterrey");
	echo date("e"); // este parametro muestra la zona horaria
?>