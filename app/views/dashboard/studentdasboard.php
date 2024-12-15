<?php
namespace App\Views;
//if (!isset($_SESSION['email'])) {
//    require("../views/home/login.php");
 //   exit;
//}
$vragenlijsten = [
    'Vragenlijst 1',
    'Vragenlijst 2',
    'Vragenlijst 3',
    // testlijst
];
?>
<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard &ndash; Docentenrecenties</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body class="d-flex vh-100 overflow-hidden">
    <div class="sidebar bg-dark text-white p-3" style="width: 250px;">
        <h2>Dashboard</h2>
        <h5>Welkom, <?=$_SESSION['name']?>!</h5>
        <a href="#" class="text-white d-block py-2" style="text-decoration: none;">Home</a>
        <a href="#" class="text-white d-block py-2" style="text-decoration: none;">Vragenlijsten</a>
        <a href="#" class="text-white d-block py-2" style="text-decoration: none;">Instellingen</a>
        <a href="..\..\controllers\endingsession.php" class="text-white d-block py-2" style="text-decoration: none;">Uitloggen</a>
    </div>
    <div class="content flex-grow-1 p-4 overflow-auto">
        <h2>Openstaande Vragenlijsten</h2>
        <ul class="list-group">
            <?php 
            foreach ($vragenlijsten as $index => $vragenlijst): 
            ?>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <?= htmlspecialchars($vragenlijst); ?>
                    <button class="btn btn-primary btn-sm">Openen</button>
                </li>
            <?php 
            endforeach; 
            ?>
        </ul>
    </div>
</body>
</html>