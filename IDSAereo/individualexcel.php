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
			->setCellValue('D4', 'INICIALES')
			->setCellValue('E3', 'FORMATO')
			->setCellValue('E4', 'L-FO25C');			
			
if($R = mysqli_fetch_array($pasouno)){			
$objPHPExcel->setActiveSheetIndex(0)
         
            ->setCellValue('A5',"Recepción de Mercancias")
            ->setCellValue('B5', "Jefe de Bodefa/ \r Ejecutivo de Tráfico")
			->setCellValue('C5', date("m-d-Y g:i a",$R["UNO"]))
			->setCellValue('D5', $R["IUNO"]);
		
			
}
if($R = mysqli_fetch_array($pasodos)){			
$objPHPExcel->setActiveSheetIndex(0)
         
            ->setCellValue('A6',"Revision")
            ->setCellValue('B6', "Revisador")
			->setCellValue('C6', date("m-d-Y g:i a",$R["UNO"]))
			->setCellValue('D6', $R["IUNO"]);

			
}
if($R = mysqli_fetch_array($pasotres)){			
$objPHPExcel->setActiveSheetIndex(0)
         
            ->setCellValue('A7',"Tráfico")
            ->setCellValue('B7', "Ejecutivo de Trafico/ Asistente de trafico")
			->setCellValue('C7', date("m-d-Y g:i a",$R["UNO"]))
			->setCellValue('D7', $R["IUNO"]);

			
}
if($R = mysqli_fetch_array($pasocuatro)){			
$objPHPExcel->setActiveSheetIndex(0)
         
            ->setCellValue('A8',"Trafico")
            ->setCellValue('B8', "Gerente/ Ejecutivo de Trafico")
			->setCellValue('C8', date("m-d-Y g:i a",$R["UNO"]))
			->setCellValue('D8', $R["IUNO"]);

			
}
if($R = mysqli_fetch_array($pasocinco)){			
$objPHPExcel->setActiveSheetIndex(0)
         
              ->setCellValue('A9',"Captura de EEI")
            ->setCellValue('B9', "Gerente/ Ejecutivo de Trafico")
			->setCellValue('C9', date("m-d-Y g:i a",$R["UNO"]))
			->setCellValue('D9', $R["IUNO"]);

			
}
if($R = mysqli_fetch_array($pasoseis)){			
$objPHPExcel->setActiveSheetIndex(0)
         
            ->setCellValue('A10',"Revision de EEI")
            ->setCellValue('B10', "Gerente/ Ejecutivo de Trafico")
			->setCellValue('C10', date("m-d-Y g:i a",$R["UNO"]))
			->setCellValue('D10', $R["IUNO"]);

			
}
if($R = mysqli_fetch_array($pasosiete)){			
$objPHPExcel->setActiveSheetIndex(0)
         
            ->setCellValue('A11',"Gestion ante Aduana - CBP")
            ->setCellValue('B11', "Gerente/ Ejecutivo de Trafico")
			->setCellValue('C11', date("m-d-Y g:i a",$R["UNO"]))
			->setCellValue('D11', $R["IUNO"]);

			
}
if($R = mysqli_fetch_array($pasoocho)){			
$objPHPExcel->setActiveSheetIndex(0)
         
			->setCellValue('A12',"Solicitud de equipo")
            ->setCellValue('B12', "Gerente/ Ejecutivo de Tráfico")
			->setCellValue('C12', date("m-d-Y g:i a",$R["UNO"]))
			->setCellValue('D12', $R["IUNO"]);

			
}
if($R = mysqli_fetch_array($pasonueve)){			
$objPHPExcel->setActiveSheetIndex(0)
         
			->setCellValue('A13',"Solicitar carga de mercancia")
            ->setCellValue('B13', "Ejecutivo de Tráfico/ Asistente de Trafico")
			->setCellValue('C13', date("m-d-Y g:i a",$R["UNO"]))
			->setCellValue('D13', $R["IUNO"]);

			
}
if($R = mysqli_fetch_array($pasodiez)){			
$objPHPExcel->setActiveSheetIndex(0)
         
			->setCellValue('A14',"Carga de mercancía")
            ->setCellValue('B14', "Jefe de Bodega/ Montecarguista")
			->setCellValue('C14', date("m-d-Y g:i a",$R["UNO"]))
			->setCellValue('D14', $R["IUNO"]);

			
}
if($R = mysqli_fetch_array($pasoonce)){			
$objPHPExcel->setActiveSheetIndex(0)
         
			->setCellValue('A15',"Llegada de custodia")
            ->setCellValue('B15', "Gerente / Ejecutivo de Tráfico")
			->setCellValue('C15', date("m-d-Y g:i a",$R["UNO"]))
			->setCellValue('D15', $R["IUNO"]);

			
}
if($R = mysqli_fetch_array($pasodoce)){			
$objPHPExcel->setActiveSheetIndex(0)
         
			->setCellValue('A16',"Envio de mercancia al aeropuerto")
            ->setCellValue('B16', "Gerente/ Ejecutivo  de Tráfico")
			->setCellValue('C16', date("m-d-Y g:i a",$R["UNO"]))
			->setCellValue('D16', $R["IUNO"]);

			
}if($R = mysqli_fetch_array($pasotrece)){			
$objPHPExcel->setActiveSheetIndex(0)
         
			->setCellValue('A17',"Descarga de Mercancia")
            ->setCellValue('B17', "Gerente/ Ejecutivo de Tráfico")
			->setCellValue('C17', date("m-d-Y g:i a",$R["UNO"]))
			->setCellValue('D17', $R["IUNO"]);

			
}
if($R = mysqli_fetch_array($pasocatorce)){			
$objPHPExcel->setActiveSheetIndex(0)
         
			->setCellValue('A18',"Arribo de avión")
            ->setCellValue('B18', "Gerente/ Ejecutivo de Trafico")
			->setCellValue('C18', date("m-d-Y g:i a",$R["UNO"]))
			->setCellValue('D18', $R["IUNO"]);

			
}
if($R = mysqli_fetch_array($pasoquince)){			
$objPHPExcel->setActiveSheetIndex(0)
         
			->setCellValue('A19',"Inspeccion por parte de Aduana CBP")
            ->setCellValue('B19', "Jefe de Bodega/ Ejecutivo de Tráfico")
			->setCellValue('C19', date("m-d-Y g:i a",$R["UNO"]))
			->setCellValue('D19', $R["IUNO"]);

			
}
if($R = mysqli_fetch_array($pasodieciseis)){			
$objPHPExcel->setActiveSheetIndex(0)
         
			->setCellValue('A20',"Supervisar Carga")
            ->setCellValue('B20', "Jefe de Bodega/ Asistente de Tráfico/Asistente de Trafico")
			->setCellValue('C20', date("m-d-Y g:i a",$R["UNO"]))
			->setCellValue('D20', $R["IUNO"]);

			
}
if($R = mysqli_fetch_array($pasodiecisiete)){			
$objPHPExcel->setActiveSheetIndex(0)
         
			->setCellValue('A21',"Despecho de avión")
            ->setCellValue('B21', "Ejecutivo de Tráfico/ Gerente")
			->setCellValue('C21', date("m-d-Y g:i a",$R["UNO"]))
			->setCellValue('D21', $R["IUNO"]);

			
}
if($R = mysqli_fetch_array($pasodieciocho)){			
$objPHPExcel->setActiveSheetIndex(0)
         
			->setCellValue('A22',"Despegue de avión")
            ->setCellValue('B22', "Ejecutivo de Tráfico/ Gerente")
			->setCellValue('C22', date("m-d-Y g:i a",$R["UNO"]))
			->setCellValue('D22', $R["IUNO"]);

			
}
if($R = mysqli_fetch_array($pasodiecinueve)){			
$objPHPExcel->setActiveSheetIndex(0)
         
			->setCellValue('A23',"Documentacion de Expediente")
            ->setCellValue('B23', "Gerente")
			->setCellValue('C23', date("m-d-Y g:i a",$R["UNO"]))
			->setCellValue('D23', $R["IUNO"]);

			
}
if($R = mysqli_fetch_array($pasoveinte)){			
$objPHPExcel->setActiveSheetIndex(0)
         
			->setCellValue('A24',"Facturacion de cuenta de gastos americana")
            ->setCellValue('B24', "Gerente")
			->setCellValue('C24', date("m-d-Y g:i a",$R["UNO"]))
			->setCellValue('D24', $R["IUNO"]);

			
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

$rango="A2:D24";
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
