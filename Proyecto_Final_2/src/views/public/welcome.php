
<?php 
        include_once __DIR__.'/../layouts/header.php';
        $tareas = getTareas();
    ?>

<div class="sidebar">
<h2>Bienvenidos la RED UABCS</h2>
<h4>Pulse el boton de "Iniciar Sesion" 
<br>
para agregar una tarea nueva</h4>
        </div>
<!--Lista de tareas-->
<main class="main-content">
<?php foreach($tareas as $tarea): ?>
<div class="lista-tareas">
        <div class="tarea">
    Tarea:
    <h1><?=$tarea['nombre']?></h1>
    <hr>
    Clase:
    <h4><?=$tarea['materia']?></h4>
    <hr>
    Carrera:
    <h4><?=$tarea['carrera']?></h4>
    <hr>
    Semestre:
    <h4><?=$tarea['semestre']?></h4>
    <hr>
    Entrega:
    <h4><?=$tarea['fecha']?></h4>
        </div>
    <br>
</div>
<?php endforeach; ?>
        </main>
        <?php include __DIR__.'/../layouts/footer.php'; ?>
