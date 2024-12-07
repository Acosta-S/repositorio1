<?php 
include_once __DIR__.'/../../layouts/header.php';
require_once __DIR__ . '/../../../helpers/auth.php';
require __DIR__.'/../../../controllers/ControladorTareas.php';
$careers = index();
?>

<div class="table-container">
        <div class="table-container-header">
            <h1 class="h1-table">Lista de tareas</h1>
            <a href="<?=BASE_URL?>/tareas/form" class="add-button">Añadir Tarea</a>
        </div>

        <table>
            <thead>
                <tr>
                    <th>Carrera</th>
                    <th>Materia</th>
                    <th>Semestre</th>
                    <th>Nombre</th>
                    <th>Fecha</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($tareas as $tarea): ?>
                <tr>
                    <td><?=$tarea['carrera']?></td>
                    <td><?=$tarea['materia']?></td>
                    <td><?=$tarea['semestre']?></td>
                    <td><?=$tarea['nombre']?></td>
                    <td><?=$tarea['fecha']?></td>
                    <td class="actions">
                        <a href="#">Ver</a>
                        <a href="<?=BASE_URL?>/tareas/form?id=<?=$tarea['id']?>">Editar</a>
                        <a href="#">Eliminar</a>
                    </td>
                </tr>
                <?php endforeach; ?>     
            </tbody>
        </table>
    </div>
    <?php include_once __DIR__.'/../../layouts/footer.php'; ?>
