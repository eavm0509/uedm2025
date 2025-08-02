<?php
include '../../../login/verificar_sesion3n_mixto.php';
?>
<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Provincias</title>
        <link href="../../../Libs/bootstrap-5.3.0/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
        <script src="../../../bootstrap-5.3.0/js/bootstrap.min.js" crossorigin="anonymous"></script>
        <script src="../../../Libs/jquery.min.js"></script>
        <script src="../../../Libs/ajax.js"></script>
    </head>
<body>
    <form action="../php/controlador_insertar.php" method="post">
        <div>
            <h2 class="text-primary"> Nueva Sección</h2>
        </div>
        <div class="container">
            <div class="form-group row">
                <label class="col-2">Nombres</label>
                <input type="text" class="form-control col-4" name="txt_nombre" id="txt_nombre" required>
            </div>
            <div class="form-group row">
                <label class="col-2">OBSERVACION</label>
                <input type="text" class="form-control col-4" name="txt_observacion" id="txt_observacion" >
            </div>
      
            <div class="form-group row">
                <label class="col-12 text-center">
                    <button type="submit" class="btn btn-success">Guardar</button>
                    <a href="../vistas/crud.php" class="btn btn-secondary">Cerrar</a>
                </label>
            </div>

        </div>
    </form>
</body>
</html>