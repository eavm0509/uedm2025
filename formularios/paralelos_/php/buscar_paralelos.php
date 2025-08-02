<?php
include '../../../login/verificar_sesion3n_mixto.php';
require_once("modelo.php");
$obj_temporal= new clase_paralelos();
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
                <td>".$fila['PAR_CODIGO']."</td>
                <td>".$fila['PAR_NOMBRE']."</td>
                <td>".$fila['PAR_OBSERV']."</td>
                <td class='text-center'><a href='../vistas/modificar.php?v_id=".$fila['PAR_CODIGO']."'><img src='../../../Src/imgs/edit.png'></a></td>
                <td class='text-center'><img src='../../../Src/imgs/delete.png' onclick='ajax_eli_paralelo(".$fila['PAR_CODIGO'].");' 
                data-bs-toggle='modal' data-bs-target='#elimimar'></td>
            </tr>";
        $f++;
    }

echo "</table>";
?>