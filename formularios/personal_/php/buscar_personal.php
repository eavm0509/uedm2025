<?php
include '../../../login/verificar_sesion3n_mixto.php';
require_once("modelo.php");
$miclase= new clase_personal();
$registros=$miclase->_consultartodo($_POST['valor']); 
echo "<table id='tabla' name='tabla' class='table table-bordered'>
        <thead class='bg-primary text-light text-center'>
            <tr>
                <th>CODIGO</th>
                <th>CEDULA</th>
                <th>APELLIDOS Y NOMBRES</th>
                <th>TELEFONOS</th>
                <th>Editar</th>
                <th>Eliminar</th>
            </tr>
        </thead>";

    while ($fila = $registros->fetch())
    {
        echo "<tr>
                <td>".$fila['PER_CODIGO']."</td>
                <td>".$fila['PER_CEDULA']."</td>
                <td>".$fila['PER_APENOM']."</td>
                <td>".$fila['PER_TELEFO']."</td>
                <td class='text-center'><a href='../vistas/modificar.php?valor=".$fila['PER_CODIGO']."'><img src='../../../Src/imgs/edit.png'></a></td>
                <td class='text-center'><img src='../../../Src/imgs/delete.png' onclick='ajax_eli_personal(".$fila['PER_CODIGO'].");' data-bs-toggle='modal' data-bs-target='#form_elimimar'></td>
            </tr>";
    }
echo "</table>";
?>