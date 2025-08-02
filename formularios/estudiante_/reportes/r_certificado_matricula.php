<?php
ob_start(); // Inicia un buffer de salida
require_once('../../../Libs/fpdf/fpdf.php');
require_once('../php/modelo.php');

// INSTITUCION
require_once('../../institucion_/php/modelo.php');
$obji = new clase_institucion();
$rowi = $obji->_consultartodo();
$filai = $rowi->fetch();
$vcon_titul1 = $filai['CON_TITUL1'];
$vcon_titul2 = $filai['CON_TITUL2'];
$vcon_titul3 = $filai['CON_TITUL3'];
$vcon_titul4 = $filai['CON_TITUL4'];
$vcon_titul5 = $filai['CON_TITUL5'];
$vcon_desano = $filai['CON_DESANO'];

$cedula = isset($_GET['cedula']) ? trim($_GET['cedula']) : '';
$cedula = preg_replace('/\s+/', '', $cedula);

if (empty($cedula)) {
    die('No se proporcionó una cédula válida.');
}

$obj = new clase_estudiantes();
$datos = $obj->obtenerCertificadoMatriculaPorCedula($cedula);

if (!$datos) {
    die('No se encontró estudiante con la cédula: [' . htmlspecialchars($cedula) . ']');
}


// Generar PDF
$pdf = new FPDF('P', 'mm', 'A4');
$pdf->AddPage();
$pdf->SetAutoPageBreak(true, 20);
$pdf->SetFont('Arial', '', 12);

// Encabezado dinámico
$pdf->SetFont('Arial', 'B', 14);
$pdf->Cell(0, 8, utf8_decode($vcon_titul1), 0, 1, 'C');
$pdf->SetFont('Arial', 'B', 14);
$pdf->Cell(0, 8, utf8_decode($vcon_titul2), 0, 1, 'C');
$pdf->SetFont('Arial', '', 12);
$pdf->Cell(0, 8, utf8_decode($vcon_titul3), 0, 1, 'C');

$pdf->Ln(10);
$pdf->SetFont('Arial', 'B', 14);
$pdf->Cell(0, 10, utf8_decode('CERTIFICADO DE MATRÍCULA N°'), 0, 1, 'C');

$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(0, 10, '001663', 0, 1, 'C');

$pdf->SetFont('Arial', '', 12);
$pdf->Cell(0, 10, utf8_decode($vcon_desano), 0, 1, 'C');

$pdf->Ln(10);
$pdf->MultiCell(0, 8, utf8_decode("El/(la) estudiante " . strtoupper($datos['ALU_NOMBRE']) . " " . strtoupper($datos['ALU_APELLI']) . 
"\nse matriculó en el curso que a continuación se indica:"), 0, 'J');

$pdf->Ln(5);
$pdf->Cell(50, 8, utf8_decode('CURSO / AÑO:'), 0, 0);
$pdf->Cell(0, 8, utf8_decode(strtoupper($datos['FCU_DESCRI'] ?? 'N/A')), 0, 1);

$pdf->Cell(50, 8, utf8_decode('CICLO:'), 0, 0);
$pdf->Cell(0, 8, utf8_decode(strtoupper($datos['FCU_COD'] ?? 'N/A')), 0, 1);

$pdf->Cell(50, 8, utf8_decode('SECCIÓN:'), 0, 0);
$pdf->Cell(0, 8, utf8_decode(strtoupper($datos['FCUR_SEC'] ?? 'N/A')), 0, 1);


$pdf->Ln(5);
$pdf->Cell(50, 8, utf8_decode('Fecha de Matrícula:'), 0, 0);
$pdf->Cell(0, 8, ": " . (!empty($datos['ALU_FMATRI']) ? date("d/m/Y", strtotime($datos['ALU_FMATRI'])) : 'N/A'), 0, 1);


$pdf->Ln(10);
$pdf->MultiCell(0, 8, utf8_decode("Según consta en los archivos que reposan en la secretaría de la Institución.\n\n"
."Es todo cuanto puedo certificar en honor a la verdad, pudiendo el interesado hacer uso del presente documento en lo que crea conveniente."), 0, 'J');

$pdf->Ln(10);
setlocale(LC_TIME, 'es_ES.UTF-8');
$pdf->Cell(0, 8, utf8_decode("Santo Domingo a, ") . date("d") . " de " . utf8_decode(strftime("%B")) . " de " . date("Y"), 0, 1, 'L');

$pdf->Ln(20);
$pdf->SetFont('Arial', 'B', 11);
$pdf->Cell(95, 6, utf8_decode("MSC. ZAYDA LUSITANIA LOOR CEDEÑO"), 0, 0, 'C');
$pdf->Cell(0, 6, utf8_decode("MSC. NELY JAQUELINE GUZMAN GARCIA"), 0, 1, 'C');
$pdf->SetFont('Arial', '', 11);
$pdf->Cell(95, 6, "DIRECTOR(A)", 0, 0, 'C');
$pdf->Cell(0, 6, "SECRETARIO(A)", 0, 1, 'C');

$pdf->Ln(10);
$pdf->Cell(0, 8, utf8_decode("RÉGIMEN : COSTA - INSULAR    MODALIDAD : PRESENCIAL"), 0, 1, 'C');

$nombreArchivo = "reporte_cert_" . date('Ymd_His') . ".pdf";
ob_end_clean(); // Limpia *antes* de enviar PDF
$pdf->Output('I');