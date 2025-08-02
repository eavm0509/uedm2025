<?php
include '../../../login/verificar_sesion3n_mixto.php';
// Este archivo debe tener conexión a la base de datos
include("../../../conexion/conexion.php"); // ajusta tu conexión
require_once('../php/modelo.php');
$codreg = isset($_GET['codreg']) ? intval($_GET['codreg']) : 0;
$obj = new clase_notas_registro();
$rowa = $obj->_consultartodo($_GET['txt_codigo']); //$_POST['codigo']
$resultado = $rowa ? $rowa->fetchAll(PDO::FETCH_ASSOC) : [];
            
//Datos del registro            
$regi_regi=$obj->_consultarcodigo($codreg); 
$regi_regi_fila = $regi_regi ? $regi_regi->fetch(PDO::FETCH_ASSOC) : false;

?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Notas con REG_ID, REG_DESCRIP y REG_PORCEN</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    .lista {
      min-height: 400px;
      max-height: 400px;
      overflow-y: auto;
      border: 2px dashed #6c757d;
      padding: 10px;
      background-color: #f8f9fa;
    }
    .item {
      padding: 10px;
      margin-bottom: 8px;
      background-color: #d0e8ff;
      border-radius: 5px;
      cursor: grab;
    }
    .ponderacion-input {
      width: 100%;
      margin-top: 5px;
    }
    #total {
      font-weight: bold;
      margin-top: 15px;
    }
  </style>
</head>
<body>

<div class="container mt-4">
  <form action="guardar_notas.php" method="POST">
    <div class="row">
      <!-- Lista de origen -->
      <div class="col-md-6 mb-4">
        <h5 class="text-primary">Registros para promediar disponibles</h5>
        <div class="lista" id="origen">
          <?php foreach ($resultado as $row): ?>
          <?php //while($row = $resultado->fetch_assoc()): ?> 
            <div class="item" draggable="true"
                 data-id="<?php echo $row['REG_ID']; ?>"
                 data-descrip="<?php echo htmlspecialchars($row['REG_DESCRI']); ?>">
              <?php echo htmlspecialchars($row['REG_DESCRI']); ?>
            </div>
          <?php endforeach;  ?>
        </div>
      </div>

      <!-- Lista de destino -->
      <div class="col-md-6 mb-4">
        <h5 class="text-success">Registros de notas seleccionados</h5>
        <div class="lista" id="destino"></div>
        <div id="total" class="text-end text-dark">Total: 0%</div>
        <button type="submit" class="btn btn-primary mt-3">Guardar</button>
      </div>
    </div>
  </form>
</div>

<script>
  // Activar arrastre
  document.querySelectorAll('.item').forEach(el => {
    el.addEventListener('dragstart', function (e) {
      e.dataTransfer.setData('id', e.target.dataset.id);
      e.dataTransfer.setData('descrip', e.target.dataset.descrip);
    });
  });

  const destino = document.getElementById('destino');
  const totalDisplay = document.getElementById('total');

  function actualizarTotal() {
    let total = 0;
    const inputs = destino.querySelectorAll('input.ponderacion-input');
    inputs.forEach(input => {
      const val = parseInt(input.value, 10);
      if (!isNaN(val)) total += val;
    });
    totalDisplay.textContent = `Total: ${total}%`;
  }

  destino.addEventListener('dragover', function (e) {
    e.preventDefault();
  });

  destino.addEventListener('drop', function (e) {
    e.preventDefault();
    const id = e.dataTransfer.getData('id');
    const descrip = e.dataTransfer.getData('descrip');

    // Evitar duplicados
    if ([...destino.querySelectorAll('.item')].some(i => i.dataset.id === id)) {
      alert('Este registro ya fue agregado.');
      return;
    }

    const contenedor = document.createElement('div');
    contenedor.className = 'item';
    contenedor.dataset.id = id;

    const span = document.createElement('span');
    span.textContent = `(${id}) ${descrip}`;

    const inputId = document.createElement('input');
    inputId.type = 'hidden';
    inputId.name = 'reg_id[]';
    inputId.value = id;

    const inputDescrip = document.createElement('input');
    inputDescrip.type = 'hidden';
    inputDescrip.name = 'reg_descrip[]';
    inputDescrip.value = descrip;

    const inputPorcen = document.createElement('input');
    inputPorcen.type = 'number';
    inputPorcen.name = 'reg_porcen[]';
    inputPorcen.className = 'form-control ponderacion-input mt-2';
    inputPorcen.min = 1;
    inputPorcen.max = 100;
    inputPorcen.value = 100;

    inputPorcen.addEventListener('input', () => {
      const val = parseInt(inputPorcen.value, 10);
      inputPorcen.classList.toggle('is-invalid', isNaN(val) || val < 1 || val > 100);
      actualizarTotal();
    });

    contenedor.appendChild(span);
    contenedor.appendChild(inputId);
    contenedor.appendChild(inputDescrip);
    contenedor.appendChild(inputPorcen);
    destino.appendChild(contenedor);

    actualizarTotal();
  });
</script>

</body>
</html>
