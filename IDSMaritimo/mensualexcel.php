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
			->setCellValue('B13', '8');
			
$objPHPExcel->setActiveSheetIndex(0)
			->setCellValue('C6', 'Recepción de Mercancías y Documentos')
			->setCellValue('C7', 'Notificacion')
			->setCellValue('C8', 'Manifiesto de mercancias')
            ->setCellValue('C9', 'Etiquetar')
            ->setCellValue('C10', 'Elaboracion de documentos')
			->setCellValue('C11', 'Solicitar carga de mercancias')
			->setCellValue('C12', 'Carga de mercancias')
			->setCellValue('C13', 'Despacho de Embarque');
			
$objPHPExcel->setActiveSheetIndex(0)
			->setCellValue('D6', 'Jefe de Bodefa/\rEjecutivo de Tráfico')
			->setCellValue('D7', 'Personal de Tráfico')
			->setCellValue('D8', 'Personal de Tráfico')
            ->setCellValue('D9', 'Jefe de Bodefa/\rEjecutivo de Tráfico')
            ->setCellValue('D10', 'Personal de Tráfico')
			->setCellValue('D11', 'Personal de Tráfico')
			->setCellValue('D12', 'Jefe de Bodega/Montecarguista')
			->setCellValue('D13', 'Personal de trafico');
			
$objPHPExcel->setActiveSheetIndex(0)
			->setCellValue('D15', 'Recepcion a Notificacion')
			->setCellValue('D16', 'Notificacion A Manifiesto')
			->setCellValue('D17', 'Manifiesto a elaboracion de doc')
			->setCellValue('D18', 'Solicitar Carga a Carga')
			->setCellValue('D19', 'Elaboracion de Doc a Carga')
			->setCellValue('D20', 'Carga a despacho')
            ->setCellValue('D21', 'Promedio Dias');
			
	

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
	
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue($column."5",$F["NREF"]);
	$objPHPExcel->getActiveSheet()->getColumnDimension($column)->setAutoSize(true);
	$date1;
	$d1;
	$objPHPExcel->getActiveSheet()->getStyle($column.'6:'.$column.'13') ->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::					
	FORMAT_DATE_TIME2); 
   	if($R = mysqli_fetch_array($pasouno)){			
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($column."6", date("d/m/Y g:i a",$R["UNO"]));
$date1 = date("Y-m-d h:i ",$R["UNO"]);
$d1 = $R["UNO"];
		
			
}
$d2;
if($R = mysqli_fetch_array($pasodos)){			
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($column."7", date("d/m/Y g:i a",$R["UNO"]));
	$d2 = $R["UNO"];		
			
}
if($R = mysqli_fetch_array($pasotres)){			
$objPHPExcel->setActiveSheetIndex(0)
			->setCellValue($column."8", date("d/m/Y g:i a",$R["UNO"]));
		

			
}
if($R = mysqli_fetch_array($pasocuatro)){			
$objPHPExcel->setActiveSheetIndex(0)
			->setCellValue($column."9", date("d/m/Y g:i a",$R["UNO"]));
		

			
}
if($R = mysqli_fetch_array($pasocinco)){			
$objPHPExcel->setActiveSheetIndex(0)
			->setCellValue($column."10", date("d/m/Y g:i a",$R["UNO"]));
		

			
}
if($R = mysqli_fetch_array($pasoseis)){			
$objPHPExcel->setActiveSheetIndex(0)
			->setCellValue($column."11", date("d/m/Y g:i a",$R["UNO"]));
		

			
}
if($R = mysqli_fetch_array($pasosiete)){			
$objPHPExcel->setActiveSheetIndex(0)
			->setCellValue($column."12", date("d/m/Y g:i a",$R["UNO"]));
			

			
}
if($R = mysqli_fetch_array($pasoocho)){			
$objPHPExcel->setActiveSheetIndex(0)
			->setCellValue($column."13", date("d/m/Y g:i a",$R["UNO"]));
		

			
}

	
	$objPHPExcel->getActiveSheet()->getStyle($column.'15:'.$column.'20') ->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::					
	FORMAT_DATE_TIME8);  
	$objPHPExcel->getActiveSheet()->getStyle($column.'21:'.$column.'21') ->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::					
	FORMAT_NUMBER_00);  

$objPHPExcel->setActiveSheetIndex(0)
			->setCellValue($column."15", '=+'.$column.'7-'.$column.'6')
			->setCellValue($column."16", '=+'.$column.'8-'.$column.'7')
			->setCellValue($column."17", '=+'.$column.'10-'.$column.'8')
			->setCellValue($column."18", '=+'.$column.'12-'.$column.'11')
			->setCellValue($column."19", '=+'.$column.'12-'.$column.'10')
			->setCellValue($column."20", '=+'.$column.'13-'.$column.'12')
            ->setCellValue($column."21", '=+'.$column.'13-'.$column.'6');
			
				
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

$rango="B5:D13";
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
