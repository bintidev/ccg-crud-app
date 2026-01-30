<?php
/*
 * Generador de INSERTs para la tabla usuarios con password_hash
 * Úsalo solo para obtener los INSERTs correctos y copiar en usuarios.sql
 */

$usuarios = [
    ['agentid' => 'MK001', 'password' => 'KureoMad0_!', 'last_name' => 'Mado', 'name' => 'Kureo'],
    ['agentid' => 'TN219',   'password' => '@tsuri-wLuV33', 'last_name' => 'Nori', 'name' => 'Tsuda'],
];

echo "<pre>"; // formato legible en navegador

echo "-- Volcado de datos para la tabla `users`\n\n";

foreach ($usuarios as $u) {
    $hash = password_hash($u['password'], PASSWORD_DEFAULT);
    $sql = "INSERT INTO `users` (`agentid`, `password`, `last_name`, `name`) VALUES ";
    $sql .= "('{$u['agentid']}', '$hash', '{$u['last_name']}', '{$u['name']}');";
    echo $sql . "\n";
}

echo "</pre>";