<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
if (!isset($_SESSION['rol']) || $_SESSION['rol'] !== 'ppff') {
    header("Location: ../../login/index.php");
    exit();
}
$codigoRepresentante = $_GET['_id'] ?? $_SESSION['_codigo_'] ?? null;
if (!$codigoRepresentante) {
    die("No se ha proporcionado el código del representante.");
}
require_once('../php/modelo.php');
$obj = new clase_estudiantes();
$estudiantes = $obj->obtenerEstudiantesPorRepresentante($codigoRepresentante);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Mis Representados</title>
    <link rel="stylesheet" href="../../../Libs/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../../Libs/fontawesome/css/all.min.css">
</head>
<body>
<div class="container mt-4">
    <h4>Estudiantes Representados</h4>
    <?php if (!empty($estudiantes)): ?>
        <table class="table table-striped table-bordered mt-3">
            <thead class="table-primary text-center">
                <tr>
                    <th>#</th>
                    <th>Cédula</th>
                    <th>Estudiante</th>
                    <th>Teléfono</th>
                    <th>Email</th>
                    <th>Año</th>
                    <th>Editar</th>
                </tr>
            </thead>
            <tbody class="text-center">
                <?php $i = 1; foreach ($estudiantes as $est): ?>
                    <tr>
                        <td><?= $i++ ?></td>
                        <td><?= $est['ALU_CEDULA'] ?? '' ?></td>
                        <td><?= $est['ALU_NOMBRE'] . ' ' . $est['ALU_APELLI'] ?></td>
                        <td><?= $est['ALU_TELEDO'] ?? '' ?></td>
                        <td><?= $est['ALU_EMAEST'] ?? '' ?></td>
                        <td><?= $est['ALU_CODCUR'] ?? '' ?></td>
                        <td>
                            <a href="modificar2.php?id=<?= $est['ALU_NMATRI'] ?>" class="btn btn-sm btn-primary">
                                <i class="fas fa-edit"></i> Editar
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <div class="alert alert-warning mt-3">No se encontraron estudiantes asignados a este representante.</div>
    <?php endif; ?>
</div>

<script src="../../../Libs/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="../../../Libs/fontawesome/js/all.min.js"></script>
</body>
</html>


