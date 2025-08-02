<?php
require_once('../../../Libs/fpdf/fpdf.php');
require_once('../php/modelo.php');

$obj = new clase_estudiantes();

$paralelo = $_GET['paralelo'] ?? '';  // Recibe el paralelo del filtro

$datos = $obj->obtenerNominaConRepresentantes($paralelo);

$pdf = new FPDF('L', 'mm', 'A4');
$pdf->AddPage();

date_default_timezone_set('America/Guayaquil');
$fecha_actual = date("d/m/Y H:i:s");

$pdf->SetFont('Arial', 'B', 10);

// Encabezados
$pdf->Cell(10, 10, 'ORD', 1, 0, 'C');
$pdf->Cell(80, 10, 'APELLIDOS Y NOMBRES', 1, 0, 'C');
$pdf->Cell(80, 10, 'FIRMA DE REPRESENTANTE', 1, 0, 'C');
$pdf->Cell(50, 10, 'No. CEDULA', 1, 0, 'C');
$pdf->Cell(50, 10, 'OBS.', 1, 1, 'C');

$pdf->SetFont('Arial', '', 9);

$contador = 1;
foreach ($datos as $row) {
    $pdf->Cell(10, 12, $contador++, 1, 0, 'C');
    $pdf->Cell(80, 12, utf8_decode($row['estudiante']), 1, 0);
    $pdf->Cell(80, 12, utf8_decode($row['representante']), 1, 0);
    $pdf->Cell(50, 12, $row['REP_CEDULA'], 1, 0, 'C');
    $pdf->Cell(50, 12, '', 1, 1);
}

$pdf->Output('I');
