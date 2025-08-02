<?php
include '../../../login/verificar_sesion3n_mixto.php';
require_once("modelo.php");
$miclase= new clase_asignaturas();
$registros=$miclase->_consultartodo($_POST['valor']); 
echo "<table id='tabla' name='tabla' class='table table-bordered'>
        <thead class='bg-primary text-light text-center'>
            <tr>
                <th>No</th>
                <th>ID</th>
                <th>NOMBRES</th>
                <th>OBSERVACION</th>
                <th>EDITAR</th>
                <th>ELIMINAR</th>
            </tr>
        </thead>";
//        if($result->fetchColumn()>0)
//{
    $f=1;
    while ($fila = $registros->fetch())
    {
        echo "<tr>
                <td>".$f."</td>
                <td>".$fila['ASIG_CODIGO']."</td>
                <td>".$fila['ASIG_NOMBRE']."</td>
                <td>".$fila['ASIG_OBSERV']."</td>
                <td class='text-center'><a href='../vistas/modificar.php?valor1000=".$fila['ASIG_CODIGO']."'><img src='../../../Src/imgs/edit.png'></a></td>
                <td class='text-center'><img src='../../../Src/imgs/delete.png' onclick='ajax_eli_asig(".$fila['ASIG_CODIGO'].");' data-bs-toggle='modal' data-bs-target='#elimimarModal'></td>
            </tr>";
        $f++;
    }
//}
//else
//{
//    echo "<tr><td colspan='6' class='bg-danger text-light text-center'>No existen registros a mostrar</td></tr>";
//}
echo "</table>";
?>