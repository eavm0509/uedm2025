<?php
include '../../../login/verificar_sesion3n_mixto.php';
require_once('../php/modelo.php');
$obj = new clase_usuarios();
$row = $obj->_consultarcodigo($_GET['valor1000']);
$fila = $row->fetch();
?>

<!doctype html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Actualización de usuarios</title>
  <link href="../../../Libs/bootstrap-5.3.0/css/bootstrap.min.css" rel="stylesheet">
  <script src="../../../Libs/bootstrap-5.3.0/js/bootstrap.bundle.min.js"></script>
  <script src="../../../Libs/jquery.min.js"></script>
</head>
<body style="background-color:#f0f8ff;">

<div class="container mt-5 p-4 border rounded shadow bg-white" style="max-width: 700px;">
  <h2 class="text-primary mb-4 text-center">Actualizar Usuario</h2>
  

  <form id="formulario_usuario" action="../php/actualizar_usuarios.php" method="post">
    <input type="hidden" name="txt_codigo" value="<?php echo $fila['USE_CODI']; ?>">

    <!-- Nombre y Cédula -->
    <div class="row mb-3">
      <div class="col-md-6">
        <label for="txt_nombre" class="form-label"><b>Nombres</b><span class="text-danger">*</span></label>
        <input type="text" class="form-control" name="txt_nombre" id="txt_nombre" required 
               value="<?php echo $fila['USE_APNO']; ?>" placeholder="Ingrese nombres">
      </div>
      <div class="col-md-6">
        <label for="txt_cedula" class="form-label"><b>Usuario</b></label>
        <input type="text" class="form-control" name="txt_cedula" id="txt_cedula" 
               value="<?php echo $fila['USE_USER']; ?>">
      </div>
    </div>

    <!-- Contraseñas -->
    <div class="row mb-3">
      <div class="col-md-6">
        <label for="txt_contrasena" class="form-label">Contraseña <span class="text-danger">*</span></label>
        <input type="password" class="form-control" name="txt_contrasena" id="txt_contrasena" minlength="6"
        value="<?php echo $fila['USE_CLAV']; ?>" >
        <div class="form-text">Mínimo 6 caracteres</div>
      </div>
      <div class="col-md-6">
        <label for="txt_contrasena2" class="form-label">Repetir Contraseña <span class="text-danger">*</span></label>
        <input type="password" class="form-control" name="txt_contrasena2" id="txt_contrasena2" minlength="6" 
        value="<?php echo $fila['USE_CLAV']; ?>">
        <div class="invalid-feedback">Las contraseñas no coinciden.</div>
      </div>
    </div>

    <!-- Tipo de usuario -->
    <div class="mb-3">
      <label for="cmb_nombre" class="form-label">Tipo de Usuario</label>
      <select name="cmb_nombre" id="cmb_nombre" class="form-select" required>
        <option value="">Seleccione una opción</option>
      </select>
    </div>

    <!-- DOCENTE RELACIONADO -->
    <div class="mb-3">
          <label for="cmb_percod" class="form-label"><b>Docente relacionado</b></label>
          <select name="cmb_percod" id="cmb_percod" class="form-select" >
            <option value="">Seleccione una opción</option>
          </select>
      </div>
    <!-- Observación -->
    <div class="mb-3">
      <label for="txt_observ" class="form-label">Observación</label>
      <input type="text" class="form-control" name="txt_observ" id="txt_observ" 
             value="<?php echo $fila['USE_OBSERV']; ?>" placeholder="Observación adicional">
    </div>

    <!-- Botones -->
    <div class="text-center">
      <button type="submit" class="btn btn-success me-2">Guardar Cambios</button>
      <button type="button" class="btn btn-secondary" onclick="history.back();">Cancelar</button>
    </div>
  </form>
</div>

<!-- Cargar opciones de tipo de usuario -->
<script>
  fetch('../php/js_usu_descri.php')
    .then(response => response.json())
    .then(data => {
      const combo = document.getElementById('cmb_nombre');
      const valorSeleccionado = "<?php echo $fila['USE_TIPO']; ?>";
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
    .catch(error => console.error('Error al cargar tipo de usuario:', error));
</script>

<!-- Validar que las contraseñas coincidan -->
<script>
  document.getElementById('formulario_usuario').addEventListener('submit', function (e) {
    const pass1 = document.getElementById('txt_contrasena');
    const pass2 = document.getElementById('txt_contrasena2');

    if (pass1.value || pass2.value) {
      if (pass1.value !== pass2.value) {
        e.preventDefault();
        pass2.classList.add('is-invalid');
      } else {
        pass2.classList.remove('is-invalid');
      }
    }
  });
</script>
      <script>
          fetch('../../personal_/php/js_pers_apenom.php')
          .then(response => response.json())
          .then(data => {
                const combo = document.getElementById('cmb_percod');
                const valorSeleccionado = "<?php echo $fila['USE_CODPER']; ?>";
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
        .catch(error => console.error('Error al cargar tipo de usuario:', error));
        </script>
</body>
</html>
