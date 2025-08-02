<?php
require_once('php/modelo.php');
$objp= new clase_cursos();
$result=$objp->_consultartodo("");

require_once('../../../Libs/fpdf/fpdf.php');
$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',20);
$pdf->SetXY(10,10);
$pdf->Cell(190,10, "Reporte de Cursos",0,0,'C');
$pdf->SetFillColor(200,40,50);
$pdf->SetTextColor(255,255,255);
$pdf->SetFont('Arial','B',15);
$pdf->SetXY(10,20);
$pdf->Cell(10,10, "N.-",1,0,'C',1);
$pdf->SetXY(20,20);
$pdf->Cell(80,10, "ID",1,0,'C',1);
$pdf->SetXY(100,20);
$pdf->Cell(80,10, "Nombres",1,0,'C',1);
$pdf->SetXY(180,20);
$pdf->Cell(20,10, "Observación",1,0,'C',1);
$pdf->SetTextColor(0,0,0);
$pdf->SetFont('Arial','B',10);
$y=30;
$f=1;
while($row= $result->fetch())
{
    $pdf->SetXY(10,$y);
    $pdf->Cell(10,5,$f,1,1);
    $pdf->SetXY(20,$y);
    $pdf->Cell(80,5, $row['CUR_CODIGO'],1,1);
    $pdf->SetXY(100,$y);
    $pdf->Cell(80,5, $row['CUR_NOMBRE'],1,1);
    $pdf->SetXY(180,$y);
    $pdf->Cell(20,5, $row['CUR_OBSERV'],1,1);
    $y+=5;
    $f++;
}
$archivo="reporte".".pdf";
$pdf->Output($archivo,'F');
echo "reportes/".$archivo;
?>