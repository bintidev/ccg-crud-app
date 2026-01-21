
<!-- views/crear.php -->

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Add Ghoul</title>
    <link rel="shortcut icon" href="public/img/favicon.ico" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="public/css/forms-style.css">
    <link rel="stylesheet" href="public/css/header-style.css">
</head>

<body class="d-flex justify-content-center align-items-center">

    <div class="background-animated"></div>

    <div class="wrapper w-50" id="container">

        <form method="POST" class="d-flex justify-content-center align-items-center w-100"
        action="index.php?action=create" id="actionForm">
            <h4>Add Ghoul to System</h4>

            <div class="floating-label mb-3">
                <input type="text" name="ghoulid" id="ghoulid" placeholder="AA-bb000">
                <label for="ghoulid">Ghoul ID</label>
            </div>

            <div class="floating-label mb-3">
                <input type="text" name="name" id="name" placeholder="Name">
                <label for="name">Name</label>
            </div>

            <div class="floating-label mb-5">
                <input type="text" name="rank" id="rank" placeholder="Leave empty if unknown">
                <label for="rank">Rank</label>
            </div>

            <div class="floating-label mb-3">
                <select class="form-select" aria-label="Default select example" name="kagune" id="kagune">
                    <option selected value="">Select kagune type</option>
                    <option value="uka">Ukaku</option>
                    <option value="kou">Koukaku</option>
                    <option value="rin">Rinkaku</option>
                    <option value="bi">Bikaku</option>
                </select>
                <label for="kagune">Kagune</label>
            </div>

            <div class="floating-label mb-3">
                <input type="number" name="ward" id="ward" placeholder="Type 0 if unknown">
                <label for="ward">Ward</label>
            </div>

            <div class="mb-3">
                <div class="form-check form-switch containment_status">
                    <input class="form-check-input" type="checkbox" name="contained" role="switch" id="contained">
                    <label class="form-check-label" for="switchCheckChecked">Contained</label>
                </div>
            </div>
            
            <div class="floating-label mb-5">
                <input type="date" name="first_detected_activity" id="first_detected_activity">
                <label for="first_detected_activity">First Detected Activity</label>
            </div>

            <div class="form-buttons">
                <button type="submit" class="btn p-3 text-white">Add Ghoul</button>
                <a class="btn p-3 text-white" href="index.php?action=index"><i class="bi bi-x"></i> Cancel</a>
            </div>
        </form>

    </div>

    <script src="public/js/ghoul-validation.js"></script>

</body>

</html>