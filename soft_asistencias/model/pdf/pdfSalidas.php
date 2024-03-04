<?php


require('./fpdf.php');

include ("../../model/class_cc.php");
$args = new Conexion;
$db = $args->conectar();

$param = $_REQUEST['argments'];


$pdf = new FPDF('P','mm', 'A3');

$pdf->AddPage();

$pdf->SetFont('Arial','B',16);
$pdf->Cell(189  ,10,'',0,1);//end of line
//$pdf->Image('../../../inicializador/img/logo/'.$logo, 139,15,35,14,'PNG');
$pdf->Cell(59	,5,'LISTA DE SALIDA',0,1);//end of line
$pdf->Cell(189	,10,'',0,1);//end of line
$pdf->SetFont('Arial','',10);
$pdf->Cell(30  ,5,'Fecha:  '.$param,0,0, 'C');
$pdf->SetFont('Arial','',12);
$pdf->Cell(189	,10,'',0,1);//end of line
$pdf->SetFont('Arial','B',11);

$pdf->Cell(30	,5,'CEDULA',1,0);
$pdf->Cell(80	,5,'NOMBRE Y APELLIDOS',1,0);
$pdf->Cell(60	,5,'CORREO',1,0);
$pdf->Cell(30	,5,'TELEFONO',1,0);
$pdf->Cell(65	,5,'LLEGADA',1,0);
$pdf->Cell(189	,10,'',0,1);//end of line
$pdf->SetFont('Arial','',12);

$query = $db->prepare("SELECT t1.fecha, t2.cedula, concat(t2.primerNombre, ' ', t2.segundoNombre, ' ', t2.primerApellido, ' ', t2.segundoApellido) as eply,
                                    t2.telefono, t2.correo,
                                    t3.nombre
                                    
                                    FROM asist_salida t1 
                                        INNER JOIN empleados t2 ON t1.empleadoId = t2.id
                                        INNER JOIN tipo_salida t3 ON t1.tipoId = t3.id
                                    WHERE t1.id_estado = 1 AND t1.fecha = '$param'");
$query->execute();
$all = $query->fetchAll(PDO::FETCH_ASSOC);
foreach((array) $all as $item){
	$pdf->SetFont('Arial','',12);

	$pdf->Cell(30	,5,$item['cedula'],0,0);
	$pdf->Cell(80	,5,$item['eply'],0,0);
	$pdf->Cell(60	,5,$item['correo'],0,0);
	$pdf->Cell(30	,5,$item['telefono'],0,0);
	$pdf->Cell(60	,5,$item['nombre'],0,0);
	$pdf->Cell(189	,0,'',0,1);//end of line
	$pdf->Cell(100	,8,' _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _',0,1);//end of line
}
$pdf->Output();