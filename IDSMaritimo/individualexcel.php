<?php
require("conect.php");
$idCone = conectar();
$ref = $_POST["referencia"];
$pedimento;
$nref;
$cliente;
$fec;
$hora;
$query = mysqli_query($idCone,"SELECT * FROM referencias WHERE REF LIKE '$ref' ");
if($A = mysqli_fetch_array($query)){
	$pedimento = $A["PEDIMENTO"];
	$nref = $A["NREF"];
	$cliente = $A["CLIENTE"];
	$fec = date("m-d-Y",$A["FECNUM"]);
	$hora =  $A["HORA"];
}
$pasouno =  mysqli_query($idCone,"SELECT * FROM pasouno WHERE REF LIKE '$ref'");
$pasodos =  mysqli_query($idCone,"SELECT * FROM pasodos WHERE REF LIKE '$ref'");
$pasotres =  mysqli_query($idCone,"SELECT * FROM pasotres WHERE REF LIKE '$ref'");
$pasocuatro=  mysqli_query($idCone,"SELECT * FROM pasocuatro WHERE REF LIKE '$ref'");
$pasocinco =  mysqli_query($idCone,"SELECT * FROM pasocinco WHERE REF LIKE '$ref'");
$pasoseis =  mysqli_query($idCone,"SELECT * FROM pasoseis WHERE REF LIKE '$ref'");
$pasosiete =  mysqli_query($idCone,"SELECT * FROM pasosiete WHERE REF LIKE '$ref'");
$pasoocho =  mysqli_query($idCone,"SELECT * FROM pasoocho WHERE REF LIKE '$ref'");

/** Incluye PHPExcel */
require_once("Recursos/excel/PHPExcel/PHPExcel/Classes/PHPExcel.php");
// Crear nuevo objeto PHPExcel
$objPHPExcel = new PHPExcel();
// Propiedades del documento
$objPHPExcel->getProperties()->setCreator("IDS")
							 ->setLastModifiedBy("IDS")
							 ->setTitle($nref)
							 ->setSubject("Office 2010 XLSX REPORTE")
							 ->setDescription("Reporte,generado usando clases de PHP.")
							 ->setKeywords("office 2010 openxml php")
							 ->setCategory("Archivo de reporte");

$objPHPExcel->setActiveSheetIndex(0)->mergeCells('A1:E1');

$objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('A1', 'PLAN DE CALIDAD DEL PROCEDIMIENTO DE IMPORTACION')
			->setCellValue('A2', 'CLIENTE : '.$cliente)
			->setCellValue('B2', 'PEDIMENTO : '.$pedimento)
			->setCellValue('C2', 'REFERENCIA : '. $nref)
			->setCellValue('D2', 'FECHA:  : '.$fec)
			->setCellValue('E2', 'HORA : '. $hora)
            ->setCellValue('A4', 'OPERACIÓN')
            ->setCellValue('B4', 'RESPONSABLE')
			->setCellValue('C4', 'FECHA')
			->setCellValue('D4', 'INICIALES');
			
if($R = mysqli_fetch_array($pasouno)){			
$objPHPExcel->setActiveSheetIndex(0)
         
            ->setCellValue('A5',"Recepción de Mercancias".PHP_EOL."y  Documentos")
            ->setCellValue('B5', "Jefe de Bodefa/ \r Ejecutivo de Tráfico")
			->setCellValue('C5', date("m-d-Y g:i a",$R["UNO"]))
			->setCellValue('D5', $R["IUNO"]);
		
			
}
if($R = mysqli_fetch_array($pasodos)){			
$objPHPExcel->setActiveSheetIndex(0)
         
            ->setCellValue('A6',"Notificación")
            ->setCellValue('B6', "Personal de Tráfico")
			->setCellValue('C6', date("m-d-Y g:i a",$R["UNO"]))
			->setCellValue('D6', $R["IUNO"]);

			
}
if($R = mysqli_fetch_array($pasotres)){			
$objPHPExcel->setActiveSheetIndex(0)
         
            ->setCellValue('A7',"Manifiesto de mercancias")
            ->setCellValue('B7', "Personal de trafico")
			->setCellValue('C7', date("m-d-Y g:i a",$R["UNO"]))
			->setCellValue('D7', $R["IUNO"]);

			
}
if($R = mysqli_fetch_array($pasocuatro)){			
$objPHPExcel->setActiveSheetIndex(0)
         
            ->setCellValue('A8',"Etiquetar")
            ->setCellValue('B8', "Jefe de Bodega/Encargado de Trafico")
			->setCellValue('C8', date("m-d-Y g:i a",$R["UNO"]))
			->setCellValue('D8', $R["IUNO"]);

			
}
if($R = mysqli_fetch_array($pasocinco)){			
$objPHPExcel->setActiveSheetIndex(0)
         
              ->setCellValue('A9',"Elaboracion de documentos")
            ->setCellValue('B9', "Personal de Tráfico")
			->setCellValue('C9', date("m-d-Y g:i a",$R["UNO"]))
			->setCellValue('D9', $R["IUNO"]);

			
}
if($R = mysqli_fetch_array($pasoseis)){			
$objPHPExcel->setActiveSheetIndex(0)
         
            ->setCellValue('A10',"Solicitar carga de Mercancias")
            ->setCellValue('B10', "Personal de Tráfico")
			->setCellValue('C10', date("m-d-Y g:i a",$R["UNO"]))
			->setCellValue('D10', $R["IUNO"]);

			
}
if($R = mysqli_fetch_array($pasosiete)){			
$objPHPExcel->setActiveSheetIndex(0)
         
            ->setCellValue('A11',"Carga de Mercancias")
            ->setCellValue('B11', "Jefe de bodega/Montecarguista")
			->setCellValue('C11', date("m-d-Y g:i a",$R["UNO"]))
			->setCellValue('D11', $R["IUNO"]);

			
}
if($R = mysqli_fetch_array($pasoocho)){			
$objPHPExcel->setActiveSheetIndex(0)
         
			->setCellValue('A12',"Despacho de Embarque")
            ->setCellValue('B12', "Personal de Tráfico")
			->setCellValue('C12', date("m-d-Y g:i a",$R["UNO"]))
			->setCellValue('D12', $R["IUNO"]);

			
}
	
// Fuente de la primera fila en negrita
$boldArray = array('font' => array('bold' => true,),'alignment' => array('horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER));

$objPHPExcel->getActiveSheet()->getStyle('A1:E4')->applyFromArray($boldArray);
//Ancho de las columnas
$objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(25);	
$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(25);	
$objPHPExcel->getActiveSheet()->getColumnDimension('C')->setAutoSize(true);	
$objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(25);	
$objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(25);
$objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(25);	
$objPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth(25);
$objPHPExcel->getActiveSheet()->getRowDimension("5")->setRowHeight(50);

$objPHPExcel->getActiveSheet()->getDefaultStyle()->getAlignment()->setWrapText(true);

$rango="A2:D12";
$styleArray = array('font' => array( 'name' => 'Arial','size' => 10),
'borders'=>array('allborders'=>array('style'=> PHPExcel_Style_Border::BORDER_THIN,'color'=>array('argb' => 'FFF')))
);
$objPHPExcel->getActiveSheet()->getStyle($rango)->applyFromArray($styleArray);

// Cambiar el nombre de hoja de cálculo
$objPHPExcel->getActiveSheet()->setTitle('REPORTE '.$nref);


// Establecer índice de hoja activa a la primera hoja , por lo que Excel abre esto como la primera hoja
$objPHPExcel->setActiveSheetIndex(0);

// Redirigir la salida al navegador web de un cliente ( Excel5 )
header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment;filename="'.$nref.'.xlsx"');
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
