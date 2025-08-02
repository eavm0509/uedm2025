<?php
include '../../../login/verificar_sesion3n_mixto.php';
?>
<!doctype html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Nueva Materia</title>
  <link href="../../../Libs/bootstrap-5.3.0/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
  <script src="../../../Libs/bootstrap-5.3.0/js/bootstrap.min.js" crossorigin="anonymous"></script>
  <script src="../../../Libs/jquery.min.js"></script>
</head>

<body>
  <div class="container alert alert-info" style="border-top: 1px solid #ccc; border-bottom: 1px solid #ccc;">
    <h2 class="text-primary mb-4 text-center">Nueva Materia</h2>

    <form action="../php/controlador_insertar.php" method="POST">
      <!-- Fila 1 -->
      <div class="row">

         <div class="col-4 p-3" style="border-right: 2px solid #ccc;">
                <label for="cmb_codcur" class="form-label"><b>Curso o Año</b></label>
                <select class="form-select" name="cmb_codcur" id="cmb_codcur"></select>
          </div>

          <div class="col-4 p-3" style="border-right: 2px solid #ccc;">
                <label for="cmb_areid" class="form-label"><b>Area</b></label>
                <select class="form-select" name="cmb_areid" id="cmb_areid"></select>
          </div>
        
         <div class="col-4 p-3" style="border-right: 2px solid #ccc;">
                <label for="cmb_codasi" class="form-label"><b>Asignatura</b></label>
                <select class="form-select" name="cmb_codasi" id="cmb_codasi"></select>
          </div>
        </div>
        
        <!-- Fila 2 -->
        <div class="row">
          <div class="col-4 p-3" style="border-right: 2px solid #ccc;">
                <label for="cmb_codper" class="form-label"><b>Docente</b></label>
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
                     value="0"
                     style="text-align: right;">
          </div>

          <div class="col-4 p-3" style="border-right: 2px solid #ccc;">
            <label><b>Opciones adicionales</b></label><br>
            <input type="hidden" name="chk_resalt" value=0>
            <input type="checkbox" name="chk_resalt" id="chk_resalt" value=1>
            <label for="chk_resalt1">Resaltada en boletin por ser materia oficial</label><br>

            <input type="hidden" name="chk_oculta" value=0>
            <input type="checkbox" name="chk_oculta" id="chk_oculta" value=1>
            <label for="chk_oculta1">Ocultar materia para boletines</label><br>

            <input type="hidden" name="chk_ambito" value=0>
            <input type="checkbox" name="chk_ambito" id="chk_ambito" value=1>
            <label for="chk_ambito1">Asignatura de ambito inicial y primero</label><br>

            <input type="hidden" name="chk_destreza" value=0>
            <input type="checkbox" name="chk_destreza" id="chk_destreza" value=1>
            <label for="chk_destreza1">Destreza Ini - 1ro - 2do - 3ro y 4to EGB </label><br>
          </div>

      </div>

      <!-- Fila 3 -->
      <div class="row">
        <!-- Fila 3 columna 1 -->
        <div class="col-4 p-3" style="border-right: 2px solid #ccc;">
          <label for="txt_ponder" class="form-label mt-2"><b>Coeficiente de ponderación</b></label>
          <input type="number" 
                 step="0.01" 
                 name="txt_ponder" 
                 id="txt_ponder" 
                 class="form-control" 
                 min = "0"
                 max = "10"
                 value = "0.00"
                 style="text-align: right;">
        </div>
        <!-- Fila 3 columna 2 -->
        <div class="col-4 p-3" style="border-right: 2px solid #ccc;">
          
          <label for="txt_nhoras" class="form-label mt-2"><b># horas semanales</b></label>
          <input type="number" 
                 step="1" 
                 name="txt_nhoras" 
                 id="txt_nhoras" 
                 class="form-control" 
                 min = "0"
                 max = "15"
                 value = "0"
                 style="text-align: right;">
        </div>
        <!-- Fila 3 columna 3 -->
        <div class="col-4 p-3" style="border-right: 2px solid #ccc;">
          <label><b>Tipo</b></label><br>

          <label for="Cuantitativa">Cuantitativa</label>
          <input type="radio" name="rad_tipo" value=1 checked><br>

          <label for="Cualitativa">Cualitativa</label>
          <input type="radio" name="rad_tipo" value=2><br>
        </div>

        <div class="row">
          <div class="col-4 p-3" ></div>
            <label><b>Observación </b></label>
            <input type="text" id="txt_observ" name="txt_observ" class="form-control">
          </div>
      </div>

      <!-- Botones -->
      <div class="text-center mt-4">
        <button type="submit" class="btn btn-success">Guardar</button>
        <button type="button" class="btn btn-secondary" onclick="location.href='index.php?page=movimcsn'">Cerrar</button>
      </div>
    </form>

  </div>

     <script>
        //Para leer API con Json encode 
        fetch('../../fcursos_/php/js_fcur_descri.php')
        .then(response => response.json())
        .then(data => {
                const combo = document.getElementById('cmb_codcur');
                data.forEach(item => {
                    const option = document.createElement('option');
                    option.value = item.codigook;
                    option.text = item.descriok;
                    combo.appendChild(option);
                    });
            })
            .catch(error => console.error('Error al cargar datos:', error));
    </script> 

     <script>
        //Para leer API con Json encode 
        fetch('../../asignaturas_/php/js_asig_descri.php')
        .then(response => response.json())
        .then(data => {
                const combo = document.getElementById('cmb_codasi');
                data.forEach(item => {
                    const option = document.createElement('option');
                    option.value = item.codigook;
                    option.text = item.descriok;
                    combo.appendChild(option);
                    });
            })
            .catch(error => console.error('Error al cargar datos:', error));
    </script> 

     <script>
        //Para leer API con Json encode 
        fetch('../../personal_/php/js_pers_apenom.php')
        .then(response => response.json())
        .then(data => {
                const combo = document.getElementById('cmb_codper');
                data.forEach(item => {
                    const option = document.createElement('option');
                    option.value = item.codigook;
                    option.text = item.descriok;
                    combo.appendChild(option);
                    });
            })
            .catch(error => console.error('Error al cargar datos:', error));
    </script> 



    <script>
        //Para leer API con Json encode 
        fetch('../../areas_/php/js_area_descri.php')
        .then(response => response.json())
        .then(data => {
                const combo = document.getElementById('cmb_areid');
                data.forEach(item => {
                    const option = document.createElement('option');
                    option.value = item.codigook;
                    option.text = item.descriok;
                    combo.appendChild(option);
                    });
            })
            .catch(error => console.error('Error al cargar datos:', error));
    </script> 


</body>
</html>
