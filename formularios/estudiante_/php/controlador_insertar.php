<?php
include '../../../login/verificar_sesion3n_mixto.php';
?>
<link href="../../../Libs/sweetalert2-8.2.5/sweetalert.css" rel="stylesheet">
<script src="../../../Libs/jquery.min.js"></script>
<script src="../../../Libs/sweetalert2-8.2.5/sweetalert.min.js"></script>

<?php
if (isset($_FILES['txt_fotogr']) && $_FILES['txt_fotogr']['error'] === 0) {
            $directorio = '../../../uploads/fotos/'; // Cambia por tu carpeta
            $archivo = $_FILES['txt_fotogr']['tmp_name'];
            $extension = pathinfo($_FILES['txt_fotogr']['name'], PATHINFO_EXTENSION);

            // 1. Obtener el número secuencial más alto en la carpeta
            $archivos = glob($directorio . 'foto*.'.$extension);
            $ultimoNumero = 0;

            foreach ($archivos as $f) {
                // Extrae el número del nombre del archivo, por ejemplo foto12.jpg -> 12
                preg_match('/foto(\d+)\.' . preg_quote($extension, '/') . '$/', basename($f), $coincidencias);
                if (isset($coincidencias[1]) && $coincidencias[1] > $ultimoNumero) {
                    $ultimoNumero = $coincidencias[1];
                }
            }

            // 2. Nuevo nombre de archivo en secuencia
            $nuevoNumero = $ultimoNumero + 1;
            $nuevoNombre = "foto{$nuevoNumero}." . $extension;
            $rutaFinal = $directorio . $nuevoNombre;

            // 3. Mover archivo
            if (move_uploaded_file($archivo, $rutaFinal)) {
                //echo "Archivo subido como: " . $nuevoNombre;
            } else {
                //echo "Error al subir archivo.";
            }
}
else { $rutaFinal=""; }

    require_once('modelo.php');
    $obj = new clase_estudiantes();
    $result=$obj->_insertar(
    $_POST['txt_fecing'],   
    $_POST['txt_fmatri'],
    $_POST['txt_matric'],
    $_POST['txt_nfolio'],
    $_POST['txt_fnacer'],
    $_POST['cmb_curso'],
    $_POST['txt_estciv'],
    $_POST['rad_sexo'],
    $_POST['rad_tipo'],
    $_POST['chk_ordina'],
    $_POST['chk_nuevo'],
    $_POST['chk_repite'],
    $_POST['chk_retirado'],
    $_POST['txt_fecret'],
    $rutaFinal,
    $_POST['txt_cedula'], 
    $_POST['txt_nacion'],
    $_POST['txt_nombre'],
    $_POST['txt_lnacer'],
    $_POST['txt_diredo'],
    $_POST['txt_teledo'],
    $_POST['txt_telest'],
    $_POST['txt_emaest'],
    $_POST['txt_discap'],
    $_POST['txt_ncadis'],
    $_POST['txt_enferm'],
    $_POST['txt_defetn'],
    $_POST['txt_colevi'],
    $_POST['txt_dicovi'],
    $_POST['txt_anoant'],
    $_POST['txt_curant'],
    $_POST['txt_notdis'],
    $_POST['txt_notapr'],
    $_POST['txt_cedmdr'],
    $_POST['txt_nacmdr'],
    $_POST['txt_nommdr'],
    $_POST['txt_fnmdr'],
    $_POST['txt_ecimdr'],
    $_POST['txt_dirmdr'],
    $_POST['txt_parmdr'],
    $_POST['txt_prvmdr'],
    $_POST['txt_canmdr'],
    $_POST['txt_ca1mdr'],
    $_POST['txt_ca2mdr'],
    $_POST['txt_ncamdr'],
    $_POST['txt_barmdr'],
    $_POST['txt_telmdr'],
    $_POST['txt_emamdr'],
    $_POST['txt_promdr'],
    $_POST['txt_nedmdr'],
    $_POST['txt_tramdr'],
    $_POST['txt_lutmdr'],
    $_POST['txt_cedpdr'],
    $_POST['txt_nacpdr'],
    $_POST['txt_nompdr'],
    $_POST['txt_fnpdr'],
    $_POST['txt_ecipdr'],
    $_POST['txt_dirpdr'],
    $_POST['txt_parpdr'],
    $_POST['txt_prvpdr'],
    $_POST['txt_canpdr'],
    $_POST['txt_ca1pdr'],
    $_POST['txt_ca2pdr'],
    $_POST['txt_ncapdr'],
    $_POST['txt_barpdr'],
    $_POST['txt_telpdr'],
    $_POST['txt_emapdr'],
    $_POST['txt_propdr'],
    $_POST['txt_nedpdr'],
    $_POST['txt_trapdr'],
    $_POST['txt_lutpdr'],
    $_POST['cmb_codrpr'],
    $_POST['txt_relrpr'],
    $_POST['txt_observ']
    );
   
    
    if($result)
    {
        echo '<script>jQuery(function(){swal({
            title:"Guardar Estudiante", 
            text:"Registro de estudiante guardado con éxito", 
            type:"success", 
            confirmButtonText:"Aceptar"
        }, function(){
                    location.href="../vistas/index.php?page=movimcsn";
                    });});</script>';
    }
    else
    {
        
        echo '<script>
                
                

                jQuery(function(){swal({
                title:"Guardar Estudiante", 
                text:"Error al Guardar", 
                type:"danger", 
                confirmButtonText:"Aceptar"
                }, function(){                
                    location.href="../vistas/index.php?page=movimcsn";
                     });});
        </script>';
    }

     //require_once('vistasinestilo.html');
?>
