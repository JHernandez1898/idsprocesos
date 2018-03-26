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
			->setCellValue('B20', '15');
			
$objPHPExcel->setActiveSheetIndex(0)
			->setCellValue('C6', 'Recepción de Mercancías y Documentos')
			->setCellValue('C7', 'Revisión')
			->setCellValue('C8', 'Tráfico')
            ->setCellValue('C9', 'Clasificación')
            ->setCellValue('C10', 'Tráfico')
			->setCellValue('C11', 'Revisión del pedimento')
			->setCellValue('C12', 'Confirmar depositos y equipo')
			->setCellValue('C13', 'Validacion del pedimento')
			->setCellValue('C14', 'Preparar documentos de importación')
			->setCellValue('C15', 'Validacion del pedimento')
			->setCellValue('C16', 'Preparar documentos de importación')
			->setCellValue('C17', 'Solicitar carga de mercancía')
            ->setCellValue('C18', 'Carga de mercancía')
            ->setCellValue('C19', 'Despacho de embarque')
			->setCellValue('C20', 'Facturacion de cuenta de gastos americana');
			
$objPHPExcel->setActiveSheetIndex(0)
			->setCellValue('D6', 'Jefe de Bodefa/\rEjecutivo de Tráfico')
			->setCellValue('D7', 'Revisador')
			->setCellValue('D8', 'Ejecutivo de Tráfico')
            ->setCellValue('D9', 'Clasificador')
            ->setCellValue('D10', 'Ejecutivo de Tráfico')
			->setCellValue('D11', 'Gerente')
			->setCellValue('D12', 'Ejecutivo de trafico')
			->setCellValue('D13', 'Gerente / Ejecutivo de Tráfico')
			->setCellValue('D14', 'Ejecutivo de Tráfico \r/ Asistente de Tráfico')
			->setCellValue('D15', 'Ejecutivo de Tráfico / Asistente de Tráfico')
			->setCellValue('D16', 'Ejecutivo de Tráfico / Asistente de Tráfico')
			->setCellValue('D17', 'Ejecutivo de Tráfico')
            ->setCellValue('D18', 'Jefe de Bodega / Montecarguista')
            ->setCellValue('D19', 'Ejecutivo de Trafico / Asistente de Trafico/ Gerente')
			->setCellValue('D20', 'Gerente');
			
$objPHPExcel->setActiveSheetIndex(0)
			->setCellValue('D23', 'Fines de semana')
			->setCellValue('D25', 'Horas sabados y domingos')
			->setCellValue('D28', 'Horas no laborales')
			->setCellValue('D29', 'Deposito a Despacho Horas')
			->setCellValue('D30', 'Despacho a Facturacion Horas')
			->setCellValue('D31', 'Recepcion a Facturacion Dias')
            ->setCellValue('D32', 'Promedio Dias');
			
	

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
	$pasodoce =  mysqli_query($idCone,"SELECT * FROM pasodoce WHERE REF LIKE '$ref'");
	$pasotrece =  mysqli_query($idCone,"SELECT * FROM pasotrece WHERE REF LIKE '$ref'");
	$pasocatorce =  mysqli_query($idCone,"SELECT * FROM pasocatorce WHERE REF LIKE '$ref'");
	$pasoquince =  mysqli_query($idCone,"SELECT * FROM pasoquince WHERE REF LIKE '$ref'");
	
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue($column."5",$F["NREF"]);
	$objPHPExcel->getActiveSheet()->getColumnDimension($column)->setAutoSize(true);
	$date1;
	$d1;
   	if($R = mysqli_fetch_array($pasouno)){			
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($column."6", date("m/d/Y g:i a",$R["FECDOS"]));
$date1 = date("Y-m-d h:i ",$R["FECDOS"]);
$d1 = $R["FECDOS"];
		
			
}
if($R = mysqli_fetch_array($pasodos)){			
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($column."7", date("m/d/Y g:i a",$R["FEC"]));
			
			
}
if($R = mysqli_fetch_array($pasotres)){			
$objPHPExcel->setActiveSheetIndex(0)
			->setCellValue($column."8", date("m/d/Y g:i a",$R["FECDOS"]));
		

			
}
if($R = mysqli_fetch_array($pasocuatro)){			
$objPHPExcel->setActiveSheetIndex(0)
			->setCellValue($column."9", date("m/d/Y g:i a",$R["FECDOS"]));
		

			
}
if($R = mysqli_fetch_array($pasocinco)){			
$objPHPExcel->setActiveSheetIndex(0)
			->setCellValue($column."10", date("m/d/Y g:i a",$R["TRES"]));
		

			
}
if($R = mysqli_fetch_array($pasoseis)){			
$objPHPExcel->setActiveSheetIndex(0)
			->setCellValue($column."11", date("m/d/Y g:i a",$R["UNO"]));
		

			
}
if($R = mysqli_fetch_array($pasosiete)){			
$objPHPExcel->setActiveSheetIndex(0)
			->setCellValue($column."12", date("m/d/Y g:i a",$R["UNO"]));
			

			
}
if($R = mysqli_fetch_array($pasoocho)){			
$objPHPExcel->setActiveSheetIndex(0)
			->setCellValue($column."13", date("m/d/Y g:i a",$R["UNO"]));
		

			
}
$date9;
if($R = mysqli_fetch_array($pasonueve)){			
$objPHPExcel->setActiveSheetIndex(0)
			->setCellValue($column."14", date("m/d/Y g:i a",$R["DOS"]));
			$date9  =date("Y-m-d h:i",$R["DOS"]);

			
}
if($R = mysqli_fetch_array($pasodiez)){			
$objPHPExcel->setActiveSheetIndex(0)
			->setCellValue($column."15", date("m/d/Y g:i a",$R["UNO"]));

			
}
if($R = mysqli_fetch_array($pasoonce)){			
$objPHPExcel->setActiveSheetIndex(0)
			->setCellValue($column."16", date("m/d/Y g:i a",$R["DOS"]));
	

			
}
if($R = mysqli_fetch_array($pasodoce)){			
$objPHPExcel->setActiveSheetIndex(0)
			->setCellValue($column."17", date("m/d/Y g:i a",$R["UNO"]));
		

			
}
if($R = mysqli_fetch_array($pasotrece)){			
$objPHPExcel->setActiveSheetIndex(0)
			->setCellValue($column."18", date("m/d/Y g:i a",$R["UNO"]));
			

			
}
$date14;
if($R = mysqli_fetch_array($pasocatorce)){			
$objPHPExcel->setActiveSheetIndex(0)
			->setCellValue($column."19", date("m/d/Y g:i a",$R["DOS"]));
		$date14 = date("Y-m-d h:i ",$R["DOS"]);


			
}	
$d15;
$date15 ;	
if($R = mysqli_fetch_array($pasoquince)){			
$objPHPExcel->setActiveSheetIndex(0)
			->setCellValue($column."20", date("m/d/Y g:i a",$R["UNO"]));
			$date15 = date("Y-m-d h:i ",$R["UNO"]);
			$d15 = $R["UNO"];

			
}		
$datetime1 = date_create($date9);
$datetime2 = date_create($date14);
$interval = date_diff($datetime1, $datetime2);
$horas = $interval->format("%H");
$dias = $interval->format("%d");
$horasdias  = $dias * 24 ;

$datetime1 = date_create($date14);
$datetime2 = date_create($date15);
$interval2 = date_diff($datetime1, $datetime2);
$horas2 = $interval2->format("%H");
$dias2 = $interval2->format("%d");
$horasdias2  = $dias2 * 24 ;

$datetime1 = date_create($date1);
$datetime = date_create($date15);
$interval3 = date_diff($datetime1, $datetime2);
$horas3 = $interval3->format("%H");
$dias3 = $interval3->format("%d");
$horasdias3  = $dias3 * 24 ;


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
			->setCellValue($column."29",$horas + $horasdias)
			->setCellValue($column."31",$d)
			->setCellValue($column."30",$horas2 + $horasdias2);

  $objPHPExcel->setActiveSheetIndex(0)
			->setCellValue($column."23",$fines)
			->setCellValue($column."25",$domsab * 24)
			->setCellValue($column."28",$d * 16);	
$suma = $suma + $d;

			 $column = $objPHPExcel->getActiveSheet()->getHighestColumn();
	 $column++;
	$c++;	
}

$promedio  = $suma/$f ;
$objPHPExcel->setActiveSheetIndex(0)
			->setCellValue("D33",$promedio." dias");






$objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('B1', 'Reporte de tiempos de importación')
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

$rango="B5:D20";
$styleArray = array('font' => array( 'name' => 'Arial','size' => 10),
'borders'=>array('allborders'=>array('style'=> PHPExcel_Style_Border::BORDER_THIN,'color'=>array('argb' => 'FFF')))
);
$objPHPExcel->getActiveSheet()->getStyle($rango)->applyFromArray($styleArray);

// Cambiar el nombre de hoja de cálculo
$objPHPExcel->getActiveSheet()->setTitle('REPORTE '.$mes);


// Establecer índice de hoja activa a la primera hoja , por lo que Excel abre esto como la primera hoja
$objPHPExcel->setActiveSheetIndex(0);

// Redirigir la salida al navegador web de un cliente ( Excel5 )
header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment;filename="Reporte '.$mes.'.xlsx"');
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
