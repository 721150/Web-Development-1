<!DOCTYPE html>
<html lang="nl-NL">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard &ndash; Docentenrecenties</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body class="d-flex flex-column vh-100 overflow-hidden">
    <div class="bg-dark text-white p-3 d-flex justify-content-between align-items-center">
        <div class="d-flex align-items-center">
        <?php
            $image = $_SESSION['student']->getImage();
            $defaultImage = '/img/profile.png';
            ?>
            <img src="<?= htmlspecialchars($image ? $image : $defaultImage); ?>" alt="Profielfoto" class="rounded-circle" style="width: 50px; height: 50px;">
            <h5 class="ms-2 mb-0"><?=$_SESSION['student']->getFullName()?></h5>
        </div>
        <div>
            <a href="/" class="text-white px-3" style="text-decoration: none;">Vragenlijsten</a>
            <a href="/Massageboard" class="text-white px-3" style="text-decoration: none;">Berichten</a>
            <a href="/ResultBoard" class="text-white px-3" style="text-decoration: none;">Resultaten</a>
            <a href="/CourseInformation" class="text-white px-3" style="text-decoration: none;">Vakinformatie</a>
            <a href="/ManageProfile" class="text-white px-3" style="text-decoration: none;">Instellingen</a>
            <a href="/EndingSession/endSession" class="text-white px-3" style="text-decoration: none;">Uitloggen</a>
        </div>
    </div>
    <div class="flex-grow-1 p-4 overflow-auto">
        <div class="container">