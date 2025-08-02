<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['rol']) || $_SESSION['rol'] != 'Docente') {
    header("Location: admin/index.php");
    exit();
}

header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Panel Docente</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f0f2f5;
        }
        header {
            background-color: #2c3e50;
            color: white;
            padding: 1rem;
            text-align: center;
            position: relative;
        }
        .logout {
            position: absolute;
            right: 20px;
            top: 20px;
        }
        .accordion-button {
            background-color: #ecf0f1;
        }
        .accordion-button:not(.collapsed) {
            background-color: #d0d7de;
        }
        .option-link {
            display: block;
            padding: 0.5rem 1rem;
            color: #2980b9;
            text-decoration: none;
            transition: background-color 0.3s ease;
        }
        .option-link:hover {
            background-color: #d0d7de;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <header>
        <h1>Bienvenido, Docente</h1>
        <?php echo $_SESSION['apenom'] ?><h5>
        <a href="admin/logout.php" class="btn btn-outline-light logout">Cerrar sesión</a>
    </header>
    <main class="container mt-4">
        <div class="accordion" id="menuAccordion">

            <!-- Calificaciones -->
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingCalificaciones">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseCalificaciones" aria-expanded="true" aria-controls="collapseCalificaciones">
                        Calificaciones
                    </button>
                </h2>
                <div id="collapseCalificaciones" class="accordion-collapse collapse show" aria-labelledby="headingCalificaciones" data-bs-parent="#menuAccordion">
                    <div class="accordion-body">
                        <a href="formularios/estudiante_/vistas/index.php?page=movimcsn" class="option-link">Datos de Estudiantes</a>
                        <a href="formularios/notas_/vistas/registro_crud.php?_codper=<?php echo $_SESSION['_codper'] ?>" class="option-link">Registro de Notas</a> <!--page=movimcsn&_codper=8-->
                        <a href="formularios/tablas1/index.php?page=movimcsn" class="option-link">Tabla 1</a>
                        
                    </div>                    
                </div>
            </div>
           <!-- Asistencias -->
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingInspeccion">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseInspeccion" aria-expanded="false" aria-controls="collapseInspeccion">
                        Asistencias
                    </button>
                </h2>
                <div id="collapseInspeccion" class="accordion-collapse collapse" aria-labelledby="headingInspeccion" data-bs-parent="#menuAccordion">
                    <div class="accordion-body">
                        <a  class="option-link">Registro de Faltas y Atrazos</a>
                        <a  class="option-link">Consultas</a>
                    </div>
                </div>
            </div>
            <!-- Actualizaciones -->
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingInspeccion">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseInspeccion" aria-expanded="false" aria-controls="collapseInspeccion">
                        Actualizaciones
                    </button>
                </h2>
                <div id="collapseInspeccion" class="accordion-collapse collapse" aria-labelledby="headingInspeccion" data-bs-parent="#menuAccordion">
                    <div class="accordion-body">
                    <a class="option-link">Datos personales</a>
                    <a href="formularios/actcladoc/actualizar_clave.php" class="option-link">Contraseña</a>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
