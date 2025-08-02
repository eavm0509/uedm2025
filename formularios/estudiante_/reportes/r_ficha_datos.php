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
$vcon_desano = $filai['CON_DESANO'];

// DATOS DEL ESTUDIANTE Y FICHA
$cedula = isset($_GET['cedula']) ? trim($_GET['cedula']) : '';
if (empty($cedula)) die('No se proporcionó una cédula válida.');

$obj = new clase_estudiantes();
$datos = $obj->obtenerFichaMatriculaPorCedula($cedula);

if (!$datos) die('No se encontró estudiante con esa cédula.');

// PDF
$pdf = new FPDF('P','mm','A4');
$pdf->AddPage();
$pdf->SetAutoPageBreak(true,20);
$pdf->SetFont('Arial','',11);

// Encabezado institucional
$pdf->SetFont('Arial','B',14);
$pdf->Cell(0,8,utf8_decode($vcon_titul1),0,1,'C');
$pdf->Cell(0,8,utf8_decode($vcon_titul2),0,1,'C');
$pdf->SetFont('Arial','',12);
$pdf->Cell(0,8,utf8_decode($vcon_titul3),0,1,'C');
$pdf->Ln(5);
$pdf->SetFont('Arial','B',13);
$pdf->Cell(0,8,'HOJA DE MATRICULA',0,1,'C');

$pdf->Ln(5);

// Primera fila: nombres, apellidos, cedula
$pdf->SetFont('Arial','',11);
$pdf->Cell(35,8,'Nombres :',0,0);
$pdf->Cell(80,8,strtoupper($datos['ALU_NOMBRE']),0,0);
$pdf->Cell(30,8,'Apellidos :',0,0);
$pdf->Cell(0,8,strtoupper($datos['ALU_APELLI']),0,1);

$pdf->Cell(35,8,'Cedula :',0,0);
$pdf->Cell(80,8,$datos['ALU_CEDULA'],0,1);

$pdf->Cell(35,8,'Lugar Nacimiento :',0,0);
$pdf->Cell(80,8,strtoupper($datos['ALU_LNACER'] ?? 'N/A'),0,0);
$pdf->Cell(30,8,'Fecha :',0,0);
$pdf->Cell(0,8,!empty($datos['ALU_FNACER']) ? date("d/m/Y", strtotime($datos['ALU_FNACER'])) : 'N/A',0,1);

$pdf->Cell(35,8,'Estado Civil :',0,0);
$pdf->Cell(80,8,strtoupper($datos['ALU_ESTCIV'] ?? 'N/A'),0,1);

$pdf->Cell(35,8,'Direccion :',0,0);
$pdf->Cell(80,8,strtoupper($datos['ALU_DIREDO'] ?? 'N/A'),0,1);

$pdf->Cell(35,8,'Telefono :',0,0);
$pdf->Cell(80,8,$datos['ALU_TELEDO'] ?? 'N/A',0,1);

$pdf->Cell(35,8,'Sexo :',0,0);
$pdf->Cell(80,8,strtoupper($datos['ALU_SEXO'] ?? 'N/A'),0,1);

$pdf->Ln(5);

// Datos académicos
$pdf->Cell(35,8,'Curso :',0,0);
$pdf->Cell(80,8,strtoupper($datos['FCU_DESCRI'] ?? 'N/A'),0,1);

$pdf->Cell(35,8,'Ciclo :',0,0);
$pdf->Cell(80,8,strtoupper($datos['CICLO'] ?? 'N/A'),0,1);

$pdf->Cell(35,8,'Seccion :',0,0);
$pdf->Cell(80,8,strtoupper($datos['SECCION'] ?? 'N/A'),0,1);

$pdf->Ln(5);

// Datos del padre
$pdf->SetFont('Arial','B',12);
$pdf->Cell(0,8,'DATOS DEL PADRE',0,1);
$pdf->SetFont('Arial','',11);
$pdf->Cell(35,8,'Nombres :',0,0);
$pdf->Cell(80,8,strtoupper($datos['ALU_NOMPDR'] ?? 'N/A'),0,1);
$pdf->Cell(35,8,'Direccion :',0,0);
$pdf->Cell(80,8,strtoupper($datos['ALU_DIRPDR'] ?? 'N/A'),0,1);
$pdf->Cell(35,8,'Nacionalidad :',0,0);
$pdf->Cell(80,8,strtoupper($datos['ALU_NACPDR'] ?? 'N/A'),0,1);
$pdf->Cell(35,8,'Profesion :',0,0);
$pdf->Cell(80,8,strtoupper($datos['ALU_PROPDR'] ?? 'N/A'),0,1);

$pdf->Ln(3);

// Datos de la madre
$pdf->SetFont('Arial','B',12);
$pdf->Cell(0,8,'DATOS DE LA MADRE',0,1);
$pdf->SetFont('Arial','',11);
$pdf->Cell(35,8,'Nombres :',0,0);
$pdf->Cell(80,8,strtoupper($datos['ALU_NOMMDR'] ?? 'N/A'),0,1);
$pdf->Cell(35,8,'Direccion :',0,0);
$pdf->Cell(80,8,strtoupper($datos['ALU_DIRMDR'] ?? 'N/A'),0,1);
$pdf->Cell(35,8,'Nacionalidad :',0,0);
$pdf->Cell(80,8,strtoupper($datos['ALU_NACMDR'] ?? 'N/A'),0,1);
$pdf->Cell(35,8,'Profesion :',0,0);
$pdf->Cell(80,8,strtoupper($datos['ALU_PROMDR'] ?? 'N/A'),0,1);

$pdf->Ln(3);

// Datos del representante
$pdf->SetFont('Arial','B',12);
$pdf->Cell(0,8,'DATOS DEL REPRESENTANTE',0,1);
$pdf->SetFont('Arial','',11);
$pdf->Cell(35,8,'Nombres :',0,0);
$pdf->Cell(80,8,strtoupper($datos['REP_APENOM'] ?? 'N/A'),0,1);
$pdf->Cell(35,8,'Cedula :',0,0);
$pdf->Cell(80,8,$datos['REP_CEDULA'] ?? 'N/A',0,1);
$pdf->Cell(35,8,'Direccion :',0,0);
$pdf->Cell(80,8,strtoupper($datos['REP_DOMICI'] ?? 'N/A'),0,1);
$pdf->Cell(35,8,'Parentesco :',0,0);
$pdf->Cell(80,8,strtoupper($datos['REP_PARENT'] ?? 'N/A'),0,1);
$pdf->Cell(35,8,'Telefono :',0,0);
$pdf->Cell(80,8,$datos['REP_TELDOM'] ?? 'N/A',0,1);

$pdf->Ln(10);

// Textos finales
$pdf->SetFont('Arial','',10);
$pdf->MultiCell(0,7,utf8_decode("1.- Recuerde que para que el Alumno/a quede definitivamente matriculado se han debido cumplir todos los requisitos anteriormente mencionados y recibir el visto bueno final de la Autoridad."),0,'J');
$pdf->Ln(3);
$pdf->MultiCell(0,7,utf8_decode("2.- A nombre del Alumno/a; Yo ". strtoupper($datos['REP_APENOM'] ?? 'N/A') ." aseguro que he adquirido y conozco el Proyecto y Normas Administrativas de la Institución, comprometiéndonos a cumplirlas tanto el alumno/a como nosotros sus Representantes."),0,'J');
$pdf->Ln(3);
$pdf->MultiCell(0,7,utf8_decode("3.- También aseguro que adquiriré los Libros de Textos y útiles escolares que necesite el Alumno/a antes de comenzar las clases, y que durante el año adquiriré los útiles que haya gastado y/o perdido el Alumno/a."),0,'J');

$pdf->Ln(15);
$pdf->Cell(0,8,'Santo Domingo, '.date("d").' de '.strftime("%B").' de '.date("Y"),0,1,'L');

$pdf->Ln(15);
$pdf->Cell(0,8,'______________________________',0,1,'C');
$pdf->Cell(0,8,'Firma del Representante',0,1,'C');

$nombreArchivo = "ficha_datos_" . date('Ymd_His') . ".pdf";
ob_end_clean(); // Limpia *antes* de enviar PDF
$pdf->Output('I');

