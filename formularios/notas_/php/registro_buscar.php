<?php
include '../../../login/verificar_sesion3n_mixto.php'; 
require_once("modelo.php");
ini_set('display_errors', 1);
$obj_temporal= new clase_notas_registro();
$registros=$obj_temporal->_consultartodo($_POST['valor']); 
echo "<table id='tabla' name='tabla' class='table table-bordered'
        thead class='bg-primary text-light text-center'>
            <tr>
                <th>#</th>
                <th>ID</th>
                <th>FECHA</th>
                <th>DESCRIPCIÓN</th>
                <th>ING. NOTA</th>
                <th> % </th>
                <th>MAT.PADRE</th>
                <th>NOTAS</th>
                <th>Editar</th>
                <th>Eliminar</th>
                <th>Cálculos</th>
            </tr>
        </thead>";

    $f=1;
    while ($fila = $registros->fetch())
    {
        echo "<tr>
                <td>".$f."</td>
                <td>".$fila['REG_ID']."</td>
                <td>".$fila['REG_FECHA']."</td>
                <td style='display:none;'>".$fila['REG_CODMAT']."</td>
                <td>".$fila['REG_DESCRI']."</td>
                <td>
                    <input type='checkbox' disabled ".($fila['REG_INGNOT'] ? 'checked' : '').">
                </td>
                <td>".$fila['REG_PORCEN']."</td>
                <td>".$fila['REG_MPADRE']."</td>

                <td class='text-center'>
                  <a href='../php/registro_notas_actualizar.php?txt_codigo=".$fila['REG_ID']."'>
                  <img src='../../../Src/imgs/calculadora.png'>
                  </a>
                </td>


                
                <td class='text-center'>
                  <a href='../vistas/registro_modificar.php?v_id=".$fila['REG_ID']."'>
                  <img src='../../../Src/imgs/edit.png'></a></td>
             

                <td class='text-center'>
                  <a href='../php/registro_eliminar.php?txt_codigo=".$fila['REG_ID'].
                    "&xcodper=".$fila['PER_CODIGO'].
                    "&xcodmat=".$fila['MAT_CODIGO']."'>
                  <img src='../../../Src/imgs/delete.png'>
                  </a>
                </td>

                <td class='text-center'>
                  <a href='../vistas/registro_calculos.php?txt_codigo=".$fila['REG_CODMAT'].
                    "&xcodper=".$fila['PER_CODIGO'].
                    "&xcodmat=".$fila['MAT_CODIGO']."'>
                  <img src='../../../Src/imgs/configuracion.png'>
                  </a>
                </td>

             </tr>";
        $f++;
    }
// <td class='text-center'><a href='../php/registro_eliminar.php?txt_codigo=".$fila['REG_ID']."'><img src='../../../Src/imgs/delete.png'></a></td>
//<td class='text-center'><img src='../../../Src/imgs/delete.png' onclick='ajax_regnot_eli(".$fila['REG_ID'].");' data-bs-toggle='modal' data-bs-target='elimimarModal'></td>
echo "</table>";
?>
