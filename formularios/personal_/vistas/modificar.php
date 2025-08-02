<?php
include '../../../login/verificar_sesion3n_mixto.php';
require_once('../php/modelo.php');
$obj= new clase_personal();
$row=$obj->_consultarcodigo($_GET['valor']);
$fila=$row->fetch();
?>
<!doctype html>
<html lang="es">
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
    <form action="../php/actualizar_personal.php" method="post">
        <input type="text" hidden id="txt_codigo" name="txt_codigo" value="<?php echo $fila['PER_CODIGO'];?>"> 
        <div>
            <h2 class="text-primary">Actualizar personal</h2>
        </div>
        <div class="container">
            <div class="form-group row">
                <label class="col-12"><b>Cédula</b></label>
                <input type="text" class="form form-control col-4" name="txt_cedula" id="txt_cedula" value="<?php echo $fila['PER_CEDULA'];?>"  readonly>
            </div>
            <div class="form-group row">
                <label class="col-12"><b>Apellidos y Nombres</b></label>
                <input type="text" class="form-control col-4" name="txt_apenom" id="txt_apenom" value="<?php echo $fila['PER_APENOM'];?>" required>
            </div>
            <div class="form-group row">
                <label class="col-12"><b>Titulo</b></label>
                <input type="text" class="form-control col-4" name="txt_titulo" id="txt_titulo" value="<?php echo $fila['PER_TITULO'];?>" >
            </div>
            <div class="form-group row">
                <label class="col-12"><b>Siglap</b></label>
                <input type="text" class="form-control col-4" name="txt_siglap" id="txt_siglap" value="<?php echo $fila['PER_SIGLAP'];?>" required>
            </div>
            <div class="form-group row">
                <label class="col-12"><b>Direccion</b></label>
                <input type="text" class="form-control col-4" name="txt_direcc" id="txt_direcc" value="<?php echo $fila['PER_DIRECC'];?>" >
            </div>
            <div class="form-group row">
                <label class="col-12"><b>Telefonos</b></label>
                <input type="text" class="form-control col-4" name="txt_telefo" id="txt_telefo" value="<?php echo $fila['PER_TELEFO'];?>" >
            </div>
            <div class="form-group row">
                <label class="col-12"><b>Correo</b></label>
                <input type="text" class="form-control col-4" name="txt_correo" id="txt_correo" value="<?php echo $fila['PER_CORREO'];?>" >
            </div>
             <div class="form-group row">
                <label class="col-12 text-center">
                    <br>
                    <button type="submit" class="btn btn-success">Guardar</button>
                </label>
            </div>
        </div>
    </form>
</body>
</html>

