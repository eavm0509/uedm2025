<?php
include '../../../login/verificar_sesion3n_mixto.php';
require_once("modelo.php");
$miclase= new clase_representantes();
$registros=$miclase->_consultartodo($_POST['valor']); 
echo "<table id='tabla' name='tabla' class='table table-bordered'>
        <thead class='bg-primary text-light text-center'>
            <tr>
                <th>#</th>
                <th>CODIGO</th>
                <th>CEDULA</th>
                <th>APELLIDOS Y NOMBRES</th>
                <th>Editar</th>
                <th>Eliminar</th>
            </tr>
        </thead>";

    $f=1;
    while ($fila = $registros->fetch())
    {
        echo "<tr>
                <td>".$f."</td>
                <td>".$fila['REP_CODIGO']."</td>
                <td>".$fila['REP_CEDULA']."</td>
                <td>".$fila['REP_APENOM']."</td>
                <td class='text-center'><a href='../vistas/modificar.php?valor=".$fila['REP_CODIGO']."'><img src='../../../Src/imgs/edit.png'></a></td>
                <td class='text-center'><img src='../../../Src/imgs/delete.png' onclick='ajax_eli_representante(".$fila['REP_CODIGO'].");' data-bs-toggle='modal' data-bs-target='#elimimarModal'></td>
            </tr>";
        $f++;
    }

echo "</table>";
?>