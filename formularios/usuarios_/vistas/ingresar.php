<?php
include '../../../login/verificar_sesion3n_mixto.php';
?>
<!doctype html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Nuevo Usuario</title>
  <link href="../../../Libs/bootstrap-5.3.0/css/bootstrap.min.css" rel="stylesheet">
  <script src="../../../Libs/bootstrap-5.3.0/js/bootstrap.bundle.min.js"></script>
  <script src="../../../Libs/jquery.min.js"></script>
  <script src="../../../Libs/ajax.js"></script>
</head>
<body style="background-color: #d9f4fb;">

  <div class="container mt-5 p-4 border rounded shadow bg-white" style="max-width: 700px;">
    <h2 class="text-center text-primary mb-4">Nuevo Usuario</h2>

    <form action="../php/controlador_insertar.php" method="post" id="formulario_usuario">
      
    
      <div class="row mb-3">
 
          <label for="cmb_nombre" class="form-label"><b>Tipo de Usuario</b></label>
          <select name="cmb_nombre" id="cmb_nombre" class="form-select" required>
            <option value="">Seleccione una opción</option>
          </select>
         
          <label for="cmb_percod" class="form-label"><b>Docente relacionado</b></label>
          <select name="cmb_percod" id="cmb_percod" class="form-select" >
            <option value="">Seleccione una opción</option>
          </select>
          
          <label for="txt_nombre" class="form-label"><b>Nombres </b><span class="text-danger">*</span></label>
          <input type="text" class="form-control" name="txt_nombre" id="txt_nombre" required placeholder="Ingrese nombres" readonly>
          
           <label for="txt_user" class="form-label"><b>Usuario debe ser correo eléctronico</b></label>
          <input type="text" class="form-control" name="txt_user" id="txt_user" 
          placeholder="Ingrese usuario " maxlength="100">
          
      <!-- Contraseñas -->
 
        <div class="col-md-6">
          <label for="txt_contrasena" class="form-label"><b>Contraseña</b> <span class="text-danger">*</span></label>
          <input 
            type="password" 
            class="form-control" 
            name="txt_contrasena" 
            id="txt_contrasena" 
            placeholder="Ingrese una contraseña" 
            required 
            minlength="6"
            maxlength="25"
            value=""
          >
          <div class="form-text">Mínimo 6 caracteres</div>
        </div>

        <div class="col-md-6">
          <label for="txt_contrasena2" class="form-label"><b>Repetir Contraseña</b> <span class="text-danger">*</span></label>
          <input 
            type="password" 
            class="form-control" 
            name="txt_contrasena2" 
            id="txt_contrasena2" 
            placeholder="Repita su contraseña" 
            required 
            minlength="6"
            maxlength="25"
            value=""
          >
          <div class="form-text">Máximo 25 caracteres</div>
          <div class="invalid-feedback">Las contraseñas no coinciden.</div>
        </div>
      </div>

        <!-- Observación -->
      <div class="mb-3">
        <label for="txt_observ" class="form-label"><b>Observación</b></label>
        <input type="text" class="form-control" name="txt_observ" id="txt_observ" placeholder="Observación adicional">
      </div>

      <!-- Botones -->
      <div class="text-center">
        <button type="submit" class="btn btn-success me-2">Guardar</button>
        <button type="button" class="btn btn-secondary" onclick="location.href='index.php?page=movimcsn'">Cerrar</button>
      </div>

    </form>
  </div>

  <!-- Cargar opciones del combo -->
  <script>
    fetch('../php/js_usu_descri.php')
      .then(response => response.json())
      .then(data => {
        const combo = document.getElementById('cmb_nombre');
        data.forEach(item => {
          const option = document.createElement('option');
          option.value = item.codigook;
          option.text = item.descriok;
          combo.appendChild(option);
        });
      })
      .catch(error => console.error('Error al cargar tipo de usuario:', error));
  </script>

  <script>
    fetch('../../personal_/php/js_pers_apenom.php')
    .then(response => response.json())
    .then(data => {
        const combo = document.getElementById('cmb_percod');
        data.forEach(item => {
          const option = document.createElement('option');
          option.value = item.codigook;
          option.text = item.descriok;

          // Añadir nombre y user como atributos
          option.setAttribute('data-nombre', item.descriok);
          option.setAttribute('data-user', item.correook);
          option.setAttribute('data-contrasena', item.cedulaok);
          option.setAttribute('data-contrasena2', item.cedulaok);

          combo.appendChild(option);
    });
  })
  .catch(error => console.error('Error al cargar tipo de usuario:', error));
  </script>

  <script>
      document.getElementById('cmb_percod').addEventListener('change', function () {
        const selected = this.options[this.selectedIndex];
        const nombre = selected.getAttribute('data-nombre');
        const user = selected.getAttribute('data-user');
        const contra = selected.getAttribute('data-contrasena');
        const contra2 = selected.getAttribute('data-contrasena2');

        const campoNombre = document.getElementById('txt_nombre');
        const campouser = document.getElementById('txt_user');
        const campocontra = document.getElementById('txt_contrasena');
        const campocontra2 = document.getElementById('txt_contrasena2');

        if (nombre && user) {
          campoNombre.value = nombre;
          campouser.value = user;
          campocontra.value = contra;
          campocontra2.value = contra2;
          //campoNombre.setAttribute('readonly', true);
          //campouser.setAttribute('readonly', true);
        } else {
          campoNombre.value = '';
          campouser.value = '';
          campocontra.value = '';
          campocontra2.value = '';
          //campoNombre.removeAttribute('readonly');
          //campouser.removeAttribute('readonly');
        }
      });
</script>

  <!-- Validar contraseñas -->
  <script>
    document.getElementById('formulario_usuario').addEventListener('submit', function (e) {
      const pass1 = document.getElementById('txt_contrasena');
      const pass2 = document.getElementById('txt_contrasena2');

      if (pass1.value !== pass2.value) {
        e.preventDefault();
        pass2.classList.add('is-invalid');
      } else {
        pass2.classList.remove('is-invalid');
      }
    });
  </script>
</body>
</html>
