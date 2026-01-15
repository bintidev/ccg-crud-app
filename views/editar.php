<!-- views/editar.php -->
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Editar Alumno</title>
    <link rel="shortcut icon" href="public/img/favicon.ico" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="public/css/login-style.css">
</head>

<body class="d-flex flex-column justify-content-center align-items-center">

    <div class="background-animated"></div>

    <div class="wrapper row w-25">

        <form method="POST" class="d-flex justify-content-center align-items-center"
        action="index.php?action=edit&id=<?php echo $_SESSION['ghoul_data']->id ?>">
            <h4>Edit Ghoul</h4>

            <input type="hidden" name="ghoulid" value="<?php echo $_SESSION['ghoul_data']->ghoulid; ?>">

            <div class="floating-label mb-3">
                <label for="ghoulid">Ghoul ID</label>
                <input type="text" name="ghoulid" value="<?php echo htmlspecialchars($_SESSION['ghoul_data']->ghoulid); ?>" required>
            </div>

            <div class="floating-label mb-3">
                <label for="name">Name</label>
                <input type="text" name="name" value="<?php echo htmlspecialchars($_SESSION['ghoul_data']->name); ?>" required>
            </div>

            <div class="floating-label mb-3">
                <label>Rank</label>
                <input type="text" name="rank" value="<?php echo htmlspecialchars($_SESSION['ghoul_data']->rank); ?>" required>
            </div>

            <div class="floating-label mb-3">
                <label>Kagune</label>
                <select name="kagune">
                    <option value="">--- Select an option ---</option>
                    <option value=""></option>
                </select>
                <input type="text" name="kagune" value="<?php echo htmlspecialchars($_SESSION['ghoul_data']->kagune); ?>" required>
            </div>
            
            
            
            <button type="submit" name="update">Actualizar Alumno</button>
        </form>

    </div>
    <!-- Usamos $alumno_data que viene del controlador -->
    
    <p><a href="index.php?action=index">Volver al listado</a></p>
</body>

</html>