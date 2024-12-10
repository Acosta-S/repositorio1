<?php 

require_once __DIR__.'/../helpers/functions.php'; // Importa funciones auxiliares.



// Manejo de solicitudes POST

if ($_SERVER['REQUEST_METHOD'] === 'POST'){

    clean_post_inputs(); // Limpia las entradas del formulario para mayor seguridad.

    if(isset($_GET['id'])){ 

        update(filter_input(INPUT_GET, 'id', FILTER_SANITIZE_STRING)); // Si se recibe un ID, actualiza la tarea.

    }else{

        store(); // Si no hay ID, guarda una nueva tarea.

    }

}



// Obtiene la lista de tareas.

function index()

{

    $pdo = getPDO(); // Obtiene la conexión PDO.

    try {

        $sql = "SELECT id, carrera, materia, semestre, nombre, fecha FROM tareas"; // Consulta SQL para obtener las tareas.

        $stmt = $pdo->query($sql);

        $tareas = $stmt->fetchAll(PDO::FETCH_ASSOC); // Obtiene las filas como un arreglo asociativo.

        return $tareas; // Retorna las tareas.

    } catch (PDOException $e) {

        error_log("Error al consultar la base de datos". $e->getMessage()); // Registra el error en el log.

        return []; // Retorna un arreglo vacío en caso de error.

    }

}



// Muestra los detalles de una tarea específica.

function show($id) 

{

    $id = htmlspecialchars($id); // Escapa caracteres para evitar inyecciones de HTML/JS.



    if ($id === null) {

        return []; // Retorna un arreglo vacío si el ID no es válido.

    }



    $pdo = getPDO(); // Obtiene la conexión PDO.



    try {

        $sql = "SELECT * FROM tareas WHERE id = :id LIMIT 1"; // Consulta SQL para buscar una tarea específica.

        $stmt = $pdo->prepare($sql);

        $stmt->execute(['id' => $id]); // Ejecuta la consulta con el ID.

        $datosTarea = $stmt->fetch(PDO::FETCH_ASSOC); // Obtiene el resultado.



        if (!$datosTarea) {

            return []; // Si no encuentra datos, retorna un arreglo vacío.

        }



        return $datosTarea; // Retorna los datos de la tarea.

    } catch (PDOException $e) {

        error_log("Error al consultar la base de datos: " . $e->getMessage());

        return []; // En caso de error, retorna un arreglo vacío.

    }

}



// Almacena una nueva tarea en la base de datos.

function store() {
    

    $pdo = getPDO(); // Obtiene la conexión PDO.



    try {

        $sql = "INSERT INTO tareas (carrera, materia, semestre, nombre, fecha) VALUES (:carrera, :materia, :semestre, :nombre, :fecha)";

        $stmt = $pdo->prepare($sql); // Prepara la consulta SQL.

        $data = [
            
            // Datos del formulario.

            'carrera' => $_POST['carrera'],

            'materia' => $_POST['materia'],

            'semestre' => $_POST['semestre'],

            'nombre' => $_POST['nombre'],

            'fecha' => $_POST['fecha'],

        ];



        $stmt->execute($data); // Ejecuta la consulta.

        

        set_success_message('Se ha agregado la tarea.'); // Mensaje de éxito.

        cache_tareas(); // Actualiza la caché (si aplica).

        redirect_back(); // Redirige al usuario.

    } catch (PDOException $e) {

        error_log("Error al consultar la base de datos: " . $e->getMessage()); // Registra el error.

        set_error_message_redirect($e->getMessage()); // Mensaje de error.

    }

}



// Actualiza una tarea existente.

function update($id) {

    $pdo = getPDO(); // Obtiene la conexión PDO.

    $datosTarea = show($id); // Obtiene los datos de la tarea existente.

    try {

        $sql = "UPDATE tareas SET 
                    
                    carrera = :carrera, 

                    materia = :materia,

                    semestre = :semestre, 

                    nombre = :nombre, 

                    fecha = :fecha, 

                WHERE id = :id"; // Consulta para actualizar la carrera.

        $stmt = $pdo->prepare($sql);

        $data = [

            'id' => $id, 

            'carrera' => $_POST['carrera'],

            'materia' => $_POST['materia'],

            'semestre' => $_POST['semestre'],

            'nombre' => $_POST['nombre'],

            'fecha' => $_POST['fecha'],

        ];



        $stmt->execute($data); // Ejecuta la consulta.
        
        set_success_message('Se han guardado los cambios.'); // Mensaje de éxito.

        redirect_back(); // Redirige al usuario.

    } catch (PDOException $e) {

        error_log("Error al consultar la base de datos: " . $e->getMessage()); // Registra el error.

        set_error_message_redirect($e->getMessage()); // Mensaje de error.

    }



    

}

