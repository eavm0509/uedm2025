<?php
include '../../../login/verificar_sesion3n_mixto.php';
require_once('../php/modelo.php');
$obj= new clase_fcursos();
$row=$obj->_consultarcodigo($_GET['v_idd']);
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
   
    <div class="container alert alert-info" style="border-top: 1px solid #ccc; border-bottom: 1px solid #ccc;" >
        <h2 class="text-primary mb-4 text-center">Actualizar Año o Curso</h2>
        <form action="../php/actu_fcursos.php" method="POST">
            <input type="text" hidden id="txt_codigo" name="txt_codigo" value="<?php echo $fila['FCU_COD'];?>"> </input>
          <div class="row">
                <div class="col-4 p-3" style="border-right: 2px solid #ccc;">
                    <label for="cmb_curso" class="form-label">Curso o año:</label>
                <select name="cmb_curso" id="cmb_curso" class="form-select" ></select>
                </div>

                <div class="col-4 p-3" style="border-right: 2px solid #ccc;">
                    <label for="cmb_ciclo" class="form-label">Ciclo/educación:</label>
                <select name="cmb_ciclo" id="cmb_ciclo" class="form-select" ></select>
                </div>

                <div class="col-4 p-3" style="border-right: 2px solid #ccc;">
                    <label for="cmb_seccion" class="form-label">Sección:</label>
                <select name="cmb_seccion" id="cmb_seccion" class="form-select" ></select>
                </div>

          </div>   


          <div class="row">
            <div class="col-4 p-3" style="border-right: 2px solid #ccc;">
                <label for="cmb_especialidad" class="form-label">Especialidad:</label>
                <select name="cmb_especialidad" id="cmb_especialidad" class="form-select" ></select>
            </div>

            <div class="col-4 p-3" style="border-right: 2px solid #ccc;">
                <label for="cmb_paralelo" class="form-label">Paralelo:</label>
                <select name="cmb_paralelo" id="cmb_paralelo" class="form-select" ></select>
            </div>

            <div class="col-4 p-3" style="border-right: 2px solid #ccc;">
                <label for="cmb_tutor" class="form-label">Tutor:</label>
                <select name="cmb_tutor" id="cmb_tutor" class="form-select" ></select>
            </div>
          </div>
    
          <div class="row">
                <div class="col-4 p-3" style="border-right: 2px solid #ccc;">
                    <label for="txt_orden" > <b>Orden</b></label>
                    <input type="number"   class="form-control col-4" name="txt_orden" 
                    id="txt_orden" value="<?php echo $fila['FCU_ORDEN'];?>" style="text-align: right;" onkeydown="return evitarEnter(event);">
                    
                    
                    <label for="txt_descri" > <b>Descripción</b></label>
                    <input type="text"   class="form-control col-4" name="txt_descri" id="txt_descri"
                    maxlength="20" value="<?php echo $fila['FCU_DESCRI'];?>" required onkeydown="return evitarEnter(event);">
                    <br>
                    <input type="hidden" name="txt_jurban" value=0>
                    <label for="txt_jurban" > <b>Juran bandera</b></label>
                    <input type="checkbox" value=1 <?= ($fila['FCU_JURBAN'] == 1) ? 'checked' : '' ?> name="txt_jurban" id="txt_jurban">
                    </input>
                    <br>
                </div>
       

                <div class="col-4 p-3" style="border-right: 2px solid #ccc;">
                    <label> <b>TIPO DE CONTROL</b></label><br>
                    <label> EGBM 5-6-7</label> 
                    <input type="radio" name="rb_tipcon" id="rb_tipcon" value=1 <?= ($fila['FCU_TIPCON'] == 1) ? 'checked' : '' ?>></input><br>

                    <label> EGBS O BACHILLERATO</label> 
                    <input type="radio" name="rb_tipcon" id="rb_tipcon" value=2 <?= ($fila['FCU_TIPCON'] == 2) ? 'checked' : '' ?>></input><br>

                    <label> INICIAL Y PREPARATORIA</label> 
                    <input type="radio" name="rb_tipcon" id="rb_tipcon" value=3 <?= ($fila['FCU_TIPCON'] == 3) ? 'checked' : '' ?>></input><br>

                    <label> EGB 2-3</label> 
                    <input type="radio" name="rb_tipcon" id="rb_tipcon" value=4 <?= ($fila['FCU_TIPCON'] == 4) ? 'checked' : '' ?>></input><br>

                    <label> EGB 4</label> 
                    <input type="radio" name="rb_tipcon" id="rb_tipcon" value=5 <?= ($fila['FCU_TIPCON'] == 5) ? 'checked' : '' ?>></input><br>

                </div>

                <div class="col-4 p-3" style="border-right: 2px solid #ccc;">
                     <label for="txt_valmat" > <b>Valor matrícula</b></label>
                    <input type="number"   class="form-control col-4" name="txt_valmat" id="txt_valmat"
                    step="any" value="<?php echo $fila['FCU_VALMAT'];?>" style="text-align: right;" onkeydown="return evitarEnter(event);" >
                     <label for="txt_valder" > <b>Valor extra</b></label>
                    <input type="number"   class="form-control col-4" name="txt_valder" id="txt_valder"
                    step="any" value="<?php echo $fila['FCU_VALDER'];?>" style="text-align: right;" onkeydown="return evitarEnter(event);">
                     <label for="txt_numcuo" > <b>Número de pensiones en el año</b></label>
                    <input type="number"   class="form-control col-4" name="txt_numcuo" id="txt_numcuo"
                    value="<?php echo $fila['FCU_NUMCUO'];?>" style="text-align: right;" onkeydown="return evitarEnter(event);">
                    
                </div>

            </div>

            <div class="text-center mt-4">
                <button type="submit" class="btn btn-success">Guardar</button>
                <button type="button" class="btn btn-secondary" onclick="location.href='index.php?page=movimcsn'">Cerrar</button>
            </div>
        </form>
    </div>

    </form>

    <!-- Carga dinámica de select de cursos -->
        <script>
            fetch('../../cursos_/php/js_cur_descri.php')
            .then(response => response.json())
            .then(data => {
                    const valorSeleccionado = '<?php echo $fila['FCU_CUR'];?>';
                    const combo = document.getElementById('cmb_curso');
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

    <!-- Carga dinámica de select de ciclos -->
    <script>
        fetch('../../ciclos_/php/js_cic_descri.php')
            .then(response => response.json())
            .then(data => {
                const valorSeleccionado = '<?php echo $fila['FCU_CIC'];?>';
                const combo = document.getElementById('cmb_ciclo');
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
            .catch(error => console.error('Error al cargar ciclos:', error));
    </script>


<script>
        fetch('../../secciones_/php/js_sec_descri.php')
            .then(response => response.json())
            .then(data => {
                const valorSeleccionado = '<?php echo $fila['FCUR_SEC'];?>';
                const combo = document.getElementById('cmb_seccion');
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
            .catch(error => console.error('Error al cargar seccion:', error));
    </script>

    <script>
        fetch('../../especialidades_/php/js_esp_descri.php')
            .then(response => response.json())
            .then(data => {
                const valorSeleccionado = '<?php echo $fila['FCU_ESP'];?>';
                const combo = document.getElementById('cmb_especialidad');
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
            .catch(error => console.error('Error al cargar especialidad:', error));
    </script>

    <script>
        fetch('../../paralelos_/php/js_par_descri.php')
            .then(response => response.json())
            .then(data => {
                const valorSeleccionado = '<?php echo $fila['FCU_PAR'];?>';
                const combo = document.getElementById('cmb_paralelo');
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
            .catch(error => console.error('Error al cargar paralelos:', error));
    </script>

    <script>
        fetch('../../personal_/php/js_per_descri.php')
            .then(response => response.json())
            .then(data => {
                const valorSeleccionado = '<?php echo $fila['FCU_CODPER'];?>';
                const combo = document.getElementById('cmb_tutor');
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
            .catch(error => console.error('Error al cargar tutores:', error));
    </script>

    <script>
        function evitarEnter(e) {
            if (e.key === "Enter") {
            e.preventDefault();
            return false;
            }
        }
    </script>

</body>
</html>

