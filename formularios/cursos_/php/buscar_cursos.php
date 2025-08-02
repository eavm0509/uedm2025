<?php
include '../../../login/verificar_sesion3n_mixto.php'; 
require_once("modelo.php");
$obj_temporal= new clase_cursos();
$registros=$obj_temporal->_consultartodo($_POST['valor']); 
echo "<table id='tabla' name='tabla' class='table table-bordered'>
        <thead class='bg-primary text-light text-center'>
            <tr>
                <th>#</th>
                <th>CÓDIGO</th>
                <th>NOMBRE</th>
                <th>OBSERVACIÓN</th>
                <th>Editar</th>
                <th>Eliminar</th>
            </tr>
        </thead>";

    $f=1;
    while ($fila = $registros->fetch())
    {
        echo "<tr>
                <td>".$f."</td>
                <td>".$fila['CUR_CODIGO']."</td>
                <td>".$fila['CUR_NOMBRE']."</td>
                <td>".$fila['CUR_OBSERV']."</td>
                <td class='text-center'><a href='../vistas/modi_cursos.php?v_id=".$fila['CUR_CODIGO']."'><img src='../../../Src/imgs/edit.png'></a></td>
                <td class='text-center'><img src='../../../Src/imgs/delete.png' onclick='ajax_eli_curso(".$fila['CUR_CODIGO'].");' 
                data-bs-toggle='modal' data-bs-target='#elimimar'></td>
            </tr>";
        $f++;
    }

echo "</table>";
?>