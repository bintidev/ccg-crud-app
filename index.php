<?php

require_once 'controllers/AuthController.php';  // el controlador de autentificación y
require_once 'models/User.php';                 // el modelo de usuarios son cargados al empezar																							// ambos son declaraciones de clases -> orientación a objetos pura
include 'config/secure-session.php';

$controller = new GhoulController();            // creamos una instancia del controlador de alumno

// Determina qué acción se solicita, si no hubiera ninguna, por defecto adoptamos index
$action = isset($_GET['action']) ? $_GET['action'] : 'index';

// Llama al método correspondiente del controlador
switch ($action) {
    case 'index':
        $controller->index();          // se invoca al método index() de AlumnoController
        break;
    case 'create':
        $controller->create();         // se invoca al método create() de AlumnoController
        break;
    case 'edit':
        $controller->edit();           // se invoca al método edit() de AlumnoController
        break;
    case 'delete':
        $controller->delete();         // se invoca al método delete() de AlumnoController
        break;
    default:
        $controller->index();          // por defecto, se invoca a index()
        break;
}