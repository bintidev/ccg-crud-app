<?php

require_once 'controllers/GhoulController.php';  // el controlador de autentificación y
require_once 'models/Ghoul.php';                 // el modelo de usuarios son cargados al empezar																							// ambos son declaraciones de clases -> orientación a objetos pura
include 'config/secure-session.php';

$auth_controller = new AuthController();
$ghoul_controller = new GhoulController();            // creamos una instancia del controlador de alumno

// Determina qué acción se solicita, si no hubiera ninguna, por defecto adoptamos index
$action = isset($_GET['action']) ? $_GET['action'] : 'login';

// Llama al método correspondiente del controlador
switch ($action) {
    case 'login':
        $auth_controller->login();              // si la action fuera login
        break;
    case 'authenticate':
        $auth_controller->authenticate();      // si hay que autenticar
        break;
    case 'dashboard':
        $auth_controller->dashboard();         // si vamos a la página interna de inicio de la aplicación
        break;
    case 'logout':
        $auth_controller->logout();            // si cerramos la sesión
        break;
    case 'index':
        $ghoul_controller->index();          // se invoca al método index() de AlumnoController
        break;
    case 'create':
        $ghoul_controller->create();         // se invoca al método create() de AlumnoController
        break;
    case 'edit':
        $ghoul_controller->edit();           // se invoca al método edit() de AlumnoController
        break;
    case 'delete':
        $ghoul_controller->delete();         // se invoca al método delete() de AlumnoController
        break;
    default:
        $ghoul_controller->login();
        break;
}