<?php

//require_once 'controllers/AuthController.php';

// Iniciar sesión
// los parametros comentados son propias
// de la fase de produccion
session_set_cookie_params([
    'lifetime' => 1200,                       // esto limita el tiempo de las cookies (opcional)
    'path' => '/',                            // indica desde que directorio está habilitada. Así, toda la web
    //'domain' => 'tu-dominio.com',           // indica desde que dominio se puede acceder a ella únicamente
    //'secure' => isset($_SERVER['HTTPS']),   //*** solo acceso vía https (para el despliegue, no en desarrollos)
    'httponly' => true,                       //*** para que no sea accesible desde JavaScript, solo desde PHP
    'samesite' => 'Strict',                   // evita ataques CSRF. Otros valores son Lax o none (ver más abajo)
]);

session_start();