<?php
include '../../../login/verificar_sesion3n_mixto.php';
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once('modelo.php');
$obj = new clase_personal();

$cedula = $_POST['txt_cedula'] ?? '';
$apenom = $_POST['txt_apenom'] ?? '';
$titulo = $_POST['txt_titulo'] ?? '';
$siglap = $_POST['txt_siglap'] ?? '';
$direcc = $_POST['txt_direcc'] ?? '';
$telefo = $_POST['txt_telefo'] ?? '';
$correo = $_POST['txt_correo'] ?? '';

$result = $obj->_insertar($cedula, $apenom, $titulo, $siglap, $direcc, $telefo, $correo);

if ($result) {
    header("Location: ../vistas/crud.php?movim_csn");
    exit();
} else {
    header("Location: ../vistas/crud.php?movim_csn");
    exit();
}
?>
