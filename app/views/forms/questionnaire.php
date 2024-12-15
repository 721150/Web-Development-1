<?php
namespace App\Views;
$course = isset($course) ? $course : 'Onbekend vak';
$teacher = isset($teacher) ? $teacher : 'Onbekende docent';
?>
<!DOCTYPE html>
<html lang="nl-NL">
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
                <label for="overallQuality" class="form-label">Hoe beoordeel je de algehele kwaliteit van de lessen?</label>
                <select class="form-select" id="overallQuality">
                    <option value="1">Zeer slecht</option>
                    <option value="2">Slecht</option>
                    <option value="3">Gemiddeld</option>
                    <option value="4">Goed</option>
                    <option value="5">Zeer goed</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="teacherSatisfaction" class="form-label">Hoe tevreden ben je met de docent?</label>
                <select class="form-select" id="teacherSatisfaction">
                    <option value="1">Zeer ontevreden</option>
                    <option value="2">Ontevreden</option>
                    <option value="3">Neutraal</option>
                    <option value="4">Tevreden</option>
                    <option value="5">Zeer tevreden</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="teacherClarity" class="form-label">Hoe duidelijk is de uitleg van de docent?</label>
                <select class="form-select" id="teacherClarity">
                    <option value="1">Zeer onduidelijk</option>
                    <option value="2">Onduidelijk</option>
                    <option value="3">Gemiddeld</option>
                    <option value="4">Duidelijk</option>
                    <option value="5">Zeer duidelijk</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="teacherResponse" class="form-label">Hoe goed beantwoordt de docent vragen van studenten?</label>
                <select class="form-select" id="teacherResponse">
                    <option value="1">Zeer slecht</option>
                    <option value="2">Slecht</option>
                    <option value="3">Gemiddeld</option>
                    <option value="4">Goed</option>
                    <option value="5">Zeer goed</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="teacherAccessibility" class="form-label">Hoe toegankelijk is de docent buiten de lesuren?</label>
                <select class="form-select" id="teacherAccessibility">
                    <option value="1">Zeer ontoegankelijk</option>
                    <option value="2">Ontoegankelijk</option>
                    <option value="3">Gemiddeld</option>
                    <option value="4">Toegankelijk</option>
                    <option value="5">Zeer toegankelijk</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="teacherMotivation" class="form-label">Hoe goed motiveert de docent de studenten?</label>
                <select class="form-select" id="teacherMotivation">
                    <option value="1">Zeer slecht</option>
                    <option value="2">Slecht</option>
                    <option value="3">Gemiddeld</option>
                    <option value="4">Goed</option>
                    <option value="5">Zeer goed</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="lessonRelevance" class="form-label">Hoe relevant vind je de lesinhoud?</label>
                <select class="form-select" id="lessonRelevance">
                    <option value="1">Zeer irrelevant</option>
                    <option value="2">Irrelevant</option>
                    <option value="3">Gemiddeld</option>
                    <option value="4">Relevant</option>
                    <option value="5">Zeer relevant</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="lessonGoals" class="form-label">Hoe goed sluit de lesinhoud aan bij de leerdoelen?</label>
                <select class="form-select" id="lessonGoals">
                    <option value="1">Zeer slecht</option>
                    <option value="2">Slecht</option>
                    <option value="3">Gemiddeld</option>
                    <option value="4">Goed</option>
                    <option value="5">Zeer goed</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="lessonChallenge" class="form-label">Hoe uitdagend vind je de lesinhoud?</label>
                <select class="form-select" id="lessonChallenge">
                    <option value="1">Zeer eenvoudig</option>
                    <option value="2">Eenvoudig</option>
                    <option value="3">Gemiddeld</option>
                    <option value="4">Uitdagend</option>
                    <option value="5">Zeer uitdagend</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="lessonInteractivity" class="form-label">Hoe interactief zijn de lessen?</label>
                <select class="form-select" id="lessonInteractivity">
                    <option value="1">Zeer niet interactief</option>
                    <option value="2">Niet interactief</option>
                    <option value="3">Gemiddeld</option>
                    <option value="4">Interactief</option>
                    <option value="5">Zeer interactief</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="teacherEngagement" class="form-label">Hoe goed betrekt de docent de studenten bij de les?</label>
                <select class="form-select" id="teacherEngagement">
                    <option value="1">Zeer slecht</option>
                    <option value="2">Slecht</option>
                    <option value="3">Gemiddeld</option>
                    <option value="4">Goed</option>
                    <option value="5">Zeer goed</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="learningMaterials" class="form-label">Hoe beoordeel je de gebruikte leermiddelen (boeken, presentaties, etc.)?</label>
                <select class="form-select" id="learningMaterials">
                    <option value="1">Zeer slecht</option>
                    <option value="2">Slecht</option>
                    <option value="3">Gemiddeld</option>
                    <option value="4">Goed</option>
                    <option value="5">Zeer goed</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="lessonOrganization" class="form-label">Hoe goed is de planning en organisatie van de lessen?</label>
                <select class="form-select" id="lessonOrganization">
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