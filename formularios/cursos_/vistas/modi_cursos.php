<?php
include '../../../login/verificar_sesion3n_mixto.php'; 
require_once('../php/modelo.php');
$obj= new clase_cursos();
$row=$obj->_consultarcodigo($_GET['v_id']);
$fila=$row->fetch();
?>
<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Actualización de datos</title>
        <link href="../../../Libs/bootstrap-5.3.0/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
        <script src="../../../Libs/bootstrap-5.3.0/js/bootstrap.min.js" crossorigin="anonymous"></script>
        <script src="../../../Libs/jquery.min.js"></script>
        <script src="../../../Libs/ajax.js"></script>
    </head>
<body>
    <form action="../php/actu_cursos.php" method="post">
        <input type="text" hidden id="txt_codigo" name="txt_codigo" value="<?php echo $fila['CUR_CODIGO'];?>"> 
        <div>
            <h2 class="text-primary">Actualizar Curso O Año</h2>
        </div>
        <div class="container">
            <div class="form-group row">
                <label class="col-12">Nombre de curso o año</label>
                <input type="text" class="form form-control col-4" name="txt_nombre" id="txt_nombre" value="<?php echo $fila['CUR_NOMBRE'];?>"  required>
            </div>
            <div class="form-group row">
                <label class="col-12">Observación</label>
                <input type="text" class="form-control col-4" name="txt_observa" id="txt_observa" value="<?php echo $fila['CUR_OBSERV'];?>">
            </div>
            
            <div class="form-group row">
                <label class="col-12 text-center">
                    <button type="submit" class="btn btn-success">Guardar Registro</button>
                    <a href="../vistas/crud.php" class="btn btn-secondary">Cerrar</a>

                </label>
            </div>
        </div>
    </form>
</body>
</html>

