<?php
include '../../../login/verificar_sesion3n_mixto.php';
?>
<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Estudiantes</title>
        <link href="../../../Libs/bootstrap-5.3.0/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
        <script src="../../../Libs/bootstrap-5.3.0/js/bootstrap.min.js" crossorigin="anonymous"></script>
        <script src="../../../Libs/jquery.min.js"></script>
        <script src="../../../Libs/ajax.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/dayjs@1/dayjs.min.js"></script>
        <style>
                input[type="file"]::file-selector-button {
                display: none;
                }
        </style>

        <style>
            .recuadro-fijo {
            width: 120px;
            height: 150px;
            overflow: hidden;
            }

            .recuadro-fijo img {
            width: 100%;
            height: 100%;
            object-fit: cover; /* Rellena el recuadro manteniendo proporción */
            }
        </style>
    
    </head>
<body> 
    <form  action = "../php/controlador_insertar.php" method="POST" enctype="multipart/form-data">

        <div class="form-group row">
            <h3 class="text-primary col-12 text-center">Nuevo Estudiante</h3> <!--"php/controlador_insertar.php" -->
        </div>
        
        <div class="container alert alert-info" >
            <div class="row"  >
                <div class="col-3  p-4" style="border: 2px solid #ccc;">
                                <label for="txt_fecing" ><b>F/Ingreso:</b></label><br>
                                <input type="datetime-local" name="txt_fecing" id="txt_fecing"  ></td><br>
                                <label for="txt_fmatri" ><b>F/Matrícula:</b></label><br>
                                <input type="date" name="txt_fmatri" id="txt_fmatri"  ></td><br>
                                
                                <div class="form-group row align-items-center">
                                    <label for="txt_matric" class="col-sm-6 col-form-label"><b># Matrícula</b></label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" name="txt_matric" id="txt_matric" placeholder="Matrícula" maxlength="16" onkeydown="return evitarEnter(event);">
                                    </div>
                                </div>

                                <div class="form-group row align-items-center">
                                    <label for="txt_nfolio" class="col-sm-6 col-form-label"><b>Folio</b></label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" name="txt_nfolio" id="txt_nfolio" placeholder="Folio" maxlength="15" onkeydown="return evitarEnter(event);">
                                    </div>
                                </div>
                                                                
                </div>   
                <div class="col-3 p-4" style="border: 2px solid #ccc;">
                    <label for="txtalu_fnacer" ><b>Fecha/nacimiento</b></label><br>
                    <input type="date" name="txt_fnacer" id="txt_fnacer"  ><br>             
                    <label for="cmb_curso"><b>Año o curso:</b></label><br>
                    <select name="cmb_curso" id="cmb_curso" required></select><br>
                    <label for="txt_estciv"><b>Estado Civil:</b></label><br>
                     <select name="txt_estciv" id="txt_estciv">
                        <option value=1 >Casado/a</option>
                        <option value=2  selected>Soltero/a</option>
                        <option value=3 >Divorciado/a</option>
                        <option value=4 >Viudo/a</option>
                        <option value=5 >Unión Libre</option>
                     </select>  
                     <br>             
                    <label><b>Sexo:</b></label><br>
                    <input type="radio"  name="rad_sexo" id="rad_masculino" value=1 checked>
                    <label>Masculino</label><br>
                    <input type="radio"  name="rad_sexo" id="rad_femenino" value=2 >
                    <label>Femenino</label>
                </div>    

                <div class="col-3  p-4" style="border: 2px solid #ccc;">
                    <label><b>Tipo matrícula</b></label><br>
                    <input type="radio"  name="rad_tipo" id="rad_normal" value=1 checked>
                    <label>Nomal</label><br>
                    <input type="radio"  name="rad_tipo" id="rad_condicional" value=2 >
                    <label>Condicional</label>

                    <input type="hidden" name="chk_ordina" value=0> 
                    <label>
                    <input type="checkbox" name="chk_ordina" id="chk_ordina" value=1> <b>Matrícula Ordinaria</b>
                    </label><br>
                    <input type="hidden" name="chk_nuevo" value=0> 
                    <label>
                    <input type="checkbox" name="chk_nuevo" id="chk_nuevo" value=1> <b>Nuevo estudiante</b>
                    </label><br>
                     
                    <label>
                    <input type="hidden" name="chk_repite" value=0> 
                    <label>
                    <input type="checkbox" name="chk_repite" id="chk_repite" value=1> <b>Repetidor de año</b>
                    </label><br>
                    <input type="hidden" name="chk_retirado" value=0> 
                    <label>
                    <input type="checkbox" name="chk_retirado" id="chk_retirado" value=1> <b>Estudiante Retirado</b>
                    </label><br>

                    <label for="txt_fecret" ><b>F/Retiro:</b></label><br>
                    <input type="date" name="txt_fecret" id="txt_fecret"  ></td><br>

                </div>  
                  
                <div class="col-3  p-4" style="border: 2px solid #ccc;">
                        <div class="recuadro-fijo border rounded shadow mx-auto">
                            <img id="preview" src="#" class="img-fluid">
                        </div>
                        <label  class="btn btn-success" for="txt_fotogr">📁 Foto</label>
                        <input type="file" name="txt_fotogr" id="txt_fotogr" accept=".jpg, .jpeg">
                </div>
                        
            </div>
        </div>

        <div class="container alert alert-info" >
            <div class="row">
                <div class="col-4 p-3" style="border: 1px solid #ccc;">
                    <label ><b>Cédula</b></label>
                    <input type="number" class="form-control col-4" name="txt_cedula" id="txt_cedula" placeholder='Cédula' maxlength="16" required onblur="ajax_buscar_cedula(this.value);" onkeydown="return evitarEnter(event);">
                    <label ><b>Nacionalidad</b></label>
                    <input type="text" class="form-control col-4" name="txt_nacion" id="txt_nacion" 
                           placeholder='Nacionalidad' maxlength="15" 
                           oninput="this.value = this.value.toUpperCase();"
                           onkeydown="return evitarEnter(event);">   
                    <label ><b>Apellidos y Nombres</b></label>
                    <input type="text" class="form-control col-4" name="txt_nombre" id="txt_nombre" 
                           placeholder='Apellidos y Nombres' maxlength="80" required 
                           onkeydown="return evitarEnter(event);"
                           oninput="this.value = this.value.toUpperCase();">
                    <label ><b>Lugar de Nacimiento</b></label>
                    <input type="text" class="form-control col-4" name="txt_lnacer" id="txt_lnacer" placeholder='Dirección' maxlength="100" onkeydown="return evitarEnter(event);">                   
                    <label ><b>Dirección Domiciliaria</b></label>
                    <input type="text" class="form-control col-4" name="txt_diredo" id="txt_diredo" placeholder='Dirección' maxlength="100" onkeydown="return evitarEnter(event);">
                    <label ><b>Teléfonos domiciliario</b></label>
                    <input type="text" class="form-control col-4" name="txt_teledo" id="txt_teledo" placeholder='Teléfonos' maxlength="25" onkeydown="return evitarEnter(event);">
                </div>

                <div class="col-4  p-3" style="border: 1px solid #ccc;">
                    <label ><b>Teléfono de estudiante</b></label>
                    <input type="text" class="form-control col-4" name="txt_telest" id="txt_telest" placeholder='Teléfono de estudiante' maxlength="10" onkeydown="return evitarEnter(event);">
                    <label ><b>Correo electrónico</b></label>
                    <input type="text" class="form-control col-4" name="txt_emaest" id="txt_emaest" placeholder='Correo Elécronico' onblur="validarCorreo()" maxlength="50" onkeydown="return evitarEnter(event);">
                    <span id="mensaje" style="margin-left: 10px;"></span>
                    <label ><b>Discapacidad</b></label>
                    <input type="text" class="form-control col-4" name="txt_discap" id="txt_discap" placeholder='Discapacidad' maxlength="100" onkeydown="return evitarEnter(event);">
                    <label ><b>No. de Carnet</b></label>
                    <input type="text" class="form-control col-4" name="txt_ncadis" id="txt_ncadis" placeholder='No. de carnet Discapacidad' maxlength="50" onkeydown="return evitarEnter(event);">
                    <label ><b>Enfermedad</b></label>
                    <input type="text" class="form-control col-4" name="txt_enferm" id="txt_enferm" placeholder='Enfermedad' maxlength="100" onkeydown="return evitarEnter(event);">
                    <label for="txt_defetn"><b>Etnia</b></label><br>
                     <select name="txt_defetn" id="txt_defetn">
                        <option value='Mestiza' selected>Mestiza</option>
                        <option value='Montubia'>Montubia</option>
                        <option value='Afroecuatoriana'>Afroecuatoriana</option>
                        <option value='Indígena'>Indígena</option>
                        <option value='Blanca'>Blanca</option>
                        <option value='Otra'>Otra</option>
                     </select>  

                </div>

                <div class="col-4  p-3" style="border: 1px solid #ccc;">
                    <label ><b>Institución Procedencia </b></label>
                    <input type="text" class="form-control col-4" name="txt_colevi" id="txt_colevi" placeholder='Institución Procedencia'  maxlength="30" onkeydown="return evitarEnter(event);">
                    <label ><b>Dirección Institución Procedencia </b></label>
                    <input type="text" class="form-control col-4" name="txt_dicovi" id="txt_dicovi" placeholder='Institución Procedencia'  maxlength="50" onkeydown="return evitarEnter(event);">
                    <label ><b>Año lectivo anterior</b></label>
                    <input type="text" class="form-control col-4" name="txt_anoant" id="txt_anoant" placeholder='Por ejemplo: año 2020-2021'  maxlength="15" onkeydown="return evitarEnter(event);">
                    <label ><b>Año anterior</b></label>
                    <input type="text" class="form-control col-4" name="txt_curant" id="txt_curant" placeholder='Curso, grado o año anterior'  maxlength="20" onkeydown="return evitarEnter(event);">
                    <label ><b>Disciplina</b></label>
                    <input type="text" class="form-control col-4" name="txt_notdis" id="txt_notdis" placeholder='Calficación de comportamiento'  maxlength="5" onkeydown="return evitarEnter(event);">
                    <label ><b>Aprovechamiento</b></label>
                    <input type="text" class="form-control col-4" name="txt_notapr" id="txt_notapr" placeholder='Calficación de aprovechamiento'  maxlength="5" onkeydown="return evitarEnter(event);">
                </div>   
            </div>


            <div class="row">
                <div class="col-6 p-2">
                    <h6 class="text-primary col-12 text-center"><b>DATOS DE LA MADRE</b></h6> 
                    <label class="col-6"><b>Cédula</b></label>
                    <input type="number" class="form-control col-6" name="txt_cedmdr" id="txt_cedmdr" placeholder='Cédula' maxlength="16" onkeydown="return evitarEnter(event);">
                    <label class="col-6"><b>Nacionalidad</b></label>
                    <input type="text" class="form-control col-6" name="txt_nacmdr" id="txt_nacmdr" placeholder='Nacionalidad' maxlength="15" onkeydown="return evitarEnter(event);">   
                    <label class="col-6"><b>Apellidos y Nombres</b></label>
                    <input type="text" class="form-control col-6" name="txt_nommdr" id="txt_nommdr" placeholder='Apellidos y Nombres' maxlength="80" onkeydown="return evitarEnter(event);">
                    <label for="txtalu_fnmdr" ><b>Fecha/nacimiento</b></label><br>
                    <input type="date" name="txt_fnmdr" id="txt_fnmdr"  ><br>             

                    <label for="txt_ecimdr"><b>Estado Civil:</b></label><br>
                     <select name="txt_ecimdr" id="txt_ecimdr">
                        <option value=1 >Casada</option>
                        <option value=2  selected>Soltera</option>
                        <option value=3 >Divorciada</option>
                        <option value=4 >Viuda</option>
                        <option value=5 >Unión Libre</option>
                     </select>  
                    <br>             

                    <label class="col-6"><b>Dirección Domiciliaria</b></label>
                    <input type="text" class="form-control col-6" name="txt_dirmdr" id="txt_dirmdr" placeholder='Dirección' maxlength="40" onkeydown="return evitarEnter(event);">
                    <label class="col-6"><b>Parroquia</b></label>
                    <input type="text" class="form-control col-6" name="txt_parmdr" id="txt_parmdr" placeholder='Parroquia' maxlength="50" onkeydown="return evitarEnter(event);">
                    <label class="col-6"><b>Provincia</b></label>
                    <input type="text" class="form-control col-6" name="txt_prvmdr" id="txt_prvmdr" placeholder='Provincia' maxlength="50" onkeydown="return evitarEnter(event);">
                    <label class="col-6"><b>Cantón</b></label>
                    <input type="text" class="form-control col-6" name="txt_canmdr" id="txt_canmdr" placeholder='Cantón' maxlength="50" onkeydown="return evitarEnter(event);">
                    <label class="col-6"><b>Calle Principal</b></label>
                    <input type="text" class="form-control col-6" name="txt_ca1mdr" id="txt_ca1mdr" placeholder='Calle Principal' maxlength="50" onkeydown="return evitarEnter(event);">
                    <label class="col-6"><b>Calle Secundaria</b></label>
                    <input type="text" class="form-control col-6" name="txt_ca2mdr" id="txt_ca2mdr" placeholder='Calle Secundaria' maxlength="50" onkeydown="return evitarEnter(event);">
                    <label class="col-6"><b>No. de Casa</b></label>
                    <input type="text" class="form-control col-6" name="txt_ncamdr" id="txt_ncamdr" placeholder='No. de casa' maxlength="10" onkeydown="return evitarEnter(event);">
                    <label class="col-6"><b>Barrio</b></label>
                    <input type="text" class="form-control col-6" name="txt_barmdr" id="txt_barmdr" placeholder='Barrio' maxlength="50" onkeydown="return evitarEnter(event);">
                    <label class="col-6"><b>Teléfono</b></label>
                    <input type="text" class="form-control col-6" name="txt_telmdr" id="txt_alu_telmdr" placeholder='Teléfonos' maxlength="10" onkeydown="return evitarEnter(event);">
                    <label class="col-6"><b>Correo electrónico</b></label>
                    <input type="text" class="form-control col-6" name="txt_emamdr" id="txt_emamdr" placeholder='Dirección de Correo Elécronico' onblur="validarCorreo()" maxlength="50" onkeydown="return evitarEnter(event);">
                    <span id="mensaje" style="margin-left: 10px;"></span>
                    <label class="col-6"><b>Profesión</b></label>
                    <input type="text" class="form-control col-6" name="txt_promdr" id="txt_promdr" placeholder='Profesión' maxlength="20" onkeydown="return evitarEnter(event);">
                    <label  for="txt_ecimdr"><b>Nivel de educación</b></label><br>
                     <select name="txt_nedmdr" id="txt_nedmdr">
                        <option value='Ninguno' >Ninguno</option>
                        <option value='Primer Nivel' >Primer nivel</option>
                        <option value='EGB'>EGB</option>
                        <option value='EGBS'>EGBS</option>
                        <option value='Bachillerato' selected>Bachillerato</option>
                        <option value='Superior'>Superior</option>
                        <option value='Tercer Nivel' >Tercer Nivel</option>
                        <option value='Cuarto Nivel' >Cuarto Nivel</option>
                        <option value='PhD' >PhD</option>

                     </select>  
                    <br>       
                    <label class="col-6"><b>En que trabaja</b></label>
                    <input type="text" class="form-control col-6" name="txt_tramdr" id="txt_alu_tramdr" placeholder='En que trabaja la madre' maxlength="50" onkeydown="return evitarEnter(event);">
                    <label class="col-6"><b>Lugar de trabajo</b></label>
                    <input type="text" class="form-control col-6" name="txt_lutmdr" id="txt_lutmdr" placeholder='Lugar de trabajo madre' onblur="validarCorreo()" maxlength="50" onkeydown="return evitarEnter(event);">
                    <span id="mensaje" style="margin-left: 10px;"></span>


                </div>
                <div class="col-6 p-2">
                    <h6 class="text-primary col-12 text-center"><b>DATOS DEL PADRE</b></h6> 
                    <label class="col-6"><b>Cédula</b></label>
                    <input type="number" class="form-control col-6" name="txt_cedpdr" id="txt_cedpdr" placeholder='Cédula' maxlength="16" onkeydown="return evitarEnter(event);">
                    <label class="col-6"><b>Nacionalidad</b></label>
                    <input type="text" class="form-control col-6" name="txt_nacpdr" id="txt_nacpdr" placeholder='Nacionalidad' maxlength="15" onkeydown="return evitarEnter(event);">   
                    <label class="col-6"><b>Apellidos y Nombres</b></label>
                    <input type="text" class="form-control col-6" name="txt_nompdr" id="txt_nompdr" placeholder='Apellidos y Nombres' maxlength="80" onkeydown="return evitarEnter(event);">
                    <label for="txtalu_fnpdr" ><b>Fecha/nacimiento</b></label><br>
                    <input type="date" name="txt_fnpdr" id="txt_fnpdr"  ><br>             
                    <label for="txt_ecipdr"><b>Estado Civil:</b></label><br>
                     <select name="txt_ecipdr" id="txt_ecipdr">
                        <option value=1 >Casada</option>
                        <option value=2  selected>Soltera</option>
                        <option value=3 >Divorciada</option>
                        <option value=4 >Viuda</option>
                        <option value=5 >Unión Libre</option>
                     </select>  
                    <br>             

                    <label class="col-6"><b>Dirección Domiciliaria</b></label>
                    <input type="text" class="form-control col-6" name="txt_dirpdr" id="txt_dirpdr" placeholder='Dirección' maxlength="40" onkeydown="return evitarEnter(event);">
                    <label class="col-6"><b>Parroquia</b></label>
                    <input type="text" class="form-control col-6" name="txt_parpdr" id="txt_parpdr" placeholder='Parroquia' maxlength="50" onkeydown="return evitarEnter(event);">
                    <label class="col-6"><b>Provincia</b></label>
                    <input type="text" class="form-control col-6" name="txt_prvpdr" id="txt_prvpdr" placeholder='Provincia' maxlength="50" onkeydown="return evitarEnter(event);">
                    <label class="col-6"><b>Cantón</b></label>
                    <input type="text" class="form-control col-6" name="txt_canpdr" id="txt_canpdr" placeholder='Cantón' maxlength="50" onkeydown="return evitarEnter(event);">
                    <label class="col-6"><b>Calle Principal</b></label>
                    <input type="text" class="form-control col-6" name="txt_ca1pdr" id="txt_ca1pdr" placeholder='Calle Principal' maxlength="50" onkeydown="return evitarEnter(event);">
                    <label class="col-6"><b>Calle Secundaria</b></label>
                    <input type="text" class="form-control col-6" name="txt_ca2pdr" id="txt_ca2pdr" placeholder='Calle Secundaria' maxlength="50" onkeydown="return evitarEnter(event);">
                    <label class="col-6"><b>No. de Casa</b></label>
                    <input type="text" class="form-control col-6" name="txt_ncapdr" id="txt_ncapdr" placeholder='No. de casa' maxlength="10" onkeydown="return evitarEnter(event);">
                    <label class="col-6"><b>Barrio</b></label>
                    <input type="text" class="form-control col-6" name="txt_barpdr" id="txt_barpdr" placeholder='Barrio' maxlength="50" onkeydown="return evitarEnter(event);">
                    <label class="col-6"><b>Teléfonos</b></label>
                    <input type="text" class="form-control col-6" name="txt_telpdr" id="txt_telpdr" placeholder='Teléfonos' maxlength="10" onkeydown="return evitarEnter(event);">
                    <label class="col-6"><b>Correo electrónico</b></label>
                    <input type="text" class="form-control col-6" name="txt_emapdr" id="txt_emapdr" placeholder='Correo Elécronico' onblur="validarCorreo()" maxlength="50" onkeydown="return evitarEnter(event);">
                    <span id="mensaje" style="margin-left: 10px;"></span>


                    <label class="col-6"><b>Profesión</b></label>
                    <input type="text" class="form-control col-6" name="txt_propdr" id="txt_propdr" placeholder='Profesión' maxlength="20" onkeydown="return evitarEnter(event);">
                    <label  for="txt_ecipdr"><b>Nivel de educación</b></label><br>
                    <select name="txt_nedpdr" id="txt_nedpdr">
                        <option value='Ninguno' >Ninguno</option>
                        <option value='Primer Nivel' >Primer nivel</option>
                        <option value='EGB'>EGB</option>
                        <option value='EGBS'>EGBS</option>
                        <option value='Bachillerato' selected>Bachillerato</option>
                        <option value='Superior'>Superior</option>
                        <option value='Tercer Nivel' >Tercer Nivel</option>
                        <option value='Cuarto Nivel' >Cuarto Nivel</option>
                        <option value='PhD' >PhD</option>

                    </select>  
                    <br>       

                    <label class="col-6"><b>En que trabaja</b></label>
                    <input type="text" class="form-control col-6" name="txt_trapdr" id="txt_alu_trapdr" placeholder='En que trabaja en padre' maxlength="50" onkeydown="return evitarEnter(event);">
                    <label class="col-6"><b>Lugar de trabajo</b></label>
                    <input type="text" class="form-control col-6" name="txt_lutpdr" id="txt_lutpdr" placeholder='Lugar de trabajo padre' onblur="validarCorreo()" maxlength="50" onkeydown="return evitarEnter(event);">
                    <span id="mensaje" style="margin-left: 10px;"></span>

                </div>
                
            </div>

        <div class="row">
            <div class="col-6  p-2" style="border: 1px solid #ccc;">
                <div class="row">
                    <div class="col-6  p-2" >
                        <label for="cmb_codrpr"><b>Representante</b></label>
                        <label ><b>Buscar por cédula</b></label>
                        <input type="number" class="form-control col-6" name="txt_cedrpr" id="txt_cedrpr" 
                        placeholder='Cédula' maxlength="16" 
                        onblur="ajax_buscar_repres_cedula(this.value);" onkeydown="return evitarEnter(event);">
                    </div>
                   <div class="col-6  p-2 d-flex align-items-end" >
                        <button type="button" class="btn btn-secondary" onclick="location.href='../../representantes_/vistas/ingresar.php?_identi=2'" >Nuevo</button> <br>
                    </div>
                    <select name="cmb_codrpr" id="cmb_codrpr" ></select><br>
                </div>
                <div class="row">
                    <div class="col-6  p-2" >
                        <label class="col-3"><b>Parentesco</b></label>
                        <input type="text" class="form-control col-6" name="txt_relrpr" id="txt_relrpr" placeholder='Relación con estudiante' maxlength="20" onkeydown="return evitarEnter(event);">
                    </div>
                    <div class="col-6  p-2" >

                    </div>
                </div>

            </div>

            <div class="col-6  p-2" style="border: 1px solid #ccc;">
                    <label class="col-6"><b>Observación</b></label>
                    <input type="text" class="form-control col-6" name="txt_observ" id="txt_observ" placeholder='Observación' maxlength="60" onkeydown="return evitarEnter(event);">

            </div>

            
        </div>   
    </div>
        
        <div class="form-group row">
                    <label class="col-12 text-center">
                    <button type="submit" class="btn btn-success" >Guardar</button>
                    <button type="button" class="btn btn-secondary" onclick="location.href='index.php?page=movimcsn'">Cerrar</button>
                    </label>
        </div>         
         
    </form>

<script>
  // Función para cargar los representantes desde la base de datos
    async function cargarRepresentantes() {
    try {
      const response = await fetch('../../representantes_/php/json_rep_descri.php'); // Ajusta la ruta si es necesario
      const data = await response.json();
      
      const combo = document.getElementById('cmb_codrpr');
      combo.innerHTML = ''; // Limpiar combo

      data.forEach(rep => {
        const option = document.createElement('option');
        option.value = rep.codigook;
        option.textContent = rep.descriok;
        combo.appendChild(option);
      });
    } catch (error) {
      console.error("Error al cargar representantes:", error);
    }
  }

// Esto se ejecuta incluso si vuelves con history.back()
  window.addEventListener('pageshow', () => {
    if (sessionStorage.getItem('recargarCombo') === '2') {
      sessionStorage.removeItem('recargarCombo');
    }
      else {
     
    }
    cargarRepresentantes();
  });
</script>



    <script>
        //Para leer API con Json encode 
        fetch('../../fcursos_/php/js_fcur_descri.php')
        .then(response => response.json())
        .then(data => {
                const combo = document.getElementById('cmb_curso');
                data.forEach(item => {
                    const option = document.createElement('option');
                    option.value = item.codigook;
                    option.text = item.descriok;
                    combo.appendChild(option);
                    });
            })
            .catch(error => console.error('Error al cargar datos:', error));
    </script> 
    
    
    <script>
        const hoy = new Date();
        // Formatearla a YYYY-MM-DD (formato requerido por input type="date")
        const fechaFormateada = hoy.toISOString().split('T')[0];
        const fechaFormateada2 = hoy.toISOString().slice(0, 16);
        // Asignar al input
        document.getElementById('txt_fmatri').value = fechaFormateada;
        document.getElementById('txt_fecing').value = fechaFormateada2;
    </script>


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
        //Verifica que el correo este bien escrito
        function validarCedula() {
            const cedula = document.getElementById("txt_cedula").value;
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
    <script>

        const input = document.getElementById('txt_fotogr');
        const preview = document.getElementById('preview');

        input.addEventListener('change', function () {
        const file = this.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function (e) {
            preview.src = e.target.result;
            preview.style.display = 'block';
        }
            reader.readAsDataURL(file);
        }
        });
    </script>

    <script>
        document.querySelector('form').addEventListener('submit', function (e) {
        const archivot = document.querySelector('input[type="file"]').files[0];
        if (archivot && archivot.size > 200 * 1024) {
            alert("El archivo excede los 200 KB permitidos.");
            e.preventDefault(); // Evita que se envíe el formulario
        }
        });
    </script>

</body>
</html>