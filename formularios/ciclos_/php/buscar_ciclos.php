<?php
include '../../../login/verificar_sesion3n_mixto.php';
require_once("../php/modelo.php");
$mclase= new clase_ciclos();
$registros=$mclase->_consultartodo($_POST['valor']); 
echo "<table id='tabla' name='tabla' class='table table-bordered'>
        <thead class='bg-primary text-light text-center'>
            <tr>
                <th>#</th>
                <th>CÓDIGO</th>
                <th>CICLOS</th>
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
                <td>".$fila['CIC_CODI']."</td>
                <td>".$fila['CIC_NOMB']."</td>
                <td>".$fila['CIC_OBSERV']."</td>

                <td class='text-center'><a href='../vistas/modificar.php?v_id=".$fila['CIC_CODI']."'><img src='../../../Src/imgs/edit.png'></a></td>
                <td class='text-center'><img src='../../../Src/imgs/delete.png' onclick='ajax_eli_ciclo(".$fila['CIC_CODI'].");' data-bs-toggle='modal' data-bs-target='#eliminar'></td>
           

            </tr>";
        $f++;
    }

echo "</table>";
?>