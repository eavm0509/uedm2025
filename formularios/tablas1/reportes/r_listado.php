<?php
ob_start(); // Inicia un buffer de salida
require('../../../Libs/fpdf/fpdf.php');
require('../../../conexion/conexion.php');

// Cargar datos institución
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

$curso = $_GET['curso'] ?? '';

if (empty($curso)) {
    die('Curso no proporcionado.');
}

$pdo = (new Conexion())->getConexion();

// Obtener alumnos
$sql = "SELECT a.ALU_APELLI, a.ALU_NOMBRE
        FROM snp_alum a
        JOIN vis_fcursos f ON a.alu_codcur = f.id
        WHERE f.descripcion = ?";
$stmt = $pdo->prepare($sql);
$stmt->execute([$curso]);
$alumnos = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Obtener materias
$sql_materias = "SELECT DISTINCT asig_nombre
                 FROM vis_materias
                 WHERE fcu_descri = ?
                 ORDER BY mat_orden ASC";
$stmt2 = $pdo->prepare($sql_materias);
$stmt2->execute([$curso]);
$materias = $stmt2->fetchAll(PDO::FETCH_COLUMN); // array de nombres

// Crear PDF
$pdf = new FPDF('L', 'mm', 'A4'); // Horizontal
$pdf->AddPage();

// Encabezado de la institución
$pdf->SetFont('Arial','B',14);
$pdf->Cell(0, 6, ($vcon_titul1), 0, 1, 'C');
$pdf->SetFont('Arial','B',12);
$pdf->Cell(0, 6, ($vcon_titul2), 0, 1, 'C');
$pdf->SetFont('Arial','',11);
$pdf->Cell(0, 6, ($vcon_titul3), 0, 1, 'C');
$pdf->Cell(0, 6, ($vcon_titul4), 0, 1, 'C');
$pdf->Cell(0, 6, ($vcon_titul5), 0, 1, 'C');
$pdf->Ln(4);

// Fecha actual
date_default_timezone_set('America/Guayaquil'); // Ajustar zona horaria si es necesario
$fecha = date('d/m/Y');
$pdf->SetFont('Arial','I',10);
$pdf->Cell(0, 6, "Fecha de emisión: $fecha", 0, 1, 'R');
$pdf->Ln(4);

// Título del reporte
$pdf->SetFont('Arial','B',12);
$pdf->Cell(0,10, "Listado de alumnos - Curso: $curso - Año: $vcon_desano", 0, 1, 'C');
$pdf->Ln(3);

// Encabezado de tabla
$pdf->SetFont('Arial','B',9);
$pdf->Cell(10, 10, 'No', 1, 0, 'C');
$pdf->Cell(70, 10, 'Estudiante', 1, 0, 'C');

foreach ($materias as $mat) {
    $pdf->Cell(30, 10, ($mat), 1, 0, 'C');
}
$pdf->Ln();

// Cuerpo
$pdf->SetFont('Arial','',9);
$cont = 1;
foreach ($alumnos as $row) {
    $pdf->Cell(10, 8, $cont++, 1);
    $pdf->Cell(70, 8, ($row['ALU_APELLI'].' '.$row['ALU_NOMBRE']), 1);
    foreach ($materias as $mat) {
        $pdf->Cell(30, 8, '', 1); // espacio en blanco para notas
    }
    $pdf->Ln();
}
ob_end_clean(); // Limpia *antes* de enviar PDF
$pdf->Output('I');
