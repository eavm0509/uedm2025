<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Drag & Drop con Ponderación (Bootstrap)</title>
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
    <div class="row">
      <!-- Lista de origen -->
      <div class="col-md-6 mb-4">
        <h5 class="text-primary">Lista de origen</h5>
        <div class="lista" id="origen">
          <div class="item" draggable="true" data-nombre="Actividad 1">Actividad 1</div>
          <div class="item" draggable="true" data-nombre="Actividad 2">Actividad 2</div>
          <div class="item" draggable="true" data-nombre="Actividad 3">Actividad 3</div>
          <div class="item" draggable="true" data-nombre="Actividad 4">Actividad 4</div>
          <div class="item" draggable="true" data-nombre="Actividad 5">Actividad 5</div>
          <div class="item" draggable="true" data-nombre="Actividad 6">Actividad 6</div>
          <div class="item" draggable="true" data-nombre="Actividad 7">Actividad 7</div>
        </div>
      </div>

      <!-- Lista de destino -->
      <div class="col-md-6 mb-4">
        <h5 class="text-success">Lista de destino</h5>
        <div class="lista" id="destino"></div>
        <div id="total" class="text-end text-dark">Total: 0%</div>
      </div>
    </div>
  </div>

  <script>
    // Activar arrastrar desde lista de origen
    document.querySelectorAll('.item').forEach(el => {
      el.addEventListener('dragstart', function (e) {
        e.dataTransfer.setData('text', e.target.dataset.nombre);
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
      const nombre = e.dataTransfer.getData('text');

      // Evitar duplicados
      if ([...destino.querySelectorAll('.item')].some(i => i.dataset.nombre === nombre)) {
        alert('Este elemento ya fue agregado.');
        return;
      }

      const contenedor = document.createElement('div');
      contenedor.className = 'item';
      contenedor.dataset.nombre = nombre;

      const etiqueta = document.createElement('span');
      etiqueta.textContent = nombre;

      const input = document.createElement('input');
      input.type = 'number';
      input.className = 'form-control ponderacion-input mt-2';
      input.min = 1;
      input.max = 100;
      input.value = 100;

      input.addEventListener('input', () => {
        const val = parseInt(input.value, 10);
        if (isNaN(val) || val < 1 || val > 100) {
          input.classList.add('is-invalid');
        } else {
          input.classList.remove('is-invalid');
        }
        actualizarTotal();
      });

      contenedor.appendChild(etiqueta);
      contenedor.appendChild(input);
      destino.appendChild(contenedor);

      actualizarTotal();
    });
  </script>
</body>
</html>
