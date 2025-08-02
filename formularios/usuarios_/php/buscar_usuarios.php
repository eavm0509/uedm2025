<?php
include '../../../login/verificar_sesion3n_mixto.php';
require_once("modelo.php");
$miclase = new clase_usuarios();
$registros = $miclase->_consultartodovista($_POST['valor']); 

echo "<table id='tabla' class='table table-bordered'>
        <thead class='bg-primary text-light text-center'>
            <tr>
                <th>No</th>
                <th>ID</th>
                <th>Nombres</th>
                <th>Usuario</th>
                <th>Rol</th>
                <th>Editar</th>
                <th>Eliminar</th>
            </tr>
        </thead>";

$f = 1;
while ($fila = $registros->fetch()) {
    echo "<tr>
            <td>$f</td>
            <td>{$fila['USE_CODI']}</td>
            <td>{$fila['USE_APNO']}</td>
            <td>{$fila['USE_USER']}</td>
            <td>{$fila['ROL_NOMBRE']}</td>
            <td class='text-center'>
                <a href='../vistas/modificar.php?valor1000={$fila['USE_CODI']}'> 
                    <img src='../../../Src/imgs/edit.png' alt='Editar'>
                </a>
            </td>
            <td class='text-center'>
                <img src='../../../Src/imgs/delete.png' alt='Eliminar' 
                     onclick='ajax_eliminar_usuarios({$fila['USE_CODI']});' 
                     data-bs-toggle='modal' data-bs-target='#elimimarModal'>
            </td>
          </tr>";
    $f++;
}
echo "</table>";
?>
