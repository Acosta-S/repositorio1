<?php 
    include_once __DIR__.'/../../layouts/header.php';
    require_once __DIR__ . '/../../../helpers/auth.php';
    require __DIR__.'/../../../controllers/ControladorTareas.php';
    
    $title = 'Añadir';
    $career = null;
    $route = SRC_URL.'/controllers/ControladorTareas.php';

    if(isset($_GET['id'])){
        $title = 'Editar';
        $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_STRING);
        $career = show($id);
        $route.="?id=$id";
    }
?>

<div class="form-container">
        <h1><?=$title?> Tarea</h1>
        <form action="<?=$route?>" method="POST" enctype="multipart/form-data">
        carrera, semestre, nombre, fecha
            <!-- Carrera -->
            <div class="form-group">
                <label for="carrera">Nombre de la Carrera</label>
                <input type="text" id="carrera" name="carrera" placeholder="Ingrese el nombre de la carrera" value="<?=$tarea['name'] ?? ''?>" required>
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
            
                <p class="success"><?php echo htmlspecialchars($_SESSION['success'])?></p>
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