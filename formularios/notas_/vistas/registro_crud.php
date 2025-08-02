<?php
include '../../../login/verificar_sesion3n_mixto.php'; 
ini_set('display_errors', 1);
//$op = $_GET['_codper'] ?? 0;

//if ($op == 1) {
    // Ejecutar lógica cuando op es 1
    //echo $op;
//}
?>
<!doctype html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>GESTION DE REGISTRO</title>
        <link href="../../../Libs/bootstrap-5.3.0/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
        <script src="../../../Libs/bootstrap-5.3.0/js/bootstrap.min.js" crossorigin="anonymous"></script>
        <script src="../../../Libs/jquery.min.js"></script>
        <script src="../../../Libs/ajax.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
   
    </head>
    <body onload="">
        <div class="alert alert-light">
            <input type="text" name="txt_idcodper" id="txt_idcodper" hidden>
            <input type="text" name="txt_idcodmat" id="txt_idcodmat" hidden>
            <h2 class="text-primary">Gestión de Registro</h2>
            <button type="button" class="btn btn-success" onclick="redirigirConMateria()">Nuevo</button>
            <button type="button" class="btn btn-secondary" onclick="location.href='../../../admin.php'">Cerrar</button>   
        </div>
   
        <div class="container alert alert-info col-12">
            <div class="row">
                <?php
                    $disabled = ($_SESSION['rol'] === 'Docente') ? 'disabled' : '';
                ?> 
                <div class="col-6 p-2"  >
                    <label for="cmb_codper" class="form-label"><b>Docente</b></label>
                    <select class="form-select" name="cmb_codper" id="cmb_codper" <?= $disabled ?>></select>
                </div>

                <div class="col-6 p-2" >
                    <label for="cmb_codmat" class="form-label"><b>Asignatura</b></label>
                    <select class="form-select" name="cmb_codmat" id="cmb_codmat"></select>
                </div>
            </div>
        </div>
        <table id="tabla" name="tabla" class="table table-bordered">
            <thead class='bg-primary text-light text-center'>
                <tr>
                    <th>No</th>
                    <th>ID</th>
                    <th>FECHA</th>
                    <th>DESCRIPCION</th>
                    <th>ING_NOTA</th>
                    <th> % </th>
                    <th>MAT_PADRE</th>
                </tr>
            </thead>
        </table>
    </body>

   <script>
    document.addEventListener('DOMContentLoaded', function () {
    const params = new URLSearchParams(window.location.search);
    const _codper = params.get("_codper");
    const _codmat = params.get("_codmat");

    const cmbCodper = document.getElementById("cmb_codper");
    const txtIdCodper = document.getElementById("txt_idcodper");
    const cmbCodmat = document.getElementById("cmb_codmat");
    const txtIdCodmat = document.getElementById("txt_idcodmat");

    // 1. Cargar los docentes al combo
    fetch('../../personal_/php/js_pers_apenom.php')
        .then(response => response.json())
        .then(data => {

            //if (data.error) {
            //console.error("Sesión expirada");
            //alert("Sesión expirada. Por favor, vuelve a iniciar sesión.");
            //// window.location.href = "login.php"; // redirigir si quieres
            //return;
             //}


            //if (data.error === 'Sesión expirada') {
              //  alert("⚠️ Tu sesión ha expirado. Serás redirigido al inicio de sesión.");
                //setTimeout(() => {
                  //  window.location.href = '../../../login/index.php'; // ajusta esta ruta si es necesario
                //}, //1000);
            //return;
            //}




            data.forEach(item => {
                const option = document.createElement('option');
                option.value = item.codigook;
                option.text = item.descriok;

                if (item.codigook == _codper) {
                    option.selected = true;
                }

                cmbCodper.appendChild(option);
            });

            if (txtIdCodper) txtIdCodper.value = _codper;
            cargarMateriasPorDocente(_codper);
        })
        .catch(error => console.error('Error al cargar docentes:', error));
   
   
     

    // 2. Si hay codmat, asignarlo al campo oculto
    if (_codmat && txtIdCodmat) {
        txtIdCodmat.value = _codmat;
    }

    // 3. Función para cargar materias del docente seleccionado
    function cargarMateriasPorDocente(codper) {
        if (!cmbCodmat) return;
        
        cmbCodmat.innerHTML = ''; // Limpiar opciones anteriores
        ajax_registro_buscar('-50'); //solo para que se borre el filtro y no muestre nada

        fetch('../../materias_/php/js_mate_descri.php?codper=' + codper)
            .then(response => response.json())
            .then(data => {
                data.forEach(item => {
                    const option = document.createElement('option');
                    option.value = item.codmatok;
                    option.text = item.descriok + " " + item.asignaok;

                    if (item.codmatok == _codmat) {
                        option.selected = true;
                    }

                    cmbCodmat.appendChild(option);
                });

                if (_codmat) {
                    ajax_registro_buscar(_codmat);
                } else if (cmbCodmat.value) {
                    ajax_registro_buscar(cmbCodmat.value);
                }
            })
            .catch(error => console.error('Error al cargar materias:', error));
    }

    // 4. Si cambian el docente manualmente
    cmbCodper.addEventListener('change', function () {
        const selectedCodper = cmbCodper.value;
        if (txtIdCodper) txtIdCodper.value = selectedCodper;
        cargarMateriasPorDocente(selectedCodper);
    });
});
</script>


    


    <script>
        function redirigirConMateria() {
            const codmat = document.getElementById('cmb_codmat').value;
            const codper = document.getElementById('cmb_codper').value;
            location.href = 'registro_ingresar.php?codmat=' + encodeURIComponent(codmat) + 
            '&codper=' + encodeURIComponent(codper);
        }
    </script>
    
    <script>
                document.getElementById('cmb_codmat').addEventListener('change', function () {
                // ✅ Llamar a la función ajax_registro_buscar con el valor actual del campo de búsqueda
                ajax_registro_buscar(document.getElementById('cmb_codmat').value);  
    });
    </script>




</html>

<!-- Modal -->
<div class="modal fade" id="eliminarModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header bg-danger text-light">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Eliminar registro</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form action="../php/registro_eliminar.php" method="post">
                <input   type="text" id="txt_codigo" name="txt_codigo" hidden>
                <div class="container">
                    <div class="row">
                        <label><b>Asignatura : </b></label>
                        <input type="text" id="txt_nombre" name="txt_nombre" class="form-control" disabled>
                    </div>
                    <div class="row">
                        <label><b>Descripción : </b></label>
                        <input type="text" id="txt_descri" name="txt_descri" class="form-control" disabled>
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

<!--
<script> 
        let modalEl = document.getElementById('eliminarModal');
        if (modalEl) {
            let modal = new bootstrap.Modal(modalEl, { backdrop: 'static' }); // ✅
            modal.show();
        } else {
            console.error("Modal no encontrado");
        }

</script>
-->