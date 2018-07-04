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
//			->setCellValue('D27', '1-2')
//			->setCellValue('D28', '2-4')
//			->setCellValue('D29', '4-6')
//			->setCellValue('D30', '6-7')
//			->setCellValue('D31', '7-10')
//			->setCellValue('D32', '10-12')
//            ->setCellValue('D33', '12-13')
//			->setCellValue('D34', '13-17')
//			->setCellValue('D35', '17-18')
//			->setCellValue('D36', '18-20')
//           ->setCellValue('D37', '1-20');
			
//
			->setCellValue('D27', 'Recepcion a Revision 1-2')
			->setCellValue('D28', 'Revision a Solicitud Instrucciones 2-4')
			->setCellValue('D29', 'Trafico Solicitar a Revision EEI 4-7')
			->setCellValue('D30', 'Revision EEI a Gestion ante Aduana 7-8')
			->setCellValue('D31', 'Gestion ante Aduana a Carga de Mercancia a Aeropuerto 8-11')
			->setCellValue('D32', 'Carga de Mercancia a Envio de Mercancia a Aeropuerto 11-13')
            ->setCellValue('D33', 'Envio de Mercancia a Aeropuerto a Descarga de Mercancia 13-14')
			->setCellValue('D34', 'Descarga de Mercancia a Despacho del Avion 14-18')
			->setCellValue('D35', 'Despacho del Avion a Despegue 18-19')
			->setCellValue('D36', 'Despegue a Facturacion 19-21')
            ->setCellValue('D37', 'Recepcion a Despegue 1-19');			
			
	

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
	$objPHPExcel->getActiveSheet()->getStyle($column.'6:'.$column.'25') ->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::					
	FORMAT_DATE_TIME2);  
	
   	if($R = mysqli_fetch_array($pasouno)){			
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($column."6", date("m/d/Y g:i a",$R["UNO"]));
$date1 = date("Y-m-d h:i ",$R["UNO"]);
$d1 = $R["UNO"];
		
			
}
$d2;
if($R = mysqli_fetch_array($pasodos)){			
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($column."7", date("m/d/Y g:i a",$R["UNO"]));
	$d2 = $R["UNO"];		
			
}
if($R = mysqli_fetch_array($pasotres)){			
$objPHPExcel->setActiveSheetIndex(0)
			->setCellValue($column."8", date("m/d/Y g:i a",$R["UNO"]));
		

			
}
if($R = mysqli_fetch_array($pasocuatro)){			
$objPHPExcel->setActiveSheetIndex(0)
			->setCellValue($column."9", date("m/d/Y g:i a",$R["UNO"]));
		

			
}
if($R = mysqli_fetch_array($pasocinco)){			
$objPHPExcel->setActiveSheetIndex(0)
			->setCellValue($column."10", date("m/d/Y g:i a",$R["UNO"]));
		

			
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
if($R = mysqli_fetch_array($pasonueve)){			
$objPHPExcel->setActiveSheetIndex(0)
			->setCellValue($column."14", date("m/d/Y g:i a",$R["UNO"]));
		

			
}
if($R = mysqli_fetch_array($pasodiez)){			
$objPHPExcel->setActiveSheetIndex(0)
			->setCellValue($column."15", date("m/d/Y g:i a",$R["UNO"]));
		

			
}
if($R = mysqli_fetch_array($pasoonce)){			
$objPHPExcel->setActiveSheetIndex(0)
			->setCellValue($column."16", date("m/d/Y g:i a",$R["UNO"]));
		

			
}
if($R = mysqli_fetch_array($pasodoce)){			
$objPHPExcel->setActiveSheetIndex(0)
			->setCellValue($column."17", date("m/d/Y g:i a",$R["UNO"]));
		

			
}
if($R = mysqli_fetch_array($pasotrece)){			
$objPHPExcel->setActiveSheetIndex(0)
			->setCellValue($column."18", date("m/d/Y g:i a",$R["UNO"]));
		

			
}
if($R = mysqli_fetch_array($pasocatorce)){			
$objPHPExcel->setActiveSheetIndex(0)
			->setCellValue($column."19", date("m/d/Y g:i a",$R["UNO"]));
		

			
}
if($R = mysqli_fetch_array($pasoquince)){			
$objPHPExcel->setActiveSheetIndex(0)
			->setCellValue($column."20", date("m/d/Y g:i a",$R["UNO"]));
		

			
}
if($R = mysqli_fetch_array($pasodieciseis)){			
$objPHPExcel->setActiveSheetIndex(0)
			->setCellValue($column."21", date("m/d/Y g:i a",$R["UNO"]));
		

			
}
if($R = mysqli_fetch_array($pasodiecisiete)){			
$objPHPExcel->setActiveSheetIndex(0)
			->setCellValue($column."22", date("m/d/Y g:i a",$R["UNO"]));
		

			
}
if($R = mysqli_fetch_array($pasodieciocho)){			
$objPHPExcel->setActiveSheetIndex(0)
			->setCellValue($column."23", date("m/d/Y g:i a",$R["UNO"]));
		

			
}
if($R = mysqli_fetch_array($pasodiecinueve)){			
$objPHPExcel->setActiveSheetIndex(0)
			->setCellValue($column."24", date("m/d/Y g:i a",$R["UNO"]));
		

			
}
if($R = mysqli_fetch_array($pasoveinte)){			
$objPHPExcel->setActiveSheetIndex(0)
			->setCellValue($column."25", date("m/d/Y g:i a",$R["UNO"]));
		

			
}
/////
//$datetime1 = date_create($d1);
///$datetime2 = date_create($d22);
//$interval = date_diff($datetime1, $datetime2);
//$dias  = $interval->format("%a")  * 24;
//$horas =  $interval->format("%H");
//$total = $dias+$horas;

//////
	$objPHPExcel->getActiveSheet()->getStyle($column.'27:'.$column.'37') ->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::					
	FORMAT_DATE_TIME6);  
  

$objPHPExcel->setActiveSheetIndex(0)
			->setCellValue($column."27", '=+'.$column.'7-'.$column.'6')
			->setCellValue($column."28", '=+'.$column.'9-'.$column.'7')
			->setCellValue($column."29", '=+'.$column.'11-'.$column.'9')
			->setCellValue($column."30", '=+'.$column.'12-'.$column.'11')
			->setCellValue($column."31", '=+'.$column.'15-'.$column.'12')
			->setCellValue($column."32", '=+'.$column.'17-'.$column.'15')
            ->setCellValue($column."33", '=+'.$column.'18-'.$column.'17')
			->setCellValue($column."34", '=+'.$column.'22-'.$column.'18')
			->setCellValue($column."35", '=+'.$column.'23-'.$column.'22')
			->setCellValue($column."36", '=+'.$column.'25-'.$column.'24')
            ->setCellValue($column."37", '=+'.$column.'25-'.$column.'6');
		//	 ->setCellValue($column."39", $dias);
				
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
			->setCellValue("D39",$promedio." dias");


$objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('B1', 'Reporte de tiempos de importación')
			->setCellValue('C5', 'OPERACION')
			->setCellValue('D5', 'RESPONSABLES');
		
		
				$objDrawing = new PHPExcel_Worksheet_Drawing();
                    $objDrawing->setName('imgNotice');
                    $objDrawing->setDescription('Noticia');
                    $img = 'Recursos/Imagenes/logo.PNG'; // Provide path to your logo file
               			 


	
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
