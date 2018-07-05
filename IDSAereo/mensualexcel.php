<?php
include("conect.php");
$idCone = conectar();
$mes =  $_POST["month"];
$fecnum = strtotime($mes);
$SQL = "SELECT * FROM referencias WHERE FECNUM >='$fecnum'";
$query = mysqli_query($idCone,$SQL);

/** Incluye PHPExcel */
require_once("Recursos/excel/PHPExcel/PHPExcel/Classes/PHPExcel.php");
// Crear nuevo objeto PHPExcel
$objPHPExcel = new PHPExcel();
// Propiedades del documento
$objPHPExcel->getProperties()->setCreator("IDS")
							 ->setLastModifiedBy("IDS")
							 ->setTitle("mes")
							 ->setSubject("Office 2010 XLSX REPORTE")
							 ->setDescription("Reporte,generado usando clases de PHP.")
							 ->setKeywords("office 2010 openxml php")
							 ->setCategory("Archivo de reporte");
							 
$objPHPExcel->setActiveSheetIndex(0)->mergeCells('A1:E1');

$objPHPExcel->setActiveSheetIndex(0)
			->setCellValue('B6', '1')
			->setCellValue('B7', '2')
			->setCellValue('B8', '3')
            ->setCellValue('B9', '4')
            ->setCellValue('B10', '5')
			->setCellValue('B11', '6')
			->setCellValue('B12', '7')
			->setCellValue('B13', '8')
			->setCellValue('B14', '9')
			->setCellValue('B15', '10')
			->setCellValue('B16', '11')
            ->setCellValue('B17', '12')
            ->setCellValue('B18', '13')
			->setCellValue('B19', '14')
			->setCellValue('B20', '15')
			->setCellValue('B21', '16')
			->setCellValue('B22', '17')
            ->setCellValue('B23', '18')
			->setCellValue('B24', '19')
			->setCellValue('B25', '20');
			
$objPHPExcel->setActiveSheetIndex(0)
			->setCellValue('C6', 'Recepción de Mercancías')
			->setCellValue('C7', 'Revision')
			->setCellValue('C8', 'Tráfico')
            ->setCellValue('C9', 'Trafico')
            ->setCellValue('C10', 'Captura de EEI')
			->setCellValue('C11', 'Revisión de EEI')
			->setCellValue('C12', 'Gestion ante Aduana CBP')
			->setCellValue('C13', 'Solicitud de equipo')
			->setCellValue('C14', 'Solicitar carga de mercancia')
			->setCellValue('C15', 'Carga de mercancía')
			->setCellValue('C16', 'Llegada de custodia')
            ->setCellValue('C17', 'Envío de mercancia al aeropuerto')
            ->setCellValue('C18', 'Descarga de Mercancía')
			->setCellValue('C19', 'Arribo de avión')
			->setCellValue('C20', 'Inspeccion por parte de Aduana CBP')
			->setCellValue('C21', 'Supervisar Carga')
			->setCellValue('C22', 'Despacho de avión')
			->setCellValue('C23', 'Despegue de avión')
			->setCellValue('C24', 'Documentacion de expediente')
			->setCellValue('C25', 'Facturacion de cuenta de gastos americana');
			
$objPHPExcel->setActiveSheetIndex(0)
			->setCellValue('D6', 'Jefe de Bodega/\r Encargado Entrada a Bodega')
			->setCellValue('D7', 'Revisador')
			->setCellValue('D8', 'Ejecutivo de Trafico/\rAsistente de Trafico')
            ->setCellValue('D9', 'Gerente/\rEjecutivo de Tráfico')
            ->setCellValue('D10', 'Gerente/\rEjecutivo de Tráfico')
			->setCellValue('D11', 'Gerente/\rEjecutivo de Tráfico')
			->setCellValue('D12', 'Gerente/\rEjecutivo de Tráfico')
			->setCellValue('D13', 'Gerente/\rEjecutivo de Tráfico')
			->setCellValue('D14', 'Ejecutivo de trafico/Asistente de tráfico')
			->setCellValue('D15', 'Jefe de bodega')
			->setCellValue('D16', 'Gerente/\rEjecutivo de Tráfico')
            ->setCellValue('D17', 'Gerente/\rEjecutivo de Tráfico')
            ->setCellValue('D18', 'Gerente/\rEjecutivo de Tráfico')
			->setCellValue('D19', 'Gerente/\rEjecutivo de Tráfico')
			->setCellValue('D20', 'Jefe de Bodega/\rEjecutivo de Trafico/\r Asistente de Trafico')
			->setCellValue('D21', 'Jefe de Bodega/\rEjecutivo de Trafico/\r Asistente de Trafico')
			->setCellValue('D22', 'Gerente/\rEjecutivo de Tráfico')
			->setCellValue('D23', 'Gerente/\rEjecutivo de Tráfico')
			->setCellValue('D24', 'Gerente')
			->setCellValue('D25', 'Gerente');
			
$objPHPExcel->setActiveSheetIndex(0)
//			->setCellValue('D27', '2-1') de exta forma precenta la formula Suma=G1+G2
//			->setCellValue('D28', '4-2')
//			->setCellValue('D29', '6-4')
//			->setCellValue('D30', '7-6')
//			->setCellValue('D31', '10-7')
//			->setCellValue('D32', '12-10')
//            ->setCellValue('D33', '13-12')
//			->setCellValue('D34', '17-13')
//			->setCellValue('D35', '18-17')
//			->setCellValue('D36', '20-18')
//           ->setCellValue('D37', '20-1');


		->setCellValue('D27', 'Fines de semana')
		->setCellValue('D28', 'Horas sabados y domingos')
		->setCellValue('D29', 'Horas no laborales')
		//->setCellValue('D30', 'Deposito a Despacho Horas')
		//->setCellValue('D31', 'Despacho a Facturacion Horas')
		//->setCellValue('D32', 'Recepcion a Facturacion Dias')
		->setCellValue('D43', 'Promedio Dias')
		
			->setCellValue('D31', 'Recepcion a Revision (1-2)')
			->setCellValue('D32', 'Revision a Solicitud Instrucciones (2-4)')
			->setCellValue('D33', 'Trafico Solicitar a Revision EEI (4-7)')
			->setCellValue('D34', 'Revision EEI a Gestion ante Aduana (7-8)')
			->setCellValue('D35', 'Gestion ante Aduana a Carga de Mercancia a Aeropuerto (8-11)')
			->setCellValue('D36', 'Carga de Mercancia a Envio de Mercancia a Aeropuerto (11-13)')
            ->setCellValue('D37', 'Envio de Mercancia a Aeropuerto a Descarga de Mercancia (13-14)')
			->setCellValue('D38', 'Descarga de Mercancia a Despacho del Avion (14-18)')
			->setCellValue('D39', 'Despacho del Avion a Despegue (18-19)')
			->setCellValue('D40', 'Despegue a Facturacion (19-20)')
            ->setCellValue('D41', 'Recepcion a Despegue (1-19)');			
			
	

$c = 6 ;
$f  =0;
$column = 'F';
$suma = 0 ;
while($F = mysqli_fetch_array($query)){
	
	$f++;
	$ref = $F["REF"];
	$pasouno =  mysqli_query($idCone,"SELECT * FROM pasouno WHERE REF LIKE '$ref'");
	$pasodos =  mysqli_query($idCone,"SELECT * FROM pasodos WHERE REF LIKE '$ref'");
	$pasotres =  mysqli_query($idCone,"SELECT * FROM pasotres WHERE REF LIKE '$ref'");
	$pasocuatro=  mysqli_query($idCone,"SELECT * FROM pasocuatro WHERE REF LIKE '$ref'");
	$pasocinco =  mysqli_query($idCone,"SELECT * FROM pasocinco WHERE REF LIKE '$ref'");
	$pasoseis =  mysqli_query($idCone,"SELECT * FROM pasoseis WHERE REF LIKE '$ref'");
	$pasosiete =  mysqli_query($idCone,"SELECT * FROM pasosiete WHERE REF LIKE '$ref'");
	$pasoocho =  mysqli_query($idCone,"SELECT * FROM pasoocho WHERE REF LIKE '$ref'");
	$pasonueve =  mysqli_query($idCone,"SELECT * FROM pasonueve WHERE REF LIKE '$ref'");
	$pasodiez =  mysqli_query($idCone,"SELECT * FROM pasodiez WHERE REF LIKE '$ref'");
	$pasoonce =  mysqli_query($idCone,"SELECT * FROM pasoonce WHERE REF LIKE '$ref'");
	$pasodoce=  mysqli_query($idCone,"SELECT * FROM pasodoce WHERE REF LIKE '$ref'");
	$pasotrece =  mysqli_query($idCone,"SELECT * FROM pasotrece WHERE REF LIKE '$ref'");
	$pasocatorce =  mysqli_query($idCone,"SELECT * FROM pasocatorce WHERE REF LIKE '$ref'");
	$pasoquince =  mysqli_query($idCone,"SELECT * FROM pasoquince WHERE REF LIKE '$ref'");
	$pasodieciseis =  mysqli_query($idCone,"SELECT * FROM pasodieciseis WHERE REF LIKE '$ref'");
	$pasodiecisiete =  mysqli_query($idCone,"SELECT * FROM pasodiecisiete WHERE REF LIKE '$ref'");
	$pasodieciocho =  mysqli_query($idCone,"SELECT * FROM pasodieciocho WHERE REF LIKE '$ref'");
	$pasodiecinueve =  mysqli_query($idCone,"SELECT * FROM pasodiecinueve WHERE REF LIKE '$ref'");
	$pasoveinte =  mysqli_query($idCone,"SELECT * FROM pasoveinte WHERE REF LIKE '$ref'");
	
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue($column."5",$F["NREF"]);
	$objPHPExcel->getActiveSheet()->getColumnDimension($column)->setAutoSize(true);
	$date1;
	$d1;
<<<<<<< HEAD
	
=======
	$objPHPExcel->getActiveSheet()->getStyle($column.'6:'.$column.'25') ->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::					
	FORMAT_DATE_TIME2);  
>>>>>>> 5435be34e7d2e57b54a97ea71f2019c94c124fb2
	
   	if($R = mysqli_fetch_array($pasouno)){			
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($column."6", date("m/d/Y g:i a",$R["UNO"]));
$d1 = date("Y-m-d h:i ",$R["UNO"]);

		
			
}
$d2;

if($R = mysqli_fetch_array($pasodos)){			
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($column."7", date("m/d/Y g:i a",$R["UNO"]));
<<<<<<< HEAD
		
	$d2 = date("Y-m-d h:i ",$R["UNO"]);	
=======
$date2 = date("Y-m-d h:i ",$R["UNO"]);
$d2 = $R["UNO"];		
>>>>>>> 5435be34e7d2e57b54a97ea71f2019c94c124fb2
			
}
$d3;
if($R = mysqli_fetch_array($pasotres)){			
$objPHPExcel->setActiveSheetIndex(0)
			->setCellValue($column."8", date("m/d/Y g:i a",$R["UNO"]));
<<<<<<< HEAD
			$d3 = date("Y-m-d h:i ",$R["UNO"]);
		
=======
$date3 = date("Y-m-d h:i ",$R["UNO"]);
$d3 = $R["UNO"];		
>>>>>>> 5435be34e7d2e57b54a97ea71f2019c94c124fb2

			
}
$d4;
if($R = mysqli_fetch_array($pasocuatro)){			
$objPHPExcel->setActiveSheetIndex(0)
			->setCellValue($column."9", date("m/d/Y g:i a",$R["UNO"]));
<<<<<<< HEAD
			$d4 = date("Y-m-d h:i ",$R["UNO"]);
		
=======
$date4 = date("Y-m-d h:i ",$R["UNO"]);
$d4 = $R["UNO"];			
>>>>>>> 5435be34e7d2e57b54a97ea71f2019c94c124fb2

			
}
$d5;
if($R = mysqli_fetch_array($pasocinco)){			
$objPHPExcel->setActiveSheetIndex(0)
			->setCellValue($column."10", date("m/d/Y g:i a",$R["UNO"]));
<<<<<<< HEAD
			$d5 = date("Y-m-d h:i ",$R["UNO"]);
		
=======
	$date5 = date("Y-m-d h:i ",$R["UNO"]);
$d5 = $R["UNO"];		
>>>>>>> 5435be34e7d2e57b54a97ea71f2019c94c124fb2

			
}
$d6;
if($R = mysqli_fetch_array($pasoseis)){			
$objPHPExcel->setActiveSheetIndex(0)
			->setCellValue($column."11", date("m/d/Y g:i a",$R["UNO"]));
<<<<<<< HEAD
			$d6 = date("Y-m-d h:i ",$R["UNO"]);
		
=======
	$date6 = date("Y-m-d h:i ",$R["UNO"]);
$d6 = $R["UNO"];		
>>>>>>> 5435be34e7d2e57b54a97ea71f2019c94c124fb2

			
}
$d7;
if($R = mysqli_fetch_array($pasosiete)){			
$objPHPExcel->setActiveSheetIndex(0)
			->setCellValue($column."12", date("m/d/Y g:i a",$R["UNO"]));
<<<<<<< HEAD
			$d7 = date("Y-m-d h:i ",$R["UNO"]);
			
=======
$date7 = date("Y-m-d h:i ",$R["UNO"]);
$d7 = $R["UNO"];				
>>>>>>> 5435be34e7d2e57b54a97ea71f2019c94c124fb2

			
}
$d8;
if($R = mysqli_fetch_array($pasoocho)){			
$objPHPExcel->setActiveSheetIndex(0)
			->setCellValue($column."13", date("m/d/Y g:i a",$R["UNO"]));
<<<<<<< HEAD
			$d8 = date("Y-m-d h:i ",$R["UNO"]);
		
=======
$date8 = date("Y-m-d h:i ",$R["UNO"]);
$d8 = $R["UNO"];		
>>>>>>> 5435be34e7d2e57b54a97ea71f2019c94c124fb2

			
}
$date9;
if($R = mysqli_fetch_array($pasonueve)){			
$objPHPExcel->setActiveSheetIndex(0)
			->setCellValue($column."14", date("m/d/Y g:i a",$R["UNO"]));
<<<<<<< HEAD
			$d9 = date("Y-m-d h:i ",$R["UNO"]);
		
=======
			$date9  =date("Y-m-d h:i",$R["UNO"]);
>>>>>>> 5435be34e7d2e57b54a97ea71f2019c94c124fb2

			
}
$date10;
if($R = mysqli_fetch_array($pasodiez)){			
$objPHPExcel->setActiveSheetIndex(0)
			->setCellValue($column."15", date("m/d/Y g:i a",$R["UNO"]));
<<<<<<< HEAD
			$d10= date("Y-m-d h:i ",$R["UNO"]);
		
=======
			$date10  =date("Y-m-d h:i",$R["UNO"]);

>>>>>>> 5435be34e7d2e57b54a97ea71f2019c94c124fb2

			
}
$d11;
if($R = mysqli_fetch_array($pasoonce)){			
$objPHPExcel->setActiveSheetIndex(0)
			->setCellValue($column."16", date("m/d/Y g:i a",$R["UNO"]));
<<<<<<< HEAD
			$d11 = date("Y-m-d h:i ",$R["UNO"]);
		
=======
$date11 = date("Y-m-d h:i ",$R["UNO"]);
$d11 = $R["UNO"];		
>>>>>>> 5435be34e7d2e57b54a97ea71f2019c94c124fb2

			
}
$d12;
if($R = mysqli_fetch_array($pasodoce)){			
$objPHPExcel->setActiveSheetIndex(0)
			->setCellValue($column."17", date("m/d/Y g:i a",$R["UNO"]));
<<<<<<< HEAD
			$d12 = date("Y-m-d h:i ",$R["UNO"]);
		
=======
$date12 = date("Y-m-d h:i ",$R["UNO"]);
$d12 = $R["UNO"];		
>>>>>>> 5435be34e7d2e57b54a97ea71f2019c94c124fb2

			
}
$d13;
if($R = mysqli_fetch_array($pasotrece)){			
$objPHPExcel->setActiveSheetIndex(0)
			->setCellValue($column."18", date("m/d/Y g:i a",$R["UNO"]));
<<<<<<< HEAD
			$d13 = date("Y-m-d h:i ",$R["UNO"]);
		
=======
$date13 = date("Y-m-d h:i ",$R["UNO"]);
$d13 = $R["UNO"];			
>>>>>>> 5435be34e7d2e57b54a97ea71f2019c94c124fb2

			
}
$date14;
if($R = mysqli_fetch_array($pasocatorce)){			
$objPHPExcel->setActiveSheetIndex(0)
			->setCellValue($column."19", date("m/d/Y g:i a",$R["UNO"]));
<<<<<<< HEAD
			$d14 = date("Y-m-d h:i ",$R["UNO"]);
		
=======
			$date14 = date("Y-m-d h:i ",$R["UNO"]);
>>>>>>> 5435be34e7d2e57b54a97ea71f2019c94c124fb2

			
}
$d15;
$date15 ;
if($R = mysqli_fetch_array($pasoquince)){			
$objPHPExcel->setActiveSheetIndex(0)
			->setCellValue($column."20", date("m/d/Y g:i a",$R["UNO"]));
<<<<<<< HEAD
			$d15 = date("Y-m-d h:i ",$R["UNO"]);
		
=======
		$date15 = date("Y-m-d h:i ",$R["UNO"]);
			$d15 = $R["UNO"];
>>>>>>> 5435be34e7d2e57b54a97ea71f2019c94c124fb2

			
}
$d16;
if($R = mysqli_fetch_array($pasodieciseis)){			
$objPHPExcel->setActiveSheetIndex(0)
			->setCellValue($column."21", date("m/d/Y g:i a",$R["UNO"]));
<<<<<<< HEAD
			$d16 = date("Y-m-d h:i ",$R["UNO"]);
		
=======
		$date16 = date("Y-m-d h:i ",$R["UNO"]);	
$d16 = $R["UNO"];		
>>>>>>> 5435be34e7d2e57b54a97ea71f2019c94c124fb2

			
}
$d17;
if($R = mysqli_fetch_array($pasodiecisiete)){			
$objPHPExcel->setActiveSheetIndex(0)
			->setCellValue($column."22", date("m/d/Y g:i a",$R["UNO"]));
<<<<<<< HEAD
			$d17 = date("Y-m-d h:i ",$R["UNO"]);
		

=======
		$date17 = date("Y-m-d h:i ",$R["UNO"]);	
$d17 = $R["UNO"];
>>>>>>> 5435be34e7d2e57b54a97ea71f2019c94c124fb2
			
}
$d18;
$date18 ;
if($R = mysqli_fetch_array($pasodieciocho)){			
$objPHPExcel->setActiveSheetIndex(0)
			->setCellValue($column."23", date("m/d/Y g:i a",$R["UNO"]));
<<<<<<< HEAD
			$d18 = date("Y-m-d h:i ",$R["UNO"]);
		

=======
		$date18 = date("Y-m-d h:i ",$R["UNO"]);		
$d18 = $R["UNO"];
>>>>>>> 5435be34e7d2e57b54a97ea71f2019c94c124fb2
			
}
$d19;
$date19 ;
if($R = mysqli_fetch_array($pasodiecinueve)){			
$objPHPExcel->setActiveSheetIndex(0)
			->setCellValue($column."24", date("m/d/Y g:i a",$R["UNO"]));
<<<<<<< HEAD
			$d19 = date("Y-m-d h:i ",$R["UNO"]);
		

=======
		$date19 = date("Y-m-d h:i ",$R["UNO"]);
	$d19 = $R["UNO"];
>>>>>>> 5435be34e7d2e57b54a97ea71f2019c94c124fb2
			
}
$d20;
$date20 ;
if($R = mysqli_fetch_array($pasoveinte)){			
$objPHPExcel->setActiveSheetIndex(0)
			->setCellValue($column."25", date("m/d/Y g:i a",$R["UNO"]));
<<<<<<< HEAD
			$d20 = date("Y-m-d h:i ",$R["UNO"]);			
}  

$datetime1 = date_create($d1);
$datetime2 = date_create($d2);
$interval = date_diff($datetime1, $datetime2);
$dias  = $interval->format("%a")  * 24;
$horas =  $interval->format("%H");
$total = $dias+$horas; 

$datetime1 = date_create($d2);
$datetime2 = date_create($d4);
$interval = date_diff($datetime1, $datetime2);
$dias  = $interval->format("%a")  * 24;
$horas =  $interval->format("%H");
$total1 = $dias+$horas; 

$datetime1 = date_create($d4);
$datetime2 = date_create($d6);
$interval = date_diff($datetime1, $datetime2);
$dias  = $interval->format("%a")  * 24;
$horas =  $interval->format("%H");
$total2 = $dias+$horas;

$datetime1 = date_create($d6);
$datetime2 = date_create($d7);
$interval = date_diff($datetime1, $datetime2);
$dias  = $interval->format("%a")  * 24;
$horas =  $interval->format("%H");
$total3 = $dias+$horas;

$datetime1 = date_create($d7);
$datetime2 = date_create($d10);
$interval = date_diff($datetime1, $datetime2);
$dias  = $interval->format("%a")  * 24;
$horas =  $interval->format("%H");
$total4 = $dias+$horas;

$datetime1 = date_create($d10);
$datetime2 = date_create($d12);
$interval = date_diff($datetime1, $datetime2);
$dias  = $interval->format("%a")  * 24;
$horas =  $interval->format("%H");
$total5 = $dias+$horas;

$datetime1 = date_create($d12);
$datetime2 = date_create($d13);
$interval = date_diff($datetime1, $datetime2);
$dias  = $interval->format("%a")  * 24;
$horas =  $interval->format("%H");
$total6 = $dias+$horas;

$datetime1 = date_create($d13);
$datetime2 = date_create($d17);
$interval = date_diff($datetime1, $datetime2);
$dias  = $interval->format("%a")  * 24;
$horas =  $interval->format("%H");
$total7 = $dias+$horas;

$datetime1 = date_create($d17);
$datetime2 = date_create($d18);
$interval = date_diff($datetime1, $datetime2);
$dias  = $interval->format("%a")  * 24;
$horas =  $interval->format("%H");
$total8 = $dias+$horas;

$datetime1 = date_create($d18);
$datetime2 = date_create($d20);
$interval = date_diff($datetime1, $datetime2);
$dias  = $interval->format("%a")  * 24;
$horas =  $interval->format("%H");
$total9 = $dias+$horas;

$datetime1 = date_create($d1);
$datetime2 = date_create($d20);
$interval = date_diff($datetime1, $datetime2);
$dias  = $interval->format("%a");


$objPHPExcel->setActiveSheetIndex(0)
			->setCellValue($column."27",$total)
			->setCellValue($column."28",$total1)
			->setCellValue($column."29",$total2)
			->setCellValue($column."30",$total3)
			->setCellValue($column."31",$total4)
			->setCellValue($column."32",$total5)
            ->setCellValue($column."33",$total6)
			->setCellValue($column."34",$total7)
			->setCellValue($column."35",$total8)
			->setCellValue($column."36",$total9)
            ->setCellValue($column."37",$dias);				
=======
			$date20 = date("Y-m-d h:i ",$R["UNO"]);
			$d20 = $R["UNO"];

			
}
// REFERENCIA DE OPERACION 2-1
$datetime1 = date_create($date1); // 9 anteriormente
$datetime2 = date_create($date2); // 14 anteriormente
$interval = date_diff($datetime1, $datetime2);
$horas = $interval->format("%H");
$dias = $interval->format("%d");
$horasdias  = $dias * 24 ;

// REFERENCIA DE OPERACION 4-2
$datetime1 = date_create($date2);
$datetime2 = date_create($date4);
$interval2 = date_diff($datetime1, $datetime2);
$horas2 = $interval2->format("%H");
$dias2 = $interval2->format("%d");
$horasdias2  = $dias2 * 24 ;

// REFERENCIA DE OPERACION 7-4
$datetime1 = date_create($date4);
$datetime2 = date_create($date7);
$interval7 = date_diff($datetime1, $datetime2);
$horas7 = $interval7->format("%H");
$dias7 = $interval7->format("%d");
$horasdias7  = $dias7 * 24 ;

// REFERENCIA DE OPERACION 8-7
$datetime1 = date_create($date7);
$datetime2 = date_create($date8);
$interval8 = date_diff($datetime1, $datetime2);
$horas8 = $interval8->format("%H");
$dias8 = $interval8->format("%d");
$horasdias8  = $dias8 * 24 ;

// REFERENCIA DE OPERACION 11-8
$datetime1 = date_create($date8);
$datetime2 = date_create($date11);
$interval99 = date_diff($datetime1, $datetime2);
$horas99 = $interval99->format("%H");
$dias99 = $interval99->format("%d");
$horasdias99  = $dias99 * 24 ;

// REFERENCIA DE OPERACION 13-11
$datetime1 = date_create($date11);
$datetime2 = date_create($date13);
$interval10 = date_diff($datetime1, $datetime2);
$horas10 = $interval10->format("%H");
$dias10 = $interval10->format("%d");
$horasdias10  = $dias10 * 24 ;

// REFERENCIA DE OPERACION 14-13
$datetime1 = date_create($date13);
$datetime2 = date_create($date14);
$interval11 = date_diff($datetime1, $datetime2);
$horas11 = $interval11->format("%H");
$dias11 = $interval11->format("%d");
$horasdias11  = $dias11 * 24 ;

// REFERENCIA DE OPERACION 18-14
$datetime1 = date_create($date14);
$datetime2 = date_create($date18);
$interval12 = date_diff($datetime1, $datetime2);
$horas12 = $interval12->format("%H");
$dias12 = $interval12->format("%d");
$horasdias12  = $dias12 * 24 ;

// REFERENCIA DE OPERACION 19-18
$datetime1 = date_create($date18);
$datetime2 = date_create($date19);
$interval13 = date_diff($datetime1, $datetime2);
$horas13 = $interval13->format("%H");
$dias13 = $interval13->format("%d");
$horasdias13  = $dias13 * 24 ;

// REFERENCIA DE OPERACION 20-19
$datetime1 = date_create($date19);
$datetime2 = date_create($date20);
$interval14 = date_diff($datetime1, $datetime2);
$horas14 = $interval14->format("%H %I %S");
$dias14 = $interval14->format("%d");
$horasdias14  = $dias14 * 24 ;

// REFERENCIA DE OPERACION 20-1
$datetime1 = date_create($date1);
$datetime = date_create($date20);
$interval15 = date_diff($datetime1, $datetime2);
$horas15 = $interval15->format("%H");
$dias15 = $interval15->format("%d");
$horasdias15  = $dias15 * 24 ;

// MODIFICANDO ESTA REGLA PARA SUMAR 1 Y 2
//$datetime1 = date_create($date1);
//$datetime2 = date_create($date2);
//$interval4 = date_diff($datetime1, $datetime2);
//$horas4 = $interval4->format("%H");
//$dias4 = $interval4->format("%d");
//$horasdias4  = $dias4 * 24 ;

// FIN DE SEMANA SABADO Y DOMINGO
$fines = 0 ;
$domsab = 0 ;
$d = 0 ;
for($c = $d1 ;$c<=$d15;$c = $c= $c+86400)
	{
		$d++;
	$dia = date('l',$c);
		if($dia == 'Saturday'||$dia== 'Sunday'){
			$fines = 1;
			$domsab++;
			if($domsab>2){
				$fines++;

			}
		}

	
	}

	
	$objPHPExcel->setActiveSheetIndex(0)
			->setCellValue($column."31",$horas + $horasdias) // HORAS TRABAJADAS 2-1
		//	->setCellValue($column."44",$d)         // DIAS TRABAJADOS
			->setCellValue($column."32",$horas2 + $horasdias2) // HORAS TRABAJADAS 4-2
			->setCellValue($column."33",$horas7 + $horasdias7) // HORAS TRABAJADAS 7-4
			->setCellValue($column."34",$horas8 + $horasdias8) // HORAS TRABAJADAS 8-7
			->setCellValue($column."35",$horas99 + $horasdias99) // HORAS TRABAJADAS 11-8
			->setCellValue($column."36",$horas10 + $horasdias10) // HORAS TRABAJADAS 13-11
			->setCellValue($column."37",$horas11 + $horasdias11) // HORAS TRABAJADAS 14-13
			->setCellValue($column."38",$horas12 + $horasdias12) // HORAS TRABAJADAS 18-14
			->setCellValue($column."39",$horas13 + $horasdias13) // HORAS TRABAJADAS 19-18
			->setCellValue($column."40",$horas14 + $horasdias14) // HORAS TRABAJADAS 20-19
			->setCellValue($column."41",$d); // HORAS TRABAJADAS 20-19
			
  $objPHPExcel->setActiveSheetIndex(0)
			->setCellValue($column."27",$fines)        // FIN DE SEMANA
			->setCellValue($column."28",$domsab * 24) // SABADO Y DOMINGO 48 HORAS
			->setCellValue($column."29",$d * 16);	// HORAS NO LABORALES
			
	$suma = $suma + $d;

			 $column = $objPHPExcel->getActiveSheet()->getHighestColumn();
	 $column++;
	$c++;	



//////
	////$objPHPExcel->getActiveSheet()->getStyle($column.'27:'.$column.'37') ->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::					
	////FORMAT_DATE_TIME6);  
  

//$objPHPExcel->setActiveSheetIndex(0)
	
//			->setCellValue($column."27", '=+'.$column.'7-'.$column.'6')
//			->setCellValue($column."28", '=+'.$column.'9-'.$column.'7')
//			->setCellValue($column."29", '=+'.$column.'11-'.$column.'9')
//			->setCellValue($column."30", '=+'.$column.'12-'.$column.'11')
//			->setCellValue($column."31", '=+'.$column.'15-'.$column.'12')
//			->setCellValue($column."32", '=+'.$column.'17-'.$column.'15')
//            ->setCellValue($column."33", '=+'.$column.'18-'.$column.'17')
	//		->setCellValue($column."34", '=+'.$column.'22-'.$column.'18')
//			->setCellValue($column."35", '=+'.$column.'23-'.$column.'22')
	//		->setCellValue($column."36", '=+'.$column.'25-'.$column.'24')
   //        ->setCellValue($column."37", '=+'.$column.'25-'.$column.'6');
	//	//	 ->setCellValue($column."39", $dias);
		
		
	$suma = $suma + $d;				
>>>>>>> 5435be34e7d2e57b54a97ea71f2019c94c124fb2
	$column++;
	$c++;

	
}

$promedio  = $suma/$f ;
$objPHPExcel->setActiveSheetIndex(0)
			->setCellValue("D44",$promedio." dias");


$objPHPExcel->setActiveSheetIndex(0)
			->setCellValue('C2', 'INTERNATIONAL DISPATCH SERVICES, INC')
            ->setCellValue('C3', 'Reporte de tiempos de importación')
			->setCellValue('B5', 'N°')
			->setCellValue('C5', 'OPERACION')
			->setCellValue('D5', 'RESPONSABLES');
		
	//			->setCellValue($column."27", '=+'.$column.'7-'.$column.'6')	
	//			$objDrawing = new PHPExcel_Worksheet_Drawing();
    //                $objDrawing->setName('imgNotice');
     //               $objDrawing->setDescription('Noticia');
     //               $img = 'Recursos/Imagenes/logo.PNG'; // Provide path to your logo file
               			 


	
// Fuente de la primera fila en negrita
$boldArray = array('font' => array('bold' => true,),'alignment' => array('horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER));

$objPHPExcel->getActiveSheet()->getStyle('A1:E4')->applyFromArray($boldArray);
//Ancho de las columnas
$objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(8);	
$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(5);	
$objPHPExcel->getActiveSheet()->getColumnDimension('C')->setAutoSize(true);	
$objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(25);	



$objPHPExcel->getActiveSheet()->getDefaultStyle()->getAlignment()->setWrapText(true);

$rango="B5:D25";
$styleArray = array('font' => array( 'name' => 'Arial','size' => 10),
'borders'=>array('allborders'=>array('style'=> PHPExcel_Style_Border::BORDER_THIN,'color'=>array('argb' => 'FFF')))
);
$objPHPExcel->getActiveSheet()->getStyle($rango)->applyFromArray($styleArray);

// Cambiar el nombre de hoja de cálculo
$objPHPExcel->getActiveSheet()->setTitle('Rep-Aereo '.$mes);


// Establecer índice de hoja activa a la primera hoja , por lo que Excel abre esto como la primera hoja
$objPHPExcel->setActiveSheetIndex(0);

// Redirigir la salida al navegador web de un cliente ( Excel5 )
header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment;filename="Rep-Aereo '.$mes.'.xlsx"');
header('Cache-Control: max-age=0');
// Si usted está sirviendo a IE 9 , a continuación, puede ser necesaria la siguiente
header('Cache-Control: max-age=1');

// Si usted está sirviendo a IE a través de SSL , a continuación, puede ser necesaria la siguiente
header ('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
header ('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT'); // always modified
header ('Cache-Control: cache, must-revalidate'); // HTTP/1.1
header ('Pragma: public'); // HTTP/1.0

$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
$objWriter->save('php://output');
exit;
 ?>
