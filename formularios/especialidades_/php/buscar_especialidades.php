<?php
include '../../../login/verificar_sesion3n_mixto.php';
require_once("modelo.php");
$especialidades= new clase_especialidades();
$registros=$especialidades->_consultartodo($_POST['valor']); 
echo "<table id='tabla' name='tabla' class='table table-bordered'>
        <thead class='bg-primary text-light text-center'>
            <tr>
                <th>No</th>
                <th>ID</th>
                <th>NOMBRE DE ESPECIALIDAD</th>
                <th>TITULO</th>
                <th>OBSERVACION</th>
                <th>Editar</th>
                <th>Eliminar</th>
            </tr>
        </thead>";

    $f=1;
    while ($fila = $registros->fetch())
    {
        echo "<tr>
                <td>".$f."</td>
                <td>".$fila['ESP_CODIGO']."</td>
                <td>".$fila['ESP_NOMBRE']."</td>
                <td>".$fila['ESP_TITULO']."</td>
                <td>".$fila['ESP_OBSERV']."</td>
                <td class='text-center'><a href='../vistas/modificar.php?v_id=".$fila['ESP_CODIGO']."'><img src='../../../Src/imgs/edit.png'></a></td>
                <td class='text-center'><img src='../../../Src/imgs/delete.png' onclick='ajax_eliminar_especialidad(".$fila['ESP_CODIGO'].");' data-bs-toggle='modal' data-bs-target='#elimimar'></td>
           

            </tr>";
        $f++;
    }

echo "</table>";
?>