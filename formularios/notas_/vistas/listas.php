<?php
// Lista desde el servidor (puedes reemplazarlo con datos de MySQL)
$items = ['Item 1', 'Item 2', 'Item 3', 'Item 4', 'uuu'];
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Drag and Drop Listas</title>
    <style>
        .container {
            display: flex;
            gap: 50px;
            margin-top: 30px;
        }
        .list {
            border: 2px dashed #888;
            width: 200px;
            min-height: 200px;
            padding: 10px;
        }
        .item {
            margin: 5px;
            padding: 10px;
            background-color: #cce5ff;
            cursor: grab;
        }
    </style>
</head>
<body>

<h2>Control de listas - Arrastrar entre listas</h2>

<div class="container">
    <div class="list" id="list1" ondrop="drop(event)" ondragover="allowDrop(event)">
        <h3>Lista 1</h3>
        <?php foreach ($items as $i => $item): ?>
            <div id="item<?= $i ?>" class="item" draggable="true" ondragstart="drag(event)">
                <?= htmlspecialchars($item) ?>
            </div>
        <?php endforeach; ?>
    </div>

    <div class="list" id="list2" ondrop="drop(event)" ondragover="allowDrop(event)">
        <h3>Lista 2</h3>
    </div>
</div>

<script>
function allowDrop(ev) {
    ev.preventDefault();
}

function drag(ev) {
    ev.dataTransfer.setData("text", ev.target.id);
}

function drop(ev) {
    ev.preventDefault();
    var data = ev.dataTransfer.getData("text");
    var item = document.getElementById(data);
    if (ev.target.classList.contains("list")) {
        ev.target.appendChild(item);
    } else if (ev.target.parentNode.classList.contains("list")) {
        ev.target.parentNode.appendChild(item);
    }
}
</script>

</body>
</html>
