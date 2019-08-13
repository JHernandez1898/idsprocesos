<?php
include("conect.php");
$idCone = conectar();
$fecha =  $_GET["fecha"];
$fechaLimite =  $_GET["fechaLimite"];
$idsCone =  conectarIDS();
$SQL = "SELECT tblMT.BODREFERENCIA, CLIENTES.NOM,TBLMT.BODFECHA,TBLMT.BODFECHA,TBLMT.BODHORA
TRAFICO,TRAADUANA 
FROM TBLMT LEFT JOIN CLIENTES ON TBLMT.BODCLI = CLIENTES.CLIENTE_ID
LEFT JOIN TRAFICO ON TBLMT.REFASIGNADA = TRAFICO.TRAREFERENCIA
WHERE TBLMT.BODFECHA BETWEEN '$fecha' AND '$fechaLimite'";
//$SQL = "SELECT * FROM pasodieciocho WHERE UNO BETWEEN '$fecnum' AND '$final'";
// no funciona correctamente no trae los meses de octubre, sept y noviembre 
///$SQL = "SELECT * FROM pasonueve WHERE UNO >='$fecnum' AND UNO < '$final'";
// ok ..... funciona bien .... $SQL = "SELECT * FROM pasoquince WHERE UNO BETWEEN '$fecnum' AND '$final'";

//$SQL = "SELECT * FROM referencias WHERE FECNUM >='$fecnum'";
$query = sqlsrv_query($idsCone,$SQL);

/** Incluye PHPExcel */
require_once("Recursos/excel/PHPExcel/PHPExcel/Classes/PHPExcel.php");
// Crear nuevo objeto PHPExcel
$objPHPExcel = new PHPExcel();
// Propiedades del documento
$objPHPExcel->getProperties()->setCreator("IDS")
							 ->setLastModifiedBy("IDS")
							 ->setTitle("IDS")
							 ->setSubject("Office 2010 XLSX REPORTE")
							 ->setDescription("Reporte,generado usando clases de PHP.")
							 ->setKeywords("office 2010 openxml php")
							 ->setCategory("Archivo de reporte");



$objPHPExcel->setActiveSheetIndex(0)
			->setCellValue('B2', 'Fecha Inicial: '.$fecha)
			->setCellValue('C2', 'Fecha Final: '.$fechaLimite)			
			->setCellValue('B3', 'Referencia')
			->setCellValue('C3', 'Cliente')
			->setCellValue('D3', 'Referencia')
            ->setCellValue('E3', 'Fecha')
            ->setCellValue('F3', 'Hora')
			->setCellValue('G3', 'Aduana');

			
	
$column = 'C';
$c = 0;
$CELDA=3;
while($R = sqlsrv_fetch_array($query)){
	$c++;
	$CELDA++;
				$referencia = $R["BODREFERENCIA"];
				$nombre = $R["NOM"];
				$fecha = $R["BODFECHA"];
				$hora = $R["TRAFICO"];
				$aduana = $R["TRAADUANA"];
$result = $fecha->format('d/m/y');
	
$objPHPExcel->setActiveSheetIndex(0)
			->setCellValue("B".$CELDA, $c)
			->setCellValue("C".$CELDA, $nombre)
			->setCellValue("D".$CELDA, $referencia)
            ->setCellValue("E".$CELDA, $result)
            ->setCellValue("F".$CELDA,$hora)
			->setCellValue("G".$CELDA,$aduana);
			$column++;
	
	}


		$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(15);	
$objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(40);	
$objPHPExcel->getActiveSheet()->getColumnDimension('D')->setAutoSize(true);	
$objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(15);
$objPHPExcel->getActiveSheet()->getColumnDimension('F')->setAutoSize(true);	
$objPHPExcel->getActiveSheet()->getColumnDimension('G')->setAutoSize(true);	
	

	
// Fuente de la primera fila en negrita




$objPHPExcel->getActiveSheet()->getDefaultStyle()->getAlignment()->setWrapText(true);

$rango="B3:G".$CELDA; // esta lineamarca el borde de las celdas que quiero marcar
$styleArray = array('font' => array( 'name' => 'Arial','size' => 10),
'borders'=>array('allborders'=>array('style'=> PHPExcel_Style_Border::BORDER_THIN,'color'=>array('argb' => 'FFF'))));
$objPHPExcel->getActiveSheet()->getStyle($rango)->applyFromArray($styleArray);

// Cambiar el nombre de hoja de cálculo
$objPHPExcel->getActiveSheet()->setTitle('Reportes EBS');


// Establecer índice de hoja activa a la primera hoja , por lo que Excel abre esto como la primera hoja
$objPHPExcel->setActiveSheetIndex(0);

// Redirigir la salida al navegador web de un cliente ( Excel5 )
header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment;filename="ReporteEBS.xls"');
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
