<?php
include '../../../login/verificar_sesion3n_mixto.php';
?>
<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>GESTION DE MATERIAS</title>
        <link href="../../../Libs/bootstrap-5.3.0/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
        <script src="../../../Libs/bootstrap-5.3.0/js/bootstrap.min.js" crossorigin="anonymous"></script>
        <script src="../../../Libs/jquery.min.js"></script>
        <script src="../../../Libs/ajax.js"></script>
        
    </head>
    <body onload="ajax_buscar_materias('');">
        <div class="alert alert-light">
            <h5 class="text-primary">Gestión de Materias</h5>
 			<button type="button" class="btn btn-success" onclick="location.href = 'ingresar.php'">Nueva</button>
            <button type="button" class="btn btn-success" onclick="reporteG_materiass();">Reporte 1</button>
            <button type="button" class="btn btn-secondary" onclick="location.href='../../../admin.php'">Cerrar</button>   
        </div>
        <div class="container alert alert-info col-12">
            
            <div class="row">
                   
                  		<input type="text" class="form-control col-12" placeholder='Ingrese valor a buscar' id="txt_buscar" name="txt_buscar" onkeyup="ajax_buscar_materias(this.value);">
            		
            </div>
        </div>
        <table id="tabla" name="tabla" class="table table-bordered">
            <thead class='bg-primary text-light text-center'>
                <tr>
                    <th>No</th>
                    <th>ID</th>
                    <th>CURSO</th>
                    <th>ASIGNATURA</th>
                    <th>DOCENTE</th>
                    <th>AREA</th>
                    <th>OFICIAL</th>
                    <th>TIPO</th>
                    <th>OCULTA</th>
                    <th>ORDEN</th>
                    <th>AMBITO</th>
                    <th>DESTREZA</th>
                    <th>EDITAR</th>
                    <th>ELIMINAR</th>
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
          <h1 class="modal-title fs-5" id="exampleModalLabel">Eliminar registro de materia</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form action="../php/eli_mate.php" method="post">
                <input   type="text" id="txt_codigo" name="txt_codigo" hidden>
                <div class="container">
                    <div class="row">
                        <label><b>Curso o Año : </b></label>
                        <input type="text" id="txt_fcurso" name="txt_fcurso" class="form-control" disabled>
                    </div>

                    <div class="row">
                        <label><b>Asignatura : </b></label>
                        <input type="text" id="txt_asignatura" name="txt_asignatura" class="form-control" disabled>
                    </div>
                    <div class="row">
                        <label><b>Docente : </b></label>
                        <input type="text" id="txt_docente" name="txt_docente" class="form-control" disabled>
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