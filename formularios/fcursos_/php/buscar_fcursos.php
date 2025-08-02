<?php
include '../../../login/verificar_sesion3n_mixto.php';
require_once("modelo.php");
$miclase= new clase_fcursos();
$registros=$miclase->_consultartodovista($_POST['valor']); 
echo "<table id='tabla' name='tabla' class='table table-bordered'>
        <thead class='bg-primary text-light text-center'>
            <tr>
                    <th>#</th>
                    <th>ID</th>
                    <th>DESCRIPCION</th>
                    <th>CURSO</th>
                    <th>CICLO</th>
                    <th>SECCION</th>
                    <th>ESPECIALIDAD</th>
                    <th>PARA</th>
                    <th>TUTOR</th>
            </tr>
        </thead>";

    $f=1;
    while ($fila = $registros->fetch())
    {
        echo "<tr>
                <td>".$f."</td>
                <td>".$fila['id']."</td> 
                <td>".$fila['descripcion']."</td>
                <td>".$fila['curso']."</td>
                <td>".$fila['ciclo']."</td>
                <td>".$fila['seccion']."</td>
                <td>".$fila['especialidad']."</td>
                <td>".$fila['paralelo']."</td>
                <td>".$fila['profesor']."</td>
                <td class='text-center'><a href='../vistas/modificar.php?v_idd=".$fila['id']."'><img src='../../../Src/imgs/edit.png'></a></td>
                <td class='text-center'><img src='../../../Src/imgs/delete.png' onclick='ajax_eli_fcursos(".$fila['id'].");' data-bs-toggle='modal' data-bs-target='#form_elimimar'></td>
            </tr>";
        $f++;
    }

echo "</table>";
?>