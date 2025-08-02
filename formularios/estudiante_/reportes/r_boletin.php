<?php
ob_start(); // Inicia un buffer de salida
require_once('../../../Libs/fpdf/fpdf.php');

$pdf = new FPDF();
$pdf->AddPage();

// Título de institución simulado
$pdf->SetFont('Arial','B',12);
$pdf->Cell(0, 10, 'UNIDAD EDUCATIVA PARTICULAR MODELO', 0, 1, 'C');
$pdf->Cell(0, 10, 'DIRECCIÓN GENERAL - AÑO LECTIVO 2024-2025', 0, 1, 'C');
$pdf->SetFont('Arial','',11);
$pdf->Cell(0, 8, 'Boletín Informativo de Calificaciones', 0, 1, 'C');

$pdf->Ln(5);
$pdf->SetFont('Arial','B',13);
$pdf->Cell(0,10,'BOLETÍN DE CALIFICACIONES',0,1,'C');
$pdf->Ln(5);

// Datos del estudiante quemados
$pdf->SetFont('Arial','',11);
$pdf->Cell(40,8,'Nombre:',0,0);
$pdf->Cell(0,8,'JUAN PÉREZ',0,1);

$pdf->Cell(40,8,'Curso:',0,0);
$pdf->Cell(0,8,'3RO BGU',0,1);

$pdf->Cell(40,8,'Sección:',0,0);
$pdf->Cell(0,8,'A',0,1);

$pdf->Ln(8);

// Encabezado de tabla
$pdf->SetFont('Arial','B',10);
$pdf->SetFillColor(220, 220, 220);
$pdf->Cell(70,8,'ASIGNATURA',1,0,'C',true);
$pdf->Cell(30,8,'FORMATIVA',1,0,'C',true);
$pdf->Cell(30,8,'PROYECTO',1,0,'C',true);
$pdf->Cell(30,8,'EXAMEN',1,0,'C',true);
$pdf->Cell(30,8,'PROMEDIO',1,1,'C',true);

// Datos quemados de asignaturas y notas
$materias = [
    ['MATEMÁTICA', 9.2, 9.0, 9.5],
    ['FÍSICA', 8.5, 8.7, 8.9],
    ['QUÍMICA', 8.6, 8.3, 9.0],
    ['BIOLOGÍA', 9.0, 8.8, 9.1],
    ['HISTORIA', 9.1, 9.2, 9.0],
];

$pdf->SetFont('Arial','',10);

foreach ($materias as $m) {
    $promedio = round(($m[1] + $m[2] + $m[3]) / 3, 2);
    $pdf->Cell(70,8, ($m[0]),1);
    $pdf->Cell(30,8,number_format($m[1],2),1,0,'C');
    $pdf->Cell(30,8,number_format($m[2],2),1,0,'C');
    $pdf->Cell(30,8,number_format($m[3],2),1,0,'C');
    $pdf->Cell(30,8,number_format($promedio,2),1,1,'C');
}

$pdf->Ln(10);

// Promedio general quemado
$pdf->SetFont('Arial','B',11);
$pdf->Cell(70,8,'PROMEDIO GENERAL:',0,0);
$pdf->Cell(30,8,'',0,0);
$pdf->Cell(30,8,'',0,0);
$pdf->Cell(30,8,'',0,0);
$pdf->Cell(30,8,'9.00',0,1,'C');

$pdf->Ln(15);
$pdf->SetFont('Arial','',10);
$pdf->Cell(0,8,'Firma del Representante ___________________________',0,1,'C');

ob_end_clean(); // Limpia *antes* de enviar PDF
$pdf->Output('I', 'boletin_demo.pdf');

