<!-- views/listar.php -->
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <link rel="shortcut icon" href="public/img/favicon.ico" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="public/css/dashboard-style.css">
</head>

<body>

    <?php include 'templates/header.php'; ?>

    <div class="container d-flex justify-content-center align-items-center w-100" style="height: 80vh;">

        <div>
            
            <div>
                <h1 class="mb-3 text-white text-center fw-bold">
                    <span id="welcome" class="fst-italic">Welcome back,</span> 
                    <?php echo $_SESSION['idusuario'] ?>
                </h1>
                <div class="mb-5 p-2" id="reminder">
                    <p>
                    Even if it costs you your arms and legs, you must fight.
                    </p>
                </div>
            </div>

            <div class="text-white border-bottom border-3 border-subtle mb-4">
                <h2>Active ghouls list</h2>
            </div>

            <?php if (isset($_GET['message'])): ?>
                <div class="message">
                    <?php
                    // aquí se mostrarían los diferentes mensajes de confirmación tras la realización
                    // de cualquiera de las 3 operaciones restantes: crear, modificar, eliminar
                    // ya que volveremos a esta vista
                    if ($_GET['message'] == 'created') echo 'Alumno creado correctamente.';
                    if ($_GET['message'] == 'updated') echo 'Alumno actualizado correctamente.';
                    if ($_GET['message'] == 'deleted') echo 'Alumno eliminado correctamente.';
                    ?>
                </div>
            <?php endif; ?>

            <a class="btn btn-primary p-2 mb-3" id="btn-crear" href="index.php?action=create">Add new ghoul</a>

            <table class="table table-hover table-subtle w-100">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Ghoul ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">Rank</th>
                        <th scope="col">Kagune</th>
                        <th scope="col">Ward</th>
                        <th scope="col">Contained</th>
                        <th scope="col">First Activity</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">
                    <?php foreach ($_SESSION['ghoul'] as $ghoul): ?><!-- alumno es una colección de filas de la tabla -->
                        <tr>
                            <th scope="row"><?php echo $ghoul['id']; ?></th>
                            <td><?php echo $ghoul['ghoulid']; ?></td>
                            <td><?php echo htmlspecialchars($ghoul['name']); ?></td>
                            <td><?php echo htmlspecialchars($ghoul['rank']); ?></td>
                            <td><?php echo htmlspecialchars($ghoul['kagune']); ?></td>
                            <td><?php echo $ghoul['ward']; ?></td>
                            <td><?php echo $ghoul['contained'] == 1 ? 'Yes' : 'No'; ?></td>
                            <td><?php echo $ghoul['first_detected_activity']; ?></td>
                            <td>
                                <!-- en la última celda incluimos los botones para ir a borrar o editar una fila -->
                                <a href="index.php?action=edit&id=<?php echo $ghoul['id']; ?>">Editar</a>
                                <a href="index.php?action=delete&id=<?php echo $ghoul['id']; ?>" onclick="return confirm('¿Estás seguro?');">Eliminar</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.min.js"
        integrity="sha384-G/EV+4j2dNv+tEPo3++6LCgdCROaejBqfUeNjuKAiuXbjrxilcCdDz6ZAVfHWe1Y"
        crossorigin="anonymous"></script>

</body>

</html>