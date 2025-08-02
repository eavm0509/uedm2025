<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['rol']) || $_SESSION['rol'] != 'Administrativo') {
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
    <title>Panel Administrativo</title>
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
        <h1>Bienvenido, Personal Administrativo</h1>
        <a href="admin/logout.php" class="btn btn-outline-light logout">Cerrar sesión</a>
    </header>

    <main class="container mt-4">
        <div class="accordion" id="menuAccordion">

            <!-- Matrículas -->
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingMatricula">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseMatricula" aria-expanded="true" aria-controls="collapseMatricula">
                        Matrículas
                    </button>
                </h2>
                <div id="collapseMatricula" class="accordion-collapse collapse show" aria-labelledby="headingMatricula" data-bs-parent="#menuAccordion">
                    <div class="accordion-body">
                        <a href="formularios/representantes_/vistas/index.php?page=movimcsn" class="option-link">Representantes</a>
                        <a href="formularios/estudiante_/vistas/index.php?page=movimcsn" class="option-link">Estudiantes</a>
                    </div>
                </div>
            </div>

            <!-- Calificaciones -->
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingCalificaciones">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseCalificaciones" aria-expanded="false" aria-controls="collapseCalificaciones">
                        Calificaciones
                    </button>
                </h2>
                <div id="collapseCalificaciones" class="accordion-collapse collapse" aria-labelledby="headingCalificaciones" data-bs-parent="#menuAccordion">
                    <div class="accordion-body">
                        <a  class="option-link">Registro de Notas</a>
                        <a  href="formularios/tablas1/index.php?page=movimcsn" class="option-link">Tabla 1</a>
                        <a  class="option-link">Tabla 2</a>
                    </div>
                </div>
            </div>

            <!-- Inspección -->
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingInspeccion">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseInspeccion" aria-expanded="false" aria-controls="collapseInspeccion">
                        Inspección
                    </button>
                </h2>
                <div id="collapseInspeccion" class="accordion-collapse collapse" aria-labelledby="headingInspeccion" data-bs-parent="#menuAccordion">
                    <div class="accordion-body">
                        <a  class="option-link">Comportamiento</a>
                        <a  class="option-link">Faltas</a>
                        <a  class="option-link">Atrazos</a>
                    </div>
                </div>
            </div>

            <!-- Parametros Iniciales -->
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingMantenimiento">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseMantenimiento" aria-expanded="false" aria-controls="collapseMantenimiento">
                        Parametros Iniciales
                    </button>
                </h2>
                <div id="collapseMantenimiento" class="accordion-collapse collapse" aria-labelledby="headingMantenimiento" data-bs-parent="#menuAccordion">
                    <div class="accordion-body">
                        <a href="formularios/fcursos_/vistas/index.php?page=movimcsn" class="option-link">Formar Años o Cursos</a>
                        <a href="formularios/cursos_/vistas/index.php?page=movimcsn" class="option-link">Cursos</a>
                        <a href="formularios/ciclos_/vistas/index.php?page=movimcsn" class="option-link">Ciclos</a>
                        <a href="formularios/secciones_/vistas/index.php?page=movimcsn" class="option-link">Secciones</a>
                        <a href="formularios/especialidades_/vistas/index.php?page=movimcsn" class="option-link">Especialidades</a>
                        <a href="formularios/paralelos_/vistas/index.php?page=movimcsn" class="option-link">Paralelos</a>
                        <hr style="border: 0; height: 4px; background: linear-gradient(to right, #999, #333, #999); box-shadow: 0 1px 2px rgba(0,0,0,0.5); border-radius: 2px;">
                        <a href="formularios/personal_/vistas/index.php?page=movimcsn" class="option-link">Docentes</a>
                        <a href="formularios/areas_/vistas/index.php?page=movimcsn" class="option-link">Áreas</a>
                        <a href="formularios/asignaturas_/vistas/index.php?page=movimcsn" class="option-link">Asignaturas</a>
                        <a href="formularios/materias_/vistas/index.php?page=movimcsn" class="option-link">Materias</a>
                        <a href="formularios/notas_/vistas/index.php?page=movimcsn" class="option-link">Registros y Calculos</a>
                        <hr style="border: 0; height: 4px; background: linear-gradient(to right, #999, #333, #999); box-shadow: 0 1px 2px rgba(0,0,0,0.5); border-radius: 2px;">
                        <a href="formularios/usuarios_/vistas/index.php?page=movimcsn" class="option-link">Usuarios</a>
                        <a href="formularios/institucion_/index.php" class="option-link">Institución</a>
                        
                    </div>
                </div>
            </div>

            

        </div>
    </main>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

