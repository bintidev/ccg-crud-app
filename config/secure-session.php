<?php

// 2. Define el intervalo en segundos (por ejemplo, 1200 segundos = 20 minutos)
$regenerate_interval = 1200;

// 3. Almacena el tiempo de la última regeneración si no existe
if (!isset($_SESSION['last_regeneration'])) {
    $_SESSION['last_regeneration'] = time();
}

// 4. Verifica y regenera si es necesario
if (time() - $_SESSION['last_regeneration'] >= $regenerate_interval) {
	// Regenera el ID de sesión y elimina los datos de la sesión antigua
	session_regenerate_id(true);
	// Actualiza el timestamp para el próximo intervalo
	$_SESSION['last_regeneration'] = time();
}

// tiempo máximo de vida de la sesión
$session_lifetime = 7200;  // 2 horas en segundos

if (isset($_SESSION['last_regeneration']) && (time() - $_SESSION['last_regeneration'] > $session_lifetime)) {
    // Comprueba que el tiempo transcurrido no supera el del tiempo de vida de la sesión
    // Si lo supera, desactiva la sesión
    //session_unset();
    // Y la destruye
    //session_destroy();
    header('Location: index.php?action=logout');
    exit();
}


// generamos la primera vez un token que garantiza
// haber ingresado correctamente. impide la suplantacion
if (!isset($_SESSION['csrf_token']) || empty($_SESSION['csrf_token'])) {
	// Creación de un CSRF Token
    // genera un string aleatorio de 64 bytes y luego
    // se aplica un hashing
	$csrf_token = bin2hex(openssl_random_pseudo_bytes(64));

	// Resguardo del CSRF Token en una sesión
    // extremadamente dificil de suplantar o imitar
	$_SESSION['csrf_token'] = $csrf_token;

}