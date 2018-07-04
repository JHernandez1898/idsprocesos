<?php
//[code]// fecha_a es la primera fecha
$fecha_a= "1980/10/28";
// fecha_b en este caso es la fecha actual
$fecha_b= date("Y/m/d");

function dias_transcurridos($fecha_i,$fecha_f)
{
$dias = (strtotime($fecha_i)-strtotime($fecha_f))/86400;
$dias = abs($dias); $dias = floor($dias);
return $dias;
}

// fecha_a es la primera fecha
$fecha_a = "1980/10/28";
// fecha_b en este caso es la fecha actual
$fecha_b = date("Y/m/d");
function minutos_transcurridos($fecha_i,$fecha_f)
{
$minutos = (strtotime($fecha_i)-strtotime($fecha_f))/60;
$minutos = abs($minutos); $minutos = floor($minutos);
return $minutos;
}

<p> 
Días transcurridos =dias_transcurridos($fecha_a,$fecha_b);
</p>
?>