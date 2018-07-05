<?php
$date21 = new DateTime("2017-01-01");
$date22 = new DateTime("2017-12-31"); // si altero la fecha sumara mas dias

$date23 = new DateTime("2017-01-01");
$date24 = new DateTime("2018-12-31"); // si altero la fecha sumara mas dias
////$date21 = "2017-01-01"
////$date22 = "2017-12-31"
//$date8 = date("Y-m-d h:i ",$R["UNO"]);
//			$d8 = $R["UNO"];

//$date21 = date_create($date21);
//$date22 = date_create($date22);


    // Sumas el tiempo que sea
    $date22->modify('+0 day'); // sisumo 10 dias ejemplo ('+10 day'); se sumaran mas el resultado de fechas date1 y date2
    $date22->modify('+01 hour'); // suman 7 horas si agrego +49 hour
    $date22->modify('+0 minute'); // suman 404 minute
    $date22->modify('+0 second');

    // Calculas la diferencia
    $interval = $date21->diff($date22);
	
	 $interval23 = $date23->diff($date24);
	

    // Formateas y muestras la diferencia
    echo $interval->format('%R%a días %H horas %I minutos %S segundos');  
	
	   echo $interval23->format('%R%a días %H horas %I minutos %S segundos'); 
?>	   
<?php
	   // ejemplo 3
	   $date = new DateTime("2017-01-01");
$interval = new DateInterval("P10DT49H404M0S");
echo $date->format("Y-m-d H:i:s"); //imprime 2017-01-13 07:44:00
?>
<?php
//ejemplo 4

$date1 = new DateTime("2009-10-11 14:52:26");
$date2 = new DateTime("2010-10-25 21:29:00");
 
$interval = date_diff($date1, $date2);
echo $interval->format('%R%a días %H horas %I minutos %S segundos');
 
# Eso te imprime "+379 días 06 horas 36 minutos 34 segundos"
?>
<?php
// ejemplo 5



  // La cantidad de minutos es la suma que ya tengo de dividir los días y horas a minutos
    $min = 17744;
    //obtener segundos
    $sec = $min * 60;
    //dias es la division de n segs entre 86400 segundos que representa un dia
    $dias=floor($sec/86400);
    echo $dias.'<br>'; // Es igual a 12
    //mod_hora es el sobrante, en horas, de la division de días; 
    $mod_hora=$sec%86400;
    //hora es la division entre el sobrante de horas y 3600 segundos que representa una hora;
    $horas=floor($mod_hora/3600); 
    echo $horas.'<br>'; // Es igual a 7
    //mod_minuto es el sobrante, en minutos, de la division de horas; 
    $mod_minuto=$mod_hora%3600;
    //minuto es la division entre el sobrante y 60 segundos que representa un minuto;
    $minutos=floor($mod_minuto/60);
    echo $minutos.'<br>'; // Es igual a 44


	   
//$datetime1 = date_create($d8);
//$datetime2 = date_create($d1);
//$interval = date_diff($datetime1, $datetime2);
//$dias  = $interval->format("%a");
//$horas =  $interval->format("%H");
//$total6 = $dias+$horas;
?>
<?php
//////ejemplo 6
function seg_a_dhms($seg) {  
    $d = floor($seg / 86400); 
    $h = floor(($seg - ($d * 86400)) / 3600); 
    $m = floor(($seg - ($d * 86400) - ($h * 3600)) / 60); 
    $s = $seg % 60;  

return "$d Días, $h horas, $m minutos, $s segundos";  
} 
$fechaInicial = '2013-04-11 00:34:19'; //esta es con dato manual
$fechaFinal = '2013-04-12 01:35:50'; //
$segundos = strtotime($fechaFinal) - strtotime($fechaInicial); 

$tiempo_transcurrido = seg_a_dhms( $segundos ); 
echo $tiempo_transcurrido; 

$fecha1 = new DateTime($fechaInicial); //($resultado_de_tu_campo_de_fecha_1); esta es con variable
$fecha2 = new DateTime(); //($resultado_de_tu_campo_de_fecha_2);
$fecha = $fecha1->diff($fecha2);
printf('%d años, %d meses, %d días, %d horas, %d minutos', $fecha->y, $fecha->m, $fecha->d, $fecha->h, $fecha->i);
?>
	
	
