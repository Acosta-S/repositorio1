<?php 

require __DIR__.'/../config/database.php';

$config = require __DIR__.'/../config/config.php';

define('BASE_URL', $config['base_url']);

define('ASSETS_URL', $config['assets_url']);

define('SRC_URL', $config['src_url']);

define('CAREERS_CACHE_FILE',  __DIR__ .'/../cache/careers.json');



if (session_status() === PHP_SESSION_NONE) {

    session_start();

}



function cache_tareas() 

{

    $pdo = getPDO();



    try {

        $sql = "SELECT nombre FROM tareas";

        $stmt = $pdo->query($sql);

        $careers = $stmt->fetchAll(PDO::FETCH_ASSOC);

        //Si no existe, se crea el directorio

        if (!is_dir(__DIR__.'/../cache')) {

            mkdir(__DIR__.'/../cache', 0755, true);

        }



        //Se convierte a JSON y se agrega al archivo

        file_put_contents(CAREERS_CACHE_FILE, json_encode($careers));

    } catch (PDOException $e) {

        error_log("Error al consultar la base de datos: " . $e->getMessage());

    }



}



function get_tareas_from_cache()

{

    $tareas = [];



    if (file_exists(filename: TAREAS_CACHE_FILE)) {

        $tareas = json_decode(file_get_contents(filename: TAREAS_CACHE_FILE), true);

    }



    if(count($tareas) == 0){

        cache_tareas();

    }



    return json_decode(file_get_contents(TAREAS_CACHE_FILE), true);

}



function getTareas() 

{

    $pdo = getPDO();



    try{

        $sql = "SELECT carrera, semestre, nombre, fecha FROM tareas";

        $stmt = $pdo->query($sql);

        $tareas = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $tareas;

    }catch (PDOException $e){

        error_log("Error al consultar la base de datos". $e->getMessage());

        return [];

    }

}



function getDatosTarea($tarea = null){



    if($tarea == null && isset($_GET['tarea'])){

        $tarea = filter_input(INPUT_GET, 'tarea', FILTER_SANITIZE_STRING);

    }



    if ($tarea === null) {

        return [];

    }



    $pdo = getPDO();



    try {

        $sql = "SELECT * FROM tareas";

        $stmt = $pdo->prepare($sql);

        $stmt->execute(['tarea' => $tarea]);

        $datosTarea = $stmt->fetch(PDO::FETCH_ASSOC);



        if (!$datosTarea) {

            return []; // Carrera no encontrada

        }



        return $datosTarea;

    } catch (PDOException $e) {

        error_log("Error al consultar la base de datos: " . $e->getMessage());

        return [];

    }



}



function clean_post_inputs()

{

    foreach ($_POST as $key => $value) {

        $_POST[$key] = trim($_POST[$key]);

        $_POST[$key] = filter_input(INPUT_POST, $key, FILTER_SANITIZE_STRING);

    }

}



function set_success_message($message) 

{

    $_SESSION['success'] = $message;

}



function set_error_message($message)

{

    $_SESSION['errors'][] = $message;

}



function set_error_message_redirect($message)

{

    $_SESSION['errors'][] = $message;

    redirect_back();

}



function redirect_back(){

    header("Location: " . $_SERVER['HTTP_REFERER']);

    exit;

}







