<?php
require_once('../php/modelo.php');
$objp= new clase_areas();
$result=$objp->_consultartodo('');

require_once('../../../Libs/fpdf/fpdf.php');
$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',20);
$pdf->SetXY(10,10);
$pdf->Cell(190,10, "Reporte de Areas",0,0,'C');
$pdf->SetFillColor(100,0,120);
$pdf->SetTextColor(255,255,255);
$pdf->SetFont('Arial','B',15);
$pdf->SetXY(5,25);
$pdf->Cell(10,7, "No",1,0,'C',1);
$pdf->SetXY(15,25);
$pdf->Cell(10,7, "ID",1,0,'C',1);
$pdf->SetXY(25,25);
$pdf->Cell(80,7, "NOMBRES DE AREAS",1,0,'C',1);
$pdf->SetXY(105,25);
$pdf->Cell(120,7, "OBSERVACION",1,0,'C',1);
$pdf->SetTextColor(0,0,0);
$pdf->SetFont('Arial','B',9);
$y=32;
$f=1;
while($row= $result->fetch())
{
    $pdf->SetXY(5,$y);
    $pdf->Cell(10,5,$f,1,1);
    $pdf->SetXY(15,$y);
    $pdf->Cell(10,5, $row['ARE_ID'],1,1);
    $pdf->SetXY(25,$y);
    $pdf->Cell(80,5, $row['ARE_NOMBRE'],1,1);
    $pdf->SetXY(105,$y);
    $pdf->Cell(80,5, $row['ARE_OBSERV'],1,1);
    $y+=5;
    $f++;
}
$archivo="reporte".".pdf";
$pdf->Output($archivo,'F');
echo "reportes/".$archivo;
?>