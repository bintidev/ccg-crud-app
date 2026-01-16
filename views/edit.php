
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

            <div class="floating-label mb-5">
                <label for="rank">Rank</label>
                <input type="text" name="rank" value="<?php echo htmlspecialchars($_SESSION['ghoul_data']->rank); ?>" required>
            </div>

            <div class="floating-label mb-3">
                <label>Kagune</label>
                <select class="form-select" aria-label="Default select example">
                    <option selected value="">Select kagune type</option>
                    <option value="1">Ukaku</option>
                    <option value="2">Koukaku</option>
                    <option value="3">Rinkaku</option>
                    <option value="4">Bikaku</option>
                </select>
            </div>

            <div class="floating-label mb-3">
                <label for="ward">Ward</label>
                <input type="text" name="ward" value="<?php echo htmlspecialchars($_SESSION['ghoul_data']->ward); ?>" required>
            </div>

            <div class="mb-3">
                <label class="d-block mb-2">Status</label>
                <div class="radio-group">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="radioDefault" id="radioDefault1" value="yes">
                        <label class="form-check-label" for="radioDefault1">
                            Yes
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="radioDefault" id="radioDefault2" value="no" checked>
                        <label class="form-check-label" for="radioDefault2">
                            No
                        </label>
                    </div>
                </div>
            </div>
            
            <div class="floating-label mb-5">
                <label>First Detected Activity</label>
                <input type="date" name="first_detected_activity" value="<?php echo htmlspecialchars($_SESSION['ghoul_data']->first_detected_activity); ?>" required>
            </div>

            <div class="form-buttons">
                <button type="submit" class="btn p-2" name="update" id="btn-actualizar">Update Ghoul Info</button>
                <a class="btn p-2" href="index.php?action=index">Back to dashboard</a>
            </div>
        </form>

    </div>

</body>

</html>