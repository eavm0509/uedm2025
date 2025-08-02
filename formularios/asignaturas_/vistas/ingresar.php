<?php
include '../../../login/verificar_sesion3n_mixto.php';
?>
<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Asignaturas</title>
    <link href="../../../Libs/bootstrap-5.3.0/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <script src="../../../Libs/bootstrap-5.3.0/js/bootstrap.min.js" crossorigin="anonymous"></script>
    <script src="../../../Libs/jquery.min.js"></script>
    <script src="../../../Libs/ajax.js"></script>
</head>
<body style="background-color: #d9f4fb;">

    <div class="container mt-4 p-4 border rounded shadow bg-white" style="max-width: 700px;">
        <h2 class="text-center text-primary mb-4">Nueva Asignatura</h2>

        <form action="../php/controlador_insertar.php" method="post">
            <div class="mb-3">
                <label for="txt_nombre" class="form-label"><b>Nombres</b></label>
                <input type="text" class="form-control" name="txt_nombre" id="txt_nombre" required>
            </div>

            <div class="mb-3">
                <label for="txt_observ" class="form-label"><b>Observación</b></label>
                <input type="text" class="form-control" name="txt_observ" id="txt_observ">
            </div>

            <div class="text-center">
                <button type="submit" class="btn btn-success me-2">Guardar</button>
                <button type="button" class="btn btn-secondary" onclick="location.href='../asignaturas_/vista_crud_asig.html'">Cerrar</button>
            </div>
        </form>
    </div>

</body>
</html>
