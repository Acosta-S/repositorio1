<?php 
    require __DIR__.'/../../helpers/functions.php';
    $tareas = get_tareas_from_cache();
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RED UABCS</title>
    <link rel="stylesheet" href="<?=ASSETS_URL?>/css/style.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Sofia">
</head>

<body>
    <div class="grid-container">
        <header class="header">
            <img class="logo" src="<?=ASSETS_URL?>/img/uabcs.png">
            <nav>
                <a class="navigation-link" href="<?=BASE_URL?>">RED UABCS</a>
                <a href="https://www.uabcs.mx">UABCS</a>
                <a href="https://siia-web.uabcs.mx">SIIA</a>
            <?php 
            if(isset($_SESSION['user'])):
                ?>
                <a class="navigation-link" href="<?=BASE_URL?>/../src/views/admin/tareas/index.php">Lista de tareas</a>
                <a class="navigation-link" href="<?=BASE_URL?>/../src/controllers/LogoutController.php">Cerrar sesión</a>
            <?php else: ?>
                <a class="navigation-link" href="<?=BASE_URL?>/login.php">Iniciar sesión</a>
            <?php endif; 
            ?>
            </nav>
</header>
        