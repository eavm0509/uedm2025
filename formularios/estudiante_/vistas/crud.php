<?php
include '../../../login/verificar_sesion3n_mixto.php';
?>

<!doctype html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>CRUD ESTUDIANTES</title>
        <link href="../../../Libs/bootstrap-5.3.0/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
        <script src="../../../Libs/bootstrap-5.3.0/js/bootstrap.min.js" crossorigin="anonymous"></script>
        <script src="../../../Libs/jquery.min.js"></script>
        <script src="../../../Libs/ajax.js"></script>
        
    </head>
    <body onload="ajax_buscar_estudiantes('');">
        <div class="container-fluid alert alert-light">
  <div class="row align-items-center g-2 flex-wrap">
    
    <div class="col-12 col-md-auto">
      <h3 class="text-primary mb-0">Gestión de Estudiantes</h3>
    </div>
    <?php
      $hidden = ($_SESSION['rol'] === 'Docente') ? 'hidden' : '';
    ?>
    <div class="col-6 col-md-auto">
      <button type="button" class="btn btn-success btn-sm w-100" onclick="location.href='ingresar.php'" <?= $hidden ?>>Nuevo estudiante</button>
    </div>

    <!-- <div class="col-6 col-md-auto">
      <button type="button" class="btn btn-success btn-sm w-100" onclick="generar();">Reporte</button>
    </div> -->

    <div class="col-6 col-md-auto">
      <button type="button" class="btn btn-success btn-sm w-100" onclick="location.href='vista_subir_nomina.html'" <?= $hidden ?>>Subir Año</button>
    </div>

    <div class="col-6 col-md-auto">
      <button type="button" class="btn btn-secondary btn-sm w-100" onclick="location.href='../../../admin.php'">← Cerrar</button>
    </div>

    <div class="col-12 col-md-auto d-flex align-items-center">
      <label for="reporte_tipo" class="me-2 mb-0"><strong>Tipo de Reporte:</strong></label>
      <select id="reporte_tipo" class="form-select form-select-sm w-auto">
        <option value="">Seleccione un reporte</option>
        <option value="listado_estudiantes">Listado de estudiantes</option>
        <option value="estudiantes_representantes">Nómina con representantes</option>
        <option value="estudiantes_correos_claves">Nómina con correos y claves</option>
        <option value="estudiantes_retirados">Estudiantes retirados</option>
        <option value="ficha_datos">Ficha de datos (individual)</option>
        <option value="certificado_matricula">Certificado de matrícula (individual)</option>
      </select>
    </div>
    <div class="col-6 col-md-auto">
      <button class="btn btn-outline-primary btn-sm w-100" onclick="generarReporte()">🖨️</button>
    </div>

    <div class="container alert alert-info col-md-6 mx-auto mt-3">
  <h3 class="text-center">Buscar</h3>
  <div class="row justify-content-center">
    <div class="col-12 col-md-8">
      <input type="text" class="form-control" id="txt_buscar" name="txt_buscar"
             placeholder="Ingrese nombre o cédula "
             onkeyup="ajax_buscar_estudiantes(this.value);">
    </div>
  </div>
</div>
  </div>
</div>
        </div>
        <table id="tabla" name="tabla" class="table table-bordered">
            <thead class='bg-primary text-light text-center'>
                <tr>
                <th>#</th>
                <th>ID</th>
                <th>CEDULA</th>
                <th>NOMBRE</th>
                <th>TELEFONOS</th>
                <th>CORREO</th>
                <th>AÑO</th>
                <th>Editar</th>
                <th>Eliminar</th>
                </tr>
            </thead>
        </table>

<script>
function generarReporte() {
    const tipo = document.getElementById('reporte_tipo').value;
    const valor = document.getElementById('txt_buscar')?.value.trim();

    if (!tipo) {
        alert("Seleccione un tipo de reporte.");
        return;
    }

    const necesitaCedula = ["ficha_datos", "certificado_matricula"].includes(tipo);
    const necesitaParalelo = ["listado_estudiantes", "estudiantes_representantes", "estudiantes_correos_claves", "estudiantes_retirados"].includes(tipo);

    if (necesitaParalelo && (!valor || valor === "")) {
        alert("Ingrese el paralelo (ej. 3AINFOR) en el campo de búsqueda.");
        return;
    }

    if (necesitaCedula) {
        if (!valor || valor === "") {
            alert("Ingrese la cédula del estudiante.");
            return;
        }
        if (!/^\d{10}$/.test(valor)) {
            alert("Debe ingresar una cédula válida de 10 dígitos.");
            return;
        }
    }

    switch (tipo) {
        case "listado_estudiantes":
            window.open(`../reportes/r_estudiantes.php?paralelo=${encodeURIComponent(valor)}`, '_blank');
            break;
        case "estudiantes_representantes":
            window.open(`../reportes/r_nomina_representantes.php?paralelo=${encodeURIComponent(valor)}`, '_blank');
            break;
        case "estudiantes_correos_claves":
            window.open(`../reportes/r_nomina_claves.php?paralelo=${encodeURIComponent(valor)}`, '_blank');
            break;
        case "estudiantes_retirados":
            window.open(`../reportes/r_estudiantes_retirados.php?paralelo=${encodeURIComponent(valor)}`, '_blank');
            break;
        case "ficha_datos":
            window.open(`../reportes/r_ficha_datos.php?cedula=${encodeURIComponent(valor)}`, '_blank');
            break;
        case "certificado_matricula":
            window.open(`../reportes/r_certificado_matricula.php?cedula=${encodeURIComponent(valor)}`, '_blank');
            break;
        default:
            alert("Tipo de reporte no reconocido.");
            break;
    }
}
</script>
    </body>
</html>

<!-- Modal -->
<div class="modal fade" id="elimimarModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header bg-danger text-light">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Eliminar registro de estudiante</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form action="../php/eliminar_estudiante.php" method="post">
                <input   type="text" id="txt_codigo" name="txt_codigo" hidden>
                <div class="container">
                    <div class="row">
                        <label><b>Cédula  : </b></label>
                        <input type="text" id="txt_cedula" name="txt_cedula" class="form-control" disabled>
                    </div>
                    <div class="row">
                        <label><b>Apellidos y Nombres  : </b></label>
                        <input type="text" id="txt_nombre" name="txt_nombre" class="form-control" disabled>
                    </div>
                    <div class="row mt-2">
                        <div class="col-12 text-center">
                            <span class="text-danger text-center h3">Esta seguro de eliminar el registro?</span>
                        </div>
                    </div>
                    <div class="row mt-5">
                        <div class="col-12 text-center">
                            <button type="submit" id="btn_eliminar" name="btn_eliminar" class="btn btn-danger text-light">Eliminar</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        </div>
      </div>
    </div>
  </div>