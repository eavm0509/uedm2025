<?php
include '../../../login/verificar_sesion3n_mixto.php';
?>
<!doctype html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Personal</title>
        <link href="../../../Libs/bootstrap-5.3.0/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
        <script src="../../../Libs/bootstrap-5.3.0/js/bootstrap.min.js" crossorigin="anonymous"></script>
        <script src="../../../Libs/jquery.min.js"></script>
        <script src="../../../Libs/ajax.js"></script>
    </head>

<body>
    <form action="../php/controlador_insertar.php" method="post">
        <div>
            <h2 class="text-primary col-12 text-center"> Nuevo Personal Docente</h2>
        </div>
         <div class="container alert alert-info" >
            <div class="row">
                <div class="col-4  p-3" style="border: 2px solid #ccc;">
                    <label class="col-12"><b>Cédula</b></label>
                    <input type="number" class="form-control col-4" name="txt_cedula" id="txt_cedula" 
                     onblur="ajax_buscar_cedula(this.value);" 
                     maxlength="16" required>
                </div>
          
                <div class="col-4  p-3" style="border: 2px solid #ccc;">
                    <label for="txtalu_fnacer" ><b>FECHA DE NACIMIENTO</b></label><br>
                    <input type="date" name="txt_fnacer" id="txt_fnacer"  ></td><br>
                </div>

                <div class="col-4  p-3" style="border: 2px solid #ccc;">
                    <label class="col-12"><b>SIGLA TITULO</b></label>
                    <input type="text" class="form-control col-4" name="txt_siglap" id="txt_siglap" 
                     oninput="this.value = this.value.toUpperCase();" 
                     maxlength="8" required>
                </div>
            </div>
                <div class="form-group row">
                    <label class="col-12"><b>APELLIDO Y NOMBRES</b></label>
                    <input type="text" class="form-control col-4" name="txt_apenom" id="txt_apenom" 
                    oninput="this.value = this.value.toUpperCase();" maxlength="60" required>
                </div>
            
            <div class="form-group row">
                <label class="col-12"><b>TITULO</b></label>
                <input type="text" class="form-control col-4" name="txt_titulo" id="txt_titulo"  maxlength="60">                
            </div>
            <div class="form-group row">
                <label class="col-12"><b>DIRECCION DOMICILIARIA</b></label>
                <input type="text" class="form-control col-4" name="txt_direcc" id="txt_direcc"  maxlength="60">
            </div>
            <div class="form-group row">
                <label class="col-12"><b>TELEFONOS</b></label>
                <input type="text" class="form-control col-4" name="txt_telefo" id="txt_telefo"  maxlength="30">
            </div>
            <div class="form-group row">
                <label class="col-12"><b>CORREO ELECTRONICO</b></label>
                <input type="text" class="form-control col-4" name="txt_correo" id="txt_correo"  maxlength="100">
            </div>
      
            <div class="form-group row">
                <label class="col-12 text-center">
                    <br>
                    <button type="submit" class="btn btn-success">Guardar</button>
                    <button type="button" class="btn btn-secondary" onclick="location.href='index.php?page=movimcsn'">Cerrar</button>
                </label>
            </div>

        </div>
    </form>
</body>
</html>