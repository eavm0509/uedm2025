<?php
include '../../../verificar_sesion3n.php';
?>
<!doctype html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Representantes</title>
        <link href="../../../Libs/bootstrap-5.3.0/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
        <script src="../../../Libs/bootstrap-5.3.0/js/bootstrap.min.js" crossorigin="anonymous"></script>
        <script src="../../../Libs/jquery.min.js"></script>
        <script src="../../../Libs/ajax.js"></script>
    </head>
<body>
    <form action="../php/controlador_insertar.php" method="post">
          <div>
            <h1 class="text-primary" id="saludo"></h1>
            <input type="text" id="txt_identificador" name="txt_identificador" hidden>
            <h2 class="text-primary col-12 text-center">Nuevo Representante</h2>
        </div>
        <div class="container">
            <div class="form-group row">
                <label class="col-6"><b>Cédula</b></label>
                <input type="number" class="form-control col-6" name="txt_cedula" id="txt_cedula" 
                placeholder="Cédula" maxlength="16" onblur="ajax_buscar_cedula(this.value);"
                onkeydown="return evitarEnter(event);" required>
            </div>
            <div class="form-group row">
                <label class="col-6"><b>APELLIDO Y NOMBRES</b></label>
                <input type="text" class="form-control col-6" name="txt_apenom" id="txt_apenom" 
                placeholder='Apellidos y Nombres' maxlength="80" onkeydown="return evitarEnter(event);" 
                oninput="this.value = this.value.toUpperCase();" required>
            </div>
            <div class="form-group row">
                    <label class="col-6"><b>Correo electrónico</b></label>
                    <input type="text" class="form-control col-6" name="txt_correo" id="txt_correo"
                    placeholder='Correo Eléctronico' maxlength="100" required
                    onkeydown="return evitarEnter(event);" onblur="ajax_buscar_correo_representante(this.value,0);">
                    <span id="mensaje" style="margin-left: 10px;"></span>   
            </div>
            <div class="form-group row">
                    <input type="hidden" name="chk_suspen" value=0> 
                    <label>
                    <input type="checkbox" name="chk_suspen" id="chk_suspen" value=1> <b>Suspendido</b>
                    </label><br>
            </div>
            <div class="form-group row">
                <label class="col-12 text-center">
                    <br>  
                    <button type="submit" class="btn btn-success">Guardar</button>
                    <button type="button" class="btn btn-secondary" onclick="location.href='crud.php'">Cerrar</button>
                </label>
            </div>

        </div>
    </form>


<script>
        // Obtener los parámetros de la URL
        const params = new URLSearchParams(window.location.search);
        const _ident = params.get("_identi");
        document.getElementById("txt_identificador").value = _ident;
</script>
    
<script>
        //Para que anular la tecla de enter
        function evitarEnter(e) {
            if (e.key === "Enter") {
            e.preventDefault();
            return false;
            }
        }
</script>


<script>
        //Verifica que el correo este bien escrito
        function validarCorreo() {
            const correo = document.getElementById("txt_correo").value;
            const mensaje = document.getElementById("mensaje");
            const regex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

            if (correo === "") {
            mensaje.textContent = "";
            return;
            }

            if (regex.test(correo)) {
            mensaje.textContent = "✔️ Válido";
            mensaje.style.color = "green";
            } else {
            mensaje.textContent = "❌ Inválido";
            mensaje.style.color = "red";
            }
        }
</script>

</body>
</html>