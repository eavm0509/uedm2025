<?php
include '../../../login/verificar_sesion3n_mixto.php';
require_once('../php/modelo.php');
$obj= new clase_estudiantes();
$row=$obj->_consultarcodigo($_GET['valor']);
$fila=$row->fetch();
?>
<!doctype html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Actualización de datos de estudiante</title>
        <link href="../../../Libs/bootstrap-5.3.0/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
        <script src="../../../Libs/bootstrap-5.3.0/js/bootstrap.min.js" crossorigin="anonymous"></script>
        <script src="../../../Libs/jquery.min.js"></script>
        <script src="../../../Libs/ajax.js"></script>
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
    
    <form action="../php/actualizar_estudiantes.php" method="POST" enctype="multipart/form-data">
        <input type="text" hidden id="txt_codigo" name="txt_codigo" value=<?php echo $fila['ALU_NMATRI'];?>> 
        <div class="form-group row">
            <h3 class="text-primary col-12 text-center">Actualizar Estudiante</h3>
        </div>

        <div class="container alert alert-info" >
            <div class="row"  >
                <div class="col-3  p-4" style="border: 2px solid #ccc;">
                                <!--<label for="txt_fecing" ><b>F/Ingreso:</b></label><br>
                                <input type="datetime-local" name="txt_fecing" id="txt_fecing"  
                                value="<?//php echo $fila['ALU_FECING'];?>" readonly></td><br>-->

                                <?php
                                    $fechaOriginal = $fila['ALU_FECING'];
                                    $fechaValida = ($fechaOriginal != '0000-00-00' && !empty($fechaOriginal)) ? date('Y-m-d\TH:i', strtotime($fechaOriginal)) : '';
                                ?>
                                <label for="txt_fecing"><b>F/Ingreso:</b></label><br>
                                <input type="datetime-local" name="txt_fecing" id="txt_fecing" value="<?php echo $fechaValida; ?>" readonly><br>





                                <label for="txt_fmatri" ><b>F/Matrícula:</b></label><br>
                                <input type="date" name="txt_fmatri" id="txt_fmatri"  
                                value="<?php echo $fila['ALU_FMATRI'];?>"></td><br>
                                
                                <div class="form-group row align-items-center">
                                    <label for="txt_matric" class="col-sm-6 col-form-label"><b># Matrícula</b></label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" name="txt_matric" id="txt_matric" 
                                        placeholder="Matrícula" maxlength="16" 
                                        value="<?php echo $fila['ALU_MATRIC'];?>" onkeydown="return evitarEnter(event);">
                                    </div>
                                </div>

                                <div class="form-group row align-items-center">
                                    <label for="txt_nfolio" class="col-sm-6 col-form-label"><b>Folio</b></label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" name="txt_nfolio" id="txt_nfolio" 
                                        placeholder="Folio" maxlength="15" 
                                        value="<?php echo $fila['ALU_NFOLIO'];?>"onkeydown="return evitarEnter(event);">
                                    </div>
                                </div>
                                                                
                </div>   
                <div class="col-3 p-4" style="border: 2px solid #ccc;">
                           
                    

                    <?php
                    $fechaNacimiento = $fila['ALU_FNACER'];
                    $valorFecha = ($fechaNacimiento != '0000-00-00' && !empty($fechaNacimiento)) ? date('Y-m-d', strtotime($fechaNacimiento)) : '';
                    ?>
                    <label for="txt_fnacer"><b>Fecha/nacimiento</b></label><br>
                    <input type="date" name="txt_fnacer" id="txt_fnacer" value="<?php echo $valorFecha; ?>"><br>




                    <label for="cmb_curso"><b>Año o curso:</b></label><br>
                    <select name="cmb_curso" id="cmb_curso" required></select><br>
                    
                    <label for="txt_estciv"><b>Estado Civil:</b></label><br>
                    <select name="txt_estciv" id="txt_estciv">
                        <option value=1 <?= ($fila['ALU_ESTCIV'] == 1) ? 'selected' : '' ?>>Casado/a</option>
                        <option value=2 <?= ($fila['ALU_ESTCIV'] == 2) ? 'selected' : '' ?>>Soltero/a</option>
                        <option value=3 <?= ($fila['ALU_ESTCIV'] == 3) ? 'selected' : '' ?>>Divorciado/a</option>
                        <option value=4 <?= ($fila['ALU_ESTCIV'] == 4) ? 'selected' : '' ?>>Viudo/a</option>
                        <option value=5 <?= ($fila['ALU_ESTCIV'] == 5) ? 'selected' : '' ?>>Unión Libre</option>
                     </select>  

                     <br>             
                     <label><b>Sexo:</b></label><br>
                     <input type="radio"  name="rad_sexo" id="rad_sexo" value=1 <?= ($fila['ALU_SEXO'] == 1) ? 'checked' : '' ?> >
                     <label for="masculino">Masculino</label><br>
                     <input type="radio"  name="rad_sexo" id="rad_sexo" value=2 <?= ($fila['ALU_SEXO'] == 2) ? 'cheCked' : '' ?>>
                     <label for="femenino">Femenino</label>
                </div>    

                <div class="col-3  p-4" style="border: 2px solid #ccc;">
                    <label><b>Tipo matrícula</b></label><br>
                    <input type="radio"  name="rad_tipo" id="rad_normal" value=1 <?= ($fila['ALU_TIPO'] == 1) ? 'cheCked' : '' ?>>
                    <label>Nomal</label><br>
                    <input type="radio"  name="rad_tipo" id="rad_condicional" value=2 <?= ($fila['ALU_TIPO'] == 2) ? 'cheCked' : '' ?>>
                    <label>Condicional</label> <br>

                    <input type="hidden" name="chk_ordina" value=0>
                    <input type="checkbox" name="chk_ordina" id="chk_ordina" 
                    value=1 <?= ($fila['ALU_ORDINA'] == 1) ? 'cheCked' : '' ?>> 
                    <label><b>Matrícula Ordinaria</b></label><br>
                   
                    <input type="hidden" name="chk_nuevo" value=0>
                    <input type="checkbox" name="chk_nuevo" id="chk_nuevo" 
                    value=1 <?= ($fila['ALU_NUEVO'] == 1) ? 'checked' : '' ?> >
                    <label><b>Nuevo estudiante</b></label><br>
                   
                    <input type="hidden" name="chk_repite" value=0>
                    <input type="checkbox" name="chk_repite" id="chk_repite" 
                    value=1 <?= ($fila['ALU_REPITE'] == 1) ? 'cheCked' : '' ?>> 
                    <label><b>Repetidor de año</b></label><br>

                    <input type="hidden" name="chk_retirado" value=0>
                    <input type="checkbox" name="chk_retirado" id="chk_retirado" 
                    value=1 <?= ($fila['ALU_RETIRADO'] == 1) ? 'cheCked' : '' ?>> 
                    <label><b>Estudiante Retirado</b></label><br>

                    <label for="txt_fecret" ><b>F/Retiro:</b></label><br>
                    <input type="date" name="txt_fecret" id="txt_fecret"  ></td><br>

                </div>  
                  
                <div class="col-3  p-4" style="border: 2px solid #ccc;">
                            <!--//Cargo fotografia-->
                           <?php
                                $foto = $fila['ALU_FOTOGR'] ?? '';
                                $ruta_imagen2 = !empty($foto) ? htmlspecialchars($foto) : '';
                                // Mostrar solo el nombre del archivo (sin ruta)
                                 $nombre_archivo = basename($foto);
                            ?>
                            <div class="recuadro-fijo border rounded shadow mx-auto">
                                <img id="preview" src="<?php echo $ruta_imagen2; ?>" class="img-fluid" style="max-height: 250px;">
                            </div>
                            <input type='text' name='txt_imagen' id='txt_imagen' hidden value="<?php echo $fila['ALU_FOTOGR'];?>" >
                            <!-- <?php //if (!empty($nombre_archivo)) : ?>
                                <p class="text-center text-muted">Archivo actual: <strong><?php //echo $nombre_archivo; ?></strong></p>
                            <?php // endif; ?> -->
                            <label class="btn btn-success" for="txt_fotogr">📁 Foto</label>
                            <input type="file" name="txt_fotogr" id="txt_fotogr" accept="image/*">

                </div>
                        
            </div>
        </div>

        <div class="container alert alert-info" >
            <div class="row">
                <div class="col-4 p-3" style="border: 1px solid #ccc;">
                    <label ><b>Cédula</b></label>
                    <input type="number" class="form-control col-4" name="txt_cedula" id="txt_cedula" 
                    value="<?php echo $fila['ALU_CEDULA'];?>"
                    placeholder='Cédula' maxlength="16" required onblur="ajax_buscar_cedula(this.value);" onkeydown="return evitarEnter(event);">
                    <label ><b>Nacionalidad</b></label>
                    <input type="text" class="form-control col-4" name="txt_nacion" id="txt_nacion" 
                           placeholder='Nacionalidad' maxlength="15" 
                           oninput="this.value = this.value.toUpperCase();"
                           onkeydown="return evitarEnter(event);"
                           value="<?php echo $fila['ALU_NACION'];?>">   
                    <label ><b>Apellidos y Nombres</b></label>
                    <input type="text" class="form-control col-4" name="txt_nombre" id="txt_nombre" 
                           placeholder='Apellidos y Nombres' maxlength="80" required 
                           onkeydown="return evitarEnter(event);"
                           oninput="this.value = this.value.toUpperCase();"
                           value="<?php echo $fila['ALU_NOMBRE'];?>">
                    <label ><b>Lugar de Nacimiento</b></label>
                    <input type="text" class="form-control col-4" name="txt_lnacer" id="txt_lnacer"
                    placeholder='Dirección' maxlength="100" onkeydown="return evitarEnter(event);"
                    value="<?php echo $fila['ALU_LNACER'];?>">                   
                    <label ><b>Dirección Domiciliaria</b></label>
                    <input type="text" class="form-control col-4" name="txt_diredo" id="txt_diredo" 
                    placeholder='Dirección' maxlength="100" onkeydown="return evitarEnter(event);"
                    value="<?php echo $fila['ALU_DIREDO'];?>">
                    <label ><b>Teléfonos domiciliario</b></label>
                    <input type="text" class="form-control col-4" name="txt_teledo" id="txt_teledo" 
                    placeholder='Teléfonos' maxlength="25" onkeydown="return evitarEnter(event);"
                    value="<?php echo $fila['ALU_TELEDO'];?>">
                </div>

                <div class="col-4  p-3" style="border: 1px solid #ccc;">
                    <label ><b>Teléfono de estudiante</b></label>
                    <input type="text" class="form-control col-4" name="txt_telest" id="txt_telest" 
                    placeholder='Teléfono de estudiante' maxlength="10" onkeydown="return evitarEnter(event);"
                    value="<?php echo $fila['ALU_TELEST'];?>">
                    <label ><b>Correo electrónico</b></label>
                    <input type="text" class="form-control col-4" name="txt_emaest" id="txt_emaest" 
                    placeholder='Correo Elécronico' onblur="validarCorreo()" maxlength="50" onkeydown="return evitarEnter(event);"
                    value="<?php echo $fila['ALU_EMAEST'];?>">
                    <span id="mensaje" style="margin-left: 10px;"></span>
                    <label ><b>Discapacidad</b></label>
                    <input type="text" class="form-control col-4" name="txt_discap" id="txt_discap" 
                    placeholder='Discapacidad' maxlength="100" onkeydown="return evitarEnter(event);"
                    value="<?php echo $fila['ALU_DISCAP'];?>">
                    <label ><b>No. de Carnet</b></label>
                    <input type="text" class="form-control col-4" name="txt_ncadis" id="txt_ncadis" 
                    placeholder='No. de carnet Discapacidad' maxlength="50" onkeydown="return evitarEnter(event);"
                    value="<?php echo $fila['ALU_NCADIS'];?>">
                    <label ><b>Enfermedad</b></label>
                    <input type="text" class="form-control col-4" name="txt_enferm" id="txt_enferm" 
                    placeholder='Enfermedad' maxlength="100" onkeydown="return evitarEnter(event);"
                    value="<?php echo $fila['ALU_ENFERM'];?>">

                    <label for="txt_defetn"><b>Etnia</b></label><br>
                     <select name="txt_defetn" id="txt_defetn">
                        <option value= 'Mestiza' <?= ($fila['ALU_DEFETN'] == 'Mestiza') ? 'selected' : '' ?>>Mestizo/a</option>
                        <option value='Montubia' <?= ($fila['ALU_DEFETN'] == 'Montubia') ? 'selected' : '' ?>>Montubio/a</option>
                        <option value='Afroecuatoriana' <?= ($fila['ALU_DEFETN'] == 'Afroecuatoriana') ? 'selected' : '' ?>>Afroecuatoriano/a</option>
                        <option value='Indígena' <?= ($fila['ALU_DEFETN'] == 'Indígena') ? 'selected' : '' ?>>Indigena</option>
                        <option value='Blanca' <?= ($fila['ALU_DEFETN'] == 'Blanca') ? 'selected' : '' ?>>Blanco/a</option>
                        <option value='Otra' <?= ($fila['ALU_DEFETN'] == 'Otra') ? 'selected' : '' ?>>Otro</option>
                     </select>

                </div>

                <div class="col-4  p-3" style="border: 1px solid #ccc;">
                    <label ><b>Institución Procedencia </b></label>
                    <input type="text" class="form-control col-4" name="txt_colevi" id="txt_colevi" 
                    placeholder='Institución Procedencia'  maxlength="30" onkeydown="return evitarEnter(event);"
                    value="<?php echo $fila['ALU_COLEVI'];?>">
                    <label ><b>Dirección Institución Procedencia </b></label>
                    <input type="text" class="form-control col-4" name="txt_dicovi" id="txt_dicovi" 
                    placeholder='Institución Procedencia'  maxlength="50" onkeydown="return evitarEnter(event);"
                    value="<?php echo $fila['ALU_DICOVI'];?>">
                    <label ><b>Año lectivo anterior</b></label>
                    <input type="text" class="form-control col-4" name="txt_anoant" id="txt_anoant" 
                    placeholder='Por ejemplo: año 2020-2021'  maxlength="15" onkeydown="return evitarEnter(event);"
                    value="<?php echo $fila['ALU_ANOANT'];?>">
                    <label ><b>Año anterior</b></label>
                    <input type="text" class="form-control col-4" name="txt_curant" id="txt_curant" 
                    placeholder='Curso, grado o año anterior'  maxlength="20" onkeydown="return evitarEnter(event);"
                    value="<?php echo $fila['ALU_CURANT'];?>">
                    <label ><b>Disciplina</b></label>
                    <input type="text" class="form-control col-4" name="txt_notdis" id="txt_notdis" 
                    placeholder='Calficación de comportamiento'  maxlength="5" onkeydown="return evitarEnter(event);"
                    value="<?php echo $fila['ALU_NOTDIS'];?>">
                    <label ><b>Aprovechamiento</b></label>
                    <input type="text" class="form-control col-4" name="txt_notapr" id="txt_notapr" 
                    placeholder='Calficación de aprovechamiento'  maxlength="5" onkeydown="return evitarEnter(event);"
                    value="<?php echo $fila['ALU_NOTAPR'];?>">
                </div>   
            </div>


            <div class="row">
                <div class="col-6 p-2">
                    <h6 class="text-primary col-12 text-center"><b>DATOS DE LA MADRE</b></h6> 
                    <label class="col-6"><b>Cédula</b></label>
                    <input type="number" class="form-control col-6" name="txt_cedmdr" id="txt_cedmdr" 
                    placeholder='Cédula' maxlength="16" onkeydown="return evitarEnter(event);"
                    value="<?php echo $fila['ALU_CEDMDR'];?>">
                    <label class="col-6"><b>Nacionalidad</b></label>
                    <input type="text" class="form-control col-6" name="txt_nacmdr" id="txt_nacmdr" 
                    placeholder='Nacionalidad' maxlength="15" onkeydown="return evitarEnter(event);"
                    value="<?php echo $fila['ALU_NACMDR'];?>">   
                    <label class="col-6"><b>Apellidos y Nombres</b></label>
                    <input type="text" class="form-control col-6" name="txt_nommdr" id="txt_nommdr" 
                    placeholder='Apellidos y Nombres' maxlength="80" onkeydown="return evitarEnter(event);"
                    value="<?php echo $fila['ALU_NOMMDR'];?>">
                    <label for="txtalu_fnmdr" ><b>Fecha/nacimiento</b></label><br>
                    <input type="date" name="txt_fnmdr" id="txt_fnmdr"  
                    value="<?php echo $fila['ALU_FNMDR'];?>"><br>             

                    <label for="txt_ecimdr"><b>Estado Civil:</b></label><br>
                    <select name="txt_ecimdr" id="txt_ecimdr">
                        <option value='Casada' <?= ($fila['ALU_ECIMDR'] == 'Casada') ? 'selected' : '' ?>>Casada</option>
                        <option value='Soltera' <?= ($fila['ALU_ECIMDR'] == 'Soltera') ? 'selected' : '' ?>>Soltera</option>
                        <option value='Divorciada' <?= ($fila['ALU_ECIMDR'] == 'Divorciada') ? 'selected' : '' ?>>Divorciada</option>
                        <option value='Viuda' <?= ($fila['ALU_ECIMDR'] == 'Viuda') ? 'selected' : '' ?>>Viuda</option>
                        <option value='Unión Libre' <?= ($fila['ALU_ECIMDR'] == 'Unión Libre') ? 'selected' : '' ?>>Unión Libre</option>
                     </select> 
                    <br>             

                    <label class="col-6"><b>Dirección Domiciliaria</b></label>
                    <input type="text" class="form-control col-6" name="txt_dirmdr" id="txt_dirmdr" 
                    placeholder='Dirección' maxlength="40" onkeydown="return evitarEnter(event);"
                    value="<?php echo $fila['ALU_DIRMDR'];?>">
                    <label class="col-6"><b>Parroquia</b></label>
                    <input type="text" class="form-control col-6" name="txt_parmdr" id="txt_parmdr" 
                    placeholder='Parroquia' maxlength="50" onkeydown="return evitarEnter(event);"
                    value="<?php echo $fila['ALU_PARMDR'];?>">
                    <label class="col-6"><b>Provincia</b></label>
                    <input type="text" class="form-control col-6" name="txt_prvmdr" id="txt_prvmdr" 
                    placeholder='Provincia' maxlength="50" onkeydown="return evitarEnter(event);"
                    value="<?php echo $fila['ALU_PRVMDR'];?>">
                    <label class="col-6"><b>Cantón</b></label>
                    <input type="text" class="form-control col-6" name="txt_canmdr" id="txt_canmdr" 
                    placeholder='Cantón' maxlength="50" onkeydown="return evitarEnter(event);"
                    value="<?php echo $fila['ALU_CANMDR'];?>">
                    <label class="col-6"><b>Calle Principal</b></label>
                    <input type="text" class="form-control col-6" name="txt_ca1mdr" id="txt_ca1mdr" 
                    placeholder='Calle Principal' maxlength="50" onkeydown="return evitarEnter(event);"
                    value="<?php echo $fila['ALU_CA1MDR'];?>">
                    <label class="col-6"><b>Calle Secundaria</b></label>
                    <input type="text" class="form-control col-6" name="txt_ca2mdr" id="txt_ca2mdr" 
                    placeholder='Calle Secundaria' maxlength="50" onkeydown="return evitarEnter(event);"
                    value="<?php echo $fila['ALU_CA2MDR'];?>">
                    <label class="col-6"><b>No. de Casa</b></label>
                    <input type="text" class="form-control col-6" name="txt_ncamdr" id="txt_ncamdr" 
                    placeholder='No. de casa' maxlength="10" onkeydown="return evitarEnter(event);"
                    value="<?php echo $fila['ALU_NCAMDR'];?>">
                    <label class="col-6"><b>Barrio</b></label>
                    <input type="text" class="form-control col-6" name="txt_barmdr" id="txt_barmdr" 
                    placeholder='Barrio' maxlength="50" onkeydown="return evitarEnter(event);"
                    value="<?php echo $fila['ALU_BARMDR'];?>">
                    <label class="col-6"><b>Teléfono</b></label>
                    <input type="text" class="form-control col-6" name="txt_telmdr" id="txt_telmdr" 
                    placeholder='Teléfonos' maxlength="10" onkeydown="return evitarEnter(event);"
                    value="<?php echo $fila['ALU_TELMDR'];?>">
                    <label class="col-6"><b>Correo electrónico</b></label>
                    <input type="text" class="form-control col-6" name="txt_emamdr" id="txt_emamdr" 
                    placeholder='Dirección de Correo Elécronico' onblur="validarCorreo()" maxlength="50" onkeydown="return evitarEnter(event);"
                    value="<?php echo $fila['ALU_EMAMDR'];?>">
                    <span id="mensaje" style="margin-left: 10px;"></span>
                    <label class="col-6"><b>Profesión</b></label>
                    <input type="text" class="form-control col-6" name="txt_promdr" id="txt_promdr" 
                    placeholder='Profesión' maxlength="20" onkeydown="return evitarEnter(event);"
                    value="<?php echo $fila['ALU_PROMDR'];?>">
                    <label  for="txt_nedmdr"><b>Nivel de educación</b></label><br>
                    <select name="txt_nedmdr" id="txt_nedmdr">
                        <option value='Ninguno'       <?= ($fila['ALU_NEDMDR'] == 'Ninguno') ? 'selected' : '' ?>>Ninguno</option>
                        <option value='Primer Nivel' <?= ($fila['ALU_NEDMDR'] == 'Primer Nivel') ? 'selected' : '' ?>>Primer Nivel</option>
                        <option value='EGB'           <?= ($fila['ALU_NEDMDR'] == 'EGB') ? 'selected' : '' ?>>EGB</option>
                        <option value='EGBS'          <?= ($fila['ALU_NEDMDR'] == 'EGBS') ? 'selected' : '' ?>>EGBS</option>
                        <option value='Bachillerato'  <?= ($fila['ALU_NEDMDR'] == 'Bachillerato') ? 'selected' : '' ?>>Bachillerato</option>
                        <option value='Superior'      <?= ($fila['ALU_NEDMDR'] == 'Superior') ? 'selected' : '' ?>>Superior</option>
                        <option value='Tercer Nivel'  <?= ($fila['ALU_NEDMDR'] == 'Tercer Nivel') ? 'selected' : '' ?>>Tercer Nivel</option>
                        <option value='Cuarto Nivel'  <?= ($fila['ALU_NEDMDR'] == 'Cuarto Nivel') ? 'selected' : '' ?>>Cuarto Nivel</option>
                        <option value='PhD'           <?= ($fila['ALU_NEDMDR'] == 'PhD') ? 'selected' : '' ?>>PhD</option>
                    </select>

                    <br>       
                    <label class="col-6"><b>En que trabaja</b></label>
                    <input type="text" class="form-control col-6" name="txt_tramdr" id="txt_alu_tramdr" 
                    placeholder='En que trabaja la madre' maxlength="50" onkeydown="return evitarEnter(event);"
                    value="<?php echo $fila['ALU_TRAMDR'];?>">
                    <label class="col-6"><b>Lugar de trabajo</b></label>
                    <input type="text" class="form-control col-6" name="txt_lutmdr" id="txt_lutmdr" 
                    placeholder='Lugar de trabajo madre' onblur="validarCorreo()" maxlength="50" onkeydown="return evitarEnter(event);"
                    value="<?php echo $fila['ALU_LUTMDR'];?>">
                    <span id="mensaje" style="margin-left: 10px;"></span>


                </div>
                <div class="col-6 p-2">
                    <h6 class="text-primary col-12 text-center"><b>DATOS DEL PADRE</b></h6> 
                    <label class="col-6"><b>Cédula</b></label>
                    <input type="number" class="form-control col-6" name="txt_cedpdr" id="txt_cedpdr" 
                    placeholder='Cédula' maxlength="16" onkeydown="return evitarEnter(event);" 
                    value="<?php echo $fila['ALU_CEDPDR'];?>">
                    <label class="col-6"><b>Nacionalidad</b></label>
                    <input type="text" class="form-control col-6" name="txt_nacpdr" id="txt_nacpdr" 
                    placeholder='Nacionalidad' maxlength="15" onkeydown="return evitarEnter(event);"
                    value="<?php echo $fila['ALU_NACPDR'];?>">   
                    <label class="col-6"><b>Apellidos y Nombres</b></label>
                    <input type="text" class="form-control col-6" name="txt_nompdr" id="txt_nompdr" 
                    placeholder='Apellidos y Nombres' maxlength="80" onkeydown="return evitarEnter(event);"
                    value="<?php echo $fila['ALU_NOMPDR'];?>">
                    <label for="txtalu_fnpdr" ><b>Fecha/nacimiento</b></label><br>
                    <input type="date" name="txt_fnpdr" id="txt_fnpdr"  
                    value="<?php echo $fila['ALU_FNPDR'];?>"><br>             
                    <label for="txt_ecipdr"><b>Estado Civil:</b></label><br>
                     <select name="txt_ecipdr" id="txt_ecipdr">
                        <option value='Casado'       <?= ($fila['ALU_ECIPDR'] == 'Casado') ? 'selected' : '' ?>>Casado</option>
                        <option value='Soltero'      <?= ($fila['ALU_ECIPDR'] == 'Soltero') ? 'selected' : '' ?>>Soltero</option>
                        <option value='Divorciado'   <?= ($fila['ALU_ECIPDR'] == 'Divorciado') ? 'selected' : '' ?>>Divorciado</option>
                        <option value='Viudo'        <?= ($fila['ALU_ECIPDR'] == 'Viudo') ? 'selected' : '' ?>>Viudo</option>
                        <option value='Unión Libre'  <?= ($fila['ALU_ECIPDR'] == 'Unión Libre') ? 'selected' : '' ?>>Unión Libre</option>
                    </select>

                    <br>             

                    <label class="col-6"><b>Dirección Domiciliaria</b></label>
                    <input type="text" class="form-control col-6" name="txt_dirpdr" id="txt_dirpdr" 
                    placeholder='Dirección' maxlength="40" onkeydown="return evitarEnter(event);"
                    value="<?php echo $fila['ALU_DIRPDR'];?>">
                    <label class="col-6"><b>Parroquia</b></label>
                    <input type="text" class="form-control col-6" name="txt_parpdr" id="txt_parpdr" 
                    placeholder='Parroquia' maxlength="50" onkeydown="return evitarEnter(event);"
                    value="<?php echo $fila['ALU_PARPDR'];?>">
                    <label class="col-6"><b>Provincia</b></label>
                    <input type="text" class="form-control col-6" name="txt_prvpdr" id="txt_prvpdr" 
                    placeholder='Provincia' maxlength="50" onkeydown="return evitarEnter(event);"
                    value="<?php echo $fila['ALU_PRVPDR'];?>">
                    <label class="col-6"><b>Cantón</b></label>
                    <input type="text" class="form-control col-6" name="txt_canpdr" id="txt_canpdr" 
                    placeholder='Cantón' maxlength="50" onkeydown="return evitarEnter(event);"
                    value="<?php echo $fila['ALU_CANPDR'];?>">
                    <label class="col-6"><b>Calle Principal</b></label>
                    <input type="text" class="form-control col-6" name="txt_ca1pdr" id="txt_ca1pdr" 
                    placeholder='Calle Principal' maxlength="50" onkeydown="return evitarEnter(event);"
                    value="<?php echo $fila['ALU_CA1PDR'];?>">
                    <label class="col-6"><b>Calle Secundaria</b></label>
                    <input type="text" class="form-control col-6" name="txt_ca2pdr" id="txt_ca2pdr" 
                    placeholder='Calle Secundaria' maxlength="50" onkeydown="return evitarEnter(event);"
                    value="<?php echo $fila['ALU_CA2PDR'];?>">
                    <label class="col-6"><b>No. de Casa</b></label>
                    <input type="text" class="form-control col-6" name="txt_ncapdr" id="txt_ncapdr" 
                    placeholder='No. de casa' maxlength="10" onkeydown="return evitarEnter(event);"
                    value="<?php echo $fila['ALU_NCAPDR'];?>">
                    <label class="col-6"><b>Barrio</b></label>
                    <input type="text" class="form-control col-6" name="txt_barpdr" id="txt_barpdr" 
                    placeholder='Barrio' maxlength="50" onkeydown="return evitarEnter(event);"
                    value="<?php echo $fila['ALU_BARPDR'];?>">
                    <label class="col-6"><b>Teléfonos</b></label>
                    <input type="text" class="form-control col-6" name="txt_telpdr" id="txt_telpdr" 
                    placeholder='Teléfonos' maxlength="10" onkeydown="return evitarEnter(event);"
                    value="<?php echo $fila['ALU_TELPDR'];?>">
                    <label class="col-6"><b>Correo electrónico</b></label>
                    <input type="text" class="form-control col-6" name="txt_emapdr" id="txt_emapdr" 
                    placeholder='Correo Elécronico' onblur="validarCorreo()" maxlength="50" onkeydown="return evitarEnter(event);"
                    value="<?php echo $fila['ALU_EMAPDR'];?>">
                    <span id="mensaje" style="margin-left: 10px;"></span>


                    <label class="col-6"><b>Profesión</b></label>
                    <input type="text" class="form-control col-6" name="txt_propdr" id="txt_propdr" 
                    placeholder='Profesión' maxlength="20" onkeydown="return evitarEnter(event);"
                    value="<?php echo $fila['ALU_PROPDR'];?>">
                    <label  for="txt_ecipdr"><b>Nivel de educación</b></label><br>
                    <select name="txt_nedpdr" id="txt_nedpdr">
                        <option value='Ninguno'        <?= ($fila['ALU_NEDPDR'] == 'Ninguno') ? 'selected' : '' ?>>Ninguno</option>
                        <option value='Primer Nivel'   <?= ($fila['ALU_NEDPDR'] == 'Primer Nivel') ? 'selected' : '' ?>>Primer Nivel</option>
                        <option value='EGB'            <?= ($fila['ALU_NEDPDR'] == 'EGB') ? 'selected' : '' ?>>EGB</option>
                        <option value='EGBS'           <?= ($fila['ALU_NEDPDR'] == 'EGBS') ? 'selected' : '' ?>>EGBS</option>
                        <option value='Bachillerato'   <?= ($fila['ALU_NEDPDR'] == 'Bachillerato') ? 'selected' : '' ?>>Bachillerato</option>
                        <option value='Superior'       <?= ($fila['ALU_NEDPDR'] == 'Superior') ? 'selected' : '' ?>>Superior</option>
                        <option value='Tercer Nivel'   <?= ($fila['ALU_NEDPDR'] == 'Tercer Nivel') ? 'selected' : '' ?>>Tercer Nivel</option>
                        <option value='Cuarto Nivel'   <?= ($fila['ALU_NEDPDR'] == 'Cuarto Nivel') ? 'selected' : '' ?>>Cuarto Nivel</option>
                        <option value='PhD'            <?= ($fila['ALU_NEDPDR'] == 'PhD') ? 'selected' : '' ?>>PhD</option>
                    </select>
  
                    <br>       

                    <label class="col-6"><b>En que trabaja</b></label>
                    <input type="text" class="form-control col-6" name="txt_trapdr" id="txt_alu_trapdr" 
                    placeholder='En que trabaja en padre' maxlength="50" onkeydown="return evitarEnter(event);"
                    value="<?php echo $fila['ALU_TRAPDR'];?>">
                    <label class="col-6"><b>Lugar de trabajo</b></label>
                    <input type="text" class="form-control col-6" name="txt_lutpdr" id="txt_lutpdr" 
                    placeholder='Lugar de trabajo padre' onblur="validarCorreo()" maxlength="50" onkeydown="return evitarEnter(event);"
                    value="<?php echo $fila['ALU_LUTPDR'];?>">
                    <span id="mensaje" style="margin-left: 10px;"></span>

                </div>
                
            </div>

        <div class="row">
            <div class="col-6  p-2" style="border: 1px solid #ccc;">
                <div class="row">
                    <div class="col-6  p-2" >
                        <label for="cmb_codrpr"><b>Representante</b></label>
                        <label ><b>Buscar por Cédula</b></label>
                        <input type="number" class="form-control col-6" name="txt_cedrpr" id="txt_cedrpr" 
                        placeholder='Cédula' maxlength="16" onblur="ajax_buscar_repres_cedula(this.value);" 
                        onkeydown="return evitarEnter(event);">
                    </div>
                   <div class="col-6  p-2 d-flex align-items-end" >
                        <button type="button" class="btn btn-secondary" onclick="location.href='../../representantes_/vistas/ingresar.php?_identi=2'" >Nuevo</button> <br>
                    </div>
                    <select name="cmb_codrpr" id="cmb_codrpr" ></select><br>
                </div>
                <div class="row">
                    <div class="col-6  p-2" >
                        <label class="col-3"><b>Parentesco</b></label>
                        <input type="text" class="form-control col-6" name="txt_relrpr" id="txt_relrpr" 
                        placeholder='Relación con estudiante' maxlength="20" onkeydown="return evitarEnter(event);"
                        value="<?php echo $fila['ALU_RELRPR'];?>">
                    </div>
                    <div class="col-6  p-2" >

                    </div>
                </div>

            </div>

            <div class="col-6  p-2" style="border: 1px solid #ccc;">
                    <label class="col-6"><b>Observación</b></label>
                    <input type="text" class="form-control col-6" name="txt_observ" id="txt_observ" 
                    placeholder='Observación' maxlength="60" onkeydown="return evitarEnter(event);"
                    value="<?php echo $fila['ALU_OBSERV'];?>">

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
        const valorSeleccionado = '<?php echo $fila['ALU_CODRPR'];?>';
        data.forEach(rep => {
            const option = document.createElement('option');
            option.value = rep.codigook;
            option.textContent = rep.descriok;
            if (rep.codigook == valorSeleccionado) {
                            option.selected = true;
            }
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
        fetch('../../fcursos_/php/js_fcur_descri.php')
        .then(response => response.json())
        .then(data => {
                const valorSeleccionado = '<?php echo $fila['ALU_CODCUR'];?>';
                const combo = document.getElementById('cmb_curso');
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
document.getElementById('txt_fotogr').addEventListener('change', function(event) {
    const file = event.target.files[0];
    const preview = document.getElementById('preview');

    if (file) {
        const reader = new FileReader();
        reader.onload = function(e) {
            preview.src = e.target.result;
            preview.classList.remove('d-none');
        }
        reader.readAsDataURL(file);
    } else {
        preview.src = '#';
        preview.classList.add('d-none');
    }
});
</script>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const preview = document.getElementById('preview');
    const fileInput = document.getElementById('txt_fotogr');

    if (!fileInput.files.length) {
        preview.src = <?php echo json_encode($ruta_imagen2); ?>;
        preview.classList.remove('d-none');
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

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const codigo = "<?php echo $_GET['valor'] ?? ''; ?>";

            if (codigo !== "") {
                fetch('../php/cargardatos.php', {
                    method: "POST",
                    headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
                    body: "codigo=" + encodeURIComponent(codigo)
                })
                .then(response => response.json())
                .then(data => {
                    // Rellenar campos básicos
                    document.getElementById('txt_cedula').value = data.v_cedula || '';
                    document.getElementById('txt_nombre').value = data.v_nombre || '';
                    document.getElementById('txt_lnacer').value = data.v_lnacer || '';
                    document.getElementById('txt_nacion').value = data.v_nacion || '';
                    document.getElementById('txt_diredo').value = data.v_diredo || '';
                    document.getElementById('txt_teledo').value = data.v_teledo || '';
                    document.getElementById('txt_telest').value = data.v_telest || '';
                    document.getElementById('txt_emaest').value = data.v_emaest || '';
                    document.getElementById('txt_fnacer').value = data.v_fnacer || '';
                    document.getElementById('txt_estciv').value = data.v_estciv || '';
                    document.getElementById('txt_fmatri').value = data.v_fmatri || '';
                    document.getElementById('txt_fecing').value = data.v_fecing || '';
                    document.getElementById('txt_matric').value = data.v_matric || '';
                    document.getElementById('txt_nfolio').value = data.v_nfolio || '';

                    // Sexo
                    if (data.v_sexo === "M") {
                        document.getElementById('rad_m').checked = true;
                    } else if (data.v_sexo === "F") {
                        document.getElementById('rad_f').checked = true;
                    }

                    // Checkboxes
                    document.getElementById('chk_ordina').checked = data.v_ordina == 1;
                    document.getElementById('chk_nuevo').checked = data.v_nuevo == 1;
                    document.getElementById('chk_repite').checked = data.v_repite == 1;
                    document.getElementById('chk_retirado').checked = data.v_retirado == 1;
                    document.getElementById('txt_fecret').value = data.v_fecret || '';

                    // Curso y representante (se actualizan automáticamente si tus combos ya los cargan con scripts)
                    setTimeout(() => {
                        document.getElementById('cmb_curso').value = data.v_curso || '';
                        document.getElementById('cmb_codrpr').value = data.v_codrpr || '';
                    }, 500);

                    document.getElementById('txt_relrpr').value = data.v_relrpr || '';
                    document.getElementById('txt_observ').value = data.v_observ || '';

                    // Y sigue con los demás campos del padre, madre, etc. según sus IDs
                    document.getElementById('txt_nommdr').value = data.v_nommdr || '';
                    document.getElementById('txt_fnmdr').value = data.v_fnmdr || '';
                    // ... etc.

                })
                .catch(error => {
                    //console.error("Error al cargar datos del estudiante:", error);
                });
            }
        });
    </script>
</body>
</html>