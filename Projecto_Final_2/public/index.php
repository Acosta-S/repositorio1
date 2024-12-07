<?php

$request = $_SERVER['REQUEST_URI'];

$request = strtok($request, '?');

switch($request){
    case '/':
        require_once __DIR__.'/../src/views/public/welcome.php';
        break;
    case '/tareas':
        require_once __DIR__.'/../src/views/public/tareas/details.php';
        break;
    case '/tareas-admin':
        require_once __DIR__.'/../src/views/admin/tareas/index.php';
        break;
    case '/tareas/form':
        require_once __DIR__.'/../src/views/admin/tareas/form.php';
        break;
    case '/login':
        require_once __DIR__.'/login.php';
        break;
    case '/logout':
        require_once __DIR__.'/../src/controllers/LogoutController.php';
        break;
    default:
        http_response_code(404);
        //Hacer una vista de 404
        break;

}

