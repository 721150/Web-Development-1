<?php
namespace App\Views;
include __DIR__ . '/../header.php';
?>
<div class="flex-grow-1 p-4 overflow-auto">
    <h2>Openstaande Vragenlijsten</h2>
    <ul class="list-group">
        <?php 
        foreach ($_SESSION['listOfQuestionnaire'] as $questionnaire): 
        ?>
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <?= htmlspecialchars($questionnaire->getName()); ?>
                <form action="/Studentdasboard/openQuestionnaire" method="POST" class="d-inline">
                    <input type="hidden" name="id" value="<?= htmlspecialchars($questionnaire->getId()); ?>">
                    <input type="hidden" name="name" value="<?= htmlspecialchars($questionnaire->getName()); ?>">
                    <input type="hidden" name="discipline" value="<?= htmlspecialchars($questionnaire->getDiscipline()); ?>">
                    <button type="submit" class="btn btn-success btn-sm">Openen</button>
                </form>
            </li>
        <?php 
        endforeach; 
        ?>
    </ul>
</div>
<?php
include __DIR__ . '/../footer.php';
?>