<?php
include '../../../login/verificar_sesion3n_mixto.php';
?>
<!doctype html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>CSN: Gestión de Paralelos</title>
        <link href="../../../Libs/sweetalert2-8.2.5/sweetalert2.min.css" rel="stylesheet">
        <link href="../../../Libs/bootstrap-5.3.0/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
        <script src="../../../Libs/bootstrap-5.3.0/js/bootstrap.min.js" crossorigin="anonymous"></script>
        <script src="../../../Libs/jquery.min.js"></script>
        <script src="../../../Libs/ajax.js"></script>
        <script src="../../../Libs/sweetalert2-8.2.5/sweetalert2.min.js"></script>

    </head>
<body>
     <form id="formularioi">  <!--action="php/controlador_insertar.php" method="post"-->
        <div class="container">
            <div class="form-group row">
                <label class="col-2"><b>NOMBRE</b></label>
                <input type="text" class="form-control col-4" name="txt_nombre" id="txt_nombre" required>
            </div>
            <div class="form-group row">
                <label class="col-2"><b>OBSERVACION</b></label>
                <input type="text" class="form-control col-4" name="txt_observa" id="txt_observa">
            </div>
           
               
            <div class="form-group row">
                <label class="col-12 text-center">
                    <br>
                    <!--<button type="submit" class="btn btn-success">Guardar</button>-->
                    <button type="button" class="btn btn-success" onclick="guardarFormulario()">Guardar</button>
                    <button type="button" class="btn btn-danger ms-2" data-bs-dismiss="modal">
                        Cerrar
                    </button>
                </label>
            </div>

        </div>
    </form>

<script>
        function guardarFormulario() {
            const form = document.getElementById('formularioi');
            const formData = new FormData(form);

            fetch('../php/controlador_insertar.php', {
                method: 'POST',
                body: formData
            })
            .then(response => response.text())
            .then(data => {
                Swal.fire({
                    title: 'Paralelo',
                    text: 'Registro Guardado',
                    icon: 'success',
                    confirmButtonText: 'Aceptar'
                    }).then(() => {
                    location.href = 'index.php?page=movimcsn';
                });

                // Opcional: cerrar el modal si lo estás usando como modal
                const modalEl = document.getElementById('modalFormulario');
                const modal = bootstrap.Modal.getInstance(modalEl);
                if (modal) {
                    modal.hide();
                }

            })
            .catch(error => {
                console.error("Error al guardar:", error);
                alert("Error al guardar los datos.");
            });
        }
    </script>
</body>
</html>