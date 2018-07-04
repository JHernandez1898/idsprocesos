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
			->setCellValue('B14', '9');
			
$objPHPExcel->setActiveSheetIndex(0)
			->setCellValue('C6', 'Recepción de Mercancías y Documentos')
			->setCellValue('C7', 'Notificacion')
			->setCellValue('C8', 'Manifiesto de mercancias')
            ->setCellValue('C9', 'Etiquetar')
            ->setCellValue('C10', 'Elaboracion de documentos')
			->setCellValue('C11', 'Solicitar carga de mercancias')
			->setCellValue('C12', 'Carga de mercancias')
			->setCellValue('C13', 'Despacho de Embarque')
			->setCellValue('C14', 'Zarpe de Buque');
			
$objPHPExcel->setActiveSheetIndex(0)
			->setCellValue('D6', 'Jefe de Bodefa/\rEjecutivo de Tráfico')
			->setCellValue('D7', 'Personal de Tráfico')
			->setCellValue('D8', 'Personal de Tráfico')
            ->setCellValue('D9', 'Jefe de Bodefa/\rEjecutivo de Tráfico')
            ->setCellValue('D10', 'Personal de Tráfico')
			->setCellValue('D11', 'Personal de Tráfico')
			->setCellValue('D12', 'Jefe de Bodega/Montecarguista')
			->setCellValue('D13', 'Personal de trafico')
			->setCellValue('D14', 'Personal de trafico');
	
$objPHPExcel->setActiveSheetIndex(0)
			->setCellValue('D16', 'Fines de semana')
			->setCellValue('D17', 'Horas sabados y domingos')
			->setCellValue('D18', 'Horas no laborales')
			->setCellValue('D28', 'Promedio Dias')
			
// $objPHPExcel->setActiveSheetIndex(0)
			->setCellValue('D20', 'Recepcion a Notificacion (2-1)')
			->setCellValue('D21', 'Notificacion A Manifiesto(3-2)')
			->setCellValue('D22', 'Manifiesto a elaboracion de doc (5-3)')
			->setCellValue('D23', 'Solicitar Carga a Carga (7-6)')
			->setCellValue('D24', 'Elaboracion de Doc a Carga (7-5)')
			->setCellValue('D25', 'Carga a despacho (8-7)')
			->setCellValue('D26', 'Recepcion Despacho (8-1)')
			->setCellValue('D27', 'Zarpe de Buque (9-?)');
			
	

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
	$pasonueve =  mysqli_query($idCone,"SELECT * FROM pasonueve WHERE REF LIKE '$ref'"); // se agrego este campo nuevo 11/06/18
	
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue($column."5",$F["NREF"]);
	$objPHPExcel->getActiveSheet()->getColumnDimension($column)->setAutoSize(true);
	$date1;
	$d1;
	$objPHPExcel->getActiveSheet()->getStyle($column.'6:'.$column.'14') ->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::					
	FORMAT_DATE_TIME2); 

   	if($R = mysqli_fetch_array($pasouno)){			
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($column."6", date("m/d/Y g:i a",$R["UNO"]));
$date1 = date("Y-m-d h:i ",$R["UNO"]);
$d1 = $R["UNO"];
		
			
}
$d2;

if($R = mysqli_fetch_array($pasodos)){			
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($column."7", date("m/d/Y g:i a",$R["UNO"]));
$date2 =  date("Y-m-d h:i",$R["UNO"]);
$d2 = $R["UNO"];	
			
}
$d3;

if($R = mysqli_fetch_array($pasotres)){			
$objPHPExcel->setActiveSheetIndex(0)
			->setCellValue($column."8", date("m/d/Y g:i a",$R["UNO"]));
		$date3 =  date("Y-m-d h:i",$R["UNO"]);
	$d3 = $R["UNO"];

			
}
$d4;

if($R = mysqli_fetch_array($pasocuatro)){			
$objPHPExcel->setActiveSheetIndex(0)
			->setCellValue($column."9", date("m/d/Y g:i a",$R["UNO"]));
			$date4 =  date("Y-m-d h:i",$R["UNO"]);
			$d4 = $R["UNO"];

			
}
$d5;

if($R = mysqli_fetch_array($pasocinco)){			
$objPHPExcel->setActiveSheetIndex(0)
			->setCellValue($column."10", date("m/d/Y g:i a",$R["UNO"]));
			$date5 =  date("Y-m-d h:i",$R["UNO"]);
			$d5 = $R["UNO"];

			
}
$d6;

if($R = mysqli_fetch_array($pasoseis)){			
$objPHPExcel->setActiveSheetIndex(0)
			->setCellValue($column."11", date("m/d/Y g:i a",$R["UNO"]));
			$date6 =  date("Y-m-d h:i",$R["UNO"]);
			$d6 = $R["UNO"];
			
}
$d7;

if($R = mysqli_fetch_array($pasosiete)){			
$objPHPExcel->setActiveSheetIndex(0)
			->setCellValue($column."12", date("m/d/Y g:i a",$R["UNO"]));
			$date7 =  date("Y-m-d h:i",$R["UNO"]);
			$d7 = $R["UNO"];

			
}
$d8;
$date8;
if($R = mysqli_fetch_array($pasoocho)){			
$objPHPExcel->setActiveSheetIndex(0)
			->setCellValue($column."13", date("m/d/Y g:i a",$R["UNO"]));
			$date8 =  date("Y-m-d h:i",$R["UNO"]);
			$d8 = $R["UNO"];
		
}
$d9;
$date9;
if($R = mysqli_fetch_array($pasonueve)){			
$objPHPExcel->setActiveSheetIndex(0)
			->setCellValue($column."14", date("m/d/Y g:i a",$R["UNO"]));
			$date9 =  date("Y-m-d h:i",$R["UNO"]);
			$d9 = $R["UNO"];
			
}



// REFERENCIA DE OPERACION 2-1	
$datetime1 = date_create($date1);
$datetime2 = date_create($date2);
$interval = date_diff($datetime1, $datetime2);
$horas = $interval->format("%H");
$dias = $interval->format("%d");
$horasdias  = $dias * 24 ;

// REFERENCIA DE OPERACION 3-2
$datetime1 = date_create($date2);
$datetime2 = date_create($date3);
$interval2 = date_diff($datetime1, $datetime2);
$horas2 = $interval->format("%H");
$dias2 = $interval->format("%d");
$horasdias2  = $dias2 * 24 ;

// REFERENCIA DE OPERACION 5-3
$datetime1 = date_create($date3);
$datetime2 = date_create($date5);
$interval3 = date_diff($datetime1, $datetime2);
$horas3 = $interval3->format("%H");
$dias3 = $interval3->format("%d");
$horasdias3  = $dias3 * 24 ;

// REFERENCIA DE OPERACION 7-6
$datetime1 = date_create($date6);
$datetime2 = date_create($date7);
$interval4 = date_diff($datetime1, $datetime2);
$horas4 = $interval4->format("%H");
$dias4 = $interval4->format("%d");
$horasdias4  = $dias4 * 24 ;

// REFERENCIA DE OPERACION 7-5
$datetime1 = date_create($date5);
$datetime2 = date_create($date7);
$interval5 = date_diff($datetime1, $datetime2);
$horas5 = $interval5->format("%H");
$dias5 = $interval5->format("%d");
$horasdias5  = $dias5 * 24 ;

// REFERENCIA DE OPERACION 8-7
$datetime1 = date_create($date7);
$datetime2 = date_create($date8);
$interval6 = date_diff($datetime1, $datetime2);
$horas6 = $interval6->format("%H");
$dias6 = $interval6->format("%d");
$horasdias6  = $dias6 * 24 ;

// REFERENCIA DE OPERACION 8-1
$datetime1 = date_create($date1);
$datetime2 = date_create($date8);
$interval7 = date_diff($datetime1, $datetime2);
$horas7 = $interval7->format("%H");
$dias7 = $interval7->format("%d");
$horasdias7  = $dias7 * 24 ;

// REFERENCIA DE OPERACION 9-?
////$datetime1 = date_create($date9);
//$datetime2 = date_create($date1);
//$interval8 = date_diff($datetime1, $datetime2);
//$horas8 = $interval8->format("%H");
//$dias8 = $interval8->format("%d");
//$horasdias8  = $dias8 * 24 ;

// FIN DE SEMANA SABADO Y DOMINGO
$fines = 0 ;
$domsab = 0 ;
$d = 0 ;
for($c = $d1 ;$c<=$d8;$c = $c= $c+86400)
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
			->setCellValue($column."20",$horas + $horasdias) // HORAS TRABAJADAS 2-1
		//	->setCellValue($column."44",$d)        			 // DIAS TRABAJADOS
			->setCellValue($column."21",$horas2 + $horasdias2)
			->setCellValue($column."22",$horas3 + $horasdias3)
			->setCellValue($column."23",$horas4 + $horasdias4)
			->setCellValue($column."24",$horas5 + $horasdias5)
			->setCellValue($column."25",$horas6 + $horasdias6)
			//->setCellValue($column."14",$d)
            ->setCellValue($column."26",$d);
			//->setCellValue($column."27",$horas8 + $horasdias8);
			//->setCellValue($column."27",$d); // este es el paso 9
			
	 $objPHPExcel->setActiveSheetIndex(0)
			->setCellValue($column."16",$fines)        // FIN DE SEMANA
			->setCellValue($column."17",$domsab * 24) // SABADO Y DOMINGO 48 HORAS
			->setCellValue($column."18",$d * 16);	// HORAS NO LABORALES
	
	$suma = $suma + $d;

			 $column = $objPHPExcel->getActiveSheet()->getHighestColumn();		
	$column++;
	$c++;
	
	$suma = $suma + $d;				
	$column++;
	$c++;

/*$fines = 0 ;
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

$suma = $suma + $d;*/

	
}


$promedio  = $suma/$f ;
$objPHPExcel->setActiveSheetIndex(0)
			->setCellValue("D29",$promedio." días");


$objPHPExcel->setActiveSheetIndex(0)
			->setCellValue('C2', 'INTERNATIONAL DISPATCH SERVICES, INC')
            ->setCellValue('C3', 'Reporte de tiempos de importación')
			->setCellValue('B5', 'N°')
			->setCellValue('C5', 'OPERACION')
			->setCellValue('D5', 'RESPONSABLES');
		

	
// Fuente de la primera fila en negrita
$boldArray = array('font' => array('bold' => true,),'alignment' => array('horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER));

$objPHPExcel->getActiveSheet()->getStyle('A1:E4')->applyFromArray($boldArray);
//Ancho de las columnas
$objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(8);	
$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(5);	
$objPHPExcel->getActiveSheet()->getColumnDimension('C')->setAutoSize(true);	
$objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(25);	



$objPHPExcel->getActiveSheet()->getDefaultStyle()->getAlignment()->setWrapText(true);

$rango="B5:D14"; // esta lineamarca el borde de las celdas que quiero marcar
$styleArray = array('font' => array( 'name' => 'Arial','size' => 10),
'borders'=>array('allborders'=>array('style'=> PHPExcel_Style_Border::BORDER_THIN,'color'=>array('argb' => 'FFF')))
);
$objPHPExcel->getActiveSheet()->getStyle($rango)->applyFromArray($styleArray);

// Cambiar el nombre de hoja de cálculo
$objPHPExcel->getActiveSheet()->setTitle('Rep-Maritimo '.$mes);


// Establecer índice de hoja activa a la primera hoja , por lo que Excel abre esto como la primera hoja
$objPHPExcel->setActiveSheetIndex(0);

// Redirigir la salida al navegador web de un cliente ( Excel5 )
header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment;filename="Rep-Maritimo '.$mes.'.xlsx"');
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
