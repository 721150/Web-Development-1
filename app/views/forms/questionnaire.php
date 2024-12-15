<?php
namespace App\Views;
$course = isset($course) ? $course : 'Onbekend vak';
$teacher = isset($teacher) ? $teacher : 'Onbekende docent';
?>
<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard &ndash; Docentenrecensies</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body class="d-flex vh-100 overflow-hidden">
    <div class="sidebar bg-dark text-white p-3" style="width: 250px;">
        <h2>Dashboard</h2>
        <h5>Welkom, <?=$_SESSION['name']?>!</h5>
        <a href="#" class="text-white d-block py-2" style="text-decoration: none;">Home</a>
        <a href="#" class="text-white d-block py-2" style="text-decoration: none;">Vragenlijsten</a>
        <a href="#" class="text-white d-block py-2" style="text-decoration: none;">Instellingen</a>
        <a href="/Questionnaire/endSession" class="text-white d-block py-2" style="text-decoration: none;">Uitloggen</a>
    </div>
    <div class="content flex-grow-1 p-4 overflow-auto">
        <h2>Evaluatie Vragenlijst</h2>
        <form>
            <div class="mb-3">
                <label for="course" class="form-label">Vak</label>
                <input type="text" class="form-control" id="course" value="<?= htmlspecialchars($course); ?>" readonly>
            </div>
            <div class="mb-3">
                <label for="teacher" class="form-label">Docent</label>
                <input type="text" class="form-control" id="teacher" value="<?= htmlspecialchars($teacher); ?>" readonly>
            </div>
            <div class="mb-3">
                <label class="form-label">Hoe beoordeel je de uitleg van de docent?</label>
                <select class="form-select" id="explanation">
                    <option value="1">Zeer slecht</option>
                    <option value="2">Slecht</option>
                    <option value="3">Gemiddeld</option>
                    <option value="4">Goed</option>
                    <option value="5">Zeer goed</option>
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label">Hoe beoordeel je de interactie met de docent?</label>
                <select class="form-select" id="interaction">
                    <option value="1">Zeer slecht</option>
                    <option value="2">Slecht</option>
                    <option value="3">Gemiddeld</option>
                    <option value="4">Goed</option>
                    <option value="5">Zeer goed</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="comments" class="form-label">Opmerkingen</label>
                <textarea class="form-control" id="comments" rows="3" placeholder="Voer je opmerkingen in"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Verzenden</button>
        </form>
    </div>
</body>
</html>