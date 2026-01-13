<!-- views/crear.php -->
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Crear Alumno</title>
</head>

<body>
    <h2>Crear Nuevo Alumno</h2>
    <form method="POST" action="index.php?action=create">
        <label>Nombre: <input type="text" name="nombre" required></label><br>
        <label>Apellidos: <input type="text" name="apellidos" required></label><br>
        <label>Fecha de Nacimiento: <input type="date" name="fechaNacimiento" required></label><br>
        <label>Repite: <input type="checkbox" name="repite" value="1"></label><br>
        <button type="submit">Crear Alumno</button>
    </form>
    <p><a href="index.php?action=index">Volver al listado</a></p>
</body>
