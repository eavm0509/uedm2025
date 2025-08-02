<?php
include '../../../login/verificar_sesion3n_mixto.php';
require_once('../php/modelo.php');
$obj= new clase_materias();
$row=$obj->_consultarcodigo($_GET['valorviajero']);
$fila=$row->fetch();
?>
<!doctype html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Actualización de materias</title>
        <link href="../../../Libs/bootstrap-5.3.0/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
        <script src="../../../Libs/bootstrap-5.3.0/js/bootstrap.min.js" crossorigin="anonymous"></script>
        <script src="../../../Libs/jquery.min.js"></script>
        <script src="../../../Libs/ajax.js"></script>
    </head>
<body>
    <form action="../php/actualizar_mate.php" method="post">
        <input type="text" hidden id="txt_codigo" name="txt_codigo" value="<?php echo $fila['MAT_CODIGO'];?>"> 
        <div>
            <h4 class="text-primary mb-4 text-center">ACTUALIZAR DATOS DE MATERIA</h4>
        </div>
        <div class="container alert alert-info" style="border-top: 1px solid #ccc; border-bottom: 1px solid #ccc; ">
            <div class="row"  >
                            
                <div class="col-4 p-3" style="border-right: 2px solid #ccc;">
                    <label for="cmb_codcur" class="form-label"><b>Curso o Año</b></label>
                    <select name="cmb_codcur" id="cmb_codcur" > </select>
                </div>
                <div class="col-4 p-3" style="border-right: 2px solid #ccc;">
                        <label for="cmb_areid" class="form-label"><b>Area</b></label>
                        <select class="form-select" name="cmb_areid" id="cmb_areid"></select>
                </div>
                
                <div class="col-4 p-3" style="border-right: 2px solid #ccc;">
                        <label for="cmb_codasi" class="form-label"><b>Asignatura</b></label>
                        <select class="form-select" name="cmb_codasi" id="cmb_codasi"></select>
                </div>

                <div class="col-4 p-3" style="border-right: 2px solid #ccc;">
                        <label for="cmb_codper" class="form-label"><b>Profesor(a)</b></label>
                        <select class="form-select" name="cmb_codper" id="cmb_codper"></select>
                </div>

                <div class="col-4 p-3" style="border-right: 2px solid #ccc;">
                        <label><b>Orden : </b></label>
                        <input type="number" 
                                id="txt_orden" 
                                name="txt_orden" 
                                class="form-control" 
                                min="0"
                                max="30"
                                style="text-align: right;"
                                value="<?php echo $fila['MAT_ORDEN'];?>"
                                >
                </div>
                                     
                <div class="col-4 p-3" style="border-right: 2px solid #ccc;">
                    <label><b>Opciones adicionales</b></label><br>

                    <input type="hidden" name="chk_resalt" value=0>
                    <input type="checkbox" name="chk_resalt" id="chk_resalt" 
                    value=1 <?= ($fila['MAT_RESALT'] == 1) ? 'checked' : '' ?> >
                    <label>Resaltada en boletin por ser materia oficial</label><br>

                    <input type="hidden" name="chk_oculta" value=0>
                    <input type="checkbox" name="chk_oculta" id="chk_oculta" 
                    value=1 <?= ($fila['MAT_OCULTA'] == 1) ? 'checked' : '' ?>>
                    <label>Ocultar materia para boletines</label><br>

                    <input type="hidden" name="chk_ambito" value=0>
                    <input type="checkbox" name="chk_ambito" id="chk_ambito" 
                    value=1 <?= ($fila['MAT_AMBITO'] == 1) ? 'checked' : '' ?>>
                    <label>Asignatura de ambito inicial y primero</label><br>

                    <input type="hidden" name="chk_destreza" value=0>
                    <input type="checkbox" name="chk_destreza" id="chk_destreza" 
                    value=1 <?= ($fila['MAT_DESTREZA'] == 1) ? 'checked' : '' ?>>
                    <label>Destreza Ini - 1ro - 2do - 3ro y 4to EGB </label><br>
                </div>
                <div class="col-4 p-3" style="border-right: 2px solid #ccc;">
                        <label for="txt_ponder" class="form-label mt-2"><b>Coeficiente de ponderación</b></label>
                        <input type="number" 
                                step="0.01" 
                                name="txt_ponder" 
                                id="txt_ponder" 
                                class="form-control" 
                                min = "0"
                                max = "10"
                                value = "<?php echo $fila['MAT_PONDER'];?>"
                                style="text-align: right;">
                </div>

               <div class="col-4 p-3" style="border-right: 2px solid #ccc;">
                        <label for="txt_nhoras" class="form-label mt-2"><b># horas semanales</b></label>
                        <input type="number" 
                                step="1" 
                                name="txt_nhoras" 
                                id="txt_nhoras" 
                                class="form-control" 
                                min = "0"
                                max = "15"
                                value = "<?php echo $fila['MAT_NHORAS'];?>"
                                style="text-align: right;">
                </div>

                <!-- Fila 3 columna 3 -->

                    
                    


                <div class="col-4 p-3" style="border-right: 2px solid #ccc;">
                <label><b>Tipo</b></label><br>

                <label for="Cuantitativa">Cuantitativa</label>
                <input type="radio" name="rad_tipo" value=1 <?= ($fila['MAT_TIPO'] == 1) ? 'checked' : '' ?>><br>

                <label for="Cualitativa">Cualitativa</label>
                <input type="radio" name="rad_tipo" value=2 <?= ($fila['MAT_TIPO'] == 2) ? 'checked' : '' ?>><br>
                </div>

                <div class="form-group row">
                    <label class="col-2">Observación</label>
                    <input type="text" class="form-control col-4" name="txt_observ" id="txt_observ" value="<?php echo $fila['MAT_OBSERV'];?>">
                </div>
                
                <div class="form-group row">
                    <label class="col-12 text-center">
                        <button type="submit" class="btn btn-success">Guardar Registro</button>
                        <button type="button" class="btn btn-secondary" onclick="location.href='index.php?page=movimcsn'">Cerrar</button>
                    </label>
                </div>






            </div>
        </div>
    </form>

    <script>
        fetch('../../fcursos_/php/js_fcur_descri.php')
        .then(response => response.json())
        .then(data => {
                const valorSeleccionado = '<?php echo $fila['MAT_CODCUR'];?>';
                const combo = document.getElementById('cmb_codcur');
                data.forEach(item => {
                    const option = document.createElement('option');
                    option.value = item.codigook;
                    option.text = item.descriok;

                    if (item.codigook == valorSeleccionado) {
                        option.selected = true;
                    }
                    combo.appendChild(option);
                    });
            })
            .catch(error => console.error('Error al cargar datos:', error));
    </script> 
    <script>
        fetch('../../areas_/php/js_area_descri.php')
        .then(response => response.json())
        .then(data => {
                const valorSeleccionado = '<?php echo $fila['MAT_AREID'];?>';
                const combo = document.getElementById('cmb_areid');
                data.forEach(item => {
                    const option = document.createElement('option');
                    option.value = item.codigook;
                    option.text = item.descriok;

                    if (item.codigook == valorSeleccionado) {
                        option.selected = true;
                    }
                    combo.appendChild(option);
                    });
            })
            .catch(error => console.error('Error al cargar datos:', error));
    </script> 
        <script>
        fetch('../../asignaturas_/php/js_asig_descri.php')
        .then(response => response.json())
        .then(data => {
                const valorSeleccionado = '<?php echo $fila['MAT_CODASI'];?>';
                const combo = document.getElementById('cmb_codasi');
                data.forEach(item => {
                    const option = document.createElement('option');
                    option.value = item.codigook;
                    option.text = item.descriok;

                    if (item.codigook == valorSeleccionado) {
                        option.selected = true;
                    }
                    combo.appendChild(option);
                    });
            })
            .catch(error => console.error('Error al cargar datos:', error));
    </script> 
    <script>
        fetch('../../personal_/php/js_pers_apenom.php')
        .then(response => response.json())
        .then(data => {
                const valorSeleccionado = '<?php echo $fila['MAT_CODPER'];?>';
                const combo = document.getElementById('cmb_codper');
                data.forEach(item => {
                    const option = document.createElement('option');
                    option.value = item.codigook;
                    option.text = item.descriok;

                    if (item.codigook == valorSeleccionado) {
                        option.selected = true;
                    }
                    combo.appendChild(option);
                    });
            })
            .catch(error => console.error('Error al cargar datos:', error));
    </script> 

</body>
</html>

