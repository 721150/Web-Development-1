<?php

?>
<!DOCTYPE html>
<html lang="nl-NL">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inlogvenster &ndash; Docentenrecenties</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body class="d-flex justify-content-center align-items-center">
<div class="container col-12 col-md-8 col-lg-6 p-5">
    <div class="card">
        <div class="card-body bg-light">
            <form method="POST">
            <div class="mb-4 text-center">
                <img src="<?php echo __DIR__ . '/img/logo.png'; ?>" alt="Logo" width="100" height="100">
            </div>
            <div class="mb-3">
                <label for="inputEmail" class="form-label">E-mailadres</label>
                <input type="email" class="form-control" id="inputEmail" name="email" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="inputPassword" class="form-label">Wachtwoord</label>
                <input type="password" class="form-control" id="inputPassword" name="password">
            </div>
            <button type="submit" class="btn btn-success">Inloggen</button>
            </form>
        </div>
    </div>
</div>
</body>
</html>