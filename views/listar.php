<!-- views/listar.php -->
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Listado de Alumnos (MVC)</title>
    <style>                            
        table {
            border-collapse: collapse;
            width: 100%;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        .message {
            color: green;
            margin-bottom: 10px;
        }
    </style>
</head>

<body>
    <h2>Active ghouls list</h2>

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

    <p><a href="index.php?action=create">Add new ghoul</a></p>

    <table>
        <thead>
            <tr>
                <th>Ghoul ID</th>
                <th>Name</th>
                <th>Rank</th>
                <th>Kagune</th>
                <th>District</th>
                <th>Organization</th>
                <th>First Detected Activity</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($_SESSION['ghoul'] as $ghoul): ?><!-- alumno es una colección de filas de la tabla -->
                <tr>
                    <td><?php echo $ghoul['ghoulid']; ?></td>
                    <td><?php echo htmlspecialchars($ghoul['name']); ?></td>
                    <td><?php echo htmlspecialchars($ghoul['rank']); ?></td>
                    <td><?php echo htmlspecialchars($ghoul['kagune']); ?></td>
                    <td><?php echo $ghoul['district']; ?></td>
                    <td><?php echo $ghoul['organization_member']; ?></td>
                    <td><?php echo $ghoul['first_detected_activity']; ?></td>
                    <td>
                        <!-- en la última celda incluimos los botones para ir a borrar o editar una fila -->
                        <a href="index.php?action=edit&id=<?php echo $_SESSION['ghoul']['ghoulid']; ?>">Editar</a> |
                        <a href="index.php?action=delete&id=<?php echo $_SESSION['ghoul']['ghoulid']; ?>" onclick="return confirm('¿Estás seguro?');">Eliminar</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

</body>

</html>