<?php
ob_start(); // Inicia un buffer de salida
require_once('../php/modelo.php');
$obj = new clase_estudiantes();
$paralelo = $_GET['paralelo'] ?? '';
$result = $obj->_consultartodovista($paralelo);


//INSTITUCION
require_once('../../institucion_/php/modelo.php');
$obji = new clase_institucion();
$rowi=$obji->_consultartodo();
$filai=$rowi->fetch();
$vcon_titul1 = $filai['CON_TITUL1'];
$vcon_titul2 = $filai['CON_TITUL2'];
$vcon_titul3 = $filai['CON_TITUL3'];
$vcon_titul4 = $filai['CON_TITUL4'];
$vcon_titul5 = $filai['CON_TITUL5'];
$vcon_desano = $filai['CON_DESANO'];

//
require_once('../../../Libs/fpdf/fpdf.php');
$pdf = new FPDF();
$pdf->AddPage();

// Obtener fecha y hora actual
date_default_timezone_set('America/Guayaquil'); // Ecuador

$fecha_actual = date("d/m/Y H:i:s");

// Título
$pdf->SetFont('Arial','B',16);
$pdf->SetXY(10,5); // más arriba
$pdf->Cell(190,8, $vcon_titul1, 0, 0, 'C');
$pdf->SetXY(10,10);
$pdf->Cell(190,8, $vcon_titul2, 0, 0, 'C');



// Fecha
$pdf->SetFont('Arial','',9);
$pdf->SetXY(10,13); // debajo del título, pero más arriba que antes
$pdf->Cell(190,8, "Generado el: " . $fecha_actual, 0, 0, 'R');

// Espacio antes de la tabla
$y_inicio = 25;

// Cabecera
$pdf->SetFillColor(0,102,204);
$pdf->SetTextColor(255,255,255);
$pdf->SetFont('Arial','B',6);

$pdf->SetXY(5, $y_inicio);

$pdf->Cell(10,6, "No",1,0,'C',1);
$pdf->Cell(60,6, "NOMBRE",1,0,'C',1);
for ($i = 1; $i <= 25; $i++) {
    $pdf->Cell(5,6,"",1,0); // columnas vacías
}

// Datos
$pdf->SetTextColor(0,0,0);
$pdf->SetFont('Arial','',6);
$y = $y_inicio + 6; // comienza justo después de cabecera
$f = 1;

while ($row = $result->fetch()) {
    $pdf->SetXY(5, $y);
    $pdf->Cell(10,6,$f,1,0,'C');
    $pdf->Cell(60,6, $row['ALU_NOMBRE'],1,0);
    for ($i = 1; $i <= 25; $i++) {
        $pdf->Cell(5,6,"",1,0);
    }

    $y += 6;
    $f++;

    // Nueva página si es necesario
    if ($y > 270) {
        $pdf->AddPage();
        
        // Reimprimir título y fecha en nueva página (opcional)
        $pdf->SetFont('Arial','B',16);
        $pdf->SetXY(10,5);
        $pdf->Cell(190,8, $vcon_titul1, 0, 0, 'C');
           
            
		
        $pdf->SetFont('Arial','',9);
        $pdf->SetXY(10,13);
        $pdf->Cell(190,8, "Generado el: " . $fecha_actual, 0, 0, 'R');

        // Nueva cabecera
        $y = 25;
        $pdf->SetFillColor(0,102,204);
        $pdf->SetTextColor(255,255,255);
        $pdf->SetFont('Arial','B',6);
        $pdf->SetXY(5, $y);
        $pdf->Cell(10,6, "No",1,0,'C',1);
        $pdf->Cell(60,6, "NOMBRE",1,0,'C',1);
        for ($i = 1; $i <= 25; $i++) {
            $pdf->Cell(5,6,"",1,0);
        }

        // Preparar para datos
        $pdf->SetTextColor(0,0,0);
        $pdf->SetFont('Arial','',6);
        $y += 6;
    }
}

// Descargar con nombre dinámico
$nombreArchivo = "reporte_estudiantes_" . date('Ymd_His') . ".pdf";
ob_end_clean(); // Limpia *antes* de enviar PDF
//$pdf->Output($nombreArchivo, 'D'); // Luego genera y descarga el PDF
$pdf->Output('I'); // "I" de "Inline"