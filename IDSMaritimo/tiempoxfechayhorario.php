<?php
//ejemplo 4

$date1 = new DateTime("10:30:00"); // 01/19/2018 11:10 tiempo 1
$date2 = new DateTime("14:18:00"); //01/20/2018 9:10 am tiempo 2
 
$interval = date_diff($date1, $date2);
echo $interval->format('%R%a días %H horas %I minutos %S segundos');
 
# Eso te imprime "+379 días 06 horas 36 minutos 34 segundos"
?>