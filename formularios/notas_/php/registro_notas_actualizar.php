<?php
include '../../../login/verificar_sesion3n_mixto.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registro de Notas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .resaltado {
            background-color: #e0f7fa !important;
            transition: background-color 0.3s;
        }
    </style>

    <style>
        .resaltado {
            background-color: #e0f7fa !important;
            transition: background-color 0.3s;
        }

        .table-scroll {
            max-height: 400px; /* ajusta según necesidad */
            overflow-y: auto;
        }

        thead th {
            position: sticky;
            top: 0;
            background-color: #f8f9fa; /* mismo color del thead */
            z-index: 1;
        }

        .fixed-header {
            position: sticky;
            top: 0;
            z-index: 1000;
            background-color: white;
            padding: 15px 0;
        }
    </style>
    <!-- Estilo para validar ingreso de notas deñ 1 al 10-->
        <style>
    .is-invalid {
        border-color: red;
        background-color: #ffe6e6;
    }
    </style>



</head>
<body>

<div class="container mt-4">
    <form action="registro_notas_guardar.php" method="post">
        <!--<h5 class="text-primary text-center mb-1 fixed-header">Registro de Notas</h5>-->
        <label class="text-primary text-center d-block mb-1" style="font-size: 1.25rem;"><b>Registro de Notas</b></label>
        <?php
            require_once('modelo.php');
            $codigo = isset($_GET['txt_codigo']) ? intval($_GET['txt_codigo']) : 0;
            $obj_regi= new clase_notas_registro();
            $regi_regi=$obj_regi->_consultarcodigo($codigo); 
            $regi_regi_fila = $regi_regi ? $regi_regi->fetch(PDO::FETCH_ASSOC) : false;
            //echo $regi_regi_fila['REG_ID'];
        ?>

            <input type="text" name="txt_codper" 
             value= <?php echo htmlspecialchars($regi_regi_fila['PER_CODIGO']); ?> hidden>
            <input type="text" name="txt_codmat" 
             value= <?php echo htmlspecialchars($regi_regi_fila['REG_CODMAT']); ?> hidden>
            <input type="text" name="txt_codcur" 
             value= <?php echo htmlspecialchars($regi_regi_fila['FCU_COD']); ?> hidden>
          
            <div class="row mb-2">
                <div class="col-md-1">
                    <label class="form-label"><strong>DOCENTE</strong> </label>
                </div>
                <div class="col-md-8">
                    <?php echo htmlspecialchars($regi_regi_fila['PER_APENOM']); ?>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-1">
                    <label class="form-label"><strong>MATERIA</strong> </label>
                </div>
                <div class="col-md-9">
                    <label> <?php echo htmlspecialchars($regi_regi_fila['ASIG_NOMBRE']); ?></label>
                </div>
                <div class="col-md-1">
                    <label class="form-label"><strong>CURSO</strong></label>
                </div>
                <div class="col-md-1">
                     <label>
                    <?php echo ($regi_regi_fila['FCU_DESCRI']); ?>
                    </label>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-1">
                    <label class="form-label"><strong>REGISTRO</strong> </label>
                </div>
                <div class="col-md-9">
                    <label> <?php echo htmlspecialchars($regi_regi_fila['REG_DESCRI']); ?></label>
                </div>
                <div class="col-md-1">
                    <label class="form-label"><strong>TIPO</strong></label>
                </div>
                <div class="col-md-1">
                     <label>
                    <?php echo ($regi_regi_fila['MAT_TIPO'] == '1') ? 'Cuantitativa' : 'Cualitativa'; 
                    $esCuantitativa = ($regi_regi_fila['MAT_TIPO'] == '1');
                    ?>
                    </label>
                </div>
            </div>
        <!-- tabla con scroll -->
        <div class="table-scroll">
            <table class="table table-bordered table-hover align-middle text-center">
                <thead class="table-light">
                <tr>
                    <th>#</th>
                    <th>Nombre del Estudiante</th>
                    <th>Nota</th>
                </tr>
                </thead>
                <tbody>
                    <?php
                        if ($regi_regi_fila)
                        {
                    
                            require_once('../../estudiante_/php/modelo.php');
                            $obj_estu = new clase_estudiantes();
                            $regi_estu = $obj_estu->_consultarxcurso($regi_regi_fila['FCU_COD']);

                            $i = 0;
                            while ($fila = $regi_estu->fetch(PDO::FETCH_ASSOC)) {
                                echo '<tr class="fila-estudiante" data-index="'.$i.'">';
                                echo '  <td>' . ($i + 1) . '</td>';
                                echo '  <td>' . htmlspecialchars($fila['ALU_NOMBRE']) . '</td>';
                                echo '  <td>';
                                // buesco si existe alguna matricula y registro en notas
                                $regi_notas = $obj_regi->_consultar_notas($fila['ALU_NMATRI'], $regi_regi_fila['REG_ID']);
                                $regi_notas_fila = $regi_notas ? $regi_notas->fetch(PDO::FETCH_ASSOC) : false;
                                if ($regi_notas_fila) {
                                    echo '    <input type="text" class="form-control txt_nota text-end" ';
                                    echo '           name="txt_nota['.$i.']" ';
                                    echo '           maxlength="5" ';
                                    echo '           style="width: 80px;" ';
                                    echo '           value="'.htmlspecialchars($regi_notas_fila['NOT_NOTA']).'" ';
                                    echo '           data-index="'.$i.'" onkeydown="return evitarEnter(event);">';
                                } else {
                                    echo '    <input type="text" class="form-control txt_nota text-end" ';
                                    echo '           name="txt_nota['.$i.']" ';
                                    echo '           maxlength="5" ';
                                    echo '           style="width: 80px;" ';
                                    echo '           value="" ';
                                    echo '           data-index="'.$i.'" onkeydown="return evitarEnter(event);">';                     
                                }    
                                // Ocultos type="hidden"
                                echo '    <input  type="hidden" name="not_nmatri['.$i.']" value="'.htmlspecialchars($fila['ALU_NMATRI']).'">';
                                echo '    <input  type="hidden" name="not_regist['.$i.']" value="'.htmlspecialchars($regi_regi_fila['REG_ID']).'">';
                                echo '  </td>';
                                echo '</tr>';
                                $i++;
                            }

                        }
                    ?>
                </tbody>
            </table>
        </div>

        <div class="text-center">
            <button type="submit" class="btn btn-success">Guardar</button>

            <button type="button" class="btn btn-secondary" 
            onclick="location.href='../vistas/registro_crud.php?_codper=<?php echo $regi_regi_fila['PER_CODIGO'];?>&_codmat=<?php echo $regi_regi_fila['REG_CODMAT'];?>'">
            Cerrar
            </button>
        </div>

    </form>
</div>

<!-- JS para resaltar fila activa -->
<script>
    document.querySelectorAll('.txt_nota').forEach(function(input) {
        input.addEventListener('focus', function () {
            document.querySelectorAll('.fila-estudiante').forEach(function(row) {
                row.classList.remove('resaltado');
            });
            let fila = this.closest('.fila-estudiante');
            if (fila) {
                fila.classList.add('resaltado');
            }
        });
    });

    // Opcional: prevenir Enter
    function evitarEnter(event) {
        return event.key !== "Enter";
    }
</script>
<script>
document.addEventListener('DOMContentLoaded', function () {
    const esCuantitativa = <?php echo $esCuantitativa ? 'true' : 'false'; ?>;

    if (esCuantitativa) {
        document.querySelectorAll('.txt_nota').forEach(function(input) {
            // Validación en tiempo real
            input.addEventListener('input', function () {
                const valor = this.value.trim();
                const numero = parseFloat(valor);
                const esValido = /^([1-9](\.\d{1,2})?|10(\.0{1,2})?)$/.test(valor);

                if (valor === "" || esValido) {
                    this.classList.remove('is-invalid');
                    this.setCustomValidity("");
                } else {
                    this.classList.add('is-invalid');
                    this.setCustomValidity("La nota debe estar entre 1 y 10 (hasta con 2 decimales)");
                }
            });

            // Bloquear letras
            input.addEventListener('keypress', function(e) {
                if (!/[0-9.]/.test(e.key)) {
                    e.preventDefault();
                }
            });

            // Formatear al salir del campo
            input.addEventListener('blur', function () {
                let val = this.value.trim();
                if (val !== "" && !isNaN(val)) {
                    let num = parseFloat(val);
                    if (num >= 1 && num <= 10) {
                        this.value = num.toFixed(2); // <-- aquí el formateo a 2 decimales
                    }
                }
            });
        });
    }
});
</script>

</body>
</html>
