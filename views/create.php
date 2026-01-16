
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
    <link rel="stylesheet" href="public/css/editar-style.css">
</head>

<body class="d-flex flex-column justify-content-center align-items-center">

    <div class="background-animated"></div>

    <div class="wrapper row" id="container">

        <form method="POST" class="d-flex justify-content-center align-items-center"
        action="index.php?action=create">
            <h4>Add Ghoul to System</h4>

            <div class="floating-label mb-3">
                <label for="ghoulid">Ghoul ID</label>
                <input type="text" name="ghoulid" placeholder="Ghoul ID" required>
            </div>

            <div class="floating-label mb-3">
                <label for="name">Name</label>
                <input type="text" name="name" placeholder="Name" required>
            </div>

            <div class="floating-label mb-3">
                <label for="rank">Rank</label>
                <input type="text" name="rank" placeholder="Rank" required>
            </div>

            <div class="floating-label mb-3">
                <label for="kagune">Kagune</label>
                <select class="form-select" aria-label="Default select example" name="kagune">
                    <option selected value="">Select kagune type</option>
                    <option value="1">Ukaku</option>
                    <option value="2">Koukaku</option>
                    <option value="3">Rinkaku</option>
                    <option value="4">Bikaku</option>
                </select>
            </div>

            <div class="mb-3">
                <label class="d-block mb-2">Contained</label>
                <div class="radio-group">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="organization_member" id="containedYes" value="yes">
                        <label class="form-check-label" for="containedYes">
                            Yes
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="organization_member" id="containedNo" value="no" checked>
                        <label class="form-check-label" for="containedNo">
                            No
                        </label>
                    </div>
                </div>
            </div>
            
            <div class="floating-label mb-5">
                <label for="first_detected_activity">First Detected Activity</label>
                <input type="date" name="first_detected_activity" required>
            </div>

            <div class="form-buttons">
                <button type="submit" class="btn p-2" id="btn-crear">Add Ghoul</button>
                <a class="btn p-2" href="index.php?action=index">Back to dashboard</a>
            </div>
        </form>

    </div>

</body>

</html>