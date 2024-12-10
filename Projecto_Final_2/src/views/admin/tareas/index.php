<?php 
include_once __DIR__.'/../../layouts/header.php';
require_once __DIR__ . '/../../../helpers/auth.php';
require __DIR__.'/../../../controllers/ControladorTareas.php';
$tareas = index();
?>

<div class="table-container">
    <div class="table-container-header">
        <h1 class="h1-table">Lista de tareas</h1>
        <button class="submit-button" type="input" ><a href="<?=BASE_URL?>/../src/views/admin/tareas/form.php" class="add-button">Añadir Tarea</a></button>
    </div>

        <table>
            <thead>
                <tr>
                    <th>Carrera</th>
                    <th>Materia</th>
                    <th>Semestre</th>
                    <th>Nombre</th>
                    <th>Fecha</th>
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
                </tr>
                <?php endforeach; ?>     
            </tbody>
        </table>
    </div>
    <?php include_once __DIR__.'/../../layouts/footer.php'; ?>
