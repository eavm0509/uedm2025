<?php
include '../../../login/verificar_sesion3n_mixto.php';
?>
<!doctype html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>GESTION DE USUARIOS</title>
        <link href="../../../Libs/bootstrap-5.3.0/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
        <script src="../../../Libs/bootstrap-5.3.0/js/bootstrap.min.js" crossorigin="anonymous"></script>
        <script src="../../../Libs/jquery.min.js"></script>
        <script src="../../../Libs/ajax.js"></script>
        
    </head>
    <body onload="ajax_buscar_usuarios('');">
        <div class="alert alert-light">
            <h2 class="text-primary">Gestión de Usuarios</h2>
            <button type="button" class="btn btn-success" onclick="location.href = 'ingresar.php'">Nuevo Usuario</button>
            <button type="button" class="btn btn-success" onclick="reporteG_usuarios();">Reporte General</button>
            <button type="button" class="btn btn-secondary" onclick="location.href='../../../admin.php'">← Volver al Panel Principal</button>
        </div>
        <div class="container alert alert-info col-5">
            <h3>Buscar</h3>
            <div class="row">
                <label class="col-2">USUARIOS</label>
                <input type="text" class="form-control col-4" id="txt_buscar" name="txt_buscar" onkeyup="ajax_buscar_usuarios(this.value);">
                
            </div>
        </div>
        <table id="tabla" name="tabla" class="table table-bordered">
            <thead class='bg-primary text-light text-center'>
                <tr>
                    <th>ID</th>
                    <th>NOMBRE</th>
                    <th>OBSERVACION</th>
                    <th>Editar</th>
                    <th>Eliminar</th>
                </tr>
            </thead>
        </table>
    </body>
</html>

<!-- Modal -->
<div class="modal fade" id="elimimarModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header bg-danger text-light">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Eliminar registro de usuario</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form action="../php/eliminar_usuarios.php" method="post">
                <input   type="text" id="txt_codigo" name="txt_codigo" hidden>
                <div class="container">
                    <div class="row">
                        <label><b>Nombres  : </b></label>
                        <input type="text" id="txt_nombre" name="txt_nombre" class="form-control" readonly>
                    </div>
                    <div class="row">
                        <label><b>Observación : </b></label>
                        <input type="text" id="txt_observ" name="txt_observ" class="form-control" readonly>
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