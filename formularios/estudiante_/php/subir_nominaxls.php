<link href="../../../Libs/sweetalert2-8.2.5/sweetalert.css" rel="stylesheet">
<script src="../../../Libs/jquery.min.js"></script>
<script src="../../../Libs/sweetalert2-8.2.5/sweetalert.min.js"></script>
<?php
    require '../../../vendor/autoload.php';
    use PhpOffice\PhpSpreadsheet\IOFactory;
    // Ruta al archivo Excel
    //$archivoExcel = '1a.xlsx';
    
    if (isset($_FILES['archivo'])) {
        $archivoExcel = $_FILES['archivo'];

        if ($archivoExcel['error'] === 0) {

            //$archivoExcel = "'" . $_FILES['archivo'] . "'";
            $rutaTemporal = $_FILES['archivo']['tmp_name'];
            try {
            $documento = IOFactory::load($rutaTemporal);
            $hoja = $documento->getActiveSheet();
            $filas = $hoja->toArray();

            // Omitimos la primera fila si es encabezado
            unset($filas[0]);
            require_once('modelo.php');
            $obj = new clase_estudiantes();
            foreach ($filas as $fila) {
                // Asegúrate de adaptar el índice a tu archivo Excel
                $col1 = $fila[1];
                $col2 = $fila[2];
                $col3 = $fila[3];
                if ($fila[4]=='M'){
                    $col4 = 1 ;
                } else { 
                    $col4 = 2 ; 
                }
                $result=$obj->_insertar2(
                        $col1,    
                        $col2,
                        $_POST['cmb_curso'],
                        $col3,
                        $col4 
                    );
            }
                //echo "Datos importados correctamente.";
                echo '<script>jQuery(function(){swal({
                    title:"Estudiantes", text:"Datos importados correctamente", type:"success", confirmButtonText:"Aceptar"
                }, function(){location.href="../vistas/index.php?page=movimcsn";});});</script>';

            } catch (Exception $e) {
                //echo "Error al importar: " . $e->getMessage();
                echo '<script>jQuery(function(){swal({
                    title:"Estudiantes", text:"Error al importar datos", type:"danger", confirmButtonText:"Aceptar"
                }, function(){location.href="../vistas/index.php?page=movimcsn";});});</script>';
            }


        } else {
            echo "Error al subir el archivo.";
        }
    }
?>







