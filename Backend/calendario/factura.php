<?php
/*call the FPDF library*/
require('fpdf/fpdf.php');

    
/*A4 width : 219mm*/

$pdf = new FPDF('P','mm','A4');

$pdf->AddPage();
/*output the result*/

/*set font to arial, bold, 14pt*/
$pdf->SetFont('Arial','B',20);

/*Cell(width , height , text , border , end line , [align] )*/

$pdf->Cell(71 ,10,'',0,0);
$pdf->Cell(59 ,1,utf8_decode('Boleta electrónica'),0,100);
$pdf->Cell(59 ,10,'',0,1);

$pdf->SetFont('Arial','B',15);
$pdf->Cell(71 ,5,'Hotel Controller',0,0);
$pdf->Cell(59 ,5,'',0,0);
$pdf->Cell(59 ,5,'Detalles',0,1);

$pdf->SetFont('Arial','',10);


require './fpdf/conexion.php';
    $id = $_GET['id_recepcion'];
    $stmt = $connect->prepare("SELECT recepcion.id_recepcion, recepcion.id_reserva, recepcion.id_habitacion, recepcion.fecha_inicio, 
    recepcion.fecha_fin, recepcion.total_dias, recepcion.total_pagar, recepcion.pago_producto,recepcion.total,
    reserva.id, reserva.cedula, reserva.nombre, reserva.factura,
    habitaciones.nombre_habitacion 
    FROM recepcion JOIN reserva ON reserva.id = recepcion.id_reserva
    JOIN habitaciones ON habitaciones.id_habitaciones = recepcion.id_habitacion WHERE id_recepcion= '$id'");
$stmt->setFetchMode(PDO::FETCH_ASSOC);
$stmt->execute();
while($row = $stmt->fetch()){

    $pdf->Cell(130 ,5,'Paraguay',0,0);
    $pdf->Cell(25 ,5,'Cliente:',0,0);
    $pdf->Cell(34 ,5,$row['nombre'],0,1);

    $pdf->Cell(130 ,5,'Misiones',0,0);
    $pdf->Cell(25 ,5,'Factura:',0,0);
    $pdf->Cell(34 ,5,$row['factura'],0,1);

    $pdf->Cell(130 ,5,'Ayolas',0,0);
    $pdf->Cell(25 ,5,'Fecha Entrada:',0,0);
    $pdf->Cell(34 ,5,$row['fecha_inicio'],0,1);

    $pdf->Cell(130 ,5,'Avda. El Dorado',0,0);
    $pdf->Cell(25 ,5,'Fecha Salida:',0,0);
    $pdf->Cell(34 ,5,$row['fecha_fin'],0,1);

    $pdf->Cell(50 ,10,'',0,1);

$pdf->SetFont('Arial','B',10);
/*Heading Of the table*/

$pdf->SetXY(20, 50);
$pdf->SetFillColor(128, 128, 128);
$pdf->SetTextColor(255, 255, 255);
$pdf->Cell(180,10,"Factura Recepcion",1,0,"C",true);

$pdf->SetTextColor(0,0,0);
$pdf->SetXY(20, 60);
$pdf->Cell(50,10,"Habitacion:",1,0,"C");
$pdf->MultiCell(130,10,utf8_decode($row['nombre_habitacion']),1,"L");

$pdf->SetTextColor(0,0,0);
$pdf->SetXY(20, 70);
$pdf->Cell(50,10,"Dias de Hospedaje:",1,0,"C");
$pdf->MultiCell(130,10,utf8_decode($row['total_dias']),1,"L");

$pdf->SetTextColor(0,0,0);
$pdf->SetXY(20, 80);
$pdf->Cell(50,10,"Gasto de Hospedaje:",1,0,"C");
$pdf->MultiCell(130,10,utf8_decode($row['total_pagar']),1,"L");

$pdf->SetTextColor(0,0,0);
$pdf->SetXY(20, 90);
$pdf->Cell(50,10,"Gastos en productos:",1,0,"C");
$pdf->MultiCell(130,10,utf8_decode($row['pago_producto']),1,"L");




$pdf->SetXY(120, 100);
$pdf->Cell(50,10,"Subtotal:",1,0,"C");
$pdf->Cell(30,10,number_format($row['total_pagar']),1,1,"R");
$pdf->SetXY(120, 110);
$pdf->Cell(50,10,"Total:",1,0,"C");
$pdf->Cell(30,10,number_format($row['total']),1,1,"R");


}





$pdf->Output('boleta.pdf', 'D');

?>