<?php
include '../../../login/verificar_sesion3n_mixto.php';
require_once('../php/modelo.php');
$obj= new clase_notas_registro();
$row=$obj->_consultarcodigo($_GET['v_id']);
$fila=$row->fetch();

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
    <h3 class="text-primary mb-4 text-center">Modificar registro de notas</h3>
    <form action="../php/registro_actualizar.php" method="POST">
        <input type="text" hidden id="txt_codigo" name="txt_codigo" value=<?php echo $fila['REG_ID'];?>> 
        <input type="text" name="txt_codper" id="txt_codper" value="<?php echo $fila['PER_CODIGO'];?>" hidden>
        <input type="text" name="txt_codmat" id="txt_codmat" value="<?php echo $fila['REG_CODMAT'];?>" hidden> 
    <!-- Fila 1 -->
      <div class="row">
         <div class="col-6 p-2" style="border-right: 2px solid #ccc;">
                <label for="txt_curdes" class="form-label"><b>Curso o Año</b></label>
                <input type="text" 
                     id="txt_curdes" 
                     name="txt_curdes" 
                     class="form-control" 
                     value="<?php echo $fila['FCU_DESCRI'];?>" readonly
                     style="text-align: right; color: blue;">
                
         </div>

          <div class="col-6 p-2" >
                <label for="txt_nomper" class="form-label"><b>Docente</b></label>
                <input type="text" 
                     id="txt_nomper" 
                     name="txt_nomper" 
                     class="form-control" 
                     value="<?php echo $fila['PER_APENOM'];?>" readonly
                     style="text-align: right; color: blue;">
          </div>
        </div>
        
        <!-- Fila 2 -->
        <div class="row">
          <div class="col-6 p-2" style="border-right: 2px solid #ccc;">
                <label for="txt_nommat" class="form-label"><b>Asignatura</b></label>
                <input type="text" 
                     id="txt_nomasi" 
                     name="txt_nomasi" 
                     class="form-control" 
                     value="<?php echo $fila['ASIG_NOMBRE'];?>" readonly 
                     style="text-align: right; color: blue;">
          </div>
          <div class="col-6 p-2" >
                <label for="txt_descri" class="form-label"><b>Descripción</b></label>
                <input type="text" 
                     id="txt_descri" 
                     name="txt_descri" 
                     class="form-control" 
                     maxlength=40
                     required
                    value="<?php echo $fila['REG_DESCRI'];?>"
                     style="text-align: left;">
          </div>
      </div>

      <!-- Fila 3 -->
      <div class="row">
        <!-- Fila 3 columna 1 -->
         <div class="col-6 p-2" style="border-right: 2px solid #ccc;">
            <input type="hidden" name="chk_ingnot" value=0>
            <input type="checkbox" name="chk_ingnot" id="chk_ingnot" value=1
            <?= ($fila['REG_INGNOT'] == 1) ? 'checked' : '' ?>>
            <label for="chk_ingnot"><b>¿ Permitir el ingreso de Calificaciones?</b></label><br>

          </div>
          <div class="col-6 p-2">
              <label for="txt_porcen" class="form-label"><b>Porcentaje Aplicar %</b></label>
              <input type="number" 
                    id="txt_porcen" 
                    name="txt_porcen" 
                    class="form-control" 
                    step="0.01" 
                    min="0" 
                    max="100"
                    value="<?php echo $fila['REG_PORCEN'];?>"
                    style="text-align: right;">
          </div>

      </div>

      <!-- Botones -->
      <div class="text-center mt-4">
        <button type="submit" class="btn btn-success">Actualizar</button>
        <button type="button" class="btn btn-secondary" onclick="cerrarConParametros()">Cerrar</button>

        <!--<button type="button" class="btn btn-secondary" 
        onclick="location.href='registro_crud.php?_codper=<?php echo $codper;?>&_codmat=<?php echo $codmat;?>'">
        Cerrar
        </button> -->

      </div>
    </form>

  </div>

</body>

<script>
function cerrarConParametros() {
    const codper = document.getElementById('txt_codper').value;
    const codmat = document.getElementById('txt_codmat').value;
    window.location.href = 'registro_crud.php?_codper=' + encodeURIComponent(codper) + '&_codmat=' + encodeURIComponent(codmat);
}
</script>

</html>
