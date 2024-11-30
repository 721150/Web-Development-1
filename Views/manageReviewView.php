<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vragenlijsten &ndash; Docentenrecenties</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-5">
        <h2>Openstaande Vragenlijsten</h2>
        <ul class="list-group">
            <li class="list-group-item d-flex justify-content-between align-items-center">
                Vragenlijst 1
                <button class="btn btn-primary btn-sm" onclick="openQuestionnaire(1)">Openen</button>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center">
                Vragenlijst 2
                <button class="btn btn-primary btn-sm" onclick="openQuestionnaire(2)">Openen</button>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center">
                Vragenlijst 3
                <button class="btn btn-primary btn-sm" onclick="openQuestionnaire(3)">Openen</button>
            </li>
            <!-- Voeg meer vragenlijsten toe hier -->
        </ul>
    </div>

    <script>
        function openQuestionnaire(id) {
            alert('Vragenlijst ' + id + ' openen...');
            // Hier kun je de logica toevoegen om de vragenlijst te openen
        }
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</body>
</html>