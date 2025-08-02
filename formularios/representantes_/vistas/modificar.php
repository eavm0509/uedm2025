<?php
include '../../../verificar_sesion3n.php'; 
require_once('../php/modelo.php');
$obj= new clase_representantes();
$row=$obj->_consultarcodigo($_GET['valor']);
$fila=$row->fetch();
?>
<!doctype html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Actualización de datos de estudiante</title>
        <link href="../../../Libs/bootstrap-5.3.0/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
        <script src="../../../Libs/bootstrap-5.3.0/js/bootstrap.min.js" crossorigin="anonymous"></script>
        <script src="../../../Libs/jquery.min.js"></script>
        <script src="../../../Libs/ajax.js"></script>
    </head>
<body>
    <form action="../php/actualizar_representantes.php" method="post">
        <input type="text" hidden id="txt_codigo" name="txt_codigo" value="<?php echo $fila['REP_CODIGO'];?>"> 
        <div>
            <h2 class="text-primary">Actualizar representantes</h2>
        </div>
        <div class="container">
            <div class="form-group row">
                <label class="col-6"><b>Cédula</b></label>
                <input type="text" class="form form-control col-6" name="txt_cedula" id="txt_cedula" value="<?php echo $fila['REP_CEDULA'];?>"  required>
            </div>
            <div class="form-group row">
                <label class="col-6"><b>Apellidos y Nombres</b></label>
                <input type="text" class="form-control col-6" name="txt_apenom" id="txt_apenom" 
                value="<?php echo $fila['REP_APENOM'];?>" 
                oninput="this.value = this.value.toUpperCase();" required>
            </div>
            <div class="form-group row">
                    <label class="col-6"><b>Correo electrónico</b></label>
                    <input type="text" class="form-control col-6" name="txt_correo" id="txt_correo"
                    maxlength="100" required value="<?php echo $fila['REP_CORREO'];?>"
                    onkeydown="return evitarEnter(event);" onblur="ajax_buscar_correo_representante(this.value,txt_codigo.value);">
                    <span id="mensaje" style="margin-left: 10px;"></span>   
            </div>    
            
            <div class="form-group row">
                <label>
                        <input type="hidden" name="chk_suspen" value=0>
                        <input type="checkbox" name="chk_suspen" id="chk_suspen" 
                        value=1 <?= ($fila['REP_SUSPEN'] == 1) ? 'checked' : '' ?>><b> Suspendido</b>
                </label>
            </div>
            <div class="form-group row">
                <label class="col-12 text-center">
                    <br>
                    <button type="submit" class="btn btn-success">Guardar Registro</button>
                    <button type="button" class="btn btn-secondary" onclick="location.href='crud.php'">Cerrar</button>
                </label>
            </div>
        </div>
    </form>
</body>
</html>

