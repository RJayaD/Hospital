<?php


require('./fpdf.php');

include ("../../model/class_cc.php");
$args = new Conexion;
$db = $args->conectar();

//$param = $_REQUEST['fecha'];


$pdf = new FPDF('P','mm', 'A4');

$pdf->AddPage();

$pdf->SetFont('Arial','B',16);
$pdf->Cell(189  ,10,'',0,1);//end of line
//$pdf->Image('../../../inicializador/img/logo/'.$logo, 139,15,35,14,'PNG');
$pdf->Cell(59	,5,'LISTA DE EMPLEADOS',0,1);//end of line
$pdf->Cell(189	,10,'',0,1);//end of line
$pdf->SetFont('Arial','',10);
$pdf->Cell(30  ,5,'Fecha:  '.date('Y-m-d'),0,0, 'C');
$pdf->SetFont('Arial','',12);
$pdf->Cell(189	,10,'',0,1);//end of line
$pdf->SetFont('Arial','B',11);

$pdf->Cell(30	,5,'CEDULA',1,0);
$pdf->Cell(80	,5,'NOMBRE Y APELLIDOS',1,0);
$pdf->Cell(60	,5,'CORREO',1,0);
$pdf->Cell(30	,5,'TELEFONO',1,0);
$pdf->Cell(189	,10,'',0,1);//end of line
$pdf->SetFont('Arial','',12);

$query = $db->prepare("SELECT * FROM empleados WHERE id_estado = 1");
$query->execute();
$all = $query->fetchAll(PDO::FETCH_ASSOC);
foreach((array) $all as $item){
	$pdf->SetFont('Arial','',12);

	$pdf->Cell(30	,5,$item['cedula'],0,0);
	$pdf->Cell(80	,5,$item['primerNombre'] . ' '. $item['segundoNombre']. ' '. $item['primerApellido']. ' '. $item['segundoApellido'],0,0);
	$pdf->Cell(60	,5,$item['correo'],0,0);
	$pdf->Cell(30	,5,$item['telefono'],0,0);
	
	$pdf->Cell(189	,0,'',0,1);//end of line
	$pdf->Cell(100	,8,' ___________________________________________________________________________________',0,1);//end of line
}
$pdf->Output();