<?php 
    include_once __DIR__.'/../../layouts/header.php';
    require_once __DIR__ . '/../../../helpers/auth.php';
    require __DIR__.'/../../../controllers/ControladorTareas.php';
    
    $title = 'Añadir';
    $tarea = null;
    $route = SRC_URL.'/controllers/ControladorTareas.php';

    if(isset($_GET['id'])){
        $title = 'Editar';
        $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_STRING);
        $tarea = show($id);
        $route.="?id=$id";
    }
?>

<div class="form-container">
        <h1><?=$title?> Tarea</h1>
        <form action="<?=$route?>" method="POST" enctype="multipart/form-data">
            <!-- Carrera -->
            <div class="form-group">
                <label for="carrera">Nombre de la Carrera</label>
                <input type="text" id="carrera" name="carrera" placeholder="Ingrese el nombre de la carrera" value="<?=$tarea['carrera'] ?? ''?>" required>
            </div>

            <!-- Materia -->
            <div class="form-group">
            <label for="materia">Nombre de la Materia</label>
            <input type="text" id="materia" name="materia" placeholder="Ingrese el nombre de la materia" value="<?=$tarea['materia'] ?? ''?>" required>
            </div>

            <!-- Semestre -->
            <div class="form-group">
                <label for="semestre">Semestre</label>
                <input type="text" id="semestre" name="semestre" placeholder="Ingrese el semestre" value="<?=$tarea['semestre'] ?? ''?>" required>
            </div>

            <!-- Nombre -->
            <div class="form-group">
                <label for="nombre">Nombre de la tarea</label>
                <input type="text" id="nombre" name="nombre" placeholder="Ingrese el nombre de la tarea" value="<?=$tarea['nombre'] ?? ''?>" required>
            </div>

            <!-- Fecha -->
            <div class="form-group">
                <label for="fecha">Fecha de entrega</label>
                <input type="text" id="fecha" name="fecha" placeholder="Ingrese la fecha de entrega" value="<?=$tarea['fecha'] ?? ''?>" required>
            </div>

            <!-- Submit Button -->
            <div class="form-group action-buttons">
                <button class="submit-button" type="submit">Guardar</button>
                <a href="index.php" type="submit">Regresar</a>
            </div>
            <?php 
            if(isset($_SESSION['success'])): 
            ?>
                <?php echo htmlspecialchars($_SESSION['success'])?>
            <?php 
            $_SESSION['success'] = '';
            endif;
            if(isset($_SESSION['errors'])):
            ?>
                <p class="error">
            <?php 
                foreach($_SESSION['errors'] as $error):     
            ?>
                    <?php echo htmlspecialchars($error);?>
            <?php
                endforeach; 
            ?>
                </p>
            <?php
                $_SESSION['errors'] = [];
            endif; 
            ?>
        </form>

    </div>

    <?php include_once __DIR__.'/../../layouts/footer.php'; ?>