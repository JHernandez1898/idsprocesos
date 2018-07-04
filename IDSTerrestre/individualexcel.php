<?php
require("conect.php");
$idCone = conectar();
$ref = $_GET["ref"];
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
$pasodoce =  mysqli_query($idCone,"SELECT * FROM pasodoce WHERE REF LIKE '$ref'");
$pasotrece =  mysqli_query($idCone,"SELECT * FROM pasotrece WHERE REF LIKE '$ref'");
$pasocatorce =  mysqli_query($idCone,"SELECT * FROM pasocatorce WHERE REF LIKE '$ref'");
$pasoquince =  mysqli_query($idCone,"SELECT * FROM pasoquince WHERE REF LIKE '$ref'");
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
			->setCellValue('C4', 'CRITERIOS DE ACEPTACION')
			->setCellValue('D4', 'ACEPTACION')
			->setCellValue('E4', 'INICIALES')
			->setCellValue('E3', 'FORMATO')
			->setCellValue('E4', 'L-FO25C');			
			
if($R = mysqli_fetch_array($pasouno)){			
$objPHPExcel->setActiveSheetIndex(0)
         
            ->setCellValue('A5',"Recepción de Mercancias".PHP_EOL."y  Documentos")
            ->setCellValue('B5', "Jefe de Bodefa/ \r Ejecutivo de Tráfico")
			->setCellValue('C5', 
			"*Verificar cantidad y estado de los bultos(indicar discrepancias)\r*Asignar número de entrada a bodega al embarque.\r*Etiquetar bultos con código de control (EB).")
			->setCellValue('C6','*Recepcion de Documentos' )
			->setCellValue('D5', date("m-d-Y g:i a",$R["FECUNO"]))
			->setCellValue('D6', date("m-d-Y g:i a",$R["FECDOS"]))
			->setCellValue('E5', $R["INIUNO"])
			->setCellValue('E6', $R["INIDOS"]);
			
}
if($R = mysqli_fetch_array($pasodos)){			
$objPHPExcel->setActiveSheetIndex(0)
         
            ->setCellValue('A7',"Revisión")
            ->setCellValue('B7', "Revisador")
			->setCellValue('C7', 
			"*Revisar fisicamente que las cartidades y caracteristicas de la mercancia coincida con las factueas o listas de empaques (en caso de\rdaños,faltantes o sobrantes, elaborar reporte de discrepancias).\r*Verificar la informacion de las facturas (pesos, origine,series, etc).")
			->setCellValue('D7', date("m-d-Y g:i a",$R["FEC"]))
			->setCellValue('E7', $R["INICIAL"]);

			
}
if($R = mysqli_fetch_array($pasotres)){			
$objPHPExcel->setActiveSheetIndex(0)
         
            ->setCellValue('A8',"Tráfico")
            ->setCellValue('B8', "Ejecutivo de \r trafico")
			->setCellValue('C8', "*Verficar con el cliente la mercancia a importar")
			->setCellValue('C9', "*Revisar que las facturas y documentos del embarque estén completos y correctos(revisar fletes y otros costos)")
			->setCellValue('D8', date("m-d-Y g:i a",$R["FECUNO"]))
			->setCellValue('D9', date("m-d-Y g:i a",$R["FECDOS"]))
			->setCellValue('E8', $R["INIUNO"])
			->setCellValue('E9', $R["INIDOS"]);

			
}
if($R = mysqli_fetch_array($pasocuatro)){			
$objPHPExcel->setActiveSheetIndex(0)
         
            ->setCellValue('A10',"Clasificación")
            ->setCellValue('B10', "Clasificador")
			->setCellValue('C10', "*Verificar número de parte en la base de datos.")
			->setCellValue('C11', "*Solicitar fracción arancelaria de clasificador \rsi no está en la base de datos ")
			->setCellValue('D10', date("m-d-Y g:i a",$R["FECUNO"]))
			->setCellValue('D11', date("m-d-Y g:i a",$R["FECDOS"]))
			->setCellValue('E10', $R["INIUNO"])
			->setCellValue('E11', $R["INIDOS"]);

			
}
if($R = mysqli_fetch_array($pasocinco)){			
$objPHPExcel->setActiveSheetIndex(0)
         
            ->setCellValue('A12',"Clasificación")
            ->setCellValue('B12', "Clasificador")
			->setCellValue('C12', "*Verficar fraccion arancerlaria de la mercancia y sus requisitos\r*Documentar factura")
			->setCellValue('C13', "*Elaborar nota de revisión y cotización\r*Verificar requisitos de importación ")
			->setCellValue('C14', "*Enviar al cliente para que depositen impiestos y gastos\r*Solicitar equipo de transporte ")
			->setCellValue('D12', date("m-d-Y g:i a",$R["UNO"]))
			->setCellValue('D13', date("m-d-Y g:i a",$R["DOS"]))
			->setCellValue('D14', date("m-d-Y g:i a",$R["TRES"]))
			->setCellValue('E12', $R["IUNO"])
			->setCellValue('E13', $R["IDOS"])
			->setCellValue('E14', $R["ITRES"]);

			
}
if($R = mysqli_fetch_array($pasoseis)){			
$objPHPExcel->setActiveSheetIndex(0)
         
            ->setCellValue('A15',"Revisión Nota")
            ->setCellValue('B15', "Gerente")
			->setCellValue('C15', "*Revisar Nota de Revisión preparar COVES y los e-Documents")
			->setCellValue('D15', date("m-d-Y g:i a",$R["UNO"]))
			->setCellValue('E15', $R["IUNO"]);

			
}
if($R = mysqli_fetch_array($pasosiete)){			
$objPHPExcel->setActiveSheetIndex(0)
         
            ->setCellValue('A16',"Captura de pedimento")
            ->setCellValue('B16', "Ejecutivo de trafico")
			->setCellValue('C16', "*Verificar que se tiene la información completa para elaborar pedimento(Nota de Revisión, número programa immex si aplica, etc)\r*Imprimir copia de pedimento para revisión")
			->setCellValue('D16', date("m-d-Y g:i a",$R["UNO"]))
			->setCellValue('E16', $R["IUNO"]);

			
}
if($R = mysqli_fetch_array($pasoocho)){			
$objPHPExcel->setActiveSheetIndex(0)
         
            ->setCellValue('A17',"Revisión de pedimento")
            ->setCellValue('B17', "Gerente / Ejecutivo de Tráfico")
			->setCellValue('C17', "*Revisar proforma de pedimento\r*Verificar valor total de factura vs pedimento\r*Verificar cumplimiento de requerimientos conforme anexo 22")
			->setCellValue('D17', date("m-d-Y g:i a",$R["UNO"]))
			->setCellValue('E17', $R["IUNO"]);

			
}
if($R = mysqli_fetch_array($pasonueve)){			
$objPHPExcel->setActiveSheetIndex(0)
         
            ->setCellValue('A18',"Revisión de pedimento")
            ->setCellValue('B18', "Gerente / Ejecutivo de Tráfico")
			->setCellValue('C18', "*Confirmar depósito de anticipo o financiamiento de impuestos ")
			->setCellValue('C19', "*Confirmar arribo del equipo de transporte y documentos")
			->setCellValue('D18', date("m-d-Y g:i a",$R["UNO"]))
			->setCellValue('E18', $R["IUNO"])
			->setCellValue('D19', date("m-d-Y g:i a",$R["DOS"]))
			->setCellValue('E19', $R["IDOS"]);

			
}
if($R = mysqli_fetch_array($pasodiez)){			
$objPHPExcel->setActiveSheetIndex(0)
         
            ->setCellValue('A20',"Validación del pedimento")
            ->setCellValue('B20', "Ejecutivo de Tráfico / Asistente de Tráfico")
			->setCellValue('C20', "*Validacion, pago, impresión,y armado de pedimentos\r*Elaborar relacion de documentos")
			->setCellValue('D20', date("m-d-Y g:i a",$R["UNO"]))
			->setCellValue('E20', $R["IUNO"]);

			
}
if($R = mysqli_fetch_array($pasoonce)){			
$objPHPExcel->setActiveSheetIndex(0)
         
            ->setCellValue('A21',"Revisión de pedimento")
            ->setCellValue('B21', "Gerente / Ejecutivo de Tráfico")
			->setCellValue('C21', "*Confirmar depósito de anticipo o financiamiento de impuestos ")
			->setCellValue('C22', "*Confirmar arribo del equipo de transporte y documentos")
			->setCellValue('D21', date("m-d-Y g:i a",$R["UNO"]))
			->setCellValue('D22', date("m-d-Y g:i a",$R["DOS"]))
			->setCellValue('E21', $R["IUNO"])
			->setCellValue('E22', $R["IDOS"]);

			
}
if($R = mysqli_fetch_array($pasodoce)){			
$objPHPExcel->setActiveSheetIndex(0)
         
            ->setCellValue('A23',"Solicitar caga de mercancia")
            ->setCellValue('B23', "Ejecutivo de Tráfico")
			->setCellValue('C23', "*Entregar relacion de carga a Jefe de Bodega")
			->setCellValue('D23', date("m-d-Y g:i a",$R["UNO"]))
			->setCellValue('E23', $R["IUNO"]);

			
}
if($R = mysqli_fetch_array($pasotrece)){			
$objPHPExcel->setActiveSheetIndex(0)
         
            ->setCellValue('A24',"Carga de mercancia")
            ->setCellValue('B24', "Jefe de Bodega / Montecarguista")
			->setCellValue('C24', "*Separar y etiquetar mercancia conforme a la relacion de carga \r*Cargar la cantidad total de bultos de la relacion de carga en vehiculo asignado, bloquear y tomar fotografia.")
			->setCellValue('D24', date("m-d-Y g:i a",$R["UNO"]))
			->setCellValue('E24', $R["IUNO"]);

			
}
if($R = mysqli_fetch_array($pasocatorce)){			
$objPHPExcel->setActiveSheetIndex(0)
         
            ->setCellValue('A25',"Despacho de embarque")
            ->setCellValue('B25', "Ejecutivo de Trafico / Asistente de Trafico/ Gerente")
			->setCellValue('C25', "*Confrontar pedimento contra Relacion de documentos\r*Verificar pedimento lleve el acuese de validacion, pago y firma electronica\r*Verificar que se le entrega la documentacion completa al Transfer")
			->setCellValue('C26', "*Seguimiento de cruce hasta entrega al transportista asignado")
			->setCellValue('D25', date("m-d-Y g:i a",$R["UNO"]))
			->setCellValue('D26', date("m-d-Y g:i a",$R["DOS"]))
			->setCellValue('E25', $R["IUNO"])
			->setCellValue('E26', $R["IDOS"]);

			
}		
if($R = mysqli_fetch_array($pasoquince)){			
$objPHPExcel->setActiveSheetIndex(0)
         
            ->setCellValue('A27',"Facturación de cuenta de gastos americana")
            ->setCellValue('B27', "Gerente")
			->setCellValue('C27', "*Revisar indicaciones y comprobantes para facturar\r*Verificar tarifas vigentes para facturación\r*Revisar que el expediente este completo pasu entrega a NLDO")
			->setCellValue('D27', date("m-d-Y g:i a",$R["UNO"]))
			->setCellValue('E27', $R["IUNO"]);

			
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

$rango="A2:E27";
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
