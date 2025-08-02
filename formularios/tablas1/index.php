<?php
include '../../login/verificar_sesion3n_mixto.php';
//formularios/tablas1/index.php
require_once '../../conexion/conexion.php';
$pdo = (new Conexion())->getConexion();
$cursos = $pdo->query("SELECT id, descripcion, curso, ciclo, seccion, especialidad, profesor FROM vis_fcursos")->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Tablas 1 - Reporte por Curso</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="p-4">
  <div class="container">
    <h4 class="mb-4">Ver Calificaciones por Curso</h4>

    <!-- ComboBox de cursos -->
    <!-- <form method="GET" class="row mb-4">
      <div class="col-md-6">
        <label class="form-label">Curso</label>
        <select class="form-select" name="curso_id" required>
          <option value="">Seleccione un curso</option>
          <?php foreach ($cursos as $curso): ?>
            <option value="<?= $curso['id'] ?>">
              <?= $curso['descripcion'] ?> - <?= $curso['curso'] ?> <?= $curso['seccion'] ?> <?= $curso['especialidad'] ?> (<?= $curso['profesor'] ?>)
            </option>
          <?php endforeach; ?>
        </select>
      </div>
      <div class="col-md-3 align-self-end">
        <button type="submit" class="btn btn-primary">Ver</button>
        <a href="reportes/r_listado.php?curso=IN3AM" target="_blank" class="btn btn-danger">Exportar PDF</a>

      </div>
    </form> -->
    <form method="GET" action="reportes/r_listado.php" target="_blank" onsubmit="return validarCurso();">
    <div class="form-group">
        <label for="curso"><b>Seleccione un curso</b></label>
        <select name="curso" id="curso" class="form-control">
            <option value="">-- Seleccione --</option>
            <?php
            require_once("../../conexion/conexion.php");
            $pdo = (new Conexion())->getConexion();
            $sql = "SELECT DISTINCT descripcion FROM vis_fcursos ORDER BY descripcion";
            $stmt = $pdo->query($sql);
            foreach ($stmt as $row) {
                echo "<option value='{$row['descripcion']}'>{$row['descripcion']}</option>";
            }
            ?>
        </select>
    </div>
    <button type="submit" class="btn btn-danger">Exportar PDF</button>
</form>

<script>
function validarCurso() {
    const curso = document.getElementById('curso').value;
    if (curso === "") {
        alert("Por favor seleccione un curso.");
        return false;
    }
    return true;
}
</script>


    <?php
    if (!empty($_GET['curso_id'])) {
      $curso_id = $_GET['curso_id'];

      // Obtener alumnos del curso
      $stmtAlum = $pdo->prepare("SELECT ALU_CEDUL, CONCAT(ALU_APELLI, ' ', ALU_NOMBRE) AS nombre FROM snp_alum WHERE ALU_CURSO = ?");
      $stmtAlum->execute([$curso_id]);
      $alumnos = $stmtAlum->fetchAll(PDO::FETCH_ASSOC);

      // Obtener materias del curso
      $stmtMat = $pdo->prepare("SELECT DISTINCT asig_nombre FROM vis_materias WHERE id_fcur = ?");
      $stmtMat->execute([$curso_id]);
      $materias = $stmtMat->fetchAll(PDO::FETCH_COLUMN);

      echo '<div class="table-responsive">';
      echo '<table class="table table-bordered table-sm">';
      echo '<thead class="table-light"><tr><th>#</th><th>Estudiante</th>';

      foreach ($materias as $mat) {
        echo "<th>$mat</th>";
      }
      echo '</tr></thead><tbody>';

      $num = 1;
      foreach ($alumnos as $alum) {
        echo "<tr><td>$num</td><td>{$alum['nombre']}</td>";
        foreach ($materias as $mat) {
          echo "<td>-</td>"; // Aquí luego puedes mostrar la nota
        }
        echo '</tr>';
        $num++;
      }

      echo '</tbody></table></div>';
    }
    ?>
  </div>
</body>
</html>

