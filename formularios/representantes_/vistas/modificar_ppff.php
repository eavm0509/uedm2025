<?php
include '../../../login/verificar_sesion3n_mixto.php'; 
$_codigo_=$_GET['_id'];
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
    
<body onload="ajax_edi_representante(<?php echo $_codigo_;?>)"> 
    <form action="../php/controlador_actualizar_ppff.php" method="post">
        <div class="container alert alert-info" style="border-top: 1px solid #ccc; border-bottom: 1px solid #ccc;">
            <input type="text"  hidden id="txt_codigo" name="txt_codigo">
            <div class="form-group row">
                <h6 class="text-primary col-12 text-center"><b>EDICION DATOS DEL REPRESENTANTE</b></h6>
            </div>
            <div class="form-group row">
                     
                    <label class="col-6"><b>Cédula</b></label>
                    <input type="number" class="form-control col-6" name="txt_cedula" id="txt_cedula" placeholder='Cédula' maxlength="16" onkeydown="return evitarEnter(event);" readonly style="color: blue;">
                    
                    <label class="col-6"><b>Nacionalidad</b></label>
                    <input type="text" class="form-control col-6" name="txt_nacion" id="txt_nacion" placeholder='Nacionalidad' maxlength="15" onkeydown="return evitarEnter(event);">   

                    <label class="col-6"><b>Apellidos y Nombres</b></label>
                    <input type="text" class="form-control col-6" name="txt_apenom" id="txt_apenom" placeholder='Apellidos y Nombres' maxlength="80" onkeydown="return evitarEnter(event);">
                    <div class="col-3 p-4" style="border: 2px solid #ccc;">
                        <label for="txt_fecing" ><b>Actualizacion</b></label><br>
                        <input type="date" name="txt_fecing" id="txt_fecing"  ><br>     
                    </div>
                    
                    <div class="col-3 p-4" style="border: 2px solid #ccc;">
                        <label for="txt_fecnac" ><b>Fecha/nacimiento</b></label><br>
                        <input type="date" name="txt_fecnac" id="txt_fecnac"  ><br>     
                    </div>
                    <div class="col-3 p-4" style="border: 2px solid #ccc;">
                        <label><b>Sexo:</b></label><br>
                        <input type="radio" name="rad_sexo" id="rad_masculino" value=1 >
                        <label >Masculino</label><br>
                        <input type="radio" name="rad_sexo" id="rad_femenino" value=2 >
                        <label >Femenino</label>
                    </div>
                    
                    <div class="col-3 p-4" style="border: 2px solid #ccc;">
                        <label for="cmb_estciv"><b>Estado Civil:</b></label><br>
                        <select name="cmb_estciv" id="cmb_estciv">
                            <option value=1 >Casada(o)</option>
                            <option value=2 >Soltera(o)</option>
                            <option value=3 >Divorciada(o)</option>
                            <option value=4 >Viuda(o)</option>
                            <option value=5 >Unión Libre</option>
                        </select>  
                    </div>
                    <br>             

                    <label class="col-6"><b>Dirección Domiciliaria</b></label>
                    <input type="text" class="form-control col-6" name="txt_domici" id="txt_domici" placeholder='Dirección domiciliaria' maxlength="100" onkeydown="return evitarEnter(event);">

                    <label class="col-6"><b>Teléfono Domiciliario</b></label>
                    <input type="text" class="form-control col-6" name="txt_teldom" id="txt_teldom" placeholder='Teléfono domiciliario' maxlength="30" onkeydown="return evitarEnter(event);">

                    <label class="col-6"><b>Lugar de Trabajo</b></label>
                    <input type="text" class="form-control col-6" name="txt_trabaj" id="txt_trabaj" placeholder='Lugar de trabajo' maxlength="100" onkeydown="return evitarEnter(event);">

                    <label class="col-6"><b>Dirección del Trabajo</b></label>
                    <input type="text" class="form-control col-6" name="txt_dirtra" id="txt_dirtra" placeholder='Dirección del trabajo' maxlength="100" onkeydown="return evitarEnter(event);">

                    <label class="col-6"><b>Teléfono del Trabajo</b></label>
                    <input type="text" class="form-control col-6" name="txt_teltra" id="txt_teltra" placeholder='Teléfono del Trababjo' maxlength="30" onkeydown="return evitarEnter(event);">

                    <label class="col-6"><b>Profesión</b></label>
                    <input type="text" class="form-control col-6" name="txt_profes" id="txt_profes" placeholder='Profesión' maxlength="20" onkeydown="return evitarEnter(event);">

                    <label class="col-6"><b>Correo electrónico</b></label>
                    <input type="text" class="form-control col-6" name="txt_correo" id="txt_correo" 
                     onblur="validarCorreo()" maxlength="50" onkeydown="return evitarEnter(event);">
                    <span id="mensaje" style="margin-left: 10px;"></span>   
                    <label class="col-6"><b>Movil WhatsApp</b></label>
                    <input type="text" class="form-control col-6" name="txt_movilw" id="txt_movilw" placeholder='# de teléfono WhatsApp' onblur="validarCorreo()" maxlength="10" onkeydown="return evitarEnter(event);">

                    <label class="col-6"><b>Persona de Contacto</b></label>
                    <input type="text" class="form-control col-6" name="txt_contac" id="txt_contac" placeholder='Contacto' maxlength="100" onkeydown="return evitarEnter(event);">

                    <label class="col-6"><b>Teléfono de Contacto</b></label>
                    <input type="text" class="form-control col-6" name="txt_telcon" id="txt_telcon" placeholder='Teléfono de contacto' maxlength="40" onkeydown="return evitarEnter(event);">

                    <label class="col-6"><b>Observación</b></label>
                    <input type="text" class="form-control col-6" name="txt_observ" id="txt_observ" placeholder='Observación' maxlength="100" onkeydown="return evitarEnter(event);">
            </div>

            <div class="form-group row">
                <label class="col-12 text-center">
                    <button type="submit" class="btn btn-success">Actualizar</button>
                    <button type="button" class="btn btn-secondary" onclick="location.href='../../../login.php'">Cerrar</button>
                </label>
            </div>

        </div>
    </form>
    <script>
        //Verifica que el correo este bien escrito
        function validarCorreo() {
            const correo = document.getElementById("txt_emaest").value;
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
    <script>
        //Para que anular la tecla de enter
        function evitarEnter(e) {
            if (e.key === "Enter") {
            e.preventDefault();
            return false;
            }
        }
    </script>
</body>
</html>