<?php
include '../../../login/verificar_sesion3n_mixto.php';
?>

<style>
    .resaltado {
        background-color: #e0f7fa !important;
        transition: background-color 0.3s;
    }
</style>

<link href="../../../Libs/sweetalert2-8.2.5/sweetalert.css" rel="stylesheet">
<script src="../../../Libs/jquery.min.js"></script>
<script src="../../../Libs/sweetalert2-8.2.5/sweetalert.min.js"></script>
<?php
require_once('modelo.php');
$codigo = isset($_GET['txt_codigo']) ? intval($_GET['txt_codigo']) : 0;
//$xcodper = isset($_GET['xcodper']) ? intval($_GET['xcodper']) : 0;
//$xcodmat = isset($_GET['xcodmat']) ? intval($_GET['xcodmat']) : 0;

$obj_regi= new clase_notas_registro();
$regi_regi=$obj_regi->_consultartodo($codigo); 

if ($regi_regi) {
    


?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Notas de Estudiantes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>


    
    <form action="guardar_notas.php" method="post">
        <div class="form-group row">
            <h3 class="text-primary col-12 text-center">Registro de notas</h3>
        </div>
        <div class="row">
            <?php
            require_once('../../estudiante_/php/modelo.php');
            $obj_estu = new clase_estudiantes();
            $regi_estu = $obj_estu->_consultarxcurso($codigo);
            $i = 0;
            while ($fila = $regi_estu->fetch(PDO::FETCH_ASSOC)) {
            ?>
                <div class="row fila-estudiante" data-index="<?php echo $i; ?>">
    <div class="col-1 p-3">
        <input type="text" class="form-control" value="<?php echo $i; ?>" readonly>
    </div>
    <div class="col-4 p-3">
        <input type="text" class="form-control" 
               value="<?php echo htmlspecialchars($fila['ALU_NOMBRE']); ?>" readonly>
    </div>
    <div class="col-2 p-3">
        <input type="text" 
               class="form-control txt_nota" 
               name="txt_nota[<?php echo $i; ?>]" 
               data-index="<?php echo $i; ?>" 
               value="<?php echo htmlspecialchars($fila['ALU_SEXO']); ?>" 
               onkeydown="return evitarEnter(event);">
    </div>

    <!-- campos ocultos -->
    <input type="hidden" name="not_nmatri[<?php echo $i; ?>]" value="<?php echo htmlspecialchars($fila['ALU_NMATRI']); ?>">
    <input type="hidden" name="not_regist[<?php echo $i; ?>]" value="<?php echo htmlspecialchars($fila['ALU_NMATRI']); ?>">
</div>


                <?php
                //echo ' <input type="hidden" name="not_nmatri['.$i.']" value="' . htmlspecialchars($fila['ALU_NMATRI']) . '">';
                //echo ' <input type="hidden" name="not_regist['.$i.']" value="' . htmlspecialchars($fila['ALU_NMATRI']) . '">';

                
               
                $i++;
            }
             echo '</div>';
            ?>
        </div>

        <button type="submit" class="btn btn-success">Guardar Notas</button>
    </form>


</body>
<script>
    document.querySelectorAll('.txt_nota').forEach(function(input) {
        input.addEventListener('focus', function () {
            // Quitar resaltado a todos
            document.querySelectorAll('.fila-estudiante').forEach(function(row) {
                row.classList.remove('resaltado');
            });
            // Agregar resaltado a la fila correspondiente
            let index = this.dataset.index;
            let fila = document.querySelector('.fila-estudiante[data-index="' + index + '"]');
            if (fila) {
                fila.classList.add('resaltado');
            }
        });
    });
</script>

</html>





<?php
  
} else {
     

}





?>