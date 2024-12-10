<?php
define('URL', '/repositorio1/Proyecto_Final_2/public');

$request = $_SERVER['REQUEST_URI'];

$request = strtok($request, '?');

switch($request){
    case URL.'/':
        require_once __DIR__.'/../src/views/public/welcome.php';
        break;
    case URL.'/tareas':
        require_once __DIR__.'/../src/views/public/tareas/details.php';
        break;
    case URL.'/tareas-admin':
        require_once __DIR__.'/../src/views/admin/tareas/index.php';
        break;
    case URL.'/tareas/form':
        require_once __DIR__.'/../src/views/admin/tareas/form.php';
        break;
    case URL.'/login':
        require_once __DIR__.'/login.php';
        break;
    case URL.'/logout':
        require_once __DIR__.'/../src/controllers/LogoutController.php';
        break;
    default:
        http_response_code(404);
        //Hacer una vista de 404
        break;

}

