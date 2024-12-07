<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cursus Beoordelingen en Berichten</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center">Cursus Beoordelingen en Berichten</h2>
        <div class="card mb-4">
            <div class="card-header">
                <h3>Cursusnaam: Web Development</h3>
                <p>Instructeur: Jan Jansen</p>
            </div>
            <div class="card-body">
                <h4>Beoordelingen</h4>
                <ul class="list-group mb-4" id="reviewsList">
                    <li class="list-group-item">
                        <strong>Student 1:</strong> <span class="badge bg-success">5/5</span>
                    </li>
                    <li class="list-group-item">
                        <strong>Student 2:</strong> <span class="badge bg-warning">3/5</span>
                    </li>
                </ul>
                <h4>Berichten</h4>
                <ul class="list-group" id="messagesList">
                    <li class="list-group-item">
                        <strong>Student 1:</strong> Zeer informatieve cursus!
                    </li>
                    <li class="list-group-item">
                        <strong>Student 2:</strong> Goede uitleg, maar soms te snel.
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"></script>
</body>
</html>