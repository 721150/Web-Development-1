<?php
namespace App\Views;
?>
<!DOCTYPE html>
<html lang="nl-NL">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account Aanmaken &ndash; Docentenrecenties</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body class="d-flex justify-content-center align-items-center">
<div class="container col-12 col-md-8 col-lg-6 p-5">
    <div class="card">
        <div class="card-body bg-light">
            <h2>Account Aanmaken</h2>
            <form method="POST" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="firstName" class="form-label">Voornaam</label>
                    <input type="text" class="form-control" id="firstName" name="firstName" required>
                </div>
                <div class="mb-3">
                    <label for="lastName" class="form-label">Achternaam</label>
                    <input type="text" class="form-control" id="lastName" name="lastName" required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">E-mail</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Wachtwoord</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                </div>
                <div class="mb-3">
                    <label for="accountType" class="form-label">Soort Account</label>
                    <select class="form-control" id="accountType" name="accountType" required>
                        <option value="student">Student</option>
                        <?php if (isset($_SESSION['admin'])): ?>
                            <option value="docent">Docent</option>
                        <?php endif; ?>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="image" class="form-label">Profielfoto</label>
                    <input type="file" class="form-control" id="image" name="image" accept="image/*">
                </div>
                <button type="submit" class="btn btn-success">Account Aanmaken</button>
            </form>
        </div>
    </div>
</div>
</body>
</html>