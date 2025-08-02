<?php
include '../../../login/verificar_sesion3n_mixto.php';
require_once('../php/modelo.php');
$obj= new clase_areas();
$row=$obj->_consultarcodigo($_GET['valor1000']);
$fila=$row->fetch();
?>
<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Actualización de datos de áreas</title>
        <link href="../../../Libs/bootstrap-5.3.0/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
        <script src="../../../Libs/bootstrap-5.3.0/js/bootstrap.min.js" crossorigin="anonymous"></script>
        <script src="../../../Libs/jquery.min.js"></script>
        <script src="../../../Libs/ajax.js"></script>
    </head>
<body>
    <form action="../php/actualizar_areas.php" method="post">
        <input type="text" hidden id="txt_codigo" name="txt_codigo" value="<?php echo $fila['ARE_ID'];?>"> 
        <div>
            <h2 class="text-primary">Actualizar Areas</h2>
        </div>
        <div class="container">
            <div class="form-group row">
                <label class="col-2">Nombre de Area</label>
                <input type="text" class="form form-control col-4" name="txt_nombre" id="txt_nombre" value="<?php echo $fila['ARE_NOMBRE'];?>"  required>
            </div>
            <div class="form-group row">
                <label class="col-2">Observación</label>
                <input type="text" class="form-control col-4" name="txt_observ" id="txt_observ" value="<?php echo $fila['ARE_OBSERV'];?>">
            </div>
            
            <div class="form-group row">
                <label class="col-12 text-center">
                    <button type="submit" class="btn btn-success">Guardar Registro</button>
                </label>
            </div>
        </div>
    </form>
</body>
</html>

