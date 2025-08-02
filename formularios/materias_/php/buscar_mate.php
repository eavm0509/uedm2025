<?php
include '../../../login/verificar_sesion3n_mixto.php';
ini_set('display_errors', 1);
error_reporting(E_ALL);
require_once("modelo.php");
$miclase= new clase_materias();
$registros=$miclase->_consultartodovista($_POST['valor']); 
echo "<table id='tabla' name='tabla' class='table table-bordered'>
        <thead class='bg-primary text-light text-center'>
            <tr>
                <th>No</th>
                <th>ID</th>
                <th>CURSO</th>
                <th>ASIGNATURA</th>
                <th>DOCENTE</th>
                <th>AREA</th>
                <th>OFICIAL</th>
                <th>TIPO</th>
                <th>OCULTA</th>
                <th>ORDEN</th>
                <th>AMBITO</th>
                <th>DESTREZA</th>
                <th>EDITAR</th>
                <th>ELIMINAR</th>
            </tr>
        </thead>";
    $f=1;
    while ($fila = $registros->fetch())
    {
        echo "<tr>
                <td>".$f."</td>
                <td>".$fila['MAT_CODIGO']."</td>
                <td>".$fila['FCU_DESCRI']."</td>
                <td>".$fila['ASIG_NOMBRE']."</td>
                <td>".$fila['PER_APENOM']."</td>
                <td>".$fila['ARE_NOMBRE']."</td>
                <td>
                    <input type='checkbox' disabled ".($fila['MAT_RESALT'] ? 'checked' : '').">
                </td>
                
                <td class='text-center'>" 
                . ($fila['MAT_TIPO'] == 1 ? 'Cuanti' : 'Cualit') .
                "</td>
                <td>
                    <input type='checkbox' disabled ".($fila['MAT_OCULTA'] ? 'checked' : '').">
                </td>
                <td>".$fila['MAT_ORDEN']."</td>
                <td>
                    <input type='checkbox' disabled ".($fila['MAT_AMBITO'] ? 'checked' : '').">
                </td>
                <td>
                    <input type='checkbox' disabled ".($fila['MAT_DESTREZA'] ? 'checked' : '').">
                </td>
                <td class='text-center'><a href='../vistas/modificar.php?valorviajero=".$fila['MAT_CODIGO']."'><img src='../../../Src/imgs/edit.png'></a></td>
                <td class='text-center'><img src='../../../Src/imgs/delete.png' onclick='ajax_eli_mate(".$fila['MAT_CODIGO'].");' data-bs-toggle='modal' data-bs-target='#elimimarModal'></td>
            </tr>";
        $f++;
    }
echo "</table>";
?>