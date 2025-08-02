<?php
include '../../../login/verificar_sesion3n_mixto.php';
$hidden = ($_SESSION['rol'] !== 'Docente'); 
require_once("modelo.php");
$miclase= new clase_estudiantes();
$registros=$miclase->_consultartodovista($_POST['valor']); 
echo "<table id='tabla' name='tabla' class='table table-bordered'>
        <thead class='bg-primary text-light text-center'>
            <tr>
                <th>#</th>
                <th>ID</th>
                <th>CEDULA</th>
                <th>NOMBRE</th>
                <th>TELEFONOS</th>
                <th>CORREO</th>
                <th>AÑO</th>";

        if ($hidden) {
            echo "<th>Editar</th>
                <th>Eliminar</th>";
        }

            echo "      </tr>
                </thead>";
            
    $f=1;
    while ($fila = $registros->fetch())
    {
    echo "<tr>
        <td>".$f."</td>
        <td>".$fila['ALU_NMATRI']."</td>
        <td>".$fila['ALU_CEDULA']."</td>
        <td>".$fila['ALU_NOMBRE']."</td>
        <td>".$fila['ALU_TELEDO']."</td>
        <td>".$fila['ALU_EMAEST']."</td>
        <td>".$fila['FCU_DESCRI']."</td>";

        if ($hidden) {
            echo "<td class='text-center'>
                    <a href='../vistas/modificar.php?valor=".$fila['ALU_NMATRI']."'>
                        <img src='../../../Src/imgs/edit.png'>
                    </a>
                </td>
                <td class='text-center'>
                    <img src='../../../Src/imgs/delete.png' 
                        onclick='ajax_eli_estudiante(".$fila['ALU_NMATRI'].");' 
                        data-bs-toggle='modal' 
                        data-bs-target='#elimimarModal'>
                </td>";
        }
        echo "</tr>";
        $f++;
    }

echo "</table>";
?>