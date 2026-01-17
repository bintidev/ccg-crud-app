
<!-- views/editar.php -->
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Edit Ghoul Info</title>
    <link rel="shortcut icon" href="public/img/favicon.ico" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="public/css/forms-style.css">
    <link rel="stylesheet" href="public/css/editar-style.css">
</head>

<body class="d-flex flex-column justify-content-center align-items-center">

    <div class="background-animated"></div>

    <div class="wrapper row" id="container">

        <form method="POST" class="d-flex justify-content-center align-items-center"
        action="index.php?action=edit&id=<?php echo $_SESSION['ghoul_data']->id ?>" id="actionForm">
            <h4>Edit Ghoul</h4>

            <input type="hidden" name="id" value="<?php echo $_SESSION['ghoul_data']->id; ?>">

            <div class="floating-label mb-3">
                <label for="ghoulid">Ghoul ID</label>
                <input type="text" name="ghoulid" id="ghoulid" value="<?php echo htmlspecialchars($_SESSION['ghoul_data']->ghoulid); ?>">
            </div>

            <div class="floating-label mb-3">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" value="<?php echo htmlspecialchars($_SESSION['ghoul_data']->name); ?>">
            </div>

            <div class="floating-label mb-5">
                <label for="rank">Rank</label>
                <input type="text" name="rank" id="rank" value="<?php echo htmlspecialchars($_SESSION['ghoul_data']->rank ? $_SESSION['ghoul_data']->rank : ''); ?>">
            </div>

            <div class="floating-label mb-3">
                <label>Kagune</label>
                <select class="form-select" aria-label="Default select example" name="kagune" id="kagune">
                    <option selected value="">Select kagune type</option>
                    <option value="uka" <?php echo htmlspecialchars($_SESSION['ghoul_data']->kagune == 'Ukaku') ? 'selected' : ''; ?>>Ukaku</option>
                    <option value="kou" <?php echo htmlspecialchars($_SESSION['ghoul_data']->kagune == 'Koukaku') ? 'selected' : ''; ?>>Koukaku</option>
                    <option value="rin" <?php echo htmlspecialchars($_SESSION['ghoul_data']->kagune == 'Rinkaku') ? 'selected' : ''; ?>>Rinkaku</option>
                    <option value="bi" <?php echo htmlspecialchars($_SESSION['ghoul_data']->kagune == 'Bikaku') ? 'selected' : ''; ?>>Bikaku</option>
                </select>
            </div>

            <div class="floating-label mb-3">
                <label for="ward">Ward</label>
                <input type="number" name="ward" id="ward" value="<?php echo $_SESSION['ghoul_data']->ward ? $_SESSION['ghoul_data']->ward : '0'; ?>">
            </div>

            <div class="mb-3">
                <div class="form-check form-switch containment_status">
                    <input class="form-check-input" type="checkbox" name="contained" role="switch" id="contained" <?php echo ($_SESSION['ghoul_data']->contained == 0) ? '' : 'checked'; ?>>
                    <label class="form-check-label" for="switchCheckChecked">Contained</label>
                </div>
                <div id="ccontainment_statusHelp" class="form-text text-danger"></div>
            </div>
            
            <div class="floating-label mb-5">
                <label>First Detected Activity</label>
                <input type="date" name="first_detected_activity" id="first_detected_activity" value="<?php echo htmlspecialchars($_SESSION['ghoul_data']->first_detected_activity); ?>">
            </div>

            <div class="form-buttons">
                <button type="submit" class="btn p-3" name="update" id="btn-actualizar">Update Ghoul Info</button>
                <a class="btn p-3" href="index.php?action=index">Back to dashboard</a>
            </div>
        </form>

    </div>

    <script src="public/js/ghoul-validation.js"></script>

</body>

</html>