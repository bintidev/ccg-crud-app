<!-- views/editar.php -->
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Editar Alumno</title>
</head>

<body>
    <h2>Editar Alumno</h2>
    <!-- Usamos $alumno_data que viene del controlador -->
    <form method="POST" action="index.php?action=edit&id=<?php echo $alumno_data->numAlumno; ?>">
        <input type="hidden" name="numAlumno" value="<?php echo $alumno_data->numAlumno; ?>">
        <label>Nombre: <input type="text" name="nombre" value="<?php echo htmlspecialchars($alumno_data->nombre); ?>" required></label><br>
        <label>Apellidos: <input type="text" name="apellidos" value="<?php echo htmlspecialchars($alumno_data->apellidos); ?>" required></label><br>
        <label>Fecha de Nacimiento: <input type="date" name="fechaNacimiento" value="<?php echo htmlspecialchars($alumno_data->fechaNacimiento); ?>" required></label><br>
        <label>Repite: <input type="checkbox" name="repite" <?php echo $alumno_data->repite ? 'checked' : ''; ?>></label><br>
        <button type="submit" name="update">Actualizar Alumno</button>
    </form>
    <p><a href="index.php?action=index">Volver al listado</a></p>
</body>

</html>